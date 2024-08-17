<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class TimelineItem extends Component
{
    public function __construct(
        public int $id,
        public string $organisation,
        public string $position,
        public string $type,
        public string $startDate,
        public string $endDate,
        public array|Collection|null $techStack,
        public ?string $description = '',
        public ?string $image = null,
    ) {
    }

    public function render(): View|Closure|string
    {
        return view('components.timeline-item');
    }
}
