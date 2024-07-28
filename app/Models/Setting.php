<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Setting extends Model
{
    use HasFactory;

    protected $primaryKey = 'key';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'key',
        'value',
        'type',
    ];

    public function getValueAttribute()
    {
        return match ($this->type) {
            'int' => (int) $this->attributes['value'],
            'bool' => $this->attributes['value'] == 'true',
            'string' => (string) $this->attributes['value'],
            'encrypted' => Crypt::decrypt($this->attributes['value']),
            default => $this->attributes['value'],
        };
    }
}
