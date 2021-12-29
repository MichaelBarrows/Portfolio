<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    public const MAINTENANCE_MODE = 1;
    public const GITHUB_URL = 'https://github.com/MichaelBarrows';
    public const LINKEDIN_URL = 'https://www.linkedin.com/in/michaelpbarrows/';
}
