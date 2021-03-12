<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function projectLinks()
    {
        return $this->hasMany(ProjectLink::class);
    }

    public function projectImages()
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function techStack()
    {
        return $this->belongsToMany(TechStack::class);
    }

    public function projectTexts()
    {
        return $this->hasMany(ProjectTexts::class);
    }

    public function orderedProjectTexts()
    {
        return $this->projectTexts->sortBy('order')->get();
    }
}
