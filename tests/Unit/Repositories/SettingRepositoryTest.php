<?php

use App\Models\Setting;
use App\Repositories\SettingRepository;

it('creates the model', function () {
    $args = Setting::factory()->definition();
    $repository = new SettingRepository;

    $result = $repository->createSetting($args);

    expect($result)->toBeInstanceOf(Setting::class);
    foreach ($args as $key => $value) {
        expect($result->{$key})->toBe($value);
    }
});

it('updates the model', function () {
    $args = Setting::factory()->definition();
    $model = Setting::factory()->create();
    $repository = new SettingRepository;

    $result = $repository->updateSetting(
        model: $model,
        args: $args,
    );

    foreach ($args as $key => $value) {
        expect($result->{$key})->toBe($value);
    }
});

it('deletes the model', function () {
    $model = Setting::factory()->create();
    $repository = new SettingRepository;

    $result = $repository->deleteSetting($model);

    expect($result)->toBe(true);
    expect(Setting::count())->toBe(0);
});
