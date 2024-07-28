<?php

namespace App\Actions\Education;

use App\Models\Education;

class CreateEducationAction
{
    public function execute(array $args): Education
    {
        $education = new Education;

        $education->fill($args);

        $education->save();

        return $education;
    }
}
