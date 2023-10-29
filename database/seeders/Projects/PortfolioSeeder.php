<?php

namespace Database\Seeders\Projects;

use App\Enums\TechStack;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortfolioSeeder extends Seeder
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
        DB::table('project_texts')->insert([
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
        DB::table('project_links')->insert([
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
