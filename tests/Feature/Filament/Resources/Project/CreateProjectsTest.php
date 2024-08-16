<?php

use App\Filament\Resources\ProjectResource\Pages\CreateProject;

use App\Models\Project;
use function Pest\Livewire\livewire;
use Illuminate\Support\Facades\Event;

beforeEach(fn () => Event::fake());

it('validates the input', function ($attribute) {
    $data = Project::factory()->definition();
    $data[$attribute] = null;

    livewire(CreateProject::class)
        ->fillForm($data)
        ->call('create')
        ->assertHasFormErrors([$attribute => 'required']);
})->with([
    'name',
    'tech_stack',
]);

it('creates the model', function () {
    $data = Project::factory()->definition();

    livewire(CreateProject::class)
        ->fillForm($data)
        ->call('create')
        ->assertHasNoFormErrors();

    $data['tech_stack'] = $data['tech_stack']->toJson();
    $this->assertDatabaseHas(
        table: Project::class,
        data: $data,
    );
});
