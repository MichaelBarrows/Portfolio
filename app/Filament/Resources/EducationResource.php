<?php

namespace App\Filament\Resources;

use Filament\Schemas\Schema;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Resources\EducationResource\Pages\ListEducation;
use App\Filament\Resources\EducationResource\Pages\CreateEducation;
use App\Filament\Resources\EducationResource\Pages\EditEducation;
use App\Enums\TechStack;
use App\Filament\Resources\EducationResource\Pages;
use App\Models\Education;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EducationResource extends Resource
{
    protected static ?string $model = Education::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-academic-cap';

    protected static string | \UnitEnum | null $navigationGroup = 'Data';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('institution_name')->required(),
                TextInput::make('course_name')->required(),
                TextInput::make('grade')->required(),
                TextInput::make('start_date')->required(),
                TextInput::make('end_date')->required(),
                TextInput::make('project_title'),
                Select::make('tech_stack')
                    ->multiple()
                    ->options(function () {
                        $options = [];
                        collect(TechStack::cases())->map(function (TechStack $techStack) use (&$options) {
                            $options[$techStack->value] = $techStack->getName();
                        });
                        return $options;
                    }),
                KeyValue::make('properties'),
                RichEditor::make('description')
                    ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('institution_name'),
                TextColumn::make('course_name'),
                TextColumn::make('tech_stack')
                    ->badge()
                    ->separator(',')
                    ->formatStateUsing(fn (TechStack $state): string => $state->getName()),

            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEducation::route('/'),
            'create' => CreateEducation::route('/create'),
            'edit' => EditEducation::route('/{record}/edit'),
        ];
    }
}
