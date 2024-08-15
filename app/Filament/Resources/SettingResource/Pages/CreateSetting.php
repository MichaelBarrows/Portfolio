<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Actions\Setting\CreateSettingAction;
use App\Filament\Resources\SettingResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateSetting extends CreateRecord
{
    protected static string $resource = SettingResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        if ($data['type'] === 'bool') {
            $data['value'] = $data['boolValue'];
        } else if ($data['type'] === 'array') {
            $data['value'] = $data['arrayValue'];
        } else if ($data['type'] === 'tags') {
            $data['value'] = $data['tagValue'];
        } else {
            $data['value'] = $data['textValue'];
        }

        return app(CreateSettingAction::class)->execute($data);
    }
}
