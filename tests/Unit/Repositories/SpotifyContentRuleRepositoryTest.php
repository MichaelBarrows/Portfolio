<?php

use App\Models\SpotifyContentRule;
use App\Repositories\SpotifyContentRuleRepository;

test('createSpotifyContentRule creates the model', function () {
    $args = SpotifyContentRule::factory()->definition();
    $repository = new SpotifyContentRuleRepository;

    $result = $repository->createSpotifyContentRule($args);

    expect($result)->toBeInstanceOf(SpotifyContentRule::class);
    foreach ($args as $key => $value) {
        expect($result->{$key})->toBe($value);
    }
});

test('updateSpotifyContentRule updates the model', function () {
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

test('deleteSpotifyContentRule deletes the model', function () {
    $model = SpotifyContentRule::factory()->create();
    $repository = new SpotifyContentRuleRepository;

    $result = $repository->deleteSpotifyContentRule($model);

    expect($result)->toBe(true);
    expect(SpotifyContentRule::count())->toBe(0);
});
