<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EducationResource;
use App\Models\Education;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EducationController extends Controller
{
    public function __invoke(): AnonymousResourceCollection
    {
        return EducationResource::collection(
            Education::all()
        );
    }
}
