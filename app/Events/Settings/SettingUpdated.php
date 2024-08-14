<?php

namespace App\Events\Settings;

use App\Models\Setting;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SettingUpdated implements ShouldBroadcastNow
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public function __construct(
        public string $key,
        public mixed $value,
    ) {
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('settings'),
        ];
    }

    public function broadcastWith(): array
    {
        return [
            'key' => $this->key,
            'value' => $this->value,
        ];
    }
}
