<?php

namespace App\Actions\SpotifyContentRule;

use App\Models\SpotifyContentRule;
use App\Repositories\SpotifyContentRuleRepository;

class CreateSpotifyContentRuleAction
{
    public function __construct(
        private SpotifyContentRuleRepository $spotifyContentRuleRepository,
    ) {
    }

    public function execute(array $args): SpotifyContentRule
    {
        $setting = $this->spotifyContentRuleRepository->createSpotifyContentRule($args);

        return $setting;
    }
}
