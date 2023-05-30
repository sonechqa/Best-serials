<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\Project;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function project() {
        $projectData = Project::all();
        return Inertia::render('Project', [
            'currentPage' => 'project',
            'projectData' => $projectData,
            'user' => Auth::user(),
        ]);
    }
}
