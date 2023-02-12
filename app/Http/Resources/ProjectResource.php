<?php

namespace App\Http\Resources;

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
            'short_description' => $this->short_description,
            'long_description' => $this->long_description,
            'image' => $this->image,
            'text_logo' => $this->text_logo,
            'fa_icon_logo' => $this->fa_icon_logo,
            'tech_stack' => $this->whenLoaded('techStack', TechStackResource::collection($this->techStack)),
            'tech_stack_list' => $this->tech_stack_list,
        ];
    }
}
