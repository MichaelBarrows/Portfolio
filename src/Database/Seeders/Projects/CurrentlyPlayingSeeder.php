<?php

namespace MichaelBarrows\Portfolio\Database\Seeders\Projects;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use MichaelBarrows\Portfolio\Enums\TechStack;
use MichaelBarrows\Portfolio\Models\Project;

class CurrentlyPlayingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $project = Project::create([
            'name' => 'CurrentlyPlaying',
            'pretty_url' => 'currently-playing',
            'fa_icon_logo' => 'fa-record-vinyl',
            'tech_stack' => [
                TechStack::LARAVEL,
                TechStack::PHP,
                TechStack::JAVASCRIPT,
                TechStack::API,
            ],
        ]);

        /**
         * Content
         */
        DB::connection('portfolio')->table('project_texts')->insert([
            [
                'project_id' => $project->id,
                'format' => 'heading',
                'order' => 1,
                'text' => "What is it?",
            ],
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 2,
                'text' => "CurrentlyPlaying is an integration with the Spotify API to show the currently playing track for a given user and supplies this data to an embedable widget (see the top of the home page). It also pulls the top artists and tracks for a user.",
            ],
            [
                'project_id' => $project->id,
                'format' => 'heading',
                'order' => 3,
                'text' => "How does it work?",
            ],
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 4,
                'text' => "Laravel Socialite is used for user authentication with Spotify, and an aggressive and dynamic caching strategy is used to prevent excessive requests (both to CurrentlyPlaying and Spotify).",
            ],
            [
                'project_id' => $project->id,
                'format' => 'heading',
                'order' => 6,
                'text' => "Why?",
            ],
            [
                'project_id' => $project->id,
                'format' => 'paragraph',
                'order' => 7,
                'text' => "Why not? I wanted to play with the Spotify API, and this was the first idea I thought of.",
            ],
        ]);
    }
}
