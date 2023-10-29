<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProjectController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return ProjectResource::collection(
            Project::with(['projectTexts', 'projectLinks'])->get()
        );
    }

    public function show(Project $project): JsonResponse
    {
        $project->content = '';
        foreach ($project->projectTexts->sortBy('order') as $text) {
            $project->content .= '<' . $text->format . '>' . $text->text . '</' . ($text->format[0] == 'h' ? 'h3' : 'p') . '>';
        }
        return response()->json($project);
    }
}
