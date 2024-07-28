<?php

use App\Actions\Project\CreateProjectAction;
use App\Models\Project;
use Illuminate\Support\Str;

beforeEach(function () {
    $this->data = [
        'name' => $this->faker->name(),
        'pretty_url' => Str::slug($this->faker->words(3, true)),
        'visible' => true,
    ];
});

it('returns the created model', function () {
    $result = (new CreateProjectAction)->execute($this->data);

    expect($result)->toBeInstanceOf(Project::class);
    expect($result)
        ->name->toBe($this->data['name'])
        ->pretty_url->toBe($this->data['pretty_url'])
        ->visible->toBe($this->data['visible']);
});

it('stores the data', function () {
    (new CreateProjectAction)->execute($this->data);

    $this->assertDatabaseHas(
        table: Project::class,
        data: $this->data,
    );
});
