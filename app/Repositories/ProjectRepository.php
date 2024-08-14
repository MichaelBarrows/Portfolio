<?php

namespace App\Repositories;

use App\Models\Project;

class ProjectRepository
{
    public function createProject(array $args = []): ?Project
    {
        $record = new Project;

        $record->fill($args);

        $record->save();

        return $record;
    }

    public function updateProject(Project $model, array $args = []): array
    {
        $model->fill($args);

        $changes = $model->getDirty();

        $model->save();

        return [$model, $changes];
    }

    public function deleteProject(Project $model): bool
    {
        return $model->delete();
    }
}
