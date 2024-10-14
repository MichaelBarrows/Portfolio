<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Actions\Project\DeleteProjectAction;
use App\Actions\Project\UpdateProjectAction;
use App\Filament\Resources\ProjectResource;
use App\Traits\Filament\TextTransformer;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditProject extends EditRecord
{
    use TextTransformer;

    protected static string $resource = ProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->using(fn (Model $record) => app(DeleteProjectAction::class)->execute($record)),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $data['description'] = $this->openLinksInNewTabs($data['description']);

        return app(UpdateProjectAction::class)->execute(
            project: $record,
            args: $data,
        );
    }
}
