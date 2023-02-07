<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TechStackResource;
use App\Models\TechStack;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TechController extends Controller
{
    public function __invoke(): AnonymousResourceCollection
    {
        return TechStackResource::collection(
            TechStack::all()
        );
    }
}
