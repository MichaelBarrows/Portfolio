<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Attributes\On;
use LivewireUI\Modal\ModalComponent;

class ProjectModal extends ModalComponent
{
    public ?Project $model;

    public int $id;

    public function mount()
    {
        $this->model = Project::find($this->id);
    }

    private function convertObject(Project $record): array
    {
        return [
            'name' => $record->name,
            'description' => $record->description,
            'icon' => $record->fa_icon_logo,
            'techStack' => $record->tech_stack,
            'links' => $record->projectLinks,
        ];
    }

    #[On('echo:projects.{model.id},Project\\ProjectUpdated')]
    public function updateProject($event)
    {
        if (array_key_exists('description', $event)) {
            return $this->model = $this->model->refresh();
        }

        return $this->model->fill($event);
    }

    public function render()
    {
        return view('livewire.project-modal', [
            ...$this->convertObject($this->model),
        ]);
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }
}
