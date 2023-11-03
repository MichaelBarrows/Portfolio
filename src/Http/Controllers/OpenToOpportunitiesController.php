<?php

namespace MichaelBarrows\Portfolio\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class OpenToOpportunitiesController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $open = Cache::get('portfolio.open-to-opportunities', false);

        return response()->json([
            'open-to-opportunities' => (bool) $open,
        ], Response::HTTP_OK);
    }
}
