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
}
