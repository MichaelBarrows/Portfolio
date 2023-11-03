<?php

namespace MichaelBarrows\Portfolio\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\AsEnumCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use MichaelBarrows\Portfolio\Enums\TechStack;

class Education extends Model
{
    protected $connection = 'portfolio';

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

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
