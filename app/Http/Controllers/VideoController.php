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

    public function admin_edit(Request $videosForm)
    {
        $videos = Video::all();
        $videosForm = $videosForm->input();
        return view('admin.videos_edit', compact('videosForm', 'videos'));
    }

    public function admin_update(Request $updateForm)
    {
        if($updateForm->input('type') == 'added')
        {
            // print_r($updateForm->input());
            $video = new Video;
            $video->page_id = 6;
            $video->video_title = $updateForm->input('video_title');
            $video->video_description = $updateForm->input('video_description');
            $video->video_url = $updateForm->input('video_url');
            $video->save();

            $videos = Video::all();
            return view('admin.videos', ['videos' => $videos]);
        }
    }
}
