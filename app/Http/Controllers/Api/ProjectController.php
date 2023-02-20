<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $last5 = $request->input('last5');

        if ($last5) {
            $projects = Project::with('type', 'technologies')->orderBy('id', 'DESC')->limit(5)->get();
        } else {
            $projects = Project::with('type')->paginate(10);
        }

        return response()->json($projects);
    }

    public function show(Project $project)
    {
        $project->load('type', 'technologies')->get();
        return response()->json($project);
    }
}
