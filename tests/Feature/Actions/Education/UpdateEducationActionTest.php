<?php

use App\Actions\Education\UpdateEducationAction;
use App\Events\Education\EducationUpdated;
use App\Models\Education;
use App\Repositories\EducationRepository;
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

    $this->action = new UpdateEducationAction(
        new EducationRepository
    );
});

it('updates the model', function () {
    $model = Education::factory()->create();

    $result = $this->action->execute(
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

    $this->action->execute(
        education: $model,
        args: $this->data);

    Event::assertDispatched(function (EducationUpdated $event) use ($model) {
        return $event->educationId === $model->getKey()
            && $event->data === $this->data;
    });
});
