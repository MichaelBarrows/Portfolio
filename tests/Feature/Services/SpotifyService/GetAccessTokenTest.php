<?php

use App\Exceptions\Spotify\TokenException;
use App\Models\Setting;
use App\Services\SpotifyService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

beforeEach(function () {
    Config::set('services.spotify.client_id', Str::random(10));
    Config::set('services.spotify.client_secret', Str::random(10));
    Config::set('services.spotify.token_url', 'http://spotify.test/token');
    Config::set('services.spotify.api_url', 'http://spotify.test/api/');
});

it('returns the cached access token', function () {
    Cache::shouldReceive('get')
        ->with(SpotifyService::ACCESS_TOKEN_KEY)
        ->andReturn(Crypt::encrypt('abcdefg123'));

    $result = app(SpotifyService::class)->getAccessToken();

    expect($result)->toEqual('abcdefg123');
});

it('throws an exception when the refresh token is not set', function () {
    Cache::shouldReceive('get')
        ->with(SpotifyService::ACCESS_TOKEN_KEY)
        ->andReturn(null);
    Cache::shouldReceive('get')
        ->once()
        ->with(SpotifyService::SPOTIFY_USER_KEY)
        ->andReturn(null);

    app(SpotifyService::class)->getAccessToken();
})->throws(TokenException::class);

it('throws an exception when the spotify api request is unsuccessful', function () {
    Cache::shouldReceive('get')
        ->with(SpotifyService::ACCESS_TOKEN_KEY)
        ->andReturn(null);
    Cache::shouldReceive('get')
        ->once()
        ->with(SpotifyService::SPOTIFY_USER_KEY)
        ->andReturn(['refreshToken' => Crypt::encrypt('sdhgfue')]);

    Setting::factory()->create([
        'key' => 'spotify-refresh-token',
        'value' => Crypt::encrypt('rrxdctfvygbuhnij'),
    ]);

    Http::fake([
        'http://spotify.test/token' => Http::response(status: 401),
    ]);

    app(SpotifyService::class)->getAccessToken();
})->throws(TokenException::class);

it('returns a new access token', function () {
    Setting::factory()->create([
        'key' => 'spotify-refresh-token',
        'value' => Crypt::encrypt('rrxdctfvygbuhnij'),
    ]);

    Cache::shouldReceive('get')
        ->once()
        ->with(SpotifyService::ACCESS_TOKEN_KEY)
        ->andReturn(null);
    Cache::shouldReceive('get')
        ->once()
        ->with(SpotifyService::SPOTIFY_USER_KEY)
        ->andReturn(['refreshToken' => Crypt::encrypt('rrxdctfvygbuhnij')]);
    Cache::shouldReceive('remember')
        ->once()
        ->withSomeOfArgs(SpotifyService::ACCESS_TOKEN_KEY, 60)
        ->andReturn(['bhjabfe']);

    Http::fake([
        'http://spotify.test/token' => Http::response(
            body: [
                'access_token' => 'bhjabfe',
                'expires_in' => 60,
            ],
            status: 200,
        ),
    ]);

    $response = app(SpotifyService::class)->getAccessToken();

    expect($response)->toEqual('bhjabfe');
});
