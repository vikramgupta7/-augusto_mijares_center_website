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


    public function admin_update(Request $updateForm)
    {
        if($updateForm->input('type') == 'added')
        {
            // print_r($updateForm->input());
            $team = new Team;
            $team->page_id = 7;
            $team->member_name = $updateForm->input('member_name');
            $team->member_desc = $updateForm->input('member_description');
            $team->member_email = $updateForm->input('member_email');
            $team->member_phone = $updateForm->input('member_phone');
            $team->member_image = $updateForm->input('member_image');
            $team->save();

            $members = team::all();
            return view('admin.team', ['members' => $members]);
        }
    }
}
