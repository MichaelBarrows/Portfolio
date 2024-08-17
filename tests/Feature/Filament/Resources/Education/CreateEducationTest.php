<?php

use App\Filament\Resources\EducationResource\Pages\CreateEducation;
use App\Models\Education;
use function Pest\Livewire\livewire;

use Illuminate\Support\Facades\Event;

beforeEach(fn () => Event::fake());

it('validates the input', function ($attribute) {
    $data = Education::factory()->definition();
    $data[$attribute] = null;

    livewire(CreateEducation::class)
        ->fillForm($data)
        ->call('create')
        ->assertHasFormErrors([$attribute => 'required']);
})->with([
    'institution_name',
    'course_name',
    'grade',
    'start_date',
    'end_date',
]);

it('creates the model', function () {
    $data = Education::factory()->definition();

    livewire(CreateEducation::class)
        ->fillForm($data)
        ->call('create')
        ->assertHasNoFormErrors();

    $data['tech_stack'] = $data['tech_stack']
        ->map(fn ($techStack) => $techStack->value)
        ->toJson();
    $this->assertDatabaseHas(
        table: Education::class,
        data: $data,
    );
});
