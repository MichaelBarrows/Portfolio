<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteSetting;
use App\Models\Education;
use App\Models\Project;
use App\Models\TechStack;

class HomeController extends Controller
{
    public function index()
    {
        $maintenanceMode = SiteSetting::findOrFail(1);
        $education = Education::all();
        $projects = Project::all();
        $projects = Project::all();
        $technologies = TechStack::all();

        return view('pages.home', [
            'maintenance_mode' => $maintenanceMode,
            'education' => $education,
            'projects' => $projects,
            'technologies' => $technologies,
        ]);
    }
}
