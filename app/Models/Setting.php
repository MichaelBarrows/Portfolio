<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected function value(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => match ($this->type) {
                'int' => (int) $value,
                'bool' => $value == 'true',
                'string' => (string) $value,
                'encrypted' => Crypt::decrypt($value),
                'array', 'tags' => json_decode($value, true),
                default => $value,
            },
            set: fn (mixed $value) => match ($this->type) {
                'int', 'string', 'bool' => $value,
                'encrypted' => Crypt::encrypt($value),
                'array', 'tags' => json_encode($value),
                default => $value,
            },
        );
    }
}
