<?php

namespace App\Events\Education;

use App\Traits\Event\GeneratesModelEventPayload;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EducationCreated implements ShouldBroadcastNow
{
    use Dispatchable;
    use GeneratesModelEventPayload;
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
        return $this->getPayload(
            id: $this->educationId,
            data: $this->data,
            filterableKeys: [
                'properties',
                'description',
            ],
            type: 'education',
        );
    }
}
