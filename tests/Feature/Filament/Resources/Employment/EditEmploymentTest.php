<?php

use App\Filament\Resources\EmploymentResource\Pages\EditEmployment;
use App\Models\Employment;
use function Pest\Livewire\livewire;
use Illuminate\Support\Facades\Event;

beforeEach(fn () => Event::fake());

it('validates the input', function ($attribute) {
    $employment = Employment::factory()->create();
    $data = Employment::factory()->definition();
    $data[$attribute] = null;

    livewire(EditEmployment::class, [$employment->getKey()])
        ->fillForm($data)
        ->call('save')
        ->assertHasFormErrors([$attribute => 'required']);

    $this->assertDatabaseHas(
        table: Employment::class,
        data: $employment->getAttributes(),
    );
})->with([
    'title',
    'company',
    'start_date',
    'end_date',
    'tech_stack',
]);

it('updates the model', function () {
    $employment = Employment::factory()->create();
    $data = Employment::factory()->definition();

    livewire(EditEmployment::class, [$employment->getKey()])
        ->fillForm($data)
        ->call('save')
        ->assertHasNoFormErrors();

    $data['tech_stack'] = $data['tech_stack']->toJson();
    $this->assertDatabaseHas(
        table: Employment::class,
        data: $data,
    );
});
