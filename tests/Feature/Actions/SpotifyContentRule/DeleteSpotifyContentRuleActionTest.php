<?php

use App\Actions\SpotifyContentRule\DeleteSpotifyContentRuleAction;
use App\Models\SpotifyContentRule;
use App\Repositories\SpotifyContentRuleRepository;

beforeEach(function () {
    $this->rule = SpotifyContentRule::factory()->create();

    $this->action = new DeleteSpotifyContentRuleAction(
        new SpotifyContentRuleRepository
    );
});

it('deletes the model', function () {
    $result = $this->action->execute($this->rule);

    expect($result)->toBe(true);
    expect(SpotifyContentRule::count())->toBe(0);
});
