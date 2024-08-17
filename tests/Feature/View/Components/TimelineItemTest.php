<?php

use App\Models\Education;
use App\Models\Employment;

it('renders the education record appropriately', function () {
    $education = Education::factory()->create();
    $this->blade(
        '
            <x-timeline-item
                :id="$experience->getKey()"
                :end-date="$experience->end_date"
                :organisation="$experience->organisation"
                :position="$experience->position"
                :type="$experience->type"
                :start-date="$experience->start_date"
                :tech-stack="$experience->tech_stack"
                :description="$experience->description"
                :image="$experience->image"
            />
        ',
        ['experience' => $education],
    )
        ->assertSeeInOrder([
            'fas fa-mortar-board',
            $education->course_name,
            $education->start_date,
            $education->institution_name,
            ...$education->tech_stack
                ->map(fn ($techStack) => $techStack->getName())
                ->toArray(),
            $education->start_date,
        ]);
});

it('renders the employment record appropriately', function () {
    $employment = Employment::factory()->create();
    $this->blade(
        '
            <x-timeline-item
                :id="$experience->getKey()"
                :end-date="$experience->end_date"
                :organisation="$experience->organisation"
                :position="$experience->position"
                :type="$experience->type"
                :start-date="$experience->start_date"
                :tech-stack="$experience->tech_stack"
                :description="$experience->description"
                :image="$experience->image"
            />
        ',
        ['experience' => $employment],
    )
        ->assertSeeInOrder([
            'fas fa-briefcase',
            $employment->course_name,
            $employment->start_date,
            $employment->institution_name,
            ...$employment->tech_stack
                ->map(fn ($techStack) => $techStack->getName())
                ->toArray(),
            $employment->start_date,
        ]);
});

it('shows a current tag when the end date is present', function () {
    $employment = Employment::factory()->create(['end_date' => 'Present']);
    $this->blade(
        '
            <x-timeline-item
                :id="$experience->getKey()"
                :end-date="$experience->end_date"
                :organisation="$experience->organisation"
                :position="$experience->position"
                :type="$experience->type"
                :start-date="$experience->start_date"
                :tech-stack="$experience->tech_stack"
                :description="$experience->description"
                :image="$experience->image"
            />
        ',
        ['experience' => $employment],
    )
        ->assertSee('Current');
});

