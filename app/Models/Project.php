<?php

namespace App\Models;

use App\Enums\TechStack;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\AsEnumCollection;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'tech_stack' => AsEnumCollection::class.':'.TechStack::class
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('id', 'desc');
        });
    }

    public function projectLinks(): HasMany
    {
        return $this->hasMany(ProjectLink::class);
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
