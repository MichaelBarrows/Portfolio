<?php

namespace App\Events\Education;

use App\Models\Education;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EducationUpdated implements ShouldBroadcastNow
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public function __construct(
        public Education $education,
    ) {
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('education.'.$this->education->getKey()),
            new Channel('education'),
        ];
    }

    public function broadcastWith(): array
    {
        return [
            'type' => 'education',
            'id' => $this->education->getKey(),
        ];
    }
}
