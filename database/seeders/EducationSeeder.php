<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('education')->insert([
            ['id' => 1,
             'institution_name' => 'University of Portsmouth',
             'course_name' => 'MRes Technology (Computer Science)',
             'grade' => 'Distinction [to be awarded]',
             'start_date' => 'January 2020',
             'end_date' => 'January 2021',
             'description' => '',
             'project_title' => 'Automatic sentiment and emotion labelling of Iranian state-sponsored propaganda tweets and ',
            ],
            ['id' => 2,
            'institution_name' => 'Edge Hill University',
            'course_name' => 'MComp Web Design and Development',
            'grade' => '2.1',
            'start_date' => 'September 2015',
            'end_date' => 'July 2019',
            'description' => '',
            'project_title' => 'A chatbot to facilitate new undergraduate Computer Science students’ transition to university: is it technically feasible and would students find it useful?',
            ],
            ['id' => 3,
            'institution_name' => 'Colchester Institute',
            'course_name' => 'BTEC Level 3 Extended Diploma in IT',
            'grade' => 'Distinction x3',
            'start_date' => 'September 2012',
            'end_date' => 'June 2014',
            'description' => '',
            'project_title' => null,
            ],
        ]);
    }
}
