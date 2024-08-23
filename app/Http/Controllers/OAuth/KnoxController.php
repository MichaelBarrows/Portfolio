<?php

namespace App\Http\Controllers\OAuth;

use App\Http\Controllers\Controller;
use App\Repositories\OauthMethodRepository;
use App\Repositories\UserRepository;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class KnoxController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('laravelpassport')
            ->redirect();
    }

    public function callback()
    {
        $knoxUser = Socialite::driver('laravelpassport')->user();

        if (! Str::endsWith($knoxUser->getEmail(), config('filament.auth_user_domain'))){
            Notification::make()
                ->title('Error')
                ->body("You're not authorised to access this application")
                ->danger()
                ->send();
            return redirect()->route('filament.admin.auth.login');
        }

        $loginMethod = app(OauthMethodRepository::class)->getMethodForSocialiteUser(
            provider: 'knox',
            socialiteUser: $knoxUser,
        );

        if ($loginMethod && $loginMethod->user) {
            $user = $loginMethod->user;
        } else {
        $user = app(UserRepository::class)->createUserFromSocialiteUser(socialiteUser: $knoxUser);
            app(OauthMethodRepository::class)->createMethodForUser(
                provider: 'knox',
                user: $user,
                socialiteUser: $knoxUser
            );
        }

        Auth::login($user);

        return redirect()->route('filament.admin.pages.dashboard');
    }
}
