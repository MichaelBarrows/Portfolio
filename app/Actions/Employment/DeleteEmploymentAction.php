<?php

namespace App\Actions\Employment;

use App\Events\Employment\EmploymentDeleted;
use App\Models\Employment;
use App\Repositories\EmploymentRepository;

class DeleteEmploymentAction
{
    public function __construct(
        private EmploymentRepository $employmentRepository
    ) {
    }

    public function execute(Employment $employment): bool
    {
        $result = $this->employmentRepository->deleteEmployment($employment);

        EmploymentDeleted::dispatch($employment->getKey());

        return $result;
    }
}
