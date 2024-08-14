<?php

use App\Actions\Project\CreateProjectAction;
use App\Models\Project;
use App\Repositories\ProjectRepository;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Str;

beforeEach(function () {
    Event::fake();

    $this->data = [
        'name' => $this->faker->name(),
        'pretty_url' => Str::slug($this->faker->words(3, true)),
        'visible' => true,
    ];

    $this->action = new CreateProjectAction(
        new ProjectRepository
    );
});

it('returns the created model', function () {
    $result = $this->action->execute($this->data);

    expect($result)->toBeInstanceOf(Project::class);
    expect($result)
        ->name->toBe($this->data['name'])
        ->pretty_url->toBe($this->data['pretty_url'])
        ->visible->toBe($this->data['visible']);
});

it('stores the data', function () {
    $this->action->execute($this->data);

    $this->assertDatabaseHas(
        table: Project::class,
        data: $this->data,
    );
});
