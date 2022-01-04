<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmploymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employments')->insert([
            [
                'title' => 'PHP Developer',
                'company' => 'Accu Limited',
                'start_date' => 'December 2021',
                'end_date' => 'Present',
                'description' => '',
            ],
            [
                'title' => 'Junior PHP Developer',
                'company' => 'Accu Limited',
                'start_date' => 'March 2021',
                'end_date' => 'December 2021',
                'description' => '',
            ],
        ]);
    }
}
