<?php

use App\Actions\Setting\CreateSettingAction;
use App\Models\Setting;
use App\Repositories\SettingRepository;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

beforeEach(function () {
    $this->data = [
        'key' => $this->faker->name(),
        'value' => Str::slug($this->faker->words(3, true)),
        'type' => 'string',
    ];

    $this->action = new CreateSettingAction(
        new SettingRepository
    );
});

it('returns the created model', function () {
    $result = $this->action->execute($this->data);

    expect($result)->toBeInstanceOf(Setting::class);
    expect($result)
        ->key->toBe($this->data['key'])
        ->value->toBe($this->data['value'])
        ->type->toBe($this->data['type']);
});

it('stores the data', function () {
    $this->action->execute($this->data);

    $this->assertDatabaseHas(
        table: Setting::class,
        data: $this->data,
    );
});
