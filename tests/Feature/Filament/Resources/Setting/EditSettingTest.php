<?php

use App\Filament\Resources\SettingResource\Pages\EditSetting;
use App\Models\Setting;
use function Pest\Livewire\livewire;
use Illuminate\Support\Facades\Event;


beforeEach(function () {
    Event::fake();

    $this->setting = Setting::factory()->create();
});

it('updates the setting', function () {
    livewire(EditSetting::class, [$this->setting->getKey()])
        ->assertFormFieldIsVisible('key')
        ->assertFormFieldIsVisible('textValue')
        ->fillForm(['type' => 'bool'])
        ->assertFormFieldIsHidden('textValue')
        ->assertFormFieldIsVisible('boolValue');
});

it('displays the text input when the type is string, integer or encrypted', function () {
    livewire(EditSetting::class, [$this->setting->getKey()])
        ->assertFormFieldIsVisible('textValue')
        ->fillForm(['type' => 'string'])
        ->assertFormFieldIsVisible('textValue')
        ->assertFormFieldIsHidden('boolValue')
        ->assertFormFieldIsHidden('arrayValue')
        ->assertFormFieldIsHidden('tagValue')
        ->fillForm(['type' => 'int'])
        ->assertFormFieldIsVisible('textValue')
        ->assertFormFieldIsHidden('boolValue')
        ->assertFormFieldIsHidden('arrayValue')
        ->assertFormFieldIsHidden('tagValue')
        ->fillForm(['type' => 'encrypted'])
        ->assertFormFieldIsVisible('textValue')
        ->assertFormFieldIsHidden('boolValue')
        ->assertFormFieldIsHidden('arrayValue')
        ->assertFormFieldIsHidden('tagValue');
});

it('displays the toggle when the type is bool', function () {
    livewire(EditSetting::class, [$this->setting->getKey()])
        ->assertFormFieldIsVisible('textValue')
        ->fillForm(['type' => 'bool'])
        ->assertFormFieldIsVisible('boolValue')
        ->assertFormFieldIsHidden('textValue')
        ->assertFormFieldIsHidden('arrayValue')
        ->assertFormFieldIsHidden('tagValue');
});

it('displays the array input when the type is array', function () {
    livewire(EditSetting::class, [$this->setting->getKey()])
        ->assertFormFieldIsVisible('textValue')
        ->fillForm(['type' => 'array'])
        ->assertFormFieldIsVisible('arrayValue')
        ->assertFormFieldIsHidden('textValue')
        ->assertFormFieldIsHidden('boolValue')
        ->assertFormFieldIsHidden('tagValue');
});

it('displays the tags input when the type is tags', function () {
    livewire(EditSetting::class, [$this->setting->getKey()])
        ->assertFormFieldIsVisible('textValue')
        ->fillForm(['type' => 'tags'])
        ->assertFormFieldIsVisible('tagValue')
        ->assertFormFieldIsHidden('textValue')
        ->assertFormFieldIsHidden('boolValue')
        ->assertFormFieldIsHidden('arrayValue');
});

it('updates a setting appropriately', function (string $type, string $field, mixed $value, ?callable $formatter, bool $dbValueMatch = true) {
    livewire(EditSetting::class, [$this->setting->getKey()])
        ->fillForm([
            'key' => 'test-key',
            'type' => $type,
            $field => $value,
        ])
        ->call('save')
        ->assertHasNoFormErrors();

            $this->assertDatabaseHas(
                table: Setting::class,
                data: [
                    'key' => 'test-key',
                    'type' => $type,
                ],
            );

        if ($dbValueMatch) {
            $this->assertDatabaseHas(
                table: Setting::class,
                data: [
                    'key' => 'test-key',
                    'value' => $formatter($value),
                ]
            );
        } else {
            $this->assertDatabaseMissing(
                table: Setting::class,
                data: [
                    'key' => 'test-key',
                    'value' => $value,
                ]
            );
        }
})->with([
    ['string', 'textValue', 'some string', fn ($value) => (string) $value],
    ['int', 'textValue', 10, fn ($value) => (string) $value],
    ['bool', 'boolValue', true, fn ($value) => $value ? 'true' : 'false'],
    ['array', 'arrayValue', ['a' => 'b', 'c' => 'd'], fn ($value) => json_encode($value)],
    ['tags', 'tagValue', [1,2,3], fn ($value) => json_encode($value)],
    ['encrypted', 'textValue', 'some string', null, false],
]);
