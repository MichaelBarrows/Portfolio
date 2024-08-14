<?php

namespace App\Actions\Employment;

use App\Events\Employment\EmploymentDeleted;
use App\Models\Employment;
use App\Repositories\EmploymentRepository;

class DeleteEmploymentAction
{
    public function __construct(
        public EmploymentRepository $employmentRepository
    ) {
    }

    public function execute(Employment $employment): bool
    {
        EmploymentDeleted::dispatch($employment->getKey());

        $result = $this->employmentRepository->deleteEmployment($employment);

        return $result;
    }
}
