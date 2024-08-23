<?php

use App\Models\SpotifyContentRule;
use App\Services\SpotifyService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

beforeEach(function () {
    Config::set('services.spotify.client_id', Str::random(10));
    Config::set('services.spotify.client_secret', Str::random(10));
    Config::set('services.spotify.api_url', 'http://spotify.test/api/');

    Cache::shouldReceive('get')
        ->with('spotify-access-token')
        ->once()
        ->andReturn(Crypt::encrypt('some-string'));

    $this->payload = json_decode(
        json: file_get_contents(
            base_path('tests/Feature/Services/SpotifyService/data/spotify-payload.json')
        ),
        associative: true,
    );
    $this->cachedPayload = [
        'track' => $this->payload['item']['name'],
        'artist' => collect($this->payload['item']['artists'])->first()['name'],
        'artists' => collect($this->payload['item']['artists'])
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
        'album' => $this->payload['item']['album']['name'],
        'spotify_album_url' => (! empty($this->payload['item']['album']['external_urls']['spotify'])
            ? $this->payload['item']['album']['external_urls']['spotify']
            : ''
        ),
        'album_image' => collect($this->payload['item']['album']['images'])
            ->where('height', 300)
            ->first()['url'],
        'explicit' => $this->payload['item']['explicit'],
        'spotify_track_url' => $this->payload['item']['external_urls']['spotify'],
        'spotify_track_uri' => $this->payload['item']['uri'],
        'track_id' => $this->payload['item']['uri'],
    ];
});

it('caches the result', function () {
    Http::fake([
        'http://spotify.test/api/me/player/currently-playing' => Http::response($this->payload)
    ]);

    Cache::shouldReceive('get')
        ->with('spotify.currently-playing')
        ->once()
        ->andReturn(null);

    Cache::shouldReceive('put')
        ->withArgs(function ($key, $value) {
            return $key === 'spotify.currently-playing'
            && $value === $this->cachedPayload;
        })
        ->once();

    Cache::shouldReceive('put')
        ->withArgs(function ($key, $value, $ttl) {
            return $key === 'spotify.currently-playing.is-current';
        })
        ->once();


    app(SpotifyService::class)->getCurrentlyPlaying();
});

it('does not update the data when the response status is not 200', function () {
    Http::fake([
        'http://spotify.test/api/me/player/currently-playing' => Http::response($this->payload, 500)
    ]);

    Cache::shouldNotReceive('get')
        ->with('spotify.currently-playing');

    Cache::shouldNotReceive('put')
        ->withArgs(function ($key, $value) {
            return $key === 'spotify.currently-playing'
            && $value === $this->cachedPayload;
        });

    Cache::shouldReceive('put')
        ->withArgs(function ($key, $value, $ttl) {
            return $key === 'spotify.currently-playing.is-current';
        })
        ->once();

    app(SpotifyService::class)->getCurrentlyPlaying();
});

it('does not update the data when the response body is empty', function () {
    Http::fake([
        'http://spotify.test/api/me/player/currently-playing' => Http::response([])
    ]);

    Cache::shouldNotReceive('get')
        ->with('spotify.currently-playing');

    Cache::shouldNotReceive('put')
        ->withArgs(function ($key, $value) {
            return $key === 'spotify.currently-playing'
            && $value === $this->cachedPayload;
        });

    Cache::shouldReceive('put')
        ->withArgs(function ($key, $value, $ttl) {
            return $key === 'spotify.currently-playing.is-current';
        })
        ->once();

    app(SpotifyService::class)->getCurrentlyPlaying();
});

