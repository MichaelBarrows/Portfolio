<?php

use App\Filament\Pages\SpotifySettings;
use App\Livewire\SpotifyContentSettings;
use App\Models\SpotifyContentRule;
use function Pest\Livewire\livewire;
use Illuminate\Support\Facades\Cache;

it('creates the content rule', function () {
    $data = SpotifyContentRule::factory()->definition();

    livewire(SpotifySettings::class)
        ->callAction('newContentRule', $data)
        ->assertHasNoActionErrors();

    $this->assertDatabaseHas(
        table: SpotifyContentRule::class,
        data: $data,
    );
});

it('displays the spotify user information appropriately', function () {
    Cache::shouldReceive('get')
        ->with('spotify-user')
        ->once()
        ->andReturn([
            'name' => 'Test User',
            'avatar' => 'USER-AVATAR-URL',
        ]);
    Cache::shouldReceive('get')
        ->with('freeze-currently-playing', false)
        ->atLeast()
        ->once()
        ->andReturn(false);
    Cache::shouldReceive('get')
        ->withArgs(function($key, $default) {
            return $key === 'spotify.currently-playing';
        })
        ->once()
        ->andReturn([
            'track' => '',
            'album_image' => '',
            'artist' => '',
            'album' => '',
        ]);

    livewire(SpotifySettings::class)
        ->assertSeeHtmlInOrder([
            'Connected User',
            'USER-AVATAR-URL',
            'Test User',
            'Switch User',
        ]);
});

it('displays the sign in message when a spotify user is not associated', function () {
    livewire(SpotifySettings::class)
        ->assertSeeHtmlInOrder([
            'Connected User',
            'No User Associated',
            'Sign in',
        ]);
});

it('emits the event when the record is created', function () {
    $data = SpotifyContentRule::factory()->definition();

    livewire(SpotifySettings::class)
        ->callAction('newContentRule', $data)
        ->assertDispatchedTo(SpotifyContentSettings::class, 'ruleAdded')
        ->assertHasNoActionErrors();
});

it('shows the pause updates button when the cache key is not set/false', function () {
    Cache::shouldReceive('get')
        ->with('spotify-user')
        ->once()
        ->andReturn(null);
    Cache::shouldReceive('get')
        ->withArgs(function($key, $default) {
            return $key === 'spotify.currently-playing';
        })
        ->once()
        ->andReturn([
            'track' => '',
            'album_image' => '',
            'artist' => '',
            'album' => '',
        ]);

    Cache::shouldReceive('get')
        ->with('freeze-currently-playing', false)
        ->atLeast()
        ->once()
        ->andReturn(false);

    livewire(SpotifySettings::class)
        ->assertActionVisible('pauseUpdates');
});

it('does not show the pause updates button when the cache key is true', function () {
    Cache::shouldReceive('get')
        ->with('spotify-user')
        ->once()
        ->andReturn(null);
    Cache::shouldReceive('get')
        ->withArgs(function($key, $default) {
            return $key === 'spotify.currently-playing';
        })
        ->once()
        ->andReturn([
            'track' => '',
            'album_image' => '',
            'artist' => '',
            'album' => '',
        ]);

    Cache::shouldReceive('get')
        ->with('freeze-currently-playing', false)
        ->atLeast()
        ->once()
        ->andReturn(true);

    livewire(SpotifySettings::class)
        ->assertActionHidden('pauseUpdates');
});

it('set the cache key when the pause updates action is called', function () {
    Cache::shouldReceive('get')
        ->with('spotify-user')
        ->once()
        ->andReturn(null);
    Cache::shouldReceive('get')
        ->withArgs(function($key, $default) {
            return $key === 'spotify.currently-playing';
        })
        ->once()
        ->andReturn([
            'track' => '',
            'album_image' => '',
            'artist' => '',
            'album' => '',
        ]);

    Cache::shouldReceive('get')
        ->with('freeze-currently-playing', false)
        ->atLeast()
        ->once()
        ->andReturn(false);

    Cache::shouldReceive('rememberForever')
        ->withArgs(function ($key, $callback) {
            return $key === 'freeze-currently-playing'
                && $callback() === true;
        })
        ->once()
        ->andReturn(true);

    livewire(SpotifySettings::class)
        ->callAction('pauseUpdates');
});

it('shows the resume updates button when the cache key is true', function () {
    Cache::shouldReceive('get')
        ->with('spotify-user')
        ->once()
        ->andReturn(null);
    Cache::shouldReceive('get')
        ->withArgs(function($key, $default) {
            return $key === 'spotify.currently-playing';
        })
        ->once()
        ->andReturn([
            'track' => '',
            'album_image' => '',
            'artist' => '',
            'album' => '',
        ]);

    Cache::shouldReceive('get')
        ->with('freeze-currently-playing', false)
        ->atLeast()
        ->once()
        ->andReturn(true);

    livewire(SpotifySettings::class)
        ->assertActionVisible('resumeUpdates');
});

it('does not show the resume updates button when the cache key is false/not set', function () {
    Cache::shouldReceive('get')
        ->with('spotify-user')
        ->once()
        ->andReturn(null);
    Cache::shouldReceive('get')
        ->withArgs(function($key, $default) {
            return $key === 'spotify.currently-playing';
        })
        ->once()
        ->andReturn([
            'track' => '',
            'album_image' => '',
            'artist' => '',
            'album' => '',
        ]);

    Cache::shouldReceive('get')
        ->with('freeze-currently-playing', false)
        ->atLeast()
        ->once()
        ->andReturn(false);

    livewire(SpotifySettings::class)
        ->assertActionHidden('resumeUpdates');
});

it('removes the cache key when the resume updates action is called', function () {
Cache::shouldReceive('get')
        ->with('spotify-user')
        ->once()
        ->andReturn(null);
    Cache::shouldReceive('get')
        ->withArgs(function($key, $default) {
            return $key === 'spotify.currently-playing';
        })
        ->once()
        ->andReturn([
            'track' => '',
            'album_image' => '',
            'artist' => '',
            'album' => '',
        ]);

    Cache::shouldReceive('get')
        ->with('freeze-currently-playing', false)
        ->atLeast()
        ->once()
        ->andReturn(true);

    Cache::shouldReceive('forget')
        ->with('freeze-currently-playing')
        ->once()
        ->andReturn(true);

    livewire(SpotifySettings::class)
        ->callAction('resumeUpdates');
});

