<?php

use App\Actions\Employment\CreateEmploymentAction;
use App\Models\Employment;

beforeEach(function () {
    $this->data = [
        'title' => $this->faker->name(),
        'company' => $this->faker->name(),
        'start_date' => $this->faker->dateTimeBetween('-10 years', '-2 years')->format('F Y'),
        'end_date' => $this->faker->randomElement(['Present', $this->faker->dateTimeBetween('-10 years', '-2 years')->format('F Y')]),
    ];
});

it('returns the created model', function () {
    $result = (new CreateEmploymentAction)->execute($this->data);

    expect($result)->toBeInstanceOf(Employment::class);
    expect($result)
        ->title->toBe($this->data['title'])
        ->company->toBe($this->data['company'])
        ->start_date->toBe($this->data['start_date'])
        ->end_date->toBe($this->data['end_date']);
});

it('stores the data', function () {
    (new CreateEmploymentAction)->execute($this->data);

    $this->assertDatabaseHas(
        table: Employment::class,
        data: $this->data,
    );
});
