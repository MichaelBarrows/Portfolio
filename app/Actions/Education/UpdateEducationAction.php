<?php

namespace App\Actions\Education;

use App\Events\Education\EducationUpdated;
use App\Models\Education;
use App\Repositories\EducationRepository;

class UpdateEducationAction
{
    public function __construct(
        private EducationRepository $educationRepository,
    ) {
    }

    public function execute(Education $education, array $args): Education
    {
        [$education, $changes] = $this->educationRepository->updateEducation(
            model: $education,
            args: $args,
        );

        EducationUpdated::dispatch($education->getKey(), $changes);

        return $education;
    }
}
