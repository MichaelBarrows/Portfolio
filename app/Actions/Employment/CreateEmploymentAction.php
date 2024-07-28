<?php

namespace App\Actions\Employment;

use App\Models\Employment;

class CreateEmploymentAction
{
    public function execute(array $args): Employment
    {
        $employment = new Employment;

        $employment->fill($args);

        $employment->save();

        return $employment;
    }
}
