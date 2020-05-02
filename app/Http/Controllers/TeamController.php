<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class TeamController extends Controller
{
    public function index()
    {
        $members = Team::all();

        return view('team', ['members' => $members]);
    }

    public function admin_page()
    {
        $members = Team::all();

        return view('admin.team', ['members' => $members]);
    }

    public function admin_edit(Request $teamForm)
    {
        $members = Team::all();
        $teamForm = $teamForm->input();
        return view('admin.team_edit', compact('teamForm', 'members'));
    }
}
