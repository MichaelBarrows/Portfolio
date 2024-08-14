<?php

namespace App\Actions\Employment;

use App\Events\Employment\EmploymentUpdated;
use App\Models\Employment;
use App\Repositories\EmploymentRepository;

class UpdateEmploymentAction
{
    public function __construct(
        public EmploymentRepository $employmentRepository,
    ) {
    }

    public function execute(Employment $employment, array $args): Employment
    {
        [$employment, $changes] = $this->employmentRepository->updateEmployment(
            model: $employment,
            args: $args,
        );

        EmploymentUpdated::dispatch($employment->getKey(), $changes);

        return $employment;
    }
}
