<?php

namespace App\Repositories;

use App\Models\SpotifyContentRule;

class SpotifyContentRuleRepository
{
    public function createSpotifyContentRule(array $args = []): ?SpotifyContentRule
    {
        $record = new SpotifyContentRule;

        $record->fill($args);

        $record->save();

        return $record;
    }

    public function updateSpotifyContentRule(SpotifyContentRule $model, array $args = []): SpotifyContentRule
    {
        $model->fill($args);

        $model->save();

        return $model;
    }

    public function deleteSpotifyContentRule(SpotifyContentRule $model): bool
    {
        return $model->delete();
    }
}
