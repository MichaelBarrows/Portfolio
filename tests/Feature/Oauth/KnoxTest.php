<?php

use App\Models\OauthMethod;
use App\Models\User;
use Illuminate\Support\Facades\Config;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\User as SocialiteUser;

it('redirects the user to the application', function () {
    $this->get(route('oauth.knox.redirect'))
        ->assertRedirect();
});

it('does not create the user when their email address does not match the approved domain', function () {
    Config::set('filament.auth_user_domain', '@test.com');
    $mockUser = Mockery::mock(SocialiteUser::class);
    $mockUser->shouldReceive('getEmail')
        ->andReturn('test.user@example.com');

    Socialite::shouldReceive('driver->user')->andReturn($mockUser);

    $this->get(route('oauth.knox.callback'))
        ->assertRedirect(route('filament.admin.auth.login'));

    expect(User::all())->count()->toBe(0);
});

it('creates the user when their email address matches the approved domain', function () {
    Config::set('filament.auth_user_domain', '@example.com');
    $mockUser = Mockery::mock(SocialiteUser::class);
    $mockUser->shouldReceive('getEmail')
        ->andReturn($email = 'test.user@example.com');
    $mockUser->shouldReceive('getId')
        ->andReturn($userId = fake()->uuid());
    $mockUser->shouldReceive('getName')
        ->andReturn($userName = fake()->name());

    Socialite::shouldReceive('driver->user')->andReturn($mockUser);

    $this->get(route('oauth.knox.callback'))
        ->assertRedirect(route('filament.admin.pages.dashboard'));

    expect(User::all())->count()->toBe(1);
    expect(User::first())
        ->name->toBe($userName)
        ->email->toBe($email)
        ->password->toBeNull();

    expect(OauthMethod::all())->count()->toBe(1);
    expect(OauthMethod::first())
        ->provider->toBe('knox')
        ->provider_id->toBe($userId);
});

it('logs the user in without duplicating them', function () {
    Config::set('filament.auth_user_domain', '@example.com');
    $user = User::factory()->create(['password' => null]);
    $oauthMethod = OauthMethod::factory()
        ->for($user)
        ->create(['provider' => 'knox']);

    $mockUser = Mockery::mock(SocialiteUser::class);
    $mockUser->shouldReceive('getEmail')
        ->andReturn($user->email);
    $mockUser->shouldReceive('getId')
        ->andReturn($oauthMethod->provider_id);
    $mockUser->shouldReceive('getName')
        ->andReturn($user->name);

    Socialite::shouldReceive('driver->user')->andReturn($mockUser);

    $this->get(route('oauth.knox.callback'))
        ->assertRedirect(route('filament.admin.pages.dashboard'));

    expect(User::all())->count()->toBe(1);
    expect(User::first())
        ->name->toBe($user->name)
        ->email->toBe($user->email)
        ->password->toBeNull();

    expect(OauthMethod::all())->count()->toBe(1);
    expect(OauthMethod::first())
        ->provider->toBe($oauthMethod->provider)
        ->provider_id->toBe($oauthMethod->provider_id);
});
