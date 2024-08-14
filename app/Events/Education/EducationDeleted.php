<?php

namespace App\Events\Education;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EducationDeleted implements ShouldBroadcastNow
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public function __construct(
        public int $educationId,
    ) {
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('education'),
        ];
    }

    public function broadcastWith(): array
    {
        return [
            'type' => 'education',
            'id' => $this->educationId
        ];
    }
}
