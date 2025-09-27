<?php

namespace App\Http\Controllers\OAuth;

use App\Http\Controllers\Controller;
use App\Repositories\OauthMethodRepository;
use App\Repositories\UserRepository;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')
            ->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();

        if (! Str::endsWith($googleUser->getEmail(), config('filament.auth_user_domain'))){
            Notification::make()
                ->title('Error')
                ->body("You're not authorised to access this application")
                ->danger()
                ->send();
            return redirect()->route('filament.admin.auth.login');
        }

        $loginMethod = app(OauthMethodRepository::class)->getMethodForSocialiteUser(
            provider: 'google',
            socialiteUser: $googleUser,
        );

        if ($loginMethod && $loginMethod->user) {
            $user = $loginMethod->user;
        } else {
        $user = app(UserRepository::class)->createUserFromSocialiteUser(socialiteUser: $googleUser);
            app(OauthMethodRepository::class)->createMethodForUser(
                provider: 'google',
                user: $user,
                socialiteUser: $googleUser
            );
        }

        Auth::login($user);

        return redirect()->route('filament.admin.pages.dashboard');
    }
}
