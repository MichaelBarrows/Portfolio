<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employment;
use Illuminate\Http\JsonResponse;

class EmploymentController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return response()->json(
            Employment::all()
        );
    }
}
