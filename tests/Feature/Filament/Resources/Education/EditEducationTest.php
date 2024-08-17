<?php

use App\Filament\Resources\EducationResource\Pages\EditEducation;
use App\Models\Education;
use function Pest\Livewire\livewire;

use Illuminate\Support\Facades\Event;

beforeEach(fn () => Event::fake());

it('validates the input', function ($attribute) {
    $education = Education::factory()->create();
    $data = Education::factory()->definition();
    $data[$attribute] = null;

    livewire(EditEducation::class, [$education->getKey()])
        ->fillForm($data)
        ->call('save')
        ->assertHasFormErrors([$attribute => 'required']);

    $this->assertDatabaseHas(
        table: Education::class,
        data: $education->getAttributes(),
    );
})->with([
    'institution_name',
    'course_name',
    'grade',
    'start_date',
    'end_date',
]);

it('updates the model', function () {
    $education = Education::factory()->create();
    $data = Education::factory()->definition();

    livewire(EditEducation::class, [$education->getKey()])
        ->fillForm($data)
        ->call('save')
        ->assertHasNoFormErrors();

    $data['tech_stack'] = $data['tech_stack']
        ->map(fn ($techStack) => $techStack->value)
        ->toJson();
    $this->assertDatabaseHas(
        table: Education::class,
        data: $data,
    );
});
