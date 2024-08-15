<?php

namespace App\Filament\Resources;

use App\Enums\TechStack;
use App\Filament\Resources\EmploymentResource\Pages;
use App\Models\Employment;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EmploymentResource extends Resource
{
    protected static ?string $model = Employment::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationLabel = 'Employment';

    protected static ?string $navigationGroup = 'Data';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required(),
                TextInput::make('company')->required(),
                TextInput::make('start_date')->required(),
                TextInput::make('end_date')->required(),
                Select::make('tech_stack')
                    ->multiple()
                    ->options(function () {
                        $options = [];
                        collect(TechStack::cases())->map(function (TechStack $techStack) use (&$options) {
                            $options[$techStack->value] = $techStack->getName();
                        });
                        return $options;
                    })
                    ->required(),
                KeyValue::make('properties'),
                RichEditor::make('description')
                    ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('company'),
                TextColumn::make('title'),
                TextColumn::make('tech_stack')
                    ->badge()
                    ->separator(',')
                    ->formatStateUsing(fn (TechStack $state): string => $state->getName()),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListEmployments::route('/'),
            'create' => Pages\CreateEmployment::route('/create'),
            'edit' => Pages\EditEmployment::route('/{record}/edit'),
        ];
    }
}
