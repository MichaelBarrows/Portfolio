<?php

namespace App\Filament\Resources\EmploymentResource\Pages;

use Filament\Actions\CreateAction;
use App\Filament\Resources\EmploymentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmployments extends ListRecords
{
    protected static string $resource = EmploymentResource::class;

    protected static ?string $title = 'Employment';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
