<?php

use App\Livewire\Experience;
use App\Models\Education;
use App\Models\Employment;
use function Pest\Livewire\livewire;

it('sorts records by start date', function () {
    $educationA = Education::factory()->create(['start_date' => 'January 2022']);
    $employmentA = Employment::factory()->create(['start_date' => 'January 2024']);
    $educationB = Education::factory()->create(['start_date' => 'June 2024']);

    livewire(Experience::class)
        ->assertViewHas('experiences', function ($experiences) use ($educationA, $educationB, $employmentA) {
            return ($exp = $experiences->pop()) instanceof Education
                && $exp->getKey() === $educationA->getKey()
                && ($exp = $experiences->pop()) instanceof Employment
                && $exp->getKey() === $employmentA->getKey()
                && ($exp = $experiences->pop()) instanceof Education
                && $exp->getKey() === $educationB->getKey();
        });
});

it('displays the current label on a record with the end date set to present', function () {
    $education = Education::factory()->create(['end_date' => 'Present']);

    livewire(Experience::class)
        ->assertSeeInOrder([
            'Current',
            $education->position,
            $education->organisation,
        ]);
});

it('doesnt display the current label on a record with the end date set to present', function () {
    $education = Education::factory()->create(['end_date' => 'August 2024']);

    livewire(Experience::class)
        ->assertDontSee('Current')
        ->assertSeeInOrder([
            $education->position,
            $education->organisation,
        ]);
});

it('reacts appropriately to the education created event', function () {
    $employment = Employment::factory()->create();

    $assert = livewire(Experience::class)
        ->assertViewHas('experiences', fn ($experiences) => $experiences->has("emp-{$employment->getKey()}"));

    $education = Education::factory()->create();

    $assert->dispatch(
        'echo:education,Education\\EducationCreated',
        [
            'id' => $education->getKey(),
            'type' => 'education',
            ...$education->toArray(),
        ])
        ->assertViewHas('experiences', function ($experiences) use ($employment, $education) {
            return $experiences->has("edu-{$education->getKey()}")
                && $experiences->has("emp-{$employment->getKey()}");
        });
});

it('reacts appropriately to the employment created event', function () {
    $education = Education::factory()->create();

    $assert = livewire(Experience::class)
        ->assertViewHas('experiences', fn ($experiences) => $experiences->has("edu-{$education->getKey()}"));

    $employment = Employment::factory()->create();

    $assert->dispatch(
        'echo:employment,Employment\\EmploymentCreated',
        [
            'id' => $employment->getKey(),
            'type' => 'employment',
            ...$employment->toArray(),
        ])
        ->assertViewHas('experiences', function ($experiences) use ($employment, $education) {
            return $experiences->has("edu-{$education->getKey()}")
                && $experiences->has("emp-{$employment->getKey()}");
        });
});

it('reacts appropriately to the education updated event', function () {
    $education = Education::factory()->create(['course_name' => 'course a']);

    $assert = livewire(Experience::class)
        ->assertViewHas('experiences', function ($experiences) {
            return $experiences->first()->course_name === 'course a';
        });

    $assert->dispatch(
        'echo:education,Education\\EducationUpdated',
        [
            'id' => $education->getKey(),
            'type' => 'education',
            'course_name' => 'course b'
        ])
        ->assertViewHas('experiences', function ($experiences) use ($education) {
            return $experiences->get("edu-{$education->getKey()}")->course_name === 'course b';
        });
});

it('reacts appropriately to the employment updated event', function () {
    $employment = Employment::factory()->create(['title' => 'position a']);

    $assert = livewire(Experience::class)
        ->assertViewHas('experiences', function ($experiences) {
            return $experiences->first()->title === 'position a';
        });

    $assert->dispatch(
        'echo:employment,Employment\\EmploymentUpdated',
        [
            'id' => $employment->getKey(),
            'type' => 'employment',
            'title' => 'position b'
        ])
        ->assertViewHas('experiences', function ($experiences) use ($employment) {
            return $experiences->get("emp-{$employment->getKey()}")->title === 'position b';
        });
});

it('reacts appropriately to the education deleted event', function () {
    $education = Education::factory()->create(['course_name' => 'course a']);

    $assert = livewire(Experience::class)
        ->assertViewHas('experiences', fn ($experiences) => $experiences->has("edu-{$education->getKey()}"));

    $assert->dispatch(
        'echo:education,Education\\EducationDeleted',
        [
            'id' => $education->getKey(),
            'type' => 'education',
        ])
        ->assertViewHas('experiences', function ($experiences) {
            return $experiences->isEmpty();
        });
});

it('reacts appropriately to the employment deleted event', function () {
    $employment = Employment::factory()->create(['title' => 'position a']);

    $assert = livewire(Experience::class)
        ->assertViewHas('experiences', fn ($experiences) => $experiences->has("emp-{$employment->getKey()}"));

    $assert->dispatch(
        'echo:employment,Employment\\EmploymentDeleted',
        [
            'id' => $employment->getKey(),
            'type' => 'employment',
        ])
        ->assertViewHas('experiences', function ($experiences) {
            return $experiences->isEmpty();
        });
});
