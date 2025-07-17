<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class About extends Component
{
    public function render()
    {
        return view('livewire.about')
            ->with([
                'backEndSkills' => ['PHP', 'Laravel', 'MySQL', 'Database Design', 'Data Normalisation', 'Creating & Integrating with API\'s', 'Python'],
                'frontEndSkills' => ['JavaScript (vanilla)', 'Vue', 'Nuxt', 'React', 'Tailwind', 'Bootstrap', 'JQuery'],
                'otherSkills' => ['Test Driven Development', 'Git', 'Agile', 'Machine Learning', 'Natural Language Processing', 'Automation'],
                'commercialStart' => Carbon::parse('2021-03-01'),
            ]);
    }
}
