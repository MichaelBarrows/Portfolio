<?php

namespace App\Actions\Setting;

use App\Models\Setting;

class DeleteSettingAction
{
    public function execute(Setting $setting): bool
    {
        return $setting->delete();
    }
}
