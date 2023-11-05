<?php

namespace MichaelBarrows\Portfolio\Http\Controllers;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use MichaelBarrows\Portfolio\Http\Resources\EducationResource;
use MichaelBarrows\Portfolio\Models\Education;

class EducationController extends Controller
{
    public function __invoke(): AnonymousResourceCollection
    {
        return EducationResource::collection(
            Education::all()
        );
    }
}
