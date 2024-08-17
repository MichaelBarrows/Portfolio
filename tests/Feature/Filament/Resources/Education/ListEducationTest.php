<?php

use App\Filament\Resources\EducationResource\Pages\ListEducation;
use App\Models\Education;

use function Pest\Livewire\livewire;

it('can list education', function () {
    $education = Education::factory()
        ->count(5)
        ->create();

    $assert = livewire(ListEducation::class)
        ->assertCanSeeTableRecords($education);

    $education->each(function ($edu) use ($assert) {
        $assert->assertSeeInOrder([
            $edu->institution_name,
            $edu->course_name,
            ...$edu->tech_stack
                ->map(fn ($techStack) => $techStack->getName())
                ->toArray(),
        ]);
    });
});
