<?php

namespace App\Events\Employment;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EmploymentDeleted implements ShouldBroadcastNow
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public function __construct(
        public int $employmentId,
    ) {
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('employment'),
        ];
    }

    public function broadcastWith(): array
    {
        return [
            'type' => 'employment',
            'id' => $this->employmentId
        ];
    }
}
