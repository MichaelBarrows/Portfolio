<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectLinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_links')->insert([
            [
                'project_id' => 1,
                'name' => 'portfolio github',
                'text' => 'View Code',
                'icon' => 'fab fa-github',
                'link' => 'https://github.com/MichaelBarrows/PortfolioV3',
            ],
            [
                'project_id' => 4,
                'name' => 'gradecalc website',
                'text' => 'View Project',
                'icon' => 'fas fa-external-link-alt',
                'link' => 'https://www.gradecalc.co.uk',
            ],
            [
                'project_id' => 4,
                'name' => 'gradecalc github',
                'text' => 'View Code',
                'icon' => 'fab fa-github',
                'link' => 'https://github.com/MichaelBarrows/GradeCalcV2',
            ],
            [
                'project_id' => 5,
                'name' => 'device inventory manager github',
                'text' => 'View Code',
                'icon' => 'fab fa-github',
                'link' => 'https://github.com/MichaelBarrows/DeviceInventoryManager',
            ],
            [
                'project_id' => 6,
                'name' => 'chatbot project',
                'text' => 'View Chatbot',
                'icon' => 'fas fa-external-link-alt',
                'link' => 'https://projects.michaelbarrows.co.uk/dissertation/chat',
            ],
            [
                'project_id' => 6,
                'name' => 'FAQs project',
                'text' => "View FAQ's Website",
                'icon' => 'fas fa-external-link-alt',
                'link' => 'https://projects.michaelbarrows.co.uk/dissertation/faqs',
            ],
            [
                'project_id' => 6,
                'name' => 'dissertation github',
                'text' => 'View Code',
                'icon' => 'fab fa-github',
                'link' => 'https://github.com/MichaelBarrows/CSFreshersChatbot',
            ],
            [
                'project_id' => 7,
                'name' => 'keyword extractor github',
                'text' => 'View Code',
                'icon' => 'fab fa-github',
                'link' => 'https://github.com/MichaelBarrows/KeywordExtractor',
            ],
            [
                'project_id' => 8,
                'name' => 'amazon sent github',
                'text' => 'View Code',
                'icon' => 'fab fa-github',
                'link' => 'https://github.com/MichaelBarrows/AmazonSentimentAnalysis',
            ],
            [
                'project_id' => 9,
                'name' => 'currency converter website',
                'text' => 'View Project',
                'icon' => 'fas fa-external-link-alt',
                'link' => 'https://projects.michaelbarrows.co.uk/currency-converter/',
            ],
            [
                'project_id' => 9,
                'name' => 'currency converter github',
                'text' => 'View Code',
                'icon' => 'fab fa-github',
                'link' => 'https://github.com/MichaelBarrows/CurrencyConverter',
            ],
            // [
            //     'project_id' => ,
            //     'name' => '',
            //     'text' => '',
            //     'icon' => '',
            //     'link' => '',
            // ],
            // [
            //     'project_id' => ,
            //     'name' => '',
            //     'text' => '',
            //     'icon' => '',
            //     'link' => '',
            // ],
            // [
            //     'project_id' => ,
            //     'name' => '',
            //     'text' => '',
            //     'icon' => '',
            //     'link' => '',
            // ],
        ]);
    }
}
