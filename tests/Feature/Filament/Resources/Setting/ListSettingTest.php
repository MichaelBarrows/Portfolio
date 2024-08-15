<?php

use App\Filament\Resources\SettingResource\Pages\ListSettings;
use App\Models\Setting;
use function Pest\Livewire\livewire;

it('can list settings', function () {
    $settings = Setting::factory()
        ->count(5)
        ->create();

    $assert = livewire(ListSettings::class)
        ->assertCanSeeTableRecords($settings);

    $settings->each(function ($setting) use ($assert) {
        $assert->assertSeeInOrder([$setting->key, $setting->type]);
    });
});
