<?php

use App\Actions\Setting\DeleteSettingAction;
use App\Models\Setting;

it('deletes the model', function () {
    $setting = Setting::factory()->create();

    $result = (new DeleteSettingAction)->execute($setting);

    expect($result)->toBe(true);
    expect(Setting::count())->toBe(0);
});
