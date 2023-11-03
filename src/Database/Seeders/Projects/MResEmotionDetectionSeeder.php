<?php

namespace MichaelBarrows\Portfolio\Database\Seeders\Projects;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use MichaelBarrows\Portfolio\Enums\TechStack;
use MichaelBarrows\Portfolio\Models\Project;

class MResEmotionDetectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $project = Project::create([
            'name' => 'Emotion Detection (Iranian Propaganda)',
            'pretty_url' => 'mres-project-emotion-detection-iranian-propaganda',
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
                'text' => "This project was completed as part of the MRes Technology (Computer Science) course at the University of Portsmouth.",
            ],
            [
                'project_id' => $project->id,
                'format' => 'heading',
                'order' => 2,
                'text' => "Summary",
            ],
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 3,
                'text' => "This project labelled Iranian state-sponsored propaganda tweets for their emotion automatically and evaluated the ability for five machine learning algorithms to accurately classify the emotion in the tweets.",
            ],
            [
                'project_id' => $project->id,
                'format' => 'heading',
                'order' => 4,
                'text' => "The Data",
            ],
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 5,
                'text' => "This project used tweets from Twitter's election integrity datasets. These datasets consist of tweets from accounts that have been permanently suspended from the Twitter platform as they were identified as belonging to state-sponsored actors and pushed narratives on their behalf.",
            ],
            [
                'project_id' => $project->id,
                'format' => 'heading',
                'order' => 6,
                'text' => "Data Extraction",
            ],
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 7,
                'text' => "This project was performed on tweets about the Iranian nuclear deal (JCPOA) as it was an internationally controversial issue, that Iran would likely be spreading propaganda about. To extract tweets about the nuclear deal, several keyterms were used (see <a href=\"https://github.com/MichaelBarrows/NuclearDealTweetExtraction/blob/master/original_keywords.csv\" target=\"_blank\">here</a>).",
            ],
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 8,
                'text' => "These keyterms were chosen after analysting the most frequent terms per month across the three (at the time) Iranian releases. Additionally, the extracted tweets were restricted to English and published between August 2013 and December 2018. Retweets were excluded to prevent the machine learning algorithms from developing a bias towards tweets that appear often as retweets.",
            ],
            [
                'project_id' => $project->id,
                'format' => 'heading',
                'order' => 9,
                'text' => "Preprocessing",
            ],
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 10,
                'text' => "To prepare the tweets for labelling, steps were taken to transform the text in order to achieve the best possible results. These steps included: lowercase conversion, normalising accented letters, removing usernames, transforming hashtags, removing URL's, expanding contractions, removing special characters and removing stopwords. These steps were taken to improve the chance of matching words between the lexicon and the tweets, and to speed up processing.",
            ],
            [
                'project_id' => $project->id,
                'format' => 'heading',
                'order' => 11,
                'text' => "Emotion Labelling",
            ],
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 12,
                'text' => "To label the tweets for their emotions, the <a href=\"https://saifmohammad.com/WebPages/NRC-Emotion-Lexicon.htm\" target=\"_blank\">NRC Emotion Lexicon</a> was used. This lexicon covers 8 emotions: anger, anticipation, disgust, fear, joy, sadness, surprise and trust.",
            ],
            [
                'project_id' => $project->id,
                'format' => 'heading',
                'order' => 13,
                'text' => "Emotion Detection (Machine Learning Task)",
            ],
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 14,
                'text' => "The machine learning task of emotion detection was split into a series of binary tasks. This meant that experiments were conducted to detect the presence or absence of a specific emotion. The machine learning tasks were performed on all emotions and across 5 features: unigrams, bigrams, trigrams, unigrams + bigrams, unigrams + bigrams + trigrams. The 5 algorithms used for these experiments were: K-Nearest Neighbours, Decision Tree, Naive Bayes, Support Vector Machine (with a linear kernel), and Random Forest.",
            ],
            [
                'project_id' => $project->id,
                'format' => 'heading',
                'order' => 15,
                'text' => "Results",
            ],
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 16,
                'text' => "Not yet available.",
            ],
        ]);

        /**
         * Links
         */
        DB::connection('portfolio')->table('project_links')->insert([
            [
                'project_id' => $project->id,
                'name' => 'SAED extraction code',
                'text' => 'View Extraction Code',
                'icon' => json_encode(['fab', 'fa-github']),
                'link' => 'https://github.com/MichaelBarrows/NuclearDealTweetExtraction',
            ],
            [
                'project_id' => $project->id,
                'name' => 'SAED preprocessing code',
                'text' => 'View Preprocessing Code',
                'icon' => json_encode(['fab', 'fa-github']),
                'link' => 'https://github.com/MichaelBarrows/NuclearDealPreprocessing',
            ],
            [
                'project_id' => $project->id,
                'name' => 'ED labelling code',
                'text' => 'View Labelling Code',
                'icon' => json_encode(['fab', 'fa-github']),
                'link' => 'https://github.com/MichaelBarrows/EmotionLabelling',
            ],
            [
                'project_id' => $project->id,
                'name' => 'ED ML code',
                'text' => 'View Machine Learning Code',
                'icon' => json_encode(['fab', 'fa-github']),
                'link' => 'https://github.com/MichaelBarrows/EmotionDetection',
            ],
        ]);
    }
}
