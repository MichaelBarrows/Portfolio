<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Employment;
use App\Models\Project;
use App\Models\SiteSetting;
use App\Models\TechStack;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $maintenanceMode = SiteSetting::findOrFail(SiteSetting::MAINTENANCE_MODE);
        $education = Education::all();
        $employment = Employment::all();
        $projects = Project::all();
        $technologies = TechStack::all();

        return view('pages.home', [
            'maintenance_mode' => $maintenanceMode,
            'education' => $education,
            'employments' => $employment,
            'projects' => $projects,
            'technologies' => $technologies,
        ]);
    }
}
