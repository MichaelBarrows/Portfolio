<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Actions\Setting\DeleteSettingAction;
use App\Actions\Setting\UpdateSettingAction;
use App\Filament\Resources\SettingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditSetting extends EditRecord
{
    protected static string $resource = SettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->using(fn (Model $record) => app(DeleteSettingAction::class)->execute($record)),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        if ($data['type'] == 'bool') {
            $data['value'] = $data['boolValue'];
        } else if ($data['type'] == 'array') {
            $data['value'] = $data['arrayValue'];
        } else if ($data['type'] === 'tags') {
            $data['value'] = $data['tagValue'];
        } else {
            $data['value'] = $data['textValue'];
        }

        return app(UpdateSettingAction::class)->execute(
            setting: $record,
            args: $data,
        );
    }
}
