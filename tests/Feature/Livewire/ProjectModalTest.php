<?php

use App\Livewire\ProjectModal;
use App\Models\Project;
use App\Models\ProjectLink;

use function Pest\Livewire\livewire;

it('displays the data', function () {
    $project = Project::factory()->create();

    livewire(ProjectModal::class, ['id' => $project->getKey()])
        ->assertSeeInOrder([
            'Project Details',
            $project->name,
            ...$project->tech_stack
                ->map(fn ($techStack) => $techStack->getName())
                ->toArray(),
            $project->description,
        ]);
});

it('reacts to the project updated event appropriately', function ($field, $oldValue, $newValue) {
    $project = Project::factory()->create([
        $field => $oldValue,
    ]);

    $assert = livewire(ProjectModal::class, ['id' => $project->getKey()])
        ->assertSee($oldValue);

    $project->update([$field => $newValue]);

    $assert->dispatch(
        "echo:projects.{$project->getKey()},Project\\ProjectUpdated",
        [
            'id' => $project->getKey(),
            $field => $newValue,
        ],
    )
    ->assertSee($newValue);
})->with([
    ['name', 'test project', 'new test project'],
    ['fa_icon_logo', json_encode(['fa', 'code']), 'briefcase'],
    ['description', 'some description', 'some other description'],
]);

it('updates the tech stack via the event', function () {
    $project = Project::factory()->create([
        'tech_stack' => ['php', 'laravel'],
    ]);

    $assert = livewire(ProjectModal::class, ['id' => $project->getKey()])
        ->assertSeeHtmlInOrder(['PHP', 'Laravel']);

    $project->update(['tech_stack' => ['javascript', 'python']]);

    $assert->dispatch(
        "echo:projects.{$project->getKey()},Project\\ProjectUpdated",
        [
            'id' => $project->getKey(),
            'tech_stack' => ['javascript', 'python'],
        ],
    )
    ->assertSee('JavaScript')
    ->assertSee('Python')
    ->assertDontSee([
        'PHP',
        'Laravel',
    ]);
});

it ('displays the links', function () {
    $project = Project::factory()->create();
    $projectLink = ProjectLink::factory()
        ->for($project)
        ->create([
            'text' => 'GH Link',
            'icon' => ['fab', 'fa-github'],
            'link' => 'https://github.test/MichaelBarrows',
        ]);

    livewire(ProjectModal::class, ['id' => $project->getKey()])
        ->assertSee([
            'fab fa-github',
            'https://github.test/MichaelBarrows',
            'GH Link',
        ]);
});
