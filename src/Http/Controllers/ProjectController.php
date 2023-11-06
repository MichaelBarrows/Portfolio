<?php

namespace MichaelBarrows\Portfolio\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use MichaelBarrows\Portfolio\Http\Resources\ProjectResource;
use MichaelBarrows\Portfolio\Models\Project;

class ProjectController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return ProjectResource::collection(
            Project::with(['projectLinks'])->where('visible', true)->get()
        );
    }
}
