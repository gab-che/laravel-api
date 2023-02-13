<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function home()
    {
        $user = Auth::user();
        $projects = Project::orderBy('created_at', 'DESC')->limit(5)->get();
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.dashboard', compact('user', 'projects', 'types', 'technologies'));
    }
}
