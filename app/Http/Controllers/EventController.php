<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;


class EventController extends Controller
{
    public function index()
    {
            $events = Event::all();
    
            return view('events', ['events' => $events]);
    }


    public function admin_page()
    {
            $events = Event::all();
    
            return view('admin.events', ['events' => $events]);
    }
}
