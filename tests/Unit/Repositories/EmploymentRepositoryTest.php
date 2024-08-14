<?php

use App\Models\Employment;
use App\Repositories\EmploymentRepository;

it('creates the model', function () {
    $args = Employment::factory()->definition();
    $repository = new EmploymentRepository;

    $result = $repository->createEmployment($args);

    expect($result)->toBeInstanceOf(Employment::class);
    foreach ($args as $key => $value) {
        expect($result)->{$key}->toBe($value);
    }
});

it('updates the model', function () {
    $args = Employment::factory()->definition();
    $model = Employment::factory()->create();
    $repository = new EmploymentRepository;

    $result = $repository->updateEmployment(
        model: $model,
        args: $args,
    );

    foreach ($args as $key => $value) {
        expect($result[0])->{$key}->toBe($value);
    }
});

it('returns the changes', function () {
    $data = [
        'title' => 'title name',
        'company' => 'new name',
    ];
    $model = Employment::factory()->create();
    $repository = new EmploymentRepository;

    $result = $repository->updateEmployment(
        model: $model,
        args: $data,
    );

    expect($result[1])
        ->toBe($data);
});

it('deletes the model', function () {
    $model = Employment::factory()->create();
    $repository = new EmploymentRepository;

    $result = $repository->deleteEmployment($model);

    expect($result)->toBe(true);
    expect(Employment::count())->toBe(0);
});
