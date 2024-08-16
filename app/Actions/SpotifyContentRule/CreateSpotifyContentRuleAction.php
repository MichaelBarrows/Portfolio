<?php

namespace App\Actions\SpotifyContentRule;

use App\Models\SpotifyContentRule;
use App\Repositories\SpotifyContentRuleRepository;

class CreateSpotifyContentRuleAction
{
    public function __construct(
        public SpotifyContentRuleRepository $spotifyContentRuleRepository,
    ) {
    }

    public function execute(array $args): SpotifyContentRule
    {
        $setting = $this->spotifyContentRuleRepository->createSpotifyContentRule($args);

        return $setting;
    }
}
