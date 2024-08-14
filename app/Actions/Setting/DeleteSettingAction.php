<?php

namespace App\Actions\Setting;

use App\Models\Setting;
use App\Repositories\SettingRepository;

class DeleteSettingAction
{
    public function __construct(
        private SettingRepository $settingRepository,
    ) {
    }

    public function execute(Setting $setting): bool
    {
        $result = $this->settingRepository->deleteSetting($setting);

        return $result;
    }
}
