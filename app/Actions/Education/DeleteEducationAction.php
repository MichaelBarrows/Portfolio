<?php

namespace App\Actions\Education;

use App\Models\Education;

class DeleteEducationAction
{
    public function execute(Education $education): bool
    {
        return $education->delete();
    }
}
