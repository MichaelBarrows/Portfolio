<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectTechStackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_tech_stack')->insert([
            [
                'project_id' => 1,
                'tech_stack_id' => 1,
            ],
            [
                'project_id' => 1,
                'tech_stack_id' => 2,
            ],
            [
                'project_id' => 1,
                'tech_stack_id' => 3,
            ],
            [
                'project_id' => 1,
                'tech_stack_id' => 4,
            ],
            [
                'project_id' => 1,
                'tech_stack_id' => 5,
            ],
            [
                'project_id' => 1,
                'tech_stack_id' => 6,
            ],
            [
                'project_id' => 1,
                'tech_stack_id' => 7,
            ],
            [
                'project_id' => 2,
                'tech_stack_id' => 8,
            ],
            [
                'project_id' => 2,
                'tech_stack_id' => 9,
            ],
            [
                'project_id' => 2,
                'tech_stack_id' => 10,
            ],
            [
                'project_id' => 3,
                'tech_stack_id' => 8,
            ],
            [
                'project_id' => 3,
                'tech_stack_id' => 9,
            ],
            [
                'project_id' => 3,
                'tech_stack_id' => 10,
            ],
            [
                'project_id' => 4,
                'tech_stack_id' => 1,
            ],
            [
                'project_id' => 4,
                'tech_stack_id' => 2,
            ],
            [
                'project_id' => 4,
                'tech_stack_id' => 3,
            ],
            [
                'project_id' => 4,
                'tech_stack_id' => 4,
            ],
            [
                'project_id' => 4,
                'tech_stack_id' => 5,
            ],
            [
                'project_id' => 4,
                'tech_stack_id' => 6,
            ],
            [
                'project_id' => 4,
                'tech_stack_id' => 7,
            ],
            [
                'project_id' => 5,
                'tech_stack_id' => 4,
            ],
            [
                'project_id' => 5,
                'tech_stack_id' => 5,
            ],
            [
                'project_id' => 5,
                'tech_stack_id' => 6,
            ],
            [
                'project_id' => 5,
                'tech_stack_id' => 7,
            ],
            [
                'project_id' => 5,
                'tech_stack_id' => 11,
            ],
            [
                'project_id' => 6,
                'tech_stack_id' => 1,
            ],
            [
                'project_id' => 6,
                'tech_stack_id' => 2,
            ],
            [
                'project_id' => 6,
                'tech_stack_id' => 3,
            ],
            [
                'project_id' => 6,
                'tech_stack_id' => 4,
            ],
            [
                'project_id' => 6,
                'tech_stack_id' => 5,
            ],
            [
                'project_id' => 6,
                'tech_stack_id' => 6,
            ],
            [
                'project_id' => 6,
                'tech_stack_id' => 7,
            ],
            [
                'project_id' => 6,
                'tech_stack_id' => 11,
            ],
            [
                'project_id' => 7,
                'tech_stack_id' => 8,
            ],
            [
                'project_id' => 7,
                'tech_stack_id' => 9,
            ],
            [
                'project_id' => 7,
                'tech_stack_id' => 11,
            ],
            [
                'project_id' => 8,
                'tech_stack_id' => 8,
            ],
            [
                'project_id' => 8,
                'tech_stack_id' => 9,
            ],
            [
                'project_id' => 8,
                'tech_stack_id' => 10,
            ],
            [
                'project_id' => 9,
                'tech_stack_id' => 1,
            ],
            [
                'project_id' => 9,
                'tech_stack_id' => 2,
            ],
            [
                'project_id' => 9,
                'tech_stack_id' => 3,
            ],
            [
                'project_id' => 9,
                'tech_stack_id' => 4,
            ],
            [
                'project_id' => 9,
                'tech_stack_id' => 5,
            ],
            [
                'project_id' => 9,
                'tech_stack_id' => 11,
            ],
        ]);
    }
}
