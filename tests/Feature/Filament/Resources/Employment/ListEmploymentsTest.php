<?php

use App\Filament\Resources\EmploymentResource\Pages\ListEmployments;
use App\Models\Employment;

use function Pest\Livewire\livewire;

it('can list employment', function () {
    $employments = Employment::factory()
        ->count(5)
        ->create();

    $assert = livewire(ListEmployments::class)
        ->assertCanSeeTableRecords($employments);

    $employments->each(function ($employment) use ($assert) {
        $assert->assertSeeInOrder([
            $employment->company,
            $employment->title,
            ...$employment->tech_stack->map(fn ($enum) => $enum->getName())->toArray(),
        ]);
    });
});
