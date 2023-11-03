<?php

namespace MichaelBarrows\Portfolio\Database\Seeders\Projects;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use MichaelBarrows\Portfolio\Enums\TechStack;
use MichaelBarrows\Portfolio\Models\Project;

class GradeCalcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $project = Project::create([
            'name' => 'GradeCalc',
            'pretty_url' => 'gradecalc',
            'fa_icon_logo' => 'fa-graduation-cap',
            'tech_stack' => [
                TechStack::JAVASCRIPT,
                TechStack::JQUERY,
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
                'format' => 'heading',
                'order' => 1,
                'text' => "Summary",
            ],
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 2,
                'text' => "A website for calculating university grades (module, year, undergraduate degree, integrated master's degree, and master's degree). In the last year, 2 million calculations have been performed on the website, making it a popular choice for university students today.",
            ],
            [
                'project_id' => $project->id,
                'format' => 'heading',
                'order' => 3,
                'text' => "Why?",
            ],
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 4,
                'text' => "This grade calculator was created to make calculating university grades easier. Weighted grades are difficult to calculate mentally, and the formula for performing the calculations can be difficult to remember.",
            ],
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 5,
                'text' => "After university, it became a project that I could tinker with to explore new PHP/Laravel features, and develop my understanding of software development practices. As it gained popularity, it developed its own set of problems around performance and the database, which allowed me to find real solutions to real problems for real users.",
            ],
            [
                'project_id' => $project->id,
                'format' => 'heading',
                'order' => 6,
                'text' => "Version 1",
            ],
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 7,
                'text' => "Version 1 was created between my second and third years of university (2017). The initial version used a small portion of the screen on desktop, and included calculators for module and year.",
            ],
            [
                'project_id' => $project->id,
                'format' => 'heading',
                'order' => 8,
                'text' => "Version 2",
            ],
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 9,
                'text' => "Version 2 was created in 2020 and uses much of the same code as version 1. Version 2 was developed using Laravel and allowed users to sign up and store their grades.",
            ],
            [
                'project_id' => $project->id,
                'format' => 'heading',
                'order' => 10,
                'text' => "Version 3",
            ],
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 11,
                'text' => "Version 3 provided a much needed face lift, and removed the need to sign up to save a grade. Users can now generate save their grades and retrieve them using a link.",
            ],
            [
                'project_id' => $project->id,
                'format' => 'heading',
                'order' => 12,
                'text' => "Architecture",
            ],
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 13,
                'text' => "As the website has existed for around 6 years, its underlying technology has changed quite a lot. These days, the backend uses Laravel 10. While the backend is modern, the same jQuery for the inital calculators built in 2017 is still in use today.",
            ],
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 14,
                'text' => "The majority of the more complex admin functionality has been moved to a new separate project, so the project itself is relatively simple. Queued jobs are used to generate metrics on usage, and internal API functionality using Sanctum allows the new project to retrieve this data.",
            ],
        ]);

        /**
         * Links
         */
        DB::connection('portfolio')->table('project_links')->insert([
            [
                'project_id' => $project->id,
                'name' => 'gradecalc v2 website',
                'text' => 'View Project',
                'icon' => json_encode(['fas', 'fa-external-link-alt']),
                'link' => 'https://gradecalc.co.uk',
            ],
        ]);
    }
}
