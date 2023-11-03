<?php

namespace MichaelBarrows\Portfolio\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectTexts extends Model
{
    protected $connection = 'portfolio';

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
