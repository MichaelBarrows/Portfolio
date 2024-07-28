<?php

namespace App\Actions\Education;

use App\Events\Education\EducationUpdated;
use App\Models\Education;

class UpdateEducationAction
{
    public function execute(Education $education, array $args): Education
    {
        $education->fill($args);

        $education->save();

        EducationUpdated::dispatch($education);

        return $education;
    }
}
