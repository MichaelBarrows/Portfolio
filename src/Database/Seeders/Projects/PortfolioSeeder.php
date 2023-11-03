<?php

namespace MichaelBarrows\Portfolio\Database\Seeders\Projects;

use Illuminate\Support\Facades\DB;
use MichaelBarrows\Portfolio\Enums\TechStack;
use MichaelBarrows\Portfolio\Models\Project;

class PortfolioSeeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $project = Project::create([
            'name' => 'Portfolio Website',
            'pretty_url' => 'portfolio-website',
            'fa_icon_logo' => null,
            'tech_stack' => [
                TechStack::JAVASCRIPT,
                TechStack::VUE,
                TechStack::NUXT,
                TechStack::API,
                TechStack::PHP,
                TechStack::LARAVEL,
            ],
        ]);

        /**
         * Content
         */
        DB::connection('portfolio')->table('project_texts')->insert([
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 1,
                'text' => "Content coming soon.",
            ],
        ]);

        /**
         * Links
         */
        DB::connection('portfolio')->table('project_links')->insert([
            [
                'project_id' => $project->id,
                'name' => 'portfolio github',
                'text' => 'View API Code',
                'icon' => json_encode(['fab', 'fa-github']),
                'link' => 'https://github.com/MichaelBarrows/Portfolio-API',
            ],
            [
                'project_id' => $project->id,
                'name' => 'portfolio github',
                'text' => 'View Nuxt Code',
                'icon' => json_encode(['fab', 'fa-github']),
                'link' => 'https://github.com/MichaelBarrows/Portfolio-Vue',
            ],
        ]);
    }
}
