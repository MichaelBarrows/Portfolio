<?php

namespace App\Actions\Setting;

use App\Models\Setting;
use App\Repositories\SettingRepository;

class CreateSettingAction
{
    public function __construct(
        private SettingRepository $settingRepository,
    ) {
    }

    public function execute(array $args): Setting
    {
        $setting = $this->settingRepository->createSetting($args);

        return $setting;
    }
}
