<?php

namespace App\Actions\ProjectLink;

use App\Events\Project\ProjectUpdated;
use App\Models\ProjectLink;
use App\Repositories\ProjectLinkRepository;

class UpdateProjectLinkAction
{
    public function __construct(
        private ProjectLinkRepository $projectLinkRepository,
    ) {
    }

    public function execute(ProjectLink $link, array $args)
    {
        $result = $this->projectLinkRepository->updateProjectLink(
            model: $link,
            args: $args,
        );

        ProjectUpdated::dispatch($link->project->getKey(), ['project_link' => 'updated']);

        return $result;
    }
}
