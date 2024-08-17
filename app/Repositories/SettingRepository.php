<?php

namespace App\Repositories;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Builder;

class SettingRepository
{
    public function getQueryBuilder(): Builder
    {
        return Setting::query();
    }

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
