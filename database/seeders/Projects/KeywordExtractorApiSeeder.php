<?php

namespace Database\Seeders\Projects;

use App\Enums\TechStack;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeywordExtractorApiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $project = Project::create([
            'name' => 'Keyword Extractor API',
            'pretty_url' => 'mcomp-project-keyword-extractor-api',
            'fa_icon_logo' => null,
            'tech_stack' => [
                TechStack::PYTHON,
                TechStack::API,
                TechStack::FLASK,
                TechStack::NLP,
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
                'text' => "Summary",
            ],
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 3,
                'text' => "The Keyword Extractor API is used to extract keywords from some text. The API was developed using Python's Flask framework and uses part-of-speech (POS) tagging to tag each word in a query and returns the words whose POS tags match the rules provided prior (nouns [singular, plural and mass], proper nouns [singular], verbs and adjectives).",
            ],
            [
                'project_id' => $project->id,
                'format' => 'heading',
                'order' => 4,
                'text' => "Problem",
            ],
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 5,
                'text' => "The problem encountered which inspired this project was encountered while developing the chatbot for my dissertation project. The chatbot was comparing every word in the user's query with every word in each question, including conjunctions which do not add meaning to a query, and appear in almost every question in the dataset. This was impacting upon the performance of the chatbot as it was making many unnecessary comparisons; the accuracy of the chatbot was also impaired, as one extra 'and' in a question could make the difference between the chatbot selecting one question over another.",
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
                'text' => "From the outset, it was decided that the solution would be built using Python, as I have experience of using the Natural Language Toolkit package in Python. As the chatbot is written in PHP, the keyword extractor had to built as an API so that the languages would not be a barrier to implementation. Flask was used because it is simple to develop API's, and this project was only going to be a small part of my dissertation project. The POS tags used as rules were identified using a trial and error approach; 6 random questions were POS tagged to identify which tag they contained. The POS tags of words that added meaning to the question were added to a list to include in the rules. One of the questions contained the word 'xbox', which had a POS tag of '$' – this was included as it was felt that the word 'xbox' added context to the question.",
            ],
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 8,
                'text' => "The keyword extractor receives a query as a URL parameter and then the query is tokenised. Once the query is tokenised, the resulting words are tagged with part-of-speech tags. These tags identified whether the word was a verb, adjective, etc. The POS tags are checked against pre-defined rules which dictates which words should be considered keywords. The resulting keywords are then returned.",
            ],
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 9,
                'text' => "All of the questions in the database were automatically sent to the keyword extractor API and their keywords stored, so that the comparisons would be of the stored keywords rather than each word in the question. Users queries were sent to the keyword extractor API and the keywords of the query were returned. This approach did not allow for spelling errors, and a word with a spelling error would be unlikely to match a rule and would therefore be discarded.",
            ],
            [
                'project_id' => $project->id,
                'format' => 'heading',
                'order' => 10,
                'text' => "Findings",
            ],
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 11,
                'text' => "The chatbot was significantly faster after implementing the keyword extractor – each question generally had two keywords, which is significantly less than the number of words contained in the question. This resulted in significantly quicker results. Another benefit of this application was that the question matches by the chatbot were more accurate, as words that did not add meaning could not skew the chatbot towards one question or another. This keyword extractor was only a small part of the project, but it made a great difference to the chatbot.",
            ],
        ]);

        /**
         * Links
         */
        DB::table('project_links')->insert([
            [
                'project_id' => $project->id,
                'name' => 'keyword extractor github',
                'text' => 'View Code',
                'icon' => json_encode(['fab', 'fa-github']),
                'link' => 'https://github.com/MichaelBarrows/KeywordExtractor',
            ],
        ]);
    }
}
