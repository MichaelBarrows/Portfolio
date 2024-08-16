<?php

namespace App\Livewire;

use App\Actions\SpotifyContentRule\DeleteSpotifyContentRuleAction;
use App\Actions\SpotifyContentRule\UpdateSpotifyContentRuleAction;
use App\Http\Controllers\OAuth\SpotifyController;
use App\Models\SpotifyContentRule;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class SpotifyContentSettings extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->heading('Content Rules')
            ->query(SpotifyContentRule::query())
            ->columns([
                TextColumn::make('field')
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'uri' => 'Track ID',
                        'artists.uri' => 'Artist ID',
                        'album.uri' => 'Album ID',
                        'name' => 'Track Name',
                        'artists.name' => 'Artist Name',
                        'album.name' => 'Album Name',
                        'explicit' => 'Explicit',
                        default => $state
                    }),
                TextColumn::make('operand')
                    ->badge(),
                TextColumn::make('value'),
            ])
            ->actions([
                EditAction::make()
                    ->form([
                        Select::make('field')
                            ->options([
                                'uri' => 'Track ID',
                                'artists.uri' => 'Artist ID',
                                'album.uri' => 'Album ID',
                                'name' => 'Track name',
                                'artists.name' => 'Artist name',
                                'album.name' => 'Album name',
                                'explicit' => 'Explicit',
                            ]),
                        Select::make('operand')
                            ->options([
                                'equals' => 'equals',
                                'contains' => 'contains',
                            ]),
                        TextInput::make('value'),
                    ])
                    ->using(fn (Model $record, array $data) => app(UpdateSpotifyContentRuleAction::class)->execute(
                        spotifyContentRule: $record,
                        args: $data,
                    )),
                DeleteAction::make()
                    ->requiresConfirmation()
                    ->using(fn (Model $record) => app(DeleteSpotifyContentRuleAction::class)->execute($record)),
            ])
            ->bulkActions([
                //
            ]);
    }

    public function render()
    {
        return view('livewire.spotify-content-settings');
    }
}
