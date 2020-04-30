<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('projects', ['projects' => $projects]);
    }

    public function admin_page()
    {
        $projects = Project::all();

        return view('admin.projects', ['projects' => $projects]);
    }

    public function admin_edit()
    {
        $projects = Project::all();

        return view('admin.projects_edit', ['projects' => $projects]);
    }

}
