<?php

use App\Actions\Setting\CreateSettingAction;
use App\Models\Setting;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

beforeEach(function () {
    $this->data = [
        'key' => $this->faker->name(),
        'value' => Str::slug($this->faker->words(3, true)),
        'type' => 'string',
    ];
});

it('returns the created model', function () {
    $result = (new CreateSettingAction)->execute($this->data);

    expect($result)->toBeInstanceOf(Setting::class);
    expect($result)
        ->key->toBe($this->data['key'])
        ->value->toBe($this->data['value'])
        ->type->toBe($this->data['type']);
});

it('stores the data', function () {
    (new CreateSettingAction)->execute($this->data);

    $this->assertDatabaseHas(
        table: Setting::class,
        data: $this->data,
    );
});

it('encrypts the value', function () {
    $result = (new CreateSettingAction)->execute([
        'key' => 'some-key',
        'value' => 'some-value',
        'type' => 'encrypted',
    ]);

    // bypass the automatic attribute transformation
    $result->type = 'string';
    $result->save();

    expect(Crypt::decrypt($result->value))
        ->toBe('some-value');
});
