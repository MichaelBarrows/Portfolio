<?php

use App\Actions\Education\UpdateEducationAction;
use App\Events\Education\EducationUpdated;
use App\Models\Education;
use Illuminate\Support\Facades\Event;

beforeEach(function () {
    Event::fake();

    $this->data = [
        'course_name' => 'A Course',
        'institution_name' => 'An Institution',
        'grade' => 'A Grade',
        'start_date' => 'June 2023',
        'end_date' => 'June 2024',
    ];
});

it('updates the model', function () {
    $model = Education::factory()->create();

    $result = (new UpdateEducationAction)->execute(
        education: $model,
        args: $this->data,
    );

    expect($result)
        ->course_name->toBe($this->data['course_name'])
        ->institution_name->toBe($this->data['institution_name'])
        ->grade->toBe($this->data['grade'])
        ->start_date->toBe($this->data['start_date'])
        ->end_date->toBe($this->data['end_date']);
});

it('dispatches the event', function () {
    $model = Education::factory()->create();

    (new UpdateEducationAction)->execute(
        education: $model,
        args: $this->data);

    Event::assertDispatched(function (EducationUpdated $event) use ($model) {
        $expectedBroadcastingData = [
            'type' => 'education',
            'id' => $model->getKey(),
        ];
        $expectedChannels = [
            "education.{$model->getKey()}",
            'education',
        ];
        $actualChannels = collect($event->broadcastOn())
            ->map(fn ($channel) => $channel->name)
            ->toArray();

        return $event->broadcastWith() === $expectedBroadcastingData
            && $actualChannels ===  $expectedChannels;
    });
});
