<?php

namespace App\Actions\SpotifyContentRule;

use App\Models\SpotifyContentRule;
use App\Repositories\SpotifyContentRuleRepository;

class UpdateSpotifyContentRuleAction
{
    public function __construct(
        private SpotifyContentRuleRepository $spotifyContentRuleRepository,
    ) {
    }

    public function execute(SpotifyContentRule $spotifyContentRule, array $args)
    {
        $result = $this->spotifyContentRuleRepository->updateSpotifyContentRule(
            model: $spotifyContentRule,
            args: $args,
        );

        return $result;
    }
}
