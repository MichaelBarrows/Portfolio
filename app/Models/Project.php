<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    public function projectLinks(): HasMany
    {
        return $this->hasMany(ProjectLink::class);
    }

    public function projectImages(): HasMany
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function techStack(): BelongsToMany
    {
        return $this->belongsToMany(TechStack::class);
    }

    public function projectTexts(): HasMany
    {
        return $this->hasMany(ProjectTexts::class);
    }

    public function orderedProjectTexts(): Collection
    {
        return $this
            ->projectTexts()
            ->sortBy('order')
            ->get();
    }
}
