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

it('reacts to the education updated event appropriately', function ($field, $oldValue, $newValue) {
    $record = Education::factory()->create([
        $field => $oldValue,
    ]);

    $assert = livewire(TimelineItemModal::class, [
        'type' => 'edu',
        'id' => $record->getKey(),
    ])
        ->assertSee($oldValue);

    $record->update([$field => $newValue]);

    $assert->dispatch(
        "echo:education.{$record->getKey()},Education\\EducationUpdated",
        [
            'id' => $record->getKey(),
            'type' => 'education',
            $field => $newValue,
        ],
    )
    ->assertSee($newValue);
})->with([
    ['course_name', 'course a', 'course b'],
    ['institution_name', 'uni a', 'uni b'],
    ['start_date', 'September 2015', 'January 2020'],
    ['end_date', 'June 2019', 'January 2021'],
    ['description', 'description a', 'description b'],
]);

it('reacts to the employment updated event appropriately', function ($field, $oldValue, $newValue) {
    $record = Employment::factory()->create([
        $field => $oldValue,
    ]);

    $assert = livewire(TimelineItemModal::class, [
        'type' => 'emp',
        'id' => $record->getKey(),
    ])
        ->assertSee($oldValue);

    $record->update([$field => $newValue]);

    $assert->dispatch(
        "echo:employment.{$record->getKey()},Employment\\EmploymentUpdated",
        [
            'id' => $record->getKey(),
            'type' => 'employment',
            $field => $newValue,
        ],
    )
    ->assertSee($newValue);
})->with([
    ['title', 'position a', 'position b'],
    ['company', 'company a', 'company b'],
    ['start_date', 'September 2015', 'January 2020'],
    ['end_date', 'June 2019', 'January 2021'],
    ['description', 'description a', 'description b'],
]);

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
