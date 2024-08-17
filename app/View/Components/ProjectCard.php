<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class ProjectCard extends Component
{
    public function __construct(
        public int $id,
        public ?string $icon,
        public string $title,
        public array|Collection $tags,
    ) {
        //
    }

    public function render(): View|Closure|string
    {
        return view('components.project-card');
    }
}
