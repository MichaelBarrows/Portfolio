<?php

namespace App\Services;

use App\Events\CurrentlyPlaying\TrackChanged;
use App\Exceptions\Spotify\TokenException;
use App\Models\SpotifyContentRule;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class SpotifyService
{
    public const ACCESS_TOKEN_KEY = 'spotify-access-token';
    public const SPOTIFY_USER_KEY = 'spotify-user';

    public function getAccessToken(): ?string
    {
        $accessToken = Cache::get(self::ACCESS_TOKEN_KEY);

        if ($accessToken) {
            return Crypt::decrypt($accessToken);
        }

        return $this->getAccessTokenFromRefreshToken();
    }

    private function getAccessTokenFromRefreshToken(): ?string
    {
        $refreshToken = null;

        if (! empty($spotifyUser = Cache::get(self::SPOTIFY_USER_KEY))) {
            $refreshToken = Crypt::decrypt($spotifyUser['refreshToken']);
        }

        if (! $refreshToken) {
            throw new TokenException('Refresh token is not set');
        }

        $response = Http::asForm()
            ->withBasicAuth(
                username: config('services.spotify.client_id'),
                password: config('services.spotify.client_secret')
            )
            ->post(
                url: config('services.spotify.token_url'),
                data: [
                    'grant_type' => 'refresh_token',
                    'refresh_token' => $refreshToken,
                ]
            );

        if (! $response->successful()) {
            throw new TokenException('Unsuccessful response from the Spotify API');
        }
        $response = $response->collect();

        Cache::remember(
            key: self::ACCESS_TOKEN_KEY,
            ttl: $response->get('expires_in'),
            callback: fn () => Crypt::encrypt($response->get('access_token')),
        );

        return $response->get('access_token');
    }

    public function getCurrentlyPlaying()
    {
        $accessToken = $this->getAccessToken();
        $refreshAfter = config('services.spotify.min_refresh_after');

        if (! $accessToken) {
            return;
        }

        $response = Http::withToken($accessToken)
            ->baseUrl(config('services.spotify.api_url'))
            ->get('me/player/currently-playing');
        $body = $response->json();

        if (
            $response->successful()
            && ! empty($body)
            && $body['currently_playing_type'] == 'track'
            && $this->passesContentRules($body['item'])
            && ! str_contains($body['item']['uri'] ?? '', 'spotify:local:')
        ) {
            $existingTrackId = null;
            if (! empty(Cache::get('spotify.currently-playing')['track_id'])) {
                $existingTrackId = Cache::get('spotify.currently-playing')['track_id'];
            }

            if ($body['item']['uri'] === $existingTrackId) {
                return;
            }

            $payload = [
                'track' => $body['item']['name'],
                'artist' => collect($body['item']['artists'])->first()['name'],
                'artists' => collect($body['item']['artists'])
                    ->map(function ($artist) {
                        return [
                            'name' => $artist['name'],
                            'spotify_url' => (! empty($artist?->external_urls?->spotify)
                                ? $artist?->external_urls?->spotify
                                : ''
                            ),
                        ];
                    })
                    ->toArray(),
                'album' => $body['item']['album']['name'],
                'spotify_album_url' => (! empty($body['item']['album']['external_urls']['spotify'])
                    ? $body['item']['album']['external_urls']['spotify']
                    : ''
                ),
                'album_image' => collect($body['item']['album']['images'])
                    ->where('height', 300)
                    ->first()['url'],
                'explicit' => $body['item']['explicit'],
                'spotify_track_url' => $body['item']['external_urls']['spotify'],
                'spotify_track_uri' => $body['item']['uri'],
                'track_id' => $body['item']['uri'],
            ];

            Cache::put(
                key: 'spotify.currently-playing',
                value: $payload,
            );

            TrackChanged::dispatch();
        }

        Cache::put(
            key: 'spotify.currently-playing.is-current',
            value: true,
            ttl: now()->addSeconds($refreshAfter / 1000)
        );
    }

    private function passesContentRules($data): bool
    {
        $contentRules = collect();

        SpotifyContentRule::all()
            ->each(function (SpotifyContentRule $rule) use ($data, $contentRules) {
                $value = $data;
                $field = explode('.', $rule->field);
                foreach ($field as $key) {
                    if (is_array($value) && ! array_key_exists($key, $value)) {
                        $value = collect($value)->pluck($key)->toArray();

                        if (! empty($value)) {
                            break;
                        }
                    } else {
                        $value = $value[$key];
                    }
                }

                if (! is_array($value)) {
                    $value = [$value];
                }

                collect($value)->each(
                    fn ($v) => $contentRules->push(
                        $this->compare(
                            valueA: $v,
                            valueB: $rule->value,
                            operand: $rule->operand,
                        )
                    )
                );
            });

        return ! $contentRules->contains(true);
    }

    private function compare($valueA, $valueB, $operand): bool
    {
        $valueA = Str::lower($valueA);
        $valueB = Str::lower($valueB);

        $callback = match ($operand) {
            'equals' => fn ($trackValue, $ruleValue) => $trackValue == $ruleValue,
            'bool' => fn ($trackValue, $fieldValue) => (bool) $trackValue === ($fieldValue == 'true'),
            'contains' => fn ($trackValue, $fieldValue) => Str::contains($trackValue, $fieldValue),
        };

        return $callback($valueA, $valueB);
    }
}
