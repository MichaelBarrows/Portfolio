<?php

namespace App\Models;

use App\Enums\TechStack;
use Illuminate\Database\Eloquent\Casts\AsEnumCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

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
    ];

    public function getLinksAttribute(): array
    {
        return [];
    }
}
