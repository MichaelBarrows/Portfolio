<?php


use App\Filament\Resources\ProjectResource\Pages\EditProject;
use App\Filament\Resources\ProjectResource\RelationManagers\ProjectLinksRelationManager;
use App\Models\Project;
use App\Models\ProjectLink;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use function Pest\Livewire\livewire;
use Illuminate\Support\Facades\Event;

beforeEach(fn () => Event::fake());

it('can list project links', function () {
    $project = Project::factory()
        ->has(ProjectLink::factory()->count(5))
        ->create();

    $assert = livewire(ProjectLinksRelationManager::class, [
        'ownerRecord' => $project,
        'pageClass' => EditProject::class,
    ])
        ->assertCanSeeTableRecords($project->projectLinks);

    $project->projectLinks->each(fn ($link) => $assert->assertSeeInOrder([
        $link->name,
        $link->url,
    ]));
});

it('can create a link', function () {
    $project = Project::factory()->create();
    $data = ProjectLink::factory()->definition();

    livewire(ProjectLinksRelationManager::class, [
        'ownerRecord' => $project,
        'pageClass' => EditProject::class,
    ])
        ->callTableAction(
            name: CreateAction::class,
            record: null,
            data: $data,
        );

    $data['icon'] = json_encode($data['icon']);
    $this->assertDatabaseHas(
        table: ProjectLink::class,
        data: array_merge(
            ['project_id' => $project->getKey()],
            $data,
        ),
    );
});

it('can update a given link', function () {
    $project = Project::factory()->create();
    $link = ProjectLink::factory()
        ->for($project)
        ->create();
    $data = ProjectLink::factory()->definition();

    livewire(ProjectLinksRelationManager::class, [
        'ownerRecord' => $project,
        'pageClass' => EditProject::class,
    ])
        ->callTableAction(
            name: EditAction::class,
            record: $link->getKey(),
            data: $data,
        );

    $data['icon'] = json_encode($data['icon']);
    $this->assertDatabaseHas(
        table: ProjectLink::class,
        data: $data,
    );
});

it('can delete a given link', function () {
    $project = Project::factory()->create();
    $link = ProjectLink::factory()
        ->for($project)
        ->create();

    livewire(ProjectLinksRelationManager::class, [
        'ownerRecord' => $project,
        'pageClass' => EditProject::class,
    ])
        ->callTableAction(
            name: DeleteAction::class,
            record: $link->getKey(),
        );

    $this->assertDatabaseCount(
        table: ProjectLink::class,
        count: 0,
    );
});
