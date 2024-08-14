<?php

namespace App\Repositories;

use App\Models\Employment;

class EmploymentRepository
{
    public function createEmployment(array $args = []): ?Employment
    {
        $record = new Employment;

        $record->fill($args);

        $record->save();

        return $record;
    }

    public function updateEmployment(Employment $model, array $args = []): array
    {
        $model->fill($args);

        $changes = $model->getDirty();

        $model->save();

        return [$model, $changes];
    }

    public function deleteEmployment(Employment $model): bool
    {
        return $model->delete();
    }
}
