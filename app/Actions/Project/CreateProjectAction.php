<?php

namespace App\Actions\Project;

use App\Models\Project;

class CreateProjectAction
{
    public function execute(array $args): Project
    {
        return Project::create($args);
    }
}
