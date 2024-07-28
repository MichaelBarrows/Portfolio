<?php

use App\Actions\Education\CreateEducationAction;
use App\Models\Education;

beforeEach(function () {
    $this->data = [
        'course_name' => $this->faker->name(),
        'institution_name' => $this->faker->name(),
        'grade' => $this->faker->word(),
        'start_date' => $this->faker->dateTimeBetween('-10 years', '-2 years')->format('F Y'),
        'end_date' => $this->faker->randomElement(['Present', $this->faker->dateTimeBetween('-10 years', '-2 years')->format('F Y')]),
    ];
});

it('returns the created model', function () {
    $result = (new CreateEducationAction)->execute($this->data);

    expect($result)->toBeInstanceOf(Education::class);
    expect($result)
        ->course_name->toBe($this->data['course_name'])
        ->institution_name->toBe($this->data['institution_name'])
        ->grade->toBe($this->data['grade'])
        ->start_date->toBe($this->data['start_date'])
        ->end_date->toBe($this->data['end_date']);
});

it('stores the data', function () {
    (new CreateEducationAction)->execute($this->data);

    $this->assertDatabaseHas(
        table: Education::class,
        data: $this->data,
    );
});
