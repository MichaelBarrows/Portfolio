<?php

namespace App\Events\Project;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProjectDeleted implements ShouldBroadcastNow
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public function __construct(
        public int $projectId,
    ) {
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('projects'),
        ];
    }

    public function broadcastWith(): array
    {
        return [
            'type' => 'project',
            'id' => $this->projectId
        ];
    }
}
