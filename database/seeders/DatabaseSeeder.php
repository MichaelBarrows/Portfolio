<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(SiteSettings::class);
        $this->call(EducationSeeder::class);
        $this->call(ProjectsSeeder::class);
        $this->call(TechStackSeeder::class);
        $this->call(ProjectTechStackSeeder::class);
        $this->call(ProjectTextsSeeder::class);
        $this->call(ProjectLinksSeeder::class);
        $this->call(ProjectImagesSeeder::class);
    }
}
