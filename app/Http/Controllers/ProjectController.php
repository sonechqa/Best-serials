<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\Project;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\Folders;

class ProjectController extends Controller
{
    public function project() {
        $projectData = Project::all();
        $id = Auth::id();

        return Inertia::render('Project', [
            'currentPage' => 'project',
            'projectData' => $projectData,
            'user' => Auth::user(),
            'folders' => Folders::where('user_id', $id)->get(),
        ]);
    }
}
