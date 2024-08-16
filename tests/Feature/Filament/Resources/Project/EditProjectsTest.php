<?php

use App\Filament\Resources\ProjectResource\Pages\EditProject;
use App\Models\Project;

use function Pest\Livewire\livewire;
use Illuminate\Support\Facades\Event;

beforeEach(fn () => Event::fake());

it('validates the input', function ($attribute) {
    $education = Project::factory()->create();
    $data = Project::factory()->definition();
    $data[$attribute] = null;

    livewire(EditProject::class, [$education->getKey()])
        ->fillForm($data)
        ->call('save')
        ->assertHasFormErrors([$attribute => 'required']);

    $this->assertDatabaseHas(
        table: Project::class,
        data: $education->getAttributes(),
    );
})->with([
    'name',
    'tech_stack',
]);

it('updates the model', function () {
    $education = Project::factory()->create();
    $data = Project::factory()->definition();

    livewire(EditProject::class, [$education->getKey()])
        ->fillForm($data)
        ->call('save')
        ->assertHasNoFormErrors();

    $data['tech_stack'] = $data['tech_stack']->toJson();
    $this->assertDatabaseHas(
        table: Project::class,
        data: $data,
    );
});
