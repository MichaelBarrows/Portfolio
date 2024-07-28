<?php

namespace App\Actions\Project;

use App\Events\Project\ProjectUpdated;
use App\Models\Project;

class UpdateProjectAction
{
    public function execute(Project $project, array $args): Project
    {
        $project->fill($args);

        $project->save();

        ProjectUpdated::dispatch($project);

        return $project;
    }
}
