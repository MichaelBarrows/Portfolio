<?php

namespace App\Events\Employment;

use App\Models\Employment;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EmploymentUpdated implements ShouldBroadcastNow
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public function __construct(
        public Employment $employment,
    ) {
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('employment.'.$this->employment->getKey()),
            new Channel('employment'),
        ];
    }

    public function broadcastWith(): array
    {
        return [
            'type' => 'employment',
            'id' => $this->employment->getKey(),
        ];
    }
}
