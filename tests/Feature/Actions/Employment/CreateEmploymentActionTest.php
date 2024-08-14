<?php

use App\Actions\Employment\CreateEmploymentAction;
use App\Events\Employment\EmploymentCreated;
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

    $this->action = new CreateEmploymentAction(new EmploymentRepository);
});

it('returns the created model', function () {
    $result = $this->action->execute($this->data);

    expect($result)->toBeInstanceOf(Employment::class);
    expect($result)
        ->title->toBe($this->data['title'])
        ->company->toBe($this->data['company'])
        ->start_date->toBe($this->data['start_date'])
        ->end_date->toBe($this->data['end_date']);
});

it('dispatches the event', function () {
    $result = $this->action->execute($this->data);

    Event::assertDispatched(function (EmploymentCreated $event) use ($result) {
        $expectedBroadcastingData = [
            'type' => 'employment',
            'id' => $result->getKey(),
            ...$this->data,
        ];
        $expectedChannels = [
            "employment.{$result->getKey()}",
            'employment',
        ];
        $actualChannels = collect($event->broadcastOn())
            ->map(fn ($channel) => $channel->name)
            ->toArray();

        return $event->broadcastWith() === $expectedBroadcastingData
            && $actualChannels ===  $expectedChannels;
    });
});


it('stores the data', function () {
    $this->action->execute($this->data);

    $this->assertDatabaseHas(
        table: Employment::class,
        data: $this->data,
    );
});
