<?php

namespace App\Repositories;

use App\Models\Project;
use App\Models\ProjectLink;

class ProjectLinkRepository
{
    public function createProjectLink(Project $project, array $args = []): ?ProjectLink
    {
        $record = new ProjectLink;

        $record->project()->associate($project);

        $record->fill($args);

        $record->save();

        return $record;
    }

    public function updateProjectLink(ProjectLink $model, array $args = []): ProjectLink
    {
        $model->fill($args);

        $model->save();

        return $model;
    }

    public function deleteProjectLink(ProjectLink $model): bool
    {
        return $model->delete();
    }
}
