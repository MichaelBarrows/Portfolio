<?php

use App\Actions\Project\DeleteProjectAction;
use App\Events\Project\ProjectDeleted;
use App\Models\Project;
use App\Repositories\ProjectRepository;
use Illuminate\Support\Facades\Event;

beforeEach(function () {
    Event::fake();

    $this->action = new DeleteProjectAction(
        new ProjectRepository
    );
});

it('deletes the model', function () {
    $project = Project::factory()->create();

    $result = $this->action->execute($project);

    expect($result)->toBe(true);
    expect(Project::count())->toBe(0);
});

it('dispatches the event', function () {
    $project = Project::factory()->create();

    $this->action->execute($project);

    Event::assertDispatched(function (ProjectDeleted $event) use ($project) {
        $expectedBroadcastingData = [
            'type' => 'project',
            'id' => $project->getKey(),
        ];
        $expectedChannels = [
            'projects',
        ];
        $actualChannels = collect($event->broadcastOn())
            ->map(fn ($channel) => $channel->name)
            ->toArray();

        return $event->broadcastWith() === $expectedBroadcastingData
            && $actualChannels ===  $expectedChannels;
    });
});
