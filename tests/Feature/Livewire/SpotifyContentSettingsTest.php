<?php

use App\Livewire\SpotifyContentSettings;
use App\Models\SpotifyContentRule;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;

use function Pest\Livewire\livewire;

it('lists content rules', function () {
    $rules = SpotifyContentRule::factory()
        ->count(5)
        ->create();

    $fieldTransformer = fn ($state) => match ($state) {
        'uri' => 'Track ID',
        'artists.uri' => 'Artist ID',
        'album.uri' => 'Album ID',
        'name' => 'Track Name',
        'artists.name' => 'Artist Name',
        'album.name' => 'Album Name',
        'explicit' => 'Explicit',
        default => $state
    };

    $assert = livewire(SpotifyContentSettings::class)
        ->assertCanSeeTableRecords($rules);

    $rules->each(function ($rule) use ($assert, $fieldTransformer) {
        $assert->assertSeeInOrder([
            $fieldTransformer($rule->field),
            $rule->operand,
            $rule->value
        ]);
    });
});

it('updates an existing rule', function () {
    $rule = SpotifyContentRule::factory()->create();

    $data = [
        'field' => 'uri',
        'operand' => 'equals',
        'value' => fake()->uuid(),
    ];

    livewire(SpotifyContentSettings::class, [$rule->getKey()])
        ->callTableAction(EditAction::class, $rule, $data)
        ->assertHasNoTableActionErrors();

    $this->assertDatabaseHas(
        table: SpotifyContentRule::class,
        data: [
            'id' => $rule->getKey(),
            ...$data,
        ],
    );
});

it('deletes a rule', function () {
    $rule = SpotifyContentRule::factory()->create();

    livewire(SpotifyContentSettings::class, [$rule->getKey()])
        ->callTableAction(DeleteAction::class, $rule)
        ->assertHasNoTableActionErrors();

    $this->assertDatabaseEmpty(SpotifyContentRule::class);
});
