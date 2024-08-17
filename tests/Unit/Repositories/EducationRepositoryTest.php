<?php

use App\Models\Education;
use App\Repositories\EducationRepository;

test('createEducation creates the model', function () {
    $args = Education::factory()->definition();
    $repository = new EducationRepository;

    $result = $repository->createEducation($args);

    expect($result)->toBeInstanceOf(Education::class);
    foreach ($args as $key => $value) {
        expect($result)->{$key}->toBe($value);
    }
});

test('updateEducation updates the model', function () {
    $args = Education::factory()->definition();
    $model = Education::factory()->create();
    $repository = new EducationRepository;

    $result = $repository->updateEducation(
        model: $model,
        args: $args,
    );

    foreach ($args as $key => $value) {
        expect($result[0])->{$key}->toBe($value);
    }
});

test('updateEducation returns the changes', function () {
    $data = [
        'course_name' => 'course name',
        'institution_name' => 'new name',
    ];
    $model = Education::factory()->create();
    $repository = new EducationRepository;

    $result = $repository->updateEducation(
        model: $model,
        args: $data,
    );

    expect($result[1])
        ->toBe($data);
});

test('deleteEducation deletes the model', function () {
    $model = Education::factory()->create();
    $repository = new EducationRepository;

    $result = $repository->deleteEducation($model);

    expect($result)->toBe(true);
    expect(Education::count())->toBe(0);
});
