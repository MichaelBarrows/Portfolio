<?php

namespace App\Events\Project;

use App\Models\Project;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProjectUpdated implements ShouldBroadcastNow
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public Project $project;

    public function __construct(Project $project) {
        $this->project = $project;
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('projects.'.$this->project->getKey()),
            new Channel('projects'),
        ];
    }

    public function broadcastWith(): array
    {
        return [
            'type' => 'project',
            'id' => $this->project->getKey(),
        ];
    }
}
