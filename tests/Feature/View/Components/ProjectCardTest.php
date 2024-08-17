<?php

use App\Models\Project;

it('renders the project record appropriately', function () {
    $project = Project::factory()->create();
    $this->blade(
        '
            <x-project-card
                :id="$project->getKey()"
                :icon="$project->fa_icon_logo"
                :title="$project->name"
                :tags="$project->tech_stack"
            />
        ',
        ['project' => $project],
    )
        ->assertSeeInOrder([
            $project->fa_icon_logo,
            $project->name,
            ...$project->tech_stack
                ->map(fn ($techStack) => $techStack->getName())
                ->toArray(),
        ]);
});
