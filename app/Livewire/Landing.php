<?php

namespace App\Livewire;

use App\Actions\Setting\GetSettingWithDefaultAction;
use App\Models\Setting;
use Livewire\Attributes\On;
use Livewire\Component;

class Landing extends Component
{
    public array $settings = [];

    public function mount()
    {
        $this->settings = app(GetSettingWithDefaultAction::class)
            ->execute(['open-to-opportunities', 'show-currently-playing', 'currently-working-at'])
            ->map(fn (Setting $setting) => $setting->value)
            ->toArray();
    }

    #[On('echo:settings,Settings\\SettingUpdated')]
    public function updateSetting($event)
    {
        if (array_key_exists($event['key'], $this->settings)) {
            $this->settings[$event['key']] = $event['value'];
        }
    }

    public function render()
    {
        return view('livewire.landing');
    }
}
