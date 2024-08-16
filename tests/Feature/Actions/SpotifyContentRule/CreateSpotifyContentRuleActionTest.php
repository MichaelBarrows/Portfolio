<?php

use App\Actions\SpotifyContentRule\CreateSpotifyContentRuleAction;
use App\Models\SpotifyContentRule;
use App\Repositories\SpotifyContentRuleRepository;

beforeEach(function () {
    $this->data = SpotifyContentRule::factory()->definition();

    $this->action = new CreateSpotifyContentRuleAction(
        new SpotifyContentRuleRepository
    );
});

it('returns the created model', function () {
    $result = $this->action->execute(
        args: $this->data,
    );

    expect($result)->toBeInstanceOf(SpotifyContentRule::class);
    expect($result)
        ->field->toBe($this->data['field'])
        ->operand->toBe($this->data['operand'])
        ->value->toBe($this->data['value']);
});

it('stores the data', function () {
    $this->action->execute(
        args: $this->data,
    );

    $this->assertDatabaseHas(
        table: SpotifyContentRule::class,
        data: $this->data,
    );
});
