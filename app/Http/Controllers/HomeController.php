<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Employment;
use App\Models\Project;
use App\Models\SiteSetting;
use App\Models\TechStack;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('pages.home', [
            'maintenance_mode' => SiteSetting::findOrFail(SiteSetting::MAINTENANCE_MODE),
            'education' => Education::all(),
            'employments' => Employment::all(),
            'projects' => Project::all(),
            'technologies' => TechStack::all(),
        ]);
    }
}
