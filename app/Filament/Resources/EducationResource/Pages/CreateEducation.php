<?php

namespace App\Filament\Resources\EducationResource\Pages;

use App\Actions\Education\CreateEducationAction;
use App\Filament\Resources\EducationResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateEducation extends CreateRecord
{
    protected static string $resource = EducationResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        return app(CreateEducationAction::class)->execute($data);
    }
}
