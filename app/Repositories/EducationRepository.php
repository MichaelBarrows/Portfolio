<?php

namespace App\Repositories;

use App\Models\Education;

class EducationRepository
{
    public function createEducation(array $args = []): ?Education
    {
        $record = new Education;

        $record->fill($args);

        $record->save();

        return $record;
    }

    public function updateEducation(Education $model, array $args = []): array
    {
        $model->fill($args);

        $changes = $model->getDirty();

        $model->save();

        return [$model, $changes];
    }

    public function deleteEducation(Education $model): bool
    {
        return $model->delete();
    }
}
