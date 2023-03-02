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
                'title' => 'Junior PHP Developer',
                'company' => 'Accu Limited',
                'start_date' => 'March 2021',
                'end_date' => 'December 2021',
            ],
            [
                'title' => 'Software Engineer',
                'company' => 'Accu Limited',
                'start_date' => 'December 2021',
                'end_date' => 'August 2022',
            ],
            [
                'title' => 'PHP Developer',
                'company' => 'Toolstation',
                'start_date' => 'August 2022',
                'end_date' => 'Present',
            ],
        ]);
    }
}
