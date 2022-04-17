<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\JsonResponse;

class EducationController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return response()->json(
            Education::all(),
        );
    }
}
