<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TechStack;
use Illuminate\Http\JsonResponse;

class TechController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return response()->json(
            TechStack::all(),
        );
    }
}
