<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmploymentResource;
use App\Models\Employment;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EmploymentController extends Controller
{
    public function __invoke(): AnonymousResourceCollection
    {
        return EmploymentResource::collection(
            Employment::all()
        );
    }
}
