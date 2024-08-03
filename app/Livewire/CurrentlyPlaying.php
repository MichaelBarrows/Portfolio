<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\On;
use Livewire\Component;

class CurrentlyPlaying extends Component
{
    public ?array $track;

    public function mount()
    {
        $this->track = $this->getData();
    }

    #[On('echo:currently-playing,CurrentlyPlaying\\TrackChanged')]
    public function updateTrack()
    {
        $this->track = $this->getData();
    }

    private function getData(): array
    {
        return Cache::get(
            key: 'spotify.currently-playing',
            default: [
                'track' => '',
                'album_image' => '',
                'artist' => '',
                'album' => '',
            ],
        );
    }

    public function render()
    {
        return view('livewire.currently-playing');
    }
}
