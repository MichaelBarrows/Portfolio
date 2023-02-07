<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EducationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        return [
            'institution_name' => $this->institution_name,
            'course_name' => $this->course_name,
            'grade' => $this->grade,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'project_title' => $this->project_title,
        ];
    }
}
