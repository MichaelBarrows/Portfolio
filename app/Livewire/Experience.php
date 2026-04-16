<?php

namespace App\Livewire;

use App\Models\Education;
use App\Models\Employment;
use Carbon\Carbon;
use Livewire\Component;

class Experience extends Component
{
    public function getEmploymentProperty()
    {
        return Employment::all()
            ->sortBy(
                callback: fn ($record) => Carbon::parse($record->start_date),
                descending: true,
            );
    }

    public function getEducationProperty()
    {
        return Education::all()
            ->sortBy(
                callback: fn ($record) => Carbon::parse($record->start_date),
                descending: true,
            );
    }

    public function render()
    {
        return view('livewire.experience');
    }
}
