<?php

use App\Filament\Pages\SpotifySettings;
use App\Models\OauthMethod;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\User as SocialiteUser;

it('requires the user to be authenticated', function () {
    $this->get(route('oauth.spotify.redirect'))
        ->assertRedirect(route('filament.admin.auth.login'));
});

it('redirects the user to the application', function () {
    $user = User::factory()->create();
    Socialite::shouldReceive('driver->scopes->redirect')
        ->andReturn(redirect()->away('spotify.test'));

    $this->actingAs($user)
        ->get(route('oauth.spotify.redirect'))
        ->assertRedirect('spotify.test');
});

it('caches the returned data', function () {
    $mockUser = Mockery::mock(SocialiteUser::class);
    $mockUser->shouldReceive('getAvatar')
        ->andReturn($avatar = 'avatar');
    $mockUser->shouldReceive('getName')
        ->andSet('refreshToken', $token = fake()->uuid())
        ->andReturn($userName = fake()->name());

    Cache::shouldReceive('rememberForever')
        ->once()
        ->withArgs(function ($key, $callback) use ($avatar, $userName, $token) {
            $data = $callback();
            return $key === 'spotify-user'
                && $data['avatar'] === $avatar
                && $data['name'] === $userName
                && Crypt::decrypt($data['refreshToken']) === $token;
        });

    Socialite::shouldReceive('driver->user')->andReturn($mockUser);

    $this->actingAs(User::factory()->create())
        ->get(route('oauth.spotify.callback'))
        ->assertRedirect(route(SpotifySettings::getRouteName('admin')));
});
