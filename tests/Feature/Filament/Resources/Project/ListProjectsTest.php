<?php

use App\Filament\Resources\ProjectResource\Pages\ListProjects;
use App\Models\Project;
use function Pest\Livewire\livewire;

it('can list projects', function () {
    $projects = Project::factory()
        ->count(5)
        ->create();

    $assert = livewire(ListProjects::class)
        ->assertCanSeeTableRecords($projects);

    $projects->each(function ($project) use ($assert) {
        $assert->assertSeeInOrder([
            $project->company,
            $project->title,
            ...$project->tech_stack->map(fn ($enum) => $enum->getName())->toArray(),
        ]);
    });
});
