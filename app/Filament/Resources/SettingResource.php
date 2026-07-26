<?php

namespace App\Filament\Resources;

use Filament\Schemas\Schema;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Resources\SettingResource\Pages\ListSettings;
use App\Filament\Resources\SettingResource\Pages\CreateSetting;
use App\Filament\Resources\SettingResource\Pages\EditSetting;
use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string | \UnitEnum | null $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 11;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('key'),
                TextInput::make('textValue')
                    ->label('Value')
                    ->hidden(fn ($get) => in_array($get('type'), ['bool', 'array', 'tags']))
                    ->formatStateUsing(fn ($get) => $get('value'))
                    ->reactive(),
                Toggle::make('boolValue')
                    ->label('Value')
                    ->hidden(fn ($get) => $get('type') != 'bool')
                    ->formatStateUsing(fn ($get) => $get('value', false))
                    ->inline(false)
                    ->reactive(),
                KeyValue::make('arrayValue')
                    ->label('Value')
                    ->hidden(fn ($get) => $get('type') != 'array')
                    ->formatStateUsing(fn ($get) => is_array($value = $get('value')) ? $value : []),
                TagsInput::make('tagValue')
                    ->label('Value')
                    ->hidden(fn ($get) => $get('type') != 'tags')
                    ->formatStateUsing(fn ($get) => $get('value') ?? []),
                Select::make('type')
                    ->options([
                        'string' => 'String',
                        'int' => 'Integer',
                        'bool' => 'Boolean',
                        'array' => 'Array',
                        'tags' => 'Tags',
                        'encrypted' => 'Encrypted String',
                    ])
                    ->reactive(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('key'),
                TextColumn::make('type')
                    ->badge(),
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
            'index' => ListSettings::route('/'),
            'create' => CreateSetting::route('/create'),
            'edit' => EditSetting::route('/{record}/edit'),
        ];
    }
}
