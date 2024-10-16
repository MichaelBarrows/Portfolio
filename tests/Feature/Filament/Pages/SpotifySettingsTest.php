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
    // @TODO should come back and mock this, but mockery isn't liking it
    Cache::set('spotify-user', [
        'name' => 'Test User',
        'avatar' => 'USER-AVATAR-URL',
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
