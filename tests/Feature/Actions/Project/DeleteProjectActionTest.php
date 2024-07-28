<?php

use App\Actions\Project\DeleteProjectAction;
use App\Models\Project;

it('deletes the model', function () {
    $project = Project::factory()->create();

    $result = (new DeleteProjectAction)->execute($project);

    expect($result)->toBe(true);
    expect(Project::count())->toBe(0);
});
