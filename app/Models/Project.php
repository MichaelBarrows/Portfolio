<?php

namespace App\Models;

use App\Enums\TechStack;
use Illuminate\Database\Eloquent\Casts\AsEnumCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'pretty_url',
        'fa_icon_logo',
        'tech_stack',
        'description',
        'visible',
    ];

    protected $casts = [
        'tech_stack' => AsEnumCollection::class.':'.TechStack::class,
        'visible' => 'boolean',
    ];

    public function projectLinks(): HasMany
    {
        return $this->hasMany(ProjectLink::class);
    }
}
