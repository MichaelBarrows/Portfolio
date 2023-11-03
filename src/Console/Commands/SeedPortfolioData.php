<?php

namespace MichaelBarrows\Portfolio\Console\Commands;

use Illuminate\Console\Command;
use MichaelBarrows\Portfolio\Database\Seeders\EducationSeeder;
use MichaelBarrows\Portfolio\Database\Seeders\EmploymentSeeder;
use MichaelBarrows\Portfolio\Database\Seeders\Projects\CurrentlyPlayingSeeder;
use MichaelBarrows\Portfolio\Database\Seeders\Projects\DeviceInventoryManagerSeeder;
use MichaelBarrows\Portfolio\Database\Seeders\Projects\GradeCalcSeeder;
use MichaelBarrows\Portfolio\Database\Seeders\Projects\KeywordExtractorApiSeeder;
use MichaelBarrows\Portfolio\Database\Seeders\Projects\MCompDissertationSeeder;
use MichaelBarrows\Portfolio\Database\Seeders\Projects\MCompSentimentAnalysisSeeder;
use MichaelBarrows\Portfolio\Database\Seeders\Projects\MResEmotionDetectionSeeder;
use MichaelBarrows\Portfolio\Database\Seeders\Projects\MResSentimentAnalysisSeeder;
use MichaelBarrows\Portfolio\Database\Seeders\Projects\PortfolioSeeder;

class SeedPortfolioData extends Command
{
    protected $signature = 'portfolio:seed';

    protected $description = 'Seed Portfolio data';

    private array $tableOutput = [];

    public function handle()
    {
        $this->seed(EducationSeeder::class);
        $this->seed(EmploymentSeeder::class);
        $this->seedProjects();

        $this->output->table(['Seeder'], $this->tableOutput);
    }

    private function seed(string $class): void
    {
        $this->output->info('seeding '. $class);
        (new $class())->run();
        $this->tableOutput[] = [$class];
    }

    private function seedProjects()
    {
        $classes = [
            MCompSentimentAnalysisSeeder::class,
            KeywordExtractorApiSeeder::class,
            MCompDissertationSeeder::class,
            DeviceInventoryManagerSeeder::class,
            MResSentimentAnalysisSeeder::class,
            MResEmotionDetectionSeeder::class,
            PortfolioSeeder::class,
            GradeCalcSeeder::class,
            CurrentlyPlayingSeeder::class,
        ];

        foreach ($classes as $seeder) {
            $this->seed($seeder);
        }
    }
}