it('does not update the data when the currently playing type is not track', function () {
    Http::fake([
        'http://spotify.test/api/me/player/currently-playing' => Http::response([
            'currently_playing_type' => 'podcast',
        ])
    ]);

    Cache::shouldNotReceive('get')
        ->with('spotify.currently-playing');

    Cache::shouldNotReceive('put')
        ->withArgs(function ($key, $value) {
            return $key === 'spotify.currently-playing'
            && $value === $this->cachedPayload;
        });

    Cache::shouldReceive('put')
        ->withArgs(function ($key, $value, $ttl) {
            return $key === 'spotify.currently-playing.is-current';
        })
        ->once();

    app(SpotifyService::class)->getCurrentlyPlaying();
});

it('does not update the data when the track is local', function () {
    Http::fake([
        'http://spotify.test/api/me/player/currently-playing' => Http::response([
            'currently_playing_type' => 'track',
            'item' => [
                'uri' => 'spotify:local:some-uri',
            ],
        ])
    ]);

    Cache::shouldNotReceive('get')
        ->with('spotify.currently-playing');

    Cache::shouldNotReceive('put')
        ->withArgs(function ($key, $value) {
            return $key === 'spotify.currently-playing'
            && $value === $this->cachedPayload;
        });

    Cache::shouldReceive('put')
        ->withArgs(function ($key, $value, $ttl) {
            return $key === 'spotify.currently-playing.is-current';
        })
        ->once();

    app(SpotifyService::class)->getCurrentlyPlaying();
});

it('does not update the song does not pass content rules', function ($field, $operand, $value, $callback) {
    $trackData = $callback($this->payload);
    SpotifyContentRule::factory()
        ->create([
            'field' => $field,
            'operand' => $operand,
            'value' => $value,
        ]);
    Http::fake([
        'http://spotify.test/api/me/player/currently-playing' => Http::response($trackData)
    ]);

    Cache::shouldNotReceive('get')
        ->with('spotify.currently-playing');

    Cache::shouldNotReceive('put')
        ->withArgs(function ($key, $value) {
            return $key === 'spotify.currently-playing'
            && $value === $this->cachedPayload;
        });

    Cache::shouldReceive('put')
        ->withArgs(function ($key, $value, $ttl) {
            return $key === 'spotify.currently-playing.is-current';
        })
        ->once();

    app(SpotifyService::class)->getCurrentlyPlaying();
})->with([
    ['uri', 'equals', 'spotify:track:value', function (array $payload) {
        $payload['item']['uri'] = 'spotify:track:value';
        return $payload;
    }],
    ['uri', 'contains', 'value', function (array $payload) {
        $payload['item']['uri'] = 'spotify:track:value';
        return $payload;
    }],
    ['artists.uri', 'equals', 'some-value', function (array $payload) {
        $payload['item']['artists'][0]['uri'] = 'some-value';
        return $payload;
    }],
    ['artists.uri', 'contains', 'value', function (array $payload) {
        $payload['item']['artists'][0]['uri'] = 'some-value';
        return $payload;
    }],
    ['album.uri', 'equals', 'some-value', function (array $payload) {
        $payload['item']['album']['uri'] = 'some-value';
        return $payload;
    }],
    ['album.uri', 'contains', 'value', function (array $payload) {
        $payload['item']['album']['uri'] = 'some-value';
        return $payload;
    }],
    ['name', 'equals', 'some-value', function (array $payload) {
        $payload['item']['name'] = 'some-value';
        return $payload;
    }],
    ['name', 'contains', 'value', function (array $payload) {
        $payload['item']['name'] = 'some-value';
        return $payload;
    }],
    ['artists.name', 'equals', 'some-value', function (array $payload) {
        $payload['item']['artists'][0]['name'] = 'some-value';
        return $payload;
    }],
    ['album.name', 'equals', 'some-value', function (array $payload) {
        $payload['item']['album']['name'] = 'some-value';
        return $payload;
    }],
    ['album.name', 'contains', 'value', function (array $payload) {
        $payload['item']['album']['name'] = 'some-value';
        return $payload;
    }],
    ['explicit', 'bool', 'true', function (array $payload) {
        $payload['item']['explicit'] = true;
        return $payload;
    }],
]);

