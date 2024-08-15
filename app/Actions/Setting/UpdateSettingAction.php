<?php

namespace App\Actions\Setting;

use App\Events\Settings\SettingUpdated;
use App\Models\Setting;
use App\Repositories\SettingRepository;

class UpdateSettingAction
{
    public function __construct(
        private SettingRepository $settingRepository,
    ) {
    }

    public function execute(Setting $setting, array $args): Setting
    {
        $result = $this->settingRepository->updateSetting(
            model: $setting,
            args: $args,
        );

        if (in_array($setting->key, config('broadcasting.settings-to-broadcast'))) {
            SettingUpdated::dispatch($result->key, $result->value);
        }

        return $result;
    }
}
