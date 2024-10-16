<?php

use App\Models\Project;
use App\Repositories\ProjectRepository;

test('createProject creates the model', function () {
    $args = Project::factory()->definition();
    $repository = new ProjectRepository;

    $result = $repository->createProject($args);

    expect($result)->toBeInstanceOf(Project::class);
    foreach ($args as $key => $value) {
        expect($result)->{$key}->toBe($value);
    }
});

test('updateProject updates the model', function () {
    $args = Project::factory()->definition();
    $model = Project::factory()->create();
    $repository = new ProjectRepository;

    $result = $repository->updateProject(
        model: $model,
        args: $args,
    );

    foreach ($args as $key => $value) {
        expect($result[0])->{$key}->toBe($value);
    }
});

test('updateProject returns the changes', function () {
    $data = [
        'name' => 'course name',
        'visible' => false,
    ];
    $model = Project::factory()->create();
    $repository = new ProjectRepository;

    $result = $repository->updateProject(
        model: $model,
        args: $data,
    );

    expect($result[1])
        ->toBe($data);
});

test('deleteProject deletes the model', function () {
    $model = Project::factory()->create();
    $repository = new ProjectRepository;

    $result = $repository->deleteProject($model);

    expect($result)->toBe(true);
    expect(Project::count())->toBe(0);
});
