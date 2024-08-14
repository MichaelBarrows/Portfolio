<?php

use App\Jobs\Spotify\UpdateCurrentlyPlayingJob;
use App\Services\SpotifyService;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Cache;
use Mockery\MockInterface;

it ('does nothing if the track is current', function () {
    Cache::shouldReceive('has')
        ->with('spotify.currently-playing.is-current')
        ->once()
        ->andReturn(true);
    Broadcast::partialMock()
        ->shouldNotReceive('getPusher->getChannelInfo');

    $this->instance(
        SpotifyService::class,
        Mockery::mock(SpotifyService::class, function (MockInterface $mock) {
            $mock->shouldNotReceive('getCurrentlyPlaying');
        })
    );

    UpdateCurrentlyPlayingJob::dispatchSync();
});

it ('does nothing if there are no users subscribed', function () {
    Cache::shouldReceive('has')
        ->with('spotify.currently-playing.is-current')
        ->once()
        ->andReturn(false);
    Broadcast::partialMock()
        ->shouldReceive('getPusher->getChannelInfo')
        ->andReturn((object) ['subscription_count' => 0]);

    $this->instance(
        SpotifyService::class,
        Mockery::mock(SpotifyService::class, function (MockInterface $mock) {
            $mock->shouldNotReceive('getCurrentlyPlaying');
        })
    );

    UpdateCurrentlyPlayingJob::dispatchSync();
});

it ('calls the service', function () {
    Cache::shouldReceive('has')
        ->with('spotify.currently-playing.is-current')
        ->once()
        ->andReturn(false);
    Broadcast::partialMock()
        ->shouldReceive('getPusher->getChannelInfo')
        ->andReturn((object) ['subscription_count' => 10]);

    $this->instance(
        SpotifyService::class,
        Mockery::mock(SpotifyService::class, function (MockInterface $mock) {
            $mock->shouldReceive('getCurrentlyPlaying')
                ->once();
        })
    );

    UpdateCurrentlyPlayingJob::dispatchSync();
});
