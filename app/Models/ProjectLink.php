<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'text',
        'icon',
        'link',
    ];

    protected $casts = [
        'icon' => 'array',
    ];

    protected $guarded = [];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
