<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\UtilityFunctions;
use Cviebrock\EloquentSluggable\Services\SlugService;

class VideoController extends Controller
{
    //

    public function index()
    {
        $videos = Video::paginate(50);
        return view('admin.video.index',  ['videos' => $videos, 'page_title' => 'Video']);
    }

    public function create()
    {

        return view('admin.video.create', ['page_title' => 'Create Video']);
    }


    public function store(Request $request)
    {


        $this->validate($request, [
            'vid_desc' => 'required|string',
            'vid_url' => 'required',
        ]);
        try{







        $video = new Video;


        $video->vid_desc = $request->vid_desc;
        $video->slug = SlugService::createSlug(Video::class, 'slug', $request->vid_desc);

        $video->vid_url = $request->vid_url;

        $video->save();

        return redirect('Admin/Videos/Index')->with(['successMessage' => 'Success !! Video created']);
        }catch(\Exception){
            return redirect()->back()->with('error', 'Failed to create video. Please try again.');
        }
    }

    public function edit($id)
    {
        $video = Video::find($id);
        return view('admin.video.update', ['video' => $video, 'page_title' => 'Update Video']);
    }

    public function update(Request $request, Video $video)
    {

        $this->validate($request, [
            'vid_desc' => 'required|string',
            'vid_url' => 'required',
        ]);

        try{


        $video = Video::find($request->id);


        $video->vid_desc = $request->vid_desc;
        $video->slug = SlugService::createSlug(Video::class, 'slug', $request->vid_desc);

        $video->vid_url = $request->vid_url;

        if ($video->save()) {
            return redirect('Admin/Videos/Index')->with(['successMessage' => 'Success !! Videos Updated']);
        } else {
            return redirect()->back()->with(['errorMessage' => 'Error Videos not updated']);
        };
    }catch(\Exception){
        return redirect()->back()->with('error', 'Failed to update video. Please try again.');
    }
    }


    public function destroy($id)
    {
        try{


        $video = Video::find($id);

        $video->delete();
        return redirect('Admin/Videos/Index')->with(['successmessage' => 'Success !! video Deleted']);
        }catch(\Exception){
            return redirect()->back()->with('error', 'Failed to delete video. Please try again.');
        }
    }
}
