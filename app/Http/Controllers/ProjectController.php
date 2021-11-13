<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\SiteSetting;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function show($pretty_url): View
    {
        return view('pages.project', [
            'maintenance_mode' => SiteSetting::findOrFail(SiteSetting::MAINTENANCE_MODE),
            'project' => Project::wherePrettyUrl($pretty_url)
                ->firstOrFail(),
        ]);
    }
}
