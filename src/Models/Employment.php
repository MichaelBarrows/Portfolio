<?php

namespace MichaelBarrows\Portfolio\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\AsEnumCollection;
use Illuminate\Database\Eloquent\Model;
use MichaelBarrows\Portfolio\Enums\TechStack;

class Employment extends Model
{
    protected $connection = 'portfolio';

    protected $guarded = ['id'];

    protected $casts = [
        'tech_stack' => AsEnumCollection::class.':'.TechStack::class,
        'properties' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('id', 'desc');
        });
    }
}
