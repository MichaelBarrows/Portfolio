<?php

use App\Actions\Education\DeleteEducationAction;
use App\Events\Education\EducationDeleted;
use App\Models\Education;
use App\Repositories\EducationRepository;
use Illuminate\Support\Facades\Event;

beforeEach(function () {
    Event::fake();

    $this->action = new DeleteEducationAction(
        new EducationRepository
    );
});

it('deletes the model', function () {
    $education = Education::factory()->create();

    $result = $this->action->execute($education);

    expect($result)->toBe(true);
    expect(Education::count())->toBe(0);
});

it('dispatches the event', function () {
    $education = Education::factory()->create();

    $this->action->execute($education);

    Event::assertDispatched(function (EducationDeleted $event) use ($education) {
        $expectedBroadcastingData = [
            'type' => 'education',
            'id' => $education->getKey(),
        ];
        $expectedChannels = [
            'education',
        ];
        $actualChannels = collect($event->broadcastOn())
            ->map(fn ($channel) => $channel->name)
            ->toArray();

        return $event->broadcastWith() === $expectedBroadcastingData
            && $actualChannels ===  $expectedChannels;
    });
});
