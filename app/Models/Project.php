<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public function project_links(){
        return $this->hasMany(ProjectLink::class);
    }

    public function project_images(){
        return $this->hasMany(ProjectImage::class);
    }

    public function tech_stack(){
        return $this->belongsToMany(TechStack::class);
    }

    public function project_texts(){
        return $this->hasMany(ProjectTexts::class);
    }

    public function ordered_project_texts() {
        return $this->project_texts->sortBy('order')->get();
    }
}
