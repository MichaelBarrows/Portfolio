<?php

use App\Actions\Education\CreateEducationAction;
use App\Events\Education\EducationCreated;
use App\Models\Education;
use App\Repositories\EducationRepository;
use Illuminate\Support\Facades\Event;

beforeEach(function () {
    Event::fake();

    $this->data = [
        'course_name' => $this->faker->name(),
        'institution_name' => $this->faker->name(),
        'grade' => $this->faker->word(),
        'start_date' => $this->faker->dateTimeBetween('-10 years', '-2 years')->format('F Y'),
        'end_date' => $this->faker->randomElement(['Present', $this->faker->dateTimeBetween('-10 years', '-2 years')->format('F Y')]),
    ];

    $this->action = new CreateEducationAction(
        new EducationRepository
    );
});

it('returns the created model', function () {
    $result = $this->action->execute($this->data);

    expect($result)->toBeInstanceOf(Education::class);
    expect($result)
        ->course_name->toBe($this->data['course_name'])
        ->institution_name->toBe($this->data['institution_name'])
        ->grade->toBe($this->data['grade'])
        ->start_date->toBe($this->data['start_date'])
        ->end_date->toBe($this->data['end_date']);
});

it('dispatches the event', function () {
    $result = $this->action->execute($this->data);

    Event::assertDispatched(function (EducationCreated $event) use ($result) {
        $expectedBroadcastingData = [
            'type' => 'education',
            'id' => $result->getKey(),
            ...$this->data,
        ];
        $expectedChannels = [
            "education.{$result->getKey()}",
            'education',
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
        table: Education::class,
        data: $this->data,
    );
});
