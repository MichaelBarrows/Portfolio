<?php

use App\Filament\Pages\Login;
use App\Models\User;

use function Pest\Livewire\livewire;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;

it('shows the login form when the config value is true', function () {
    Config::set('auth.enable_password_login', true);

    livewire(Login::class)
        ->assertSee('Email address')
        ->assertSee('Password')
        ->assertSee('Remember me');
});

it('does not show the login form when the config value is false', function () {
    Config::set('auth.enable_password_login', false);

    livewire(Login::class)
        ->assertDontSee('Email address')
        ->assertDontSee('Password')
        ->assertDontSee('Remember me');
});

it('shows the login with knox button when the config value is true', function () {
    Config::set('services.laravelpassport.enabled', true);

    livewire(Login::class)
        ->assertSee('Login with Knox');
});

it('does not show the login with knox button when the config value is false', function () {
    Config::set('services.laravelpassport.enabled', false);

    livewire(Login::class)
        ->assertDontSee('Login with Knox');
});

it('does not allow logging in using a password when the user does not have a password', function () {
    $user = User::factory()->create(['password' => null]);
    Config::set('auth.enable_password_login', true);

    livewire(Login::class)
        ->fillForm([
            'email' => $user->email,
            'password' => 'test',
        ])
        ->call('authenticate')
        ->assertHasFormErrors(['email'])
        ->assertSee('These credentials do not match our records.');
});

it('it requires a password', function () {
    $user = User::factory()->create(['password' => null]);
    Config::set('auth.enable_password_login', true);

    livewire(Login::class)
        ->fillForm([
            'email' => $user->email,
            'password' => null,
        ])
        ->call('authenticate')
        ->assertHasFormErrors(['password' => 'required']);
});

it('it authenticates the user', function () {
    $user = User::factory()->create(['password' => Hash::make('password')]);
    Config::set('auth.enable_password_login', true);

    livewire(Login::class)
        ->fillForm([
            'email' => $user->email,
            'password' => 'password',
        ])
        ->call('authenticate')
        ->assertRedirect(route('filament.admin.pages.dashboard'));
});
