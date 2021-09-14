<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(SiteSettings::class);
        $this->call(EducationSeeder::class);
        $this->call(EmploymentSeeder::class);
        $this->call(ProjectsSeeder::class);
        $this->call(TechStackSeeder::class);
        $this->call(ProjectTechStackSeeder::class);
        $this->call(ProjectTextsSeeder::class);
        $this->call(ProjectLinksSeeder::class);
        $this->call(ProjectImagesSeeder::class);
    }
}
