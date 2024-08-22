<?php

use App\Livewire\CurrentlyPlaying;
use function Pest\Livewire\livewire;
use Illuminate\Support\Facades\Cache;

it('displays the track details appropriately', function() {
    livewire(CurrentlyPlaying::class)
        ->set('track', [
            'track' => 'Track Name',
            'artist' => 'Artist A',
            'artists' => [
                [
                    'name' => 'Artist A',
                    'spotify_url' => '',
                ],
                [
                    'name' => 'Artist B',
                    'spotify_url' => '',
                ],
            ],
            'album' => 'Test Album',
            'album_image' => $this->faker->word(),
        ])
        ->assertSeeInOrder([
            'Track Name',
            'Artist A, Artist B',
            'Test Album',
        ]);
});

it('updates the track when the event is dispatched', function () {
    Cache::shouldReceive('get')
        ->withArgs(fn ($key, $default) => $key === 'spotify.currently-playing')
        ->once()
        ->andReturn([
            'track' => 'Track Name',
            'album_image' => '',
            'artist' => 'Artist Name',
            'album' => 'Album Name',
            'artists' => [['name' => 'Artist Name']],
        ]);

    Cache::shouldReceive('get')
        ->withArgs(fn ($key, $default) => $key === 'spotify.currently-playing')
        ->once()
        ->andReturn($newData = [
            'track' => 'New Track Name',
            'album_image' => '',
            'artist' => 'New Artist Name',
            'album' => 'New Album Name',
            'artists' => [['name' => 'New Artist Name']],
        ]);
    livewire(CurrentlyPlaying::class)
        ->assertSeeInOrder([
            'Track Name',
            'Artist Name',
            'Album Name',
        ])
        ->fireEvent('echo:currently-playing,CurrentlyPlaying\\TrackChanged')
        ->assertSet('track', $newData)
        ->assertSeeInOrder([
            'New Track Name',
            'New Artist Name',
            'New Album Name',
        ]);
});
