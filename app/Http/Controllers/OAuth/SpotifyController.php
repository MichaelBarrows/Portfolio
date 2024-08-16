<?php

namespace App\Http\Controllers\OAuth;

use App\Filament\Pages\SpotifySettings;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Laravel\Socialite\Facades\Socialite;

class SpotifyController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('spotify')
            ->scopes([
                'user-read-currently-playing',
            ])
            ->redirect();
    }

    public function callback()
    {
        $spotifyUser = Socialite::driver('spotify')->user();

        Cache::rememberForever(
            key: 'spotify-user',
            callback: fn () => [
                'avatar' => $spotifyUser->getAvatar(),
                'name' => $spotifyUser->getName(),
                'refreshToken' => Crypt::encrypt($spotifyUser->refreshToken),
            ],
        );

        return redirect(route(SpotifySettings::getRouteName('admin')));
    }
}
