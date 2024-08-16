<?php

use App\Models\SpotifyContentRule;
use App\Repositories\SpotifyContentRuleRepository;

it('creates the model', function () {
    $args = SpotifyContentRule::factory()->definition();
    $repository = new SpotifyContentRuleRepository;

    $result = $repository->createSpotifyContentRule($args);

    expect($result)->toBeInstanceOf(SpotifyContentRule::class);
    foreach ($args as $key => $value) {
        expect($result->{$key})->toBe($value);
    }
});

it('updates the model', function () {
    $args = SpotifyContentRule::factory()->definition();
    $model = SpotifyContentRule::factory()->create();
    $repository = new SpotifyContentRuleRepository;

    $result = $repository->updateSpotifyContentRule(
        model: $model,
        args: $args,
    );

    foreach ($args as $key => $value) {
        expect($result->{$key})->toBe($value);
    }
});

it('deletes the model', function () {
    $model = SpotifyContentRule::factory()->create();
    $repository = new SpotifyContentRuleRepository;

    $result = $repository->deleteSpotifyContentRule($model);

    expect($result)->toBe(true);
    expect(SpotifyContentRule::count())->toBe(0);
});
