<?php

namespace App\Filament\Resources\EducationResource\Pages;

use App\Actions\Education\DeleteEducationAction;
use App\Actions\Education\UpdateEducationAction;
use App\Filament\Resources\EducationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditEducation extends EditRecord
{
    protected static string $resource = EducationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->using(fn (Model $record) => app(DeleteEducationAction::class)->execute($record)),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        return app(UpdateEducationAction::class)->execute(
            education: $record,
            args: $data,
        );
    }
}
