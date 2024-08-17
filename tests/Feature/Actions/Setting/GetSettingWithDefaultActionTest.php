<?php

use App\Actions\Setting\GetSettingWithDefaultAction;
use App\Models\Setting;
use App\Repositories\SettingRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;

beforeEach(function () {
    $this->action = new GetSettingWithDefaultAction(
        new SettingRepository
    );
});

it('returns the database value when it exists', function () {
    $setting = Setting::factory()->create();

    $result = $this->action->execute([$setting->key]);

    expect($result)->toBeInstanceOf(Collection::class);
    expect($result)->count()->toBe(1);
    expect($result->first())->toBeInstanceOf(Setting::class)
        ->key->toBe($setting->key)
        ->type->toBe($setting->type)
        ->value->toBe($setting->value);
});

it('returns the default when it doesnt exist', function () {
    Config::set('settings.defaults.test-key', [
        'type' => 'string',
        'value' => 'some value',
    ]);
    $result = $this->action->execute(['test-key']);

    expect($result)->toBeInstanceOf(Collection::class);
    expect($result)->count()->toBe(1);
    expect($result->first())->toBeInstanceOf(Setting::class)
        ->key->toBe('test-key')
        ->type->toBe('string')
        ->value->toBe('some value');
});

it('throws an error when the config fallback doesnt exist', function () {
    Config::set('settings.defaults', []);
    $this->action->execute(['test-key']);
})->throws(Error::class, 'Only arrays and Traversables can be unpacked');
