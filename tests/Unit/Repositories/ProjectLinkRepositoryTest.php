<?php

use App\Models\Project;
use App\Models\ProjectLink;
use App\Repositories\ProjectLinkRepository;

it('creates the model', function () {
    $project = Project::factory()->create();
    $args = ProjectLink::factory()->definition();
    $repository = new ProjectLinkRepository;

    $result = $repository->createProjectLink(
        project: $project,
        args: $args,
    );

    expect($result)->toBeInstanceOf(ProjectLink::class);
    foreach ($args as $key => $value) {
        expect($result)->{$key}->toBe($value);
    }
});

it('updates the model', function () {
    $args = ProjectLink::factory()->definition();
    $model = ProjectLink::factory()
        ->for(Project::factory()->create())
        ->create();
    $repository = new ProjectLinkRepository;

    $result = $repository->updateProjectLink(
        model: $model,
        args: $args,
    );

    foreach ($args as $key => $value) {
        expect($result)->{$key}->toBe($value);
    }
});

it('deletes the model', function () {
    $model = ProjectLink::factory()
        ->for(Project::factory()->create())
        ->create();
    $repository = new ProjectLinkRepository;

    $result = $repository->deleteProjectLink($model);

    expect($result)->toBe(true);
    expect(ProjectLink::count())->toBe(0);
});
