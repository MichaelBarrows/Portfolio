<?php

namespace MichaelBarrows\Portfolio\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TechStackResource extends JsonResource
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
            'id' => $this->value,
            'name' => $this->getName(),
            'identifier' => $this->getIdentifier(),
            'is_long' => $this->isLong(),
            'short_name' => $this->getShortName(),
        ];
    }
}
