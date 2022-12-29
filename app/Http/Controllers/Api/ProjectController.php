<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\JsonResponse;

class ProjectController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(
            Project::with('techStack')->get()
        );
    }

    public function show(string $project): JsonResponse
    {
        $project = Project::wherePrettyUrl($project)
            ->firstOrFail();
        $project->content = '';
        foreach ($project->projectTexts->sortBy('order') as $text) {
            $project->content .= '<' . $text->format . '>' . $text->text . '</' . ($text->format[0] == 'h' ? 'h3' : 'p') . '>';
        }
        return response()->json($project);
    }
}
