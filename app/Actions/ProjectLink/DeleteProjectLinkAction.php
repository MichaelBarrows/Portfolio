<?php

namespace App\Actions\ProjectLink;

use App\Events\Project\ProjectUpdated;
use App\Models\ProjectLink;
use App\Repositories\ProjectLinkRepository;

class DeleteProjectLinkAction
{
    public function __construct(
        private ProjectLinkRepository $projectLinkRepository,
    ) {
    }

    public function execute(ProjectLink $link)
    {
        $result = $this->projectLinkRepository->deleteProjectLink($link);

        ProjectUpdated::dispatch($link->project->getKey(), ['project_link' => 'deleted']);

        return $result;
    }
}
