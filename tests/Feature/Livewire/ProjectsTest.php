<?php

use App\Livewire\Projects;
use App\Models\Project;

use function Pest\Livewire\livewire;

it('loads all visible projects', function () {
    $visibleProjects = Project::factory(3)->create(['visible' => true]);
    $hiddenProjects = Project::factory(2)->create(['visible' => false]);

    livewire(Projects::class)
        ->assertViewHas('projects', function ($projects) use ($visibleProjects, $hiddenProjects) {
            return $projects->count() === $visibleProjects->count()
                && $projects->has($visibleProjects->map(fn ($project) => $project->getKey())->toArray())
                && ! $projects->hasAny($hiddenProjects->map(fn ($project) => $project->getKey())->toArray());
        });
});

it('reacts to a project being created appropriately when it is visible', function () {
    $assert = livewire(Projects::class)
        ->assertViewHas('projects', fn ($projects) => $projects->isEmpty());

    $project = Project::factory()->create(['visible' => true]);

    $assert->dispatch(
        "echo:projects,Project\\ProjectCreated",
        $project->toArray(),
    )
    ->assertViewHas('projects', fn ($projects) => $projects->count() === 1);
});

it('reacts to a project being created appropriately when it is hidden', function () {
    $assert = livewire(Projects::class)
        ->assertViewHas('projects', fn ($projects) => $projects->isEmpty());

    $project = Project::factory()->create(['visible' => false]);

    $assert->dispatch(
        "echo:projects,Project\\ProjectCreated",
        $project->toArray(),
    )
    ->assertViewHas('projects', fn ($projects) => $projects->isEmpty());
});

it('reacts to a project name being updated appropriately', function () {
    $project = Project::factory()->create([
        'name' => 'test project',
    ]);

    $assert = livewire(Projects::class)
        ->assertViewHas('projects', fn ($projects) => $projects->has($project->getKey()))
        ->assertSee($project->name);

    $project->update(['name' => 'other project']);

    $assert->dispatch(
        "echo:projects,Project\\ProjectUpdated",
        [
            'id' => $project->getKey(),
            'name' => 'other project',
        ]
    )
    ->assertViewHas('projects', fn ($projects) => $projects->has($project->getKey()))
    ->assertSee('other project')
    ->assertDontSee('test project');
});

it('reacts to a projects tech stack being updated appropriately', function () {
    $project = Project::factory()->create([
        'tech_stack' => ['php', 'laravel', 'livewire'],
    ]);

    $assert = livewire(Projects::class)
        ->assertSee('PHP')
        ->assertSee('Laravel')
        ->assertSee('Livewire');

    $project->update([
        'tech_stack' => ['javascript', 'python'],
    ]);

    $assert->dispatch(
        "echo:projects,Project\\ProjectUpdated",
        [
            'id' => $project->getKey(),
            'tech_stack' => ['javascript', 'python'],
        ]
    )
    ->assertSee('JavaScript')
    ->assertSee('Python')
    ->assertDontSee('PHP')
    ->assertDontSee('Laravel')
    ->assertDontSee('Livewire');
});

it('reacts to a projects visibility being updated appropriately', function () {
    $project = Project::factory()->create([
        'visible' => false,
    ]);

    $assert = livewire(Projects::class)
        ->assertViewHas('projects', fn ($projects) => $projects->isEmpty());

    $project->update([
        'visible' => true,
    ]);

    $assert->dispatch(
        "echo:projects,Project\\ProjectUpdated",
        [
            'id' => $project->getKey(),
            'visible' => true,
        ]
    )
    ->assertViewHas('projects', fn ($projects) => $projects->has($project->getKey()));

    $project->update([
        'visible' => false,
    ]);

    $assert->dispatch(
        "echo:projects,Project\\ProjectUpdated",
        [
            'id' => $project->getKey(),
            'visible' => false,
        ]
    )
    ->assertViewHas('projects', fn ($projects) => $projects->isEmpty());
});

it('reacts to a project being deleted', function () {
    $project = Project::factory()->create([
        'visible' => true,
    ]);

    $assert = livewire(Projects::class)
        ->assertViewHas('projects', fn ($projects) => $projects->has($project->getKey()));

    $assert->dispatch(
        "echo:projects,Project\\ProjectDeleted",
        [
            'id' => $project->getKey(),
        ]
    )
    ->assertViewHas('projects', fn ($projects) => $projects->isEmpty());
});
