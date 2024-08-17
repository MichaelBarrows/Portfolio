<?php

use App\Actions\Setting\UpdateSettingAction;
use App\Events\Settings\SettingUpdated;
use App\Models\Setting;
use App\Repositories\SettingRepository;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Event;

beforeEach(function () {
    Event::fake();

    $this->action = new UpdateSettingAction(
        new SettingRepository,
    );
});

it('updates the model', function () {
    $model = Setting::factory()->create([
        'type' => 'bool',
        'value' => false,
    ]);

    $result = $this->action->execute(
        setting: $model,
        args: [
            'type' => 'string',
            'value' => $value = $this->faker()->word(),
        ]);

    expect($result)
        ->type->toBe('string')
        ->value->toBe($value);
});

it('dispatches the event when the key is in the config', function () {
    $setting = Setting::factory()->create([
        'type' => 'bool',
        'value' => false,
    ]);

    Config::set('settings.broadcastable', [$setting->key]);

    $this->action->execute(
        setting: $setting,
        args: [
            'type' => 'bool',
            'value' => true,
        ]);

    Event::assertDispatched(SettingUpdated::class);
});

it('does not dispatch the event when the key is not in the config', function () {
    $setting = Setting::factory()->create([
        'type' => 'bool',
        'value' => false,
    ]);

    Config::set('broadcasting.settings-to-broadcast', []);

    $this->action->execute(
        setting: $setting,
        args: [
            'type' => 'bool',
            'value' => true,
        ]);

    Event::assertNotDispatched(SettingUpdated::class);
});
