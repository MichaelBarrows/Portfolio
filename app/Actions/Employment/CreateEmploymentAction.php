<?php

namespace App\Actions\Employment;

use App\Events\Employment\EmploymentCreated;
use App\Models\Employment;
use App\Repositories\EmploymentRepository;

class CreateEmploymentAction
{
    public function __construct(
        private EmploymentRepository $employmentRepository,
    ) {
    }

    public function execute(array $args): Employment
    {
        $employment = $this->employmentRepository->createEmployment($args);

        EmploymentCreated::dispatch($employment->getKey(), $args);

        return $employment;
    }
}
