<?php

use App\Actions\Employment\UpdateEmploymentAction;
use App\Events\Employment\EmploymentUpdated;
use App\Models\Employment;
use App\Repositories\EmploymentRepository;
use Illuminate\Support\Facades\Event;

beforeEach(function () {
    Event::fake();

    $this->data = [
        'title' => $this->faker->name(),
        'company' => $this->faker->name(),
        'start_date' => $this->faker->dateTimeBetween('-10 years', '-2 years')->format('F Y'),
        'end_date' => $this->faker->randomElement(['Present', $this->faker->dateTimeBetween('-10 years', '-2 years')->format('F Y')]),
    ];

    $this->action = new UpdateEmploymentAction(new EmploymentRepository);
});

it('updates the model', function () {
    $model = Employment::factory()->create();

    $result = $this->action->execute(
        employment: $model,
        args: $this->data,
    );

    expect($result)
        ->title->toBe($this->data['title'])
        ->company->toBe($this->data['company'])
        ->start_date->toBe($this->data['start_date'])
        ->end_date->toBe($this->data['end_date']);
});

it('dispatches the event', function () {
    $model = Employment::factory()->create();

    $this->action->execute(
        employment: $model,
        args: $this->data);

    Event::assertDispatched(function (EmploymentUpdated $event) use ($model) {
        $expectedBroadcastingData = [
            'type' => 'employment',
            'id' => $model->getKey(),
            ...$this->data,
        ];
        $expectedChannels = [
            "employment.{$model->getKey()}",
            'employment',
        ];
        $actualChannels = collect($event->broadcastOn())
            ->map(fn ($channel) => $channel->name)
            ->toArray();

        return $event->broadcastWith() === $expectedBroadcastingData
            && $actualChannels ===  $expectedChannels;
    });
});
