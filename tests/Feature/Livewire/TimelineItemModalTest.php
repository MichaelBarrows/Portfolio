<?php

use App\Livewire\TimelineItemModal;
use App\Models\Education;
use App\Models\Employment;

use function Pest\Livewire\livewire;

it('displays the data for education', function () {
    $record = Education::factory()->create();

    livewire(TimelineItemModal::class, [
        'type' => 'edu',
        'id' => $record->getKey(),
    ])
        ->assertSeeInOrder([
            'Education Details',
            $record->course_name,
            $record->institution_name,
            $record->start_date,
            $record->end_date,
            ...$record->tech_stack
                ->map(fn ($techStack) => $techStack->getName())
                ->toArray(),
            $record->description,
        ]);
});

it('displays the data for employment', function () {
    $record = Employment::factory()->create();

    livewire(TimelineItemModal::class, [
        'type' => 'emp',
        'id' => $record->getKey(),
    ])
        ->assertSeeInOrder([
            'Employment Details',
            $record->position,
            $record->company,
            $record->start_date,
            $record->end_date,
            ...$record->tech_stack
                ->map(fn ($techStack) => $techStack->getName())
                ->toArray(),
            $record->description,
        ]);
});

it('reacts to the education updated event appropriately', function () {
    $record = Education::factory()->create(['course_name' => 'course a']);

    $assert = livewire(TimelineItemModal::class, [
        'type' => 'edu',
        'id' => $record->getKey(),
    ])
        ->assertSee('course a');

    $record->update(['course_name' => 'course b']);

    $assert->dispatch("echo:education.{$record->getKey()},Education\\EducationUpdated")
        ->assertSee('course b');
});

it('reacts to the employment updated event appropriately', function () {
    $record = Employment::factory()->create(['title' => 'position a']);

    $assert = livewire(TimelineItemModal::class, [
        'type' => 'emp',
        'id' => $record->getKey(),
    ])
        ->assertSee('position a');

    $record->update(['title' => 'position b']);

    $assert->dispatch("echo:employment.{$record->getKey()},Employment\\EmploymentUpdated")
        ->assertSee('position b');
});

it('displays the image when one is set', function () {
    $record = Employment::factory()->create([
        'properties' => [
            'prefix' => 'some-prefix',
            'encoded_image' => 'IMAGE',
        ],
    ]);

    livewire(TimelineItemModal::class, [
        'type' => 'emp',
        'id' => $record->getKey(),
    ])
        ->assertSeeHtmlInOrder([
            'some-prefix',
            'IMAGE',
        ]);
});

it('displays the icon for education when it doesnt have an image', function () {
    $record = Education::factory()->create([
        'properties' => [],
    ]);

    livewire(TimelineItemModal::class, [
        'type' => 'edu',
        'id' => $record->getKey(),
    ])
        ->assertSeeHtml('fas fa-mortar-board');
});

it('displays the icon for employment when it doesnt have an image', function () {
    $record = Employment::factory()->create([
        'properties' => [],
    ]);

    livewire(TimelineItemModal::class, [
        'type' => 'emp',
        'id' => $record->getKey(),
    ])
        ->assertSeeHtml('fas fa-briefcase');
});
