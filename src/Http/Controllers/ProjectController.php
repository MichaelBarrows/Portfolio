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
            Project::with(['projectLinks'])->get()
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
