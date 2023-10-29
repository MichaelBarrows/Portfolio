<?php

namespace Database\Seeders\Projects;

use App\Enums\TechStack;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencyConverterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $project = Project::create([
            'name' => 'Currency Converter',
            'pretty_url' => 'mcomp-currency-converter',
            'fa_icon_logo' => 'fa-dollar-sign',
            'tech_stack' => [
                TechStack::JAVASCRIPT,
                TechStack::JQUERY,
                TechStack::API,
            ],
        ]);

        /**
         * Content
         */
        DB::table('project_texts')->insert([
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 1,
                'text' => "This project was completed as part of the MComp Web Design and Development course at Edge Hill University.",
            ],
            [
                'project_id' => $project->id,
                'format' => 'heading',
                'order' => 2,
                'text' => "Scenario",
            ],
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 3,
                'text' => "The scenario for this assignment was that a self-contained currency converter needed to be constructed, that could be added to a website. The currency converter had to obtain the current exchange rates and be responsive. The styling of the currency converter was not to be a major consideration; however, it should be assumed that this would be added to doggiegadgets.com for customers to use.",
            ],
            [
                'project_id' => $project->id,
                'format' => 'heading',
                'order' => 4,
                'text' => "Summary",
            ],
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 5,
                'text' => "The currency converter was created as a standalone application and was designed specifically for mobile as it would be used as a widget. The currency converter gets the current exchange rates and converts to the five most popular currencies (as of April 2018). A webpage for a product from doggiegadgets.com was downloaded and the currency converter was implemented into it.",
            ],
            [
                'project_id' => $project->id,
                'format' => 'heading',
                'order' => 6,
                'text' => "Standalone Implementation",
            ],
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 7,
                'text' => "The currency converter was created using JavaScript, JQuery, Sass and HTML5. It was built in an object-oriented manner and converts amounts to the US Dollar, Euro, Japanese Yen, Australian Dollar and the Canadian Dollar. The exchange rates were obtained from <a href=\"https://fixer.io/\" target=\"_blank\">fixer.io</a>; this API was deprecated after this assignment was completed so the API was switched to <a href=\"http://exchangeratesapi.io/\" target=\"_blank\">exchangeratesapi.io</a>. The new API works identically to the old one so only the URL needed changing within the code. The currency converter also contains the flags for the relevant institution that the currency belongs to. Within the standalone currency converter, the exchange rate is shown beneath the conversion.",
            ],
            [
                'project_id' => $project->id,
                'format' => 'heading',
                'order' => 8,
                'text' => "Doggiegadgets.com Implementation",
            ],
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 9,
                'text' => "The currency converter was implemented in a webpage from doggiegadgets.com, however rather than integrate it as a standalone widget, it uses the prices in the page to complete the conversion. The page contains a retail price which has a line through it and a sale price. When a currency is selected, both of these prices are converted using the converter and the prices are updated to reflect the new currency. An additional feature of the website implementation is that the prices can be changed back to GBP. Other than these additional features, the implementation is identical to that of the standalone currency converter.",
            ],
        ]);

        /**
         * Links
         */
        DB::table('project_links')->insert([
            [
                'project_id' => $project->id,
                'name' => 'currency converter github',
                'text' => 'View Code',
                'icon' => json_encode(['fab', 'fa-github']),
                'link' => 'https://github.com/MichaelBarrows/CurrencyConverter',
            ],
        ]);
    }
}
