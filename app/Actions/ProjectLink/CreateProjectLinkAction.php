<?php

namespace App\Actions\ProjectLink;

use App\Events\Project\ProjectUpdated;
use App\Models\Project;
use App\Models\ProjectLink;
use App\Repositories\ProjectLinkRepository;

class CreateProjectLinkAction
{
    public function __construct(
        private ProjectLinkRepository $projectLinkRepository,
    ) {
    }

    public function execute(Project $project, array $args): ProjectLink
    {
        $link = $this->projectLinkRepository->createProjectLink(
            project: $project,
            args: $args,
        );

        ProjectUpdated::dispatch($project->getKey(), ['project_link' => 'created']);

        return $link;
    }
}
