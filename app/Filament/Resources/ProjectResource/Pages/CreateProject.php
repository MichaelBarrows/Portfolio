<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Actions\Project\CreateProjectAction;
use App\Filament\Resources\ProjectResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateProject extends CreateRecord
{
    protected static string $resource = ProjectResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        return app(CreateProjectAction::class)->execute($data);
    }
}
