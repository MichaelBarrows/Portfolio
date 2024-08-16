<?php

namespace App\Events\Employment;

use App\Traits\Event\GeneratesModelEventPayload;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EmploymentUpdated implements ShouldBroadcastNow
{
    use Dispatchable;
    use GeneratesModelEventPayload;
    use InteractsWithSockets;
    use SerializesModels;

    public function __construct(
        public int $employmentId,
        public array $data,
    ) {
    }

    public function broadcastOn(): array
    {
        return [
            new Channel('employment.'.$this->employmentId),
            new Channel('employment'),
        ];
    }

    public function broadcastWith(): array
    {
        return $this->getPayload(
            id: $this->employmentId,
            data: $this->data,
            filterableKeys: [
                'properties',
                'description',
            ],
            type: 'employment',
        );
    }
}
