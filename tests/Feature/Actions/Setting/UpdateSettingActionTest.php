<?php

use App\Actions\Setting\UpdateSettingAction;
use App\Events\Settings\SettingUpdated;
use App\Models\Setting;
use Illuminate\Support\Facades\Event;

beforeEach(fn () => Event::fake());

it('updates the model', function () {
    $model = Setting::factory()->create([
        'type' => 'bool',
        'value' => false,
    ]);

    $result = (new UpdateSettingAction)->execute(
        setting: $model,
        args: [
            'type' => 'string',
            'value' => $value = $this->faker()->word(),
        ]);

    expect($result)
        ->type->toBe('string')
        ->value->toBe($value);
});

it('dispatches the event', function () {
    $setting = Setting::factory()->create([
        'type' => 'bool',
        'value' => false,
    ]);

    (new UpdateSettingAction)->execute(
        setting: $setting,
        args: [
            'type' => 'bool',
            'value' => true,
        ]);

    Event::assertDispatched(SettingUpdated::class);
});
