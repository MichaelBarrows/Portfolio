<?php

namespace App\Models;

use App\Enums\TechStack;
use App\Interfaces\HasExperienceAttributes;
use Illuminate\Database\Eloquent\Casts\AsEnumCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employment extends Model implements HasExperienceAttributes
{
    use HasFactory;

    protected $fillable = [
        'title',
        'company',
        'start_date',
        'end_date',
        'description',
        'tech_stack',
        'properties',
    ];

    protected $casts = [
        'tech_stack' => AsEnumCollection::class.':'.TechStack::class,
        'properties' => 'array',
    ];

    public function getImageAttribute(): string
    {
        return ! empty($this->properties['prefix'])
            && ! empty($this->properties['encoded_image'])
                ? $this->properties['prefix'] . $this->properties['encoded_image']
                : '';
    }

    public function getOrganisationAttribute(): string
    {
        return $this->company;
    }

    public function getPositionAttribute(): string
    {
        return $this->title;
    }

    public function getTypeAttribute(): string
    {
        return 'emp';
    }
}
