<?php

namespace App\Events\Project;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProjectCreated implements ShouldBroadcastNow
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;


    public function __construct(
        public int $projectId,
        public array $data,
    ) {
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('projects.'.$this->projectId),
            new Channel('projects'),
        ];
    }

    public function broadcastWith(): array
    {
        if (! empty($this->data['description'])) {
            $this->data['description'] = null;
        }

        return [
            'id' => $this->projectId,
            ...$this->data,
        ];
    }
}
