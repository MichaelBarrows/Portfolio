<?php

namespace App\Livewire;

use App\Models\Project;
use App\Traits\Livewire\ModelEventsTrait;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Projects extends Component
{
    use ModelEventsTrait;

    public Collection $data;

    protected $listeners = [
        'echo:projects,Project\\ProjectCreated' => 'modelCreated',
        'echo:projects,Project\\ProjectUpdated' => 'projectUpdated',
        'echo:projects,Project\\ProjectDeleted' => 'projectDeleted',
    ];

    public function mount()
    {
        $this->refreshModelFields = ['project_link'];
        $this->getData();
    }

    public function projectUpdated($event)
    {
        $key = $event['id'];

        if (array_key_exists('visible', $event)) {
            if ($event['visible']) {
                return $this->modelCreated();
            } else {
                return $this->modelDeleted($key, $event);
            }
        }

        $this->modelUpdated($event['id'], $event);
    }

    public function projectDeleted($event)
    {
        $this->modelDeleted($event['id'], $event);
    }

    private function getData(): void
    {
        $this->data = Project::query()
            ->with('projectLinks')
            ->where('visible', true)
            ->orderBy('id', 'desc')
            ->get()
            ->keyBy('id');
    }

    public function render()
    {
        return view('livewire.projects')->with([
            'projects' => $this->data,
        ]);
    }
}
