<?php

namespace App\Filament\Resources\EducationResource\Pages;

use App\Actions\Education\DeleteEducationAction;
use App\Actions\Education\UpdateEducationAction;
use App\Filament\Resources\EducationResource;
use App\Traits\Filament\TextTransformer;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditEducation extends EditRecord
{
    use TextTransformer;

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
        $data['description'] = $this->openLinksInNewTabs($data['description']);

        return app(UpdateEducationAction::class)->execute(
            education: $record,
            args: $data,
        );
    }
}
