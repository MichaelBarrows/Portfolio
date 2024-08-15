<?php

use App\Actions\ProjectLink\CreateProjectLinkAction;
use App\Events\Project\ProjectUpdated;
use App\Models\Project;
use App\Models\ProjectLink;
use App\Repositories\ProjectLinkRepository;
use Illuminate\Support\Facades\Event;

beforeEach(function () {
    Event::fake();

    $this->data = ProjectLink::factory()->definition();

    $this->project = Project::factory()->create();

    $this->action = new CreateProjectLinkAction(
        new ProjectLinkRepository
    );
});

it('returns the created model', function () {
    $result = $this->action->execute(
        project: $this->project,
        args: $this->data,
    );

    expect($result)->toBeInstanceOf(ProjectLink::class);
    expect($result)
        ->name->toBe($this->data['name'])
        ->text->toBe($this->data['text'])
        ->icon->toBe($this->data['icon'])
        ->link->toBe($this->data['link'])
        ->project_id->toBe($this->project->getKey());
});

it('dispatches the event', function () {
    $result = $this->action->execute(
        project: $this->project,
        args: $this->data,
    );

    Event::assertDispatched(function (ProjectUpdated $event) {
        $expectedBroadcastingData = [
            'id' => $this->project->getKey(),
            'project_link' => 'created',
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

it('stores the data', function () {
    $this->action->execute(
        project: $this->project,
        args: $this->data,
    );

    $this->data['icon'] = json_encode($this->data['icon']);
    $this->assertDatabaseHas(
        table: ProjectLink::class,
        data: $this->data,
    );
});
