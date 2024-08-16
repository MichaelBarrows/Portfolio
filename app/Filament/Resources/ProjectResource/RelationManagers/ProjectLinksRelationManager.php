<?php

namespace App\Filament\Resources\ProjectResource\RelationManagers;

use App\Actions\ProjectLink\CreateProjectLinkAction;
use App\Actions\ProjectLink\DeleteProjectLinkAction;
use App\Actions\ProjectLink\UpdateProjectLinkAction;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class ProjectLinksRelationManager extends RelationManager
{
    protected static string $relationship = 'projectLinks';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('text'),
                TagsInput::make('icon'),
                TextInput::make('link'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('link'),

            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->using(function (array $data): Model {
                        return app(CreateProjectLinkAction::class)->execute(
                            project: $this->getOwnerRecord(),
                            args: $data,
                        );
                    })
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->using(function (array $data, Model $record): Model {
                        return app(UpdateProjectLinkAction::class)->execute(
                            link: $record,
                            args: $data,
                        );
                    }),
                Tables\Actions\DeleteAction::make()
                    ->using(function (Model $record): bool {
                        return app(DeleteProjectLinkAction::class)->execute(
                            link: $record,
                        );
                    }),
            ]);
    }
}
