<?php

use App\Actions\SpotifyContentRule\UpdateSpotifyContentRuleAction;
use App\Models\SpotifyContentRule;
use App\Repositories\SpotifyContentRuleRepository;

beforeEach(function () {
    $this->rule = SpotifyContentRule::factory()->create();
    $this->data = SpotifyContentRule::factory()->definition();

    $this->action = new UpdateSpotifyContentRuleAction(
        new SpotifyContentRuleRepository
    );
});

it('updates the model', function () {
    $result = $this->action->execute(
        spotifyContentRule: $this->rule,
        args: $this->data,
    );

    expect($result)
        ->field->toBe($this->data['field'])
        ->operand->toBe($this->data['operand'])
        ->value->toBe($this->data['value']);

    $this->assertDatabaseHas(
        table: SpotifyContentRule::class,
        data: [
            'id' => $this->rule->getKey(),
            ...$this->data,
        ],
    );
});
