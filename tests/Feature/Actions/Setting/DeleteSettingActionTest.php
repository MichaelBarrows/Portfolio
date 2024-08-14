<?php

use App\Actions\Setting\DeleteSettingAction;
use App\Models\Setting;
use App\Repositories\SettingRepository;

beforeEach(function () {
    $this->action = new DeleteSettingAction(
        new SettingRepository,
    );
});

it('deletes the model', function () {
    $setting = Setting::factory()->create();

    $result = $this->action->execute($setting);

    expect($result)->toBe(true);
    expect(Setting::count())->toBe(0);
});
