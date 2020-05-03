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

    public function admin_edit(Request $projectsForm)
    {
        $projects = Project::all();
        $projectsForm = $projectsForm->input();
        return view('admin.projects_edit', compact('projectsForm', 'projects'));
    }


    public function admin_update(Request $updateForm)
    {
        if($updateForm->input('type') == 'added')
        {
            $project = new Project;
            $project->page_id = 4;
            $project->project_name = $updateForm->input('project_name');
            $project->project_desc = $updateForm->input('project_description');
            $project->project_image = $updateForm->input('project_image');
            $project->save();

            $projects = Project::all();
            return view('admin.projects', ['projects' => $projects]);
        }
    }

}
