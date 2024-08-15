<?php

use App\Actions\ProjectLink\DeleteProjectLinkAction;
use App\Events\Project\ProjectUpdated;
use App\Models\Project;
use App\Models\ProjectLink;
use App\Repositories\ProjectLinkRepository;
use Illuminate\Support\Facades\Event;

beforeEach(function () {
    Event::fake();

    $this->project = Project::factory()->create();

    $this->action = new DeleteProjectLinkAction(
        new ProjectLinkRepository
    );
});

it('deletes the model', function () {
    $link = ProjectLink::factory()
        ->for($this->project)
        ->create();

    $result = $this->action->execute($link);

    expect($result)->toBe(true);
    expect(ProjectLink::count())->toBe(0);
});

it('dispatches the event', function () {
    $link = ProjectLink::factory()
        ->for($this->project)
        ->create();

    $this->action->execute($link);

    Event::assertDispatched(function (ProjectUpdated $event) {
        $expectedBroadcastingData = [
            'id' => $this->project->getKey(),
            'project_link' => 'deleted'
        ];
        $expectedChannels = [
            "projects.{$this->project->getKey()}",
            'projects',
        ];
        $actualChannels = collect($event->broadcastOn())
            ->map(fn ($channel) => $channel->name)
            ->toArray();

        return $event->broadcastWith() === $expectedBroadcastingData
            && $actualChannels ===  $expectedChannels;
    });
});
