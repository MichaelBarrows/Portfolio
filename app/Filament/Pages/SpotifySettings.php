<?php

namespace App\Filament\Pages;

use App\Actions\SpotifyContentRule\CreateSpotifyContentRuleAction;
use App\Livewire\SpotifyContentSettings;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Cache;

class SpotifySettings extends Page
{
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-musical-note';

    protected string $view = 'filament.pages.spotify-settings';

    protected static string | \UnitEnum | null $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 12;

    public ?string $userName = null;

    public ?string $userAvatar = null;

    public function mount()
    {
        $data = Cache::get('spotify-user');

        if (! empty($data)) {
            $this->userName = $data['name'];
            $this->userAvatar = $data['avatar'];
        }
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('newContentRule')
                ->schema([
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
                            'bool' => 'boolean',
                            'contains' => 'contains',
                        ]),
                    TextInput::make('value'),
                ])
                ->action(function ($data) {
                    $result = app(CreateSpotifyContentRuleAction::class)->execute($data);
                    $this->dispatch('ruleAdded')->to(SpotifyContentSettings::class);
                }),

            Action::make('pauseUpdates')
                ->icon('heroicon-s-pause-circle')
                ->hidden(fn () => Cache::get('freeze-currently-playing', false))
                ->action(fn () => Cache::rememberForever('freeze-currently-playing', fn () => true)),

            Action::make('resumeUpdates')
                ->icon('heroicon-s-play-circle')
                ->hidden(fn () => ! Cache::get('freeze-currently-playing', false))
                ->action(fn () => Cache::forget('freeze-currently-playing')),
        ];
    }
}
