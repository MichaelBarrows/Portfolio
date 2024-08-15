<?php

use App\Filament\Resources\EmploymentResource\Pages\CreateEmployment;
use App\Models\Employment;
use function Pest\Livewire\livewire;

use Illuminate\Support\Facades\Event;

beforeEach(fn () => Event::fake());

it('validates the input', function ($attribute) {
    $data = Employment::factory()->definition();
    $data[$attribute] = null;

    livewire(CreateEmployment::class)
        ->fillForm($data)
        ->call('create')
        ->assertHasFormErrors([$attribute => 'required']);
})->with([
    'title',
    'company',
    'start_date',
    'end_date',
    'tech_stack',
]);

it('creates the model', function () {
    $data = Employment::factory()->definition();

    livewire(CreateEmployment::class)
        ->fillForm($data)
        ->call('create')
        ->assertHasNoFormErrors();

    $data['tech_stack'] = $data['tech_stack']->toJson();
    $this->assertDatabaseHas(
        table: Employment::class,
        data: $data,
    );
});
