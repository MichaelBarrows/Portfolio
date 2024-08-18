<?php

namespace App\Actions\Project;

use App\Events\Project\ProjectDeleted;
use App\Models\Project;
use App\Repositories\ProjectRepository;

class DeleteProjectAction
{
    public function __construct(
        private ProjectRepository $projectRepository
    ) {
    }

    public function execute(Project $project): bool
    {
        $result = $this->projectRepository->deleteProject($project);

        ProjectDeleted::dispatch($project->getKey());

        return $result;
    }
}
