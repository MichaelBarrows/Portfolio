<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(EducationSeeder::class);
        $this->call(EmploymentSeeder::class);
        $this->call(ProjectsSeeder::class);
    }
}
