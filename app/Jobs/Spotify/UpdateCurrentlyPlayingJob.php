<?php

namespace App\Jobs\Spotify;

use App\Services\SpotifyService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Cache;

class UpdateCurrentlyPlayingJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function handle(SpotifyService $spotifyService): void
    {
        if (Cache::has('spotify.currently-playing.is-current')) {
            return;
        }

        $pusher = Broadcast::getPusher();

        $subscriptionCount = $pusher->getChannelInfo(
            channel: "currently-playing",
            params: ['info' => 'subscription_count'],
        )?->subscription_count;

        if ($subscriptionCount < 1) {
            return;
        }

        $spotifyService->getCurrentlyPlaying();
    }
}
