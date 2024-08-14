<?php

namespace App\Actions\Project;

use App\Events\Project\ProjectCreated;
use App\Models\Project;
use App\Repositories\ProjectRepository;

class CreateProjectAction
{
    public function __construct(
        public ProjectRepository $projectRepository,
    ) {
    }

    public function execute(array $args): Project
    {
        $project = $this->projectRepository->createProject($args);

        ProjectCreated::dispatch($project->getKey(), $args);

        return $project;
    }
}
