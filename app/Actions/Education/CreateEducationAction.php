<?php

namespace App\Actions\Education;

use App\Events\Education\EducationCreated;
use App\Models\Education;
use App\Repositories\EducationRepository;

class CreateEducationAction
{
    public function __construct(
        private EducationRepository $educationRepository,
    ) {
    }

    public function execute(array $args): Education
    {
        $education = $this->educationRepository->createEducation($args);

        EducationCreated::dispatch($education->getKey(), $args);

        return $education;
    }
}
