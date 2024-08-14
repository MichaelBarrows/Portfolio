<?php

namespace App\Actions\Education;

use App\Events\Education\EducationDeleted;
use App\Models\Education;
use App\Repositories\EducationRepository;

class DeleteEducationAction
{
    public function __construct(
        public EducationRepository $educationRepository
    ) {
    }

    public function execute(Education $education): bool
    {
        $result = $this->educationRepository->deleteEducation($education);

        EducationDeleted::dispatch($education->getKey());

        return $result;
    }
}
