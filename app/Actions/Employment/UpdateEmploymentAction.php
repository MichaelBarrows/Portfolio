<?php

namespace App\Actions\Employment;

use App\Events\Employment\EmploymentUpdated;
use App\Models\Employment;

class UpdateEmploymentAction
{
    public function execute(Employment $employment, array $args): Employment
    {
        $employment->fill($args);

        $employment->save();

        EmploymentUpdated::dispatch($employment);

        return $employment;
    }
}
