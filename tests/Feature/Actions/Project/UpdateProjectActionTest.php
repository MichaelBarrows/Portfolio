<?php

use App\Actions\Project\UpdateProjectAction;
use App\Events\Project\ProjectUpdated;
use App\Models\Project;
use App\Repositories\ProjectRepository;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Str;

beforeEach(function () {
    Event::fake();

    $this->data = [
        'name' => $this->faker->name(),
        'pretty_url' => Str::slug($this->faker->words(3, true)),
        'visible' => true,
    ];

    $this->action = (new UpdateProjectAction(new ProjectRepository));
});

it('updates the model', function () {
    $model = Project::factory()->create();

    $result = $this->action->execute(
        project: $model,
        args: $this->data,
    );

    expect($result)
        ->name->toBe($this->data['name'])
        ->pretty_url->toBe($this->data['pretty_url'])
        ->visible->toBe($this->data['visible']);
});

it('dispatches the event', function () {
    $model = Project::factory()->create(['visible' => false]);

    $this->action->execute(
        project: $model,
        args: $this->data,
    );

    Event::assertDispatched(function (ProjectUpdated $event) use ($model) {
        $expectedBroadcastingData = [
            'id' => $model->getKey(),
            ...$this->data,
        ];

        $expectedChannels = [
            "projects.{$model->getKey()}",
            'projects',
        ];
        $actualChannels = collect($event->broadcastOn())
            ->map(fn ($channel) => $channel->name)
            ->toArray();

        return $event->broadcastWith() === $expectedBroadcastingData
            && $actualChannels ===  $expectedChannels;
    });
});
