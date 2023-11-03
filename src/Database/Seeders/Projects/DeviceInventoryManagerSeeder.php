<?php

namespace MichaelBarrows\Portfolio\Database\Seeders\Projects;

use Illuminate\Support\Facades\DB;
use MichaelBarrows\Portfolio\Enums\TechStack;
use MichaelBarrows\Portfolio\Models\Project;

class DeviceInventoryManagerSeeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $project = Project::create([
            'name' => 'Device Inventory Manager',
            'pretty_url' => 'device-inventory-manager',
            'fa_icon_logo' => null,
            'tech_stack' => [
                TechStack::JAVASCRIPT,
                TechStack::JQUERY,
                TechStack::PHP,
                TechStack::LARAVEL,
                TechStack::API,
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
                'name' => 'device inventory manager github',
                'text' => 'View Code',
                'icon' => json_encode(['fab', 'fa-github']),
                'link' => 'https://github.com/MichaelBarrows/DeviceInventoryManager',
            ],
        ]);
    }
}
