<?php

use App\Models\Setting;
use App\Repositories\SettingRepository;
use Illuminate\Database\Eloquent\Builder;

test('getQueryBuilder returns the query builder', function () {
    $repository = new SettingRepository;

    $result = $repository->getQueryBuilder();

    expect($result)->toBeInstanceOf(Builder::class);
});

test('createSetting creates the model', function () {
    $args = Setting::factory()->definition();
    $repository = new SettingRepository;

    $result = $repository->createSetting($args);

    expect($result)->toBeInstanceOf(Setting::class);
    foreach ($args as $key => $value) {
        expect($result->{$key})->toBe($value);
    }
});

test('updateSetting updates the model', function () {
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

test('deleteSetting deletes the model', function () {
    $model = Setting::factory()->create();
    $repository = new SettingRepository;

    $result = $repository->deleteSetting($model);

    expect($result)->toBe(true);
    expect(Setting::count())->toBe(0);
});
