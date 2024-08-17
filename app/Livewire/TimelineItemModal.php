<?php

namespace App\Livewire;

use App\Models\Education;
use App\Models\Employment;
use Livewire\Attributes\On;
use LivewireUI\Modal\ModalComponent;

class TimelineItemModal extends ModalComponent
{
    public Education|Employment $model;

    public string $type;

    public int $id;

    public function mount()
    {
        if ($this->type === 'edu') {
            $this->model = Education::find($this->id);
        } else {
            $this->model = Employment::find($this->id);
        }
    }

    private function convertObject(Education|Employment $record): array
    {
        return [
            'title' => $record instanceof Education ? $record->course_name : $record->title,
            'company' => $record instanceof Education ? $record->institution_name : $record->company,
            'startDate' => $record->start_date,
            'endDate' => $record->end_date,
            'image' => $record->image,
            'techStack' => $record->tech_stack,
            'description' => $record->description,
        ];
    }

    #[On('echo:education.{model.id},Education\\EducationUpdated')]
    #[On('echo:employment.{model.id},Employment\\EmploymentUpdated')]
    public function updateProject()
    {
        $this->model = $this->model->refresh();
    }

    public function render()
    {
        return view('livewire.timeline-item-modal', [
            ...$this->convertObject($this->model),
        ]);
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }
}
