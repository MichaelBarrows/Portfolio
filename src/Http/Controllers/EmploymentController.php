<?php

namespace MichaelBarrows\Portfolio\Http\Controllers;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use MichaelBarrows\Portfolio\Http\Resources\EmploymentResource;
use MichaelBarrows\Portfolio\Models\Employment;

class EmploymentController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return EmploymentResource::collection(
            Employment::all()
        );
    }
}
