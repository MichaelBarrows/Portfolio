<?php

namespace App\Models;

use App\Enums\TechStack;
use App\Interfaces\HasExperienceAttributes;
use Illuminate\Database\Eloquent\Casts\AsEnumCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model implements HasExperienceAttributes
{
    use HasFactory;

    protected $table = 'education';

    protected $fillable = [
        'course_name',
        'institution_name',
        'grade',
        'project_title',
        'start_date',
        'end_date',
        'description',
        'properties',
        'tech_stack',
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
        return $this->institution_name;
    }

    public function getPositionAttribute(): string
    {
        return $this->course_name;
    }

    public function getTypeAttribute(): string
    {
        return 'edu';
    }
}
