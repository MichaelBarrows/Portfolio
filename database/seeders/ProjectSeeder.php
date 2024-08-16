<?php

namespace Database\Seeders;

use App\Enums\TechStack;
use App\Models\Project;
use App\Models\ProjectLink;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Http::acceptJson()
            ->get('https://api.michaelbarrows.com/project')
            ->collect('data')
            ->reverse()
            ->each(function ($record) {
                unset($record['id']);

                $record['tech_stack'] = collect($record['tech_stack'])
                    ->map(fn ($ts) => TechStack::tryFrom($ts['id']));

                $links = collect($record['links']);
                unset($record['links']);

                $project = Project::factory()->create($record);

                $links->each(fn ($link) => ProjectLink::factory()->for($project)->create($link));
            });

    }
}
