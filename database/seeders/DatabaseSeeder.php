<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            SettingSeeder::class,
            EducationSeeder::class,
            EmploymentSeeder::class,
            ProjectSeeder::class,
            UserSeeder::class,
        ]);
    }
}
