<?php

use App\Actions\Employment\DeleteEmploymentAction;
use App\Events\Employment\EmploymentDeleted;
use App\Models\Employment;
use App\Repositories\EmploymentRepository;
use Illuminate\Support\Facades\Event;

beforeEach(function () {
    Event::fake();

    $this->action = new DeleteEmploymentAction(
        new EmploymentRepository
    );
});

it('deletes the model', function () {
    $employment = Employment::factory()->create();

    $result = $this->action->execute($employment);

    expect($result)->toBe(true);
    expect(Employment::count())->toBe(0);
});

it('dispatches the event', function () {
    $employment = Employment::factory()->create();

    $this->action->execute($employment);

    Event::assertDispatched(function (EmploymentDeleted $event) use ($employment) {
        $expectedBroadcastingData = [
            'type' => 'employment',
            'id' => $employment->getKey(),
        ];
        $expectedChannels = [
            'employment',
        ];
        $actualChannels = collect($event->broadcastOn())
            ->map(fn ($channel) => $channel->name)
            ->toArray();

        return $event->broadcastWith() === $expectedBroadcastingData
            && $actualChannels ===  $expectedChannels;
    });
});
