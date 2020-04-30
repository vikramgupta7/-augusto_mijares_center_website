<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();

        return view('videos', ['videos' => $videos]);
    }

    public function admin_page()
    {
        $videos = Video::all();

        return view('admin.videos', ['videos' => $videos]);
    }
}
