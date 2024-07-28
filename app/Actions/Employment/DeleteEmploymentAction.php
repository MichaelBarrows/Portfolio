<?php

namespace App\Actions\Employment;

use App\Models\Employment;

class DeleteEmploymentAction
{
    public function execute(Employment $employment): bool
    {
        return $employment->delete();
    }
}
