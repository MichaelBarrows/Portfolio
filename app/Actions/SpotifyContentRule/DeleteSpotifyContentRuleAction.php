<?php

namespace App\Actions\SpotifyContentRule;

use App\Models\SpotifyContentRule;
use App\Repositories\SpotifyContentRuleRepository;

class DeleteSpotifyContentRuleAction
{
    public function __construct(
        private SpotifyContentRuleRepository $spotifyContentRuleRepository,
    ) {
    }

    public function execute(SpotifyContentRule $spotifyContentRule): bool
    {
        $result = $this->spotifyContentRuleRepository->deleteSpotifyContentRule($spotifyContentRule);

        return $result;
    }
}
