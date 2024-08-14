<?php

namespace App\Repositories;

use App\Models\Setting;

class SettingRepository
{
    public function createSetting(array $args = []): ?Setting
    {
        $record = new Setting;

        $record->fill($args);

        $record->save();

        return $record;
    }

    public function updateSetting(Setting $model, array $args = []): Setting
    {
        $model->fill($args);

        $model->save();

        return $model;
    }

    public function deleteSetting(Setting $model): bool
    {
        return $model->delete();
    }
}
