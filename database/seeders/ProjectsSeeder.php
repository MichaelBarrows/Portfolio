<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            ['id' => 1,
             'name' => 'Portfolio Website',
             'pretty_url' => 'portfolio-website',
             'short_description' => 'Portfolio Website',
             'long_description' => '',
             'image' => null,
             'text_logo' => 'MB',
             'fa_icon_logo' => null,
            ],
            ['id' => 2,
             'name' => 'Emotion Detection (Iranian Propaganda)',
             'pretty_url' => 'mres-project-emotion-detection-iranian-propaganda',
             'short_description' => '',
             'long_description' => '',
             'image' => null,
             'text_logo' => null,
             'fa_icon_logo' => 'fa-search',
            ],
            ['id' => 3,
             'name' => 'Sentiment Analysis (Iranian Propaganda)',
             'pretty_url' => 'mres-project-sentiment-analysis-iranian-propaganda',
             'short_description' => '',
             'long_description' => '',
             'image' => null,
             'text_logo' => null,
             'fa_icon_logo' => 'fa-search',
            ],
            ['id' => 4,
             'name' => 'Grade Calc',
             'pretty_url' => 'grade-calc',
             'short_description' => '',
             'long_description' => '',
             'image' => null,
             'text_logo' => null,
             'fa_icon_logo' => 'fa-graduation-cap',
            ],
            ['id' => 5,
             'name' => 'Device Inventory Manager',
             'pretty_url' => 'device-inventory-manager',
             'short_description' => '',
             'long_description' => '',
             'image' => null,
             'text_logo' => null,
             'fa_icon_logo' => null,
            ],
            ['id' => 6,
             'name' => "Freshers Chatbot & FAQ's Website",
             'pretty_url' => 'mcomp-project-chatbot-faqs',
             'image' => null,
             'text_logo' => null,
             'fa_icon_logo' => 'fa-comment-dots',
             'short_description' => '',
             'long_description' => "",
            ],
            ['id' => 7,
             'name' => 'Keyword Extractor API',
             'pretty_url' => 'mcomp-project-keyword-extractor-api',
             'short_description' => '',
             'long_description' => '',
             'image' => null,
             'text_logo' => null,
             'fa_icon_logo' => null,
            ],
            ['id' => 8,
             'name' => 'Sentiment Analysis - Amazon Reviews',
             'pretty_url' => 'mcomp-sentiment-analysis-amazon-reviews',
             'short_description' => '',
             'long_description' => '',
             'image' => null,
             'text_logo' => null,
             'fa_icon_logo' => 'fa-search',
            ],
            ['id' => 9,
             'name' => 'Currency Converter',
             'pretty_url' => 'mcomp-currency-converter',
             'short_description' => '',
             'long_description' => '',
             'image' => null,
             'text_logo' => null,
             'fa_icon_logo' => 'fa-dollar-sign',
            ],
        ]);
    }
}
