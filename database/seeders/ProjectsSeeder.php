<?php

namespace Database\Seeders;

use Database\Seeders\Projects\CurrencyConverterSeeder;
use Database\Seeders\Projects\CurrentlyPlayingSeeder;
use Database\Seeders\Projects\DeviceInventoryManagerSeeder;
use Database\Seeders\Projects\FusionSeeder;
use Database\Seeders\Projects\GradeCalcSeeder;
use Database\Seeders\Projects\KeywordExtractorApiSeeder;
use Database\Seeders\Projects\MCompDissertationSeeder;
use Database\Seeders\Projects\MCompSentimentAnalysisSeeder;
use Database\Seeders\Projects\MResEmotionDetectionSeeder;
use Database\Seeders\Projects\MResSentimentAnalysisSeeder;
use Database\Seeders\Projects\PortfolioSeeder;
use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    public function run()
    {
        // $this->call(CurrencyConverterSeeder::class);
        $this->call(MCompSentimentAnalysisSeeder::class);
        $this->call(KeywordExtractorApiSeeder::class);
        $this->call(MCompDissertationSeeder::class);
        $this->call(DeviceInventoryManagerSeeder::class);
        $this->call(MResSentimentAnalysisSeeder::class);
        $this->call(MResEmotionDetectionSeeder::class);
        $this->call(PortfolioSeeder::class);
        $this->call(GradeCalcSeeder::class);
        $this->call(CurrentlyPlayingSeeder::class);
    }
}
