<?php

use App\Livewire\Landing;
use App\Models\Setting;

use function Pest\Livewire\livewire;

it('shows the currently playing widget when the setting value is true', function () {
    $setting = Setting::factory()
        ->create([
            'key' => 'show-currently-playing',
            'type' => 'bool',
            'value' => 'true',
        ]);

    livewire(Landing::class)
        ->assertSeeLivewire('currently-playing');
});

it('does not show the currently playing widget when the setting value is false', function () {
    $setting = Setting::factory()
        ->create([
            'key' => 'show-currently-playing',
            'type' => 'bool',
            'value' => 'false',
        ]);

    livewire(Landing::class)
        ->assertDontSeeLivewire('currently-playing');
});

it('shows the open to opportunities when the setting value is true', function () {
    $setting = Setting::factory()
        ->create([
            'key' => 'open-to-opportunities',
            'type' => 'bool',
            'value' => 'true',
        ]);

    livewire(Landing::class)
        ->assertSee('Yes, get in touch');
});

it('does not show the copen to opportunities when the setting value is false', function () {
    $setting = Setting::factory()
        ->create([
            'key' => 'open-to-opportunities',
            'type' => 'bool',
            'value' => 'false',
        ]);

    livewire(Landing::class)
        ->assertSee('Not at the moment');
});

it('shows the currently working at appropriately when an image is provided', function () {
    $setting = Setting::factory()
        ->create([
            'key' => 'currently-working-at',
            'type' => 'array',
            'value' => json_encode([
                'text' => 'Test Company',
                'primary-color' => '#000000',
                'secondary-color' => '#FFFFFF',
                'url' => 'https://test.company',
                'image' => 'TEST_COMPANY_IMAGE',
            ]),
        ]);

    livewire(Landing::class)
        ->assertSeeHtmlInOrder([
            'https://test.company',
            'TEST_COMPANY_IMAGE',
            'color: #000000',
        ])
        ->assertDontSeeHtml('fas fa-building');
});

it('shows the currently working at appropriately when an image is not provided', function () {
    $setting = Setting::factory()
        ->create([
            'key' => 'currently-working-at',
            'type' => 'array',
            'value' => json_encode([
                'text' => 'Test Company',
                'primary-color' => '#000000',
                'secondary-color' => '#FFFFFF',
                'url' => 'https://test.company',
            ]),
        ]);

    livewire(Landing::class)
        ->assertSeeHtmlInOrder([
            'https://test.company',
            'fas',
            'fa-building',
            'background-color: #000000',
            'color: #FFFFFF',
        ]);
});
