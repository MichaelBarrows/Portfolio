<?php

namespace App\Filament\Resources\EmploymentResource\Pages;

use App\Actions\Employment\CreateEmploymentAction;
use App\Filament\Resources\EmploymentResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateEmployment extends CreateRecord
{
    protected static string $resource = EmploymentResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        return app(CreateEmploymentAction::class)->execute($data);
    }
}
