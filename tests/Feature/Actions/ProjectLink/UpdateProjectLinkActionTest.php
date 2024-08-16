<?php

use App\Actions\ProjectLink\UpdateProjectLinkAction;
use App\Events\Project\ProjectUpdated;
use App\Models\Project;
use App\Models\ProjectLink;
use App\Repositories\ProjectLinkRepository;
use Illuminate\Support\Facades\Event;

beforeEach(function () {
    Event::fake();

    $this->data = ProjectLink::factory()->definition();

    $this->project = Project::factory()->create();

    $this->action = new UpdateProjectLinkAction(
        new ProjectLinkRepository
    );
});

it('updates the model', function () {
    $model = ProjectLink::factory()
        ->for($this->project)
        ->create();

    $result = $this->action->execute(
        link: $model,
        args: $this->data,
    );

    expect($result)
        ->name->toBe($this->data['name'])
        ->text->toBe($this->data['text'])
        ->icon->toBe($this->data['icon'])
        ->link->toBe($this->data['link']);
});

it('dispatches the event', function () {
    $model = ProjectLink::factory()
        ->for($this->project)
        ->create();

    $this->action->execute(
        link: $model,
        args: $this->data,
    );

    Event::assertDispatched(function (ProjectUpdated $event) {
        return $event->projectId === $this->project->getKey()
            && $event->data === ['project_link' => 'updated'];
    });});
