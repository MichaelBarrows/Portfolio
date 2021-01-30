<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationProjectsPivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('education_project')->insert([
            ['id' => 1,
             'education_id' => 1,
             'project_id' => 1,
            ],
            ['id' => 2,
             'education_id' => 1,
             'project_id' => 2,
            ],
            ['id' => 3,
             'education_id' => 2,
             'project_id' => 3,
            ],
        ]);
    }
}
