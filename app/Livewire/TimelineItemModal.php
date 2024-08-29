<?php

namespace App\Livewire;

use App\Models\Education;
use App\Models\Employment;
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
            return;
        }

        $this->model = Employment::find($this->id);
    }

    public function getListeners(): array
    {
        if ($this->type === 'edu') {
            return [
                "echo:education.{$this->id},Education\\EducationUpdated" => 'updateModel',
            ];
        }

        return [
            "echo:employment.{$this->id},Employment\\EmploymentUpdated" => 'updateModel',
        ];
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

    public function updateModel($event)
    {
        if (array_key_exists('description', $event)) {
            return $this->model = $this->model->refresh();
        }

        return $this->model->fill($event);
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

    public static function dispatchCloseEvent(): bool
    {
        return true;
    }
}
