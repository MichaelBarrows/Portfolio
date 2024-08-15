<?php

namespace App\Filament\Resources\EmploymentResource\Pages;

use App\Actions\Employment\DeleteEmploymentAction;
use App\Actions\Employment\UpdateEmploymentAction;
use App\Filament\Resources\EmploymentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditEmployment extends EditRecord
{
    protected static string $resource = EmploymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->using(fn (Model $record) => app(DeleteEmploymentAction::class)->execute($record)),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        return app(UpdateEmploymentAction::class)->execute(
            employment: $record,
            args: $data,
        );
    }
}
