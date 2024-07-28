<?php

namespace App\Actions\Project;

use App\Models\Project;

class DeleteProjectAction
{
    public function execute(Project $project): bool
    {
        return $project->delete();
    }
}
