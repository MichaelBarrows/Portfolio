<?php

namespace MichaelBarrows\Portfolio\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $connection = 'portfolio';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'status',
        'notes',
    ];
}
