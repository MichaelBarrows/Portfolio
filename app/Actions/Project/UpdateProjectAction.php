<?php

namespace App\Actions\Project;

use App\Events\Project\ProjectUpdated;
use App\Models\Project;
use App\Repositories\ProjectRepository;

class UpdateProjectAction
{
    public function __construct(
        private ProjectRepository $projectRepository,
    ) {
    }

    public function execute(Project $project, array $args): Project
    {
        [$project, $changes] = $this->projectRepository->updateProject(
            model: $project,
            args: $args,
        );

        ProjectUpdated::dispatch($project->getKey(), $changes);

        return $project;
    }
}
