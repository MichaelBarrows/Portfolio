<?php

namespace MichaelBarrows\Portfolio\Http\Resources;

use Carbon\Carbon;
use Exception;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;

class EmploymentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        $duration = Carbon::parse($this->start_date)
            ->firstOfMonth()
            ->diff(
                Carbon::parse($this->end_date != 'Present' ? $this->end_date : now())
                    ->endOfMonth()
            );

        return [
            'id' => $this->id,
            'title' => $this->title,
            'company' => $this->company,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'description' => $this->description,
            'duration' => [
                'years' => $duration->format('%y'),
                'months' => $duration->format('%m'),
            ],
            'tech_stack' => TechStackResource::collection($this->whenNotNull($this->tech_stack, collect())),
        ];
    }
}
