<?php

namespace App\Livewire;

use App\Models\Education;
use App\Models\Employment;
use App\Traits\Livewire\ModelEventsTrait;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Livewire\Component;

class Experience extends Component
{
    use ModelEventsTrait;

    public Collection $data;

    protected $listeners = [
        'echo:education,Education\\EducationCreated' => 'modelCreated',
        'echo:employment,Employment\\EmploymentCreated' => 'modelCreated',
        'echo:education,Education\\EducationUpdated' => 'experienceUpdated',
        'echo:employment,Employment\\EmploymentUpdated' => 'experienceUpdated',
        'echo:education,Education\\EducationDeleted' => 'experienceDeleted',
        'echo:employment,Employment\\EmploymentDeleted' => 'experienceDeleted',
    ];

    public function mount()
    {
        $this->refreshModelFields = ['start_date'];
        $this->getData();
    }

    private function getData()
    {
        $this->data = $this->sortData(
            collect([
                Employment::all(),
                Education::all(),
            ])
            ->collapse()
            ->keyBy(function ($model) {
                $modelKey = $model instanceof Education ? 'edu-' : 'emp-';
                return "$modelKey{$model->getKey()}";
            })
        );
    }

    public function sortData($data)
    {
        return $data->sortBy(
            callback: fn ($record) => Carbon::parse($record->start_date),
            descending: true,
        );
    }

    public function experienceUpdated($event)
    {
        $key = $event['type'] == 'education' ? "edu-{$event['id']}" : "emp-{$event['id']}";

        $this->modelUpdated($key, $event);

        if (array_key_exists('start_date', $event)) {
            $this->data = $this->sortData($this->data);
        }
    }

    public function experienceDeleted($event)
    {
        $key = $event['type'] == 'education' ? "edu-{$event['id']}" : "emp-{$event['id']}";

        $this->modelDeleted($key, $event);
    }

    public function render()
    {
        return view('livewire.experience')->with([
            'experiences' => $this->data,
        ]);
    }
}
