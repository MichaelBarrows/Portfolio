<?php

namespace App\Events\Education;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EducationCreated implements ShouldBroadcastNow
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public function __construct(
        public int $educationId,
        public array $data,
    ) {
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('education.'.$this->educationId),
            new Channel('education'),
        ];
    }

    public function broadcastWith(): array
    {
        if (! empty($this->dirtyData['description'])) {
            $this->data['description'] = null;
        }

        return [
            'type' => 'education',
            'id' => $this->educationId,
            ...$this->data,
        ];
    }
}
