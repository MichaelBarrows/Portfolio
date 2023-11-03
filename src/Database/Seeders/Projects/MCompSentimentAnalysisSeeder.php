<?php

namespace MichaelBarrows\Portfolio\Database\Seeders\Projects;

use Illuminate\Support\Facades\DB;
use MichaelBarrows\Portfolio\Enums\TechStack;
use MichaelBarrows\Portfolio\Models\Project;

class MCompSentimentAnalysisSeeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $project = Project::create([
            'name' => 'Sentiment Analysis - Amazon Reviews',
            'pretty_url' => 'mcomp-sentiment-analysis-amazon-reviews',
            'fa_icon_logo' => 'fa-search',
            'tech_stack' => [
                TechStack::PYTHON,
                TechStack::ML,
                TechStack::NLP,
            ],
        ]);

        /**
         * Content
         */
        DB::connection('portfolio')->table('project_texts')->insert([
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
                'text' => "The scenario for this project was that a company was going to invest in a company that makes apps that are distributed via Amazon. The company wanted to identify the best company to invest in using machine learning to analyse the sentiment of a dataset of Amazon product reviews. Each of the three companies had three apps. The dataset consisted of 20,000 reviews for training the machine learning algorithms and 20,000 reviews to test the algorithms predictions; each row in the dataset consisted of a product ID, the sentiment score and the text of the product review. My task was to identify the best algorithm to complete the task, implement it and identify the best company for investment according to the predictions made by the best algorithm.",
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
                'text' => "The six machine learning algorithms which were evaluated included Linear Support Vector Machine (Linear SVM), Feed Forward Neural Network, Naïve Bayes, Random Forest, ID3 Decision Tree and K-Nearest Neighbours. The modifier values for each algorithm were experimented with on a trial and error basis, and a total of 72 experiments were completed with the six algorithms and their various modifiers. The performance of the algorithms was evaluated using the f-score, precision and recall. Once complete, the company scores would be calculated using the best algorithms predictions and a company would be identified as being the best for investment.",
            ],
            [
                'project_id' => $project->id,
                'format' => 'heading',
                'order' => 6,
                'text' => "Implementation",
            ],
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 7,
                'text' => "The implementation was completed using Python's Scikit Learn package. Each word of each review was used as a feature (bag of words) and the matrix of features created for the training dataset was used to train the algorithm. Each algorithm was then implemented with its various modifier values, with K-NN being used as the baseline for which all other results were compared. All predictions were then pulled together into a single table and the results were sorted. Graphs were automatically created and stored for each algorithm showing the performance. The best predictions for each algorithm were stored in CSV files to be used later. A table was also created automatically in the LaTeX format to be inserted into the report. After the algorithm evaluation was complete, company analysis commenced.",
            ],
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 8,
                'text' => "The company analysis was completed by counting the number of predicted neutral, positive and negative reviews across all applications belonging to the company. The positive and negative review counts were weighted to be worth twice that of the neutral reviews. This was calculated as:",
            ],
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 9,
                'text' => "Score = (Neutral + (Positive * 2) – (Negative * 2)) / 2",
            ],
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 10,
                'text' => "The best company for investment was the company with the highest score.",
            ],
            [
                'project_id' => $project->id,
                'format' => 'heading',
                'order' => 11,
                'text' => "Results",
            ],
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 12,
                'text' => "The best (highest f-score) algorithm for the sentiment analysis of the reviews was the Linear SVM algorithm (C value = 0.03) with an f-score of 0.779. This application also managed to identify the best company for investment which was Company 2. The algorithm evaluation was completed in a way so that the script could be run and all of the 72 experiments would run in turn with the graphs and other files being created without any intervention required.",
            ],
        ]);

        /**
         * Links
         */
        DB::connection('portfolio')->table('project_links')->insert([
            [
                'project_id' => $project->id,
                'name' => 'amazon sent github',
                'text' => 'View Code',
                'icon' => json_encode(['fab', 'fa-github']),
                'link' => 'https://github.com/MichaelBarrows/AmazonSentimentAnalysis',
            ],
        ]);
    }
}
