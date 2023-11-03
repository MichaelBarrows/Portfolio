<?php

namespace MichaelBarrows\Portfolio\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'pretty_url' => $this->pretty_url,
            'fa_icon_logo' => $this->fa_icon_logo,
            'tech_stack' => TechStackResource::collection($this->whenNotNull($this->tech_stack, collect())),
            'links' => ProjectLinkResource::collection($this->whenNotNull($this->projectLinks, collect())),
            'content' => $this->whenLoaded(
                'projectTexts',
                $this->projectTexts->sortBy('order')
            )
        ];
    }
}
