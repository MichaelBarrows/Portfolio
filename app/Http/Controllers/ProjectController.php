<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteSetting;
use App\Models\Project;

class ProjectController extends Controller
{
    public function show($pretty_url)
    {
        $maintenanceMode = SiteSetting::findOrFail(SiteSetting::MAINTENANCE_MODE);
        $project = Project::where('pretty_url', $pretty_url)
            ->firstOrFail();
        return view('pages.project', [
            'maintenance_mode' => $maintenanceMode,
            'project' => $project,
        ]);
    }
}
