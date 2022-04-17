<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TechStackSeeder extends Seeder
{
    public function run()
    {
        DB::table('tech_stacks')->insert([
            [
                'id' => 1,
                'name' => 'HTML5',
                'identifier' => 'html5',
                'is_long' => 0,
            ],
            [
                'id' => 2,
                'name' => 'CSS',
                'identifier' => 'css',
                'is_long' => 0,
            ],
            [
                'id' => 3,
                'name' => 'Sass',
                'identifier' => 'sass',
                'is_long' => 0,
            ],
            [
                'id' => 4,
                'name' => 'JavaScript',
                'identifier' => 'javascript',
                'is_long' => 1,
            ],
            [
                'id' => 5,
                'name' => 'JQuery',
                'identifier' => 'jquery',
                'is_long' => 0,
            ],
            [
                'id' => 6,
                'name' => 'Vue',
                'identifier' => 'vue',
                'is_long' => 0,
            ],
            [
                'id' => 7,
                'name' => 'PHP',
                'identifier' => 'php',
                'is_long' => 0,
            ],
            [
                'id' => 8,
                'name' => 'Laravel',
                'identifier' => 'laravel',
                'is_long' => 0,
            ],
            [
                'id' => 9,
                'name' => 'Python',
                'identifier' => 'python',
                'is_long' => 0,
            ],
            [
                'id' => 10,
                'name' => 'Natural Language Processing',
                'identifier' => 'natural-language-processing',
                'is_long' => 1,
            ],
            [
                'id' => 11,
                'name' => 'Machine Learning',
                'identifier' => 'machine-learning',
                'is_long' => 1,
            ],
            [
                'id' => 12,
                'name' => 'API',
                'identifier' => 'api',
                'is_long' => 0,
            ],
            [
                'id' => 13,
                'name' => 'Flask',
                'identifier' => 'flask',
                'is_long' => 0,
            ],
        ]);
    }
}
