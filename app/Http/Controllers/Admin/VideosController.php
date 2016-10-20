<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Video;
use Log;
Use Validator;
use Auth;
use Storage;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::paginate(20);

        return view('admin.pages.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.videos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info($request);

        $validator = Validator::make($request->all(), [
            'file'  => 'required|mimes:mp4,mov,ogg,avi|max:50000'
        ]);

        if ($validator->fails()) {
            Log::info('no');
            return 'no';
        }
        else {
            Log::info('yes');
            $file = $request->file('file');

            $video = new Video;
            $video->title = substr($file->getClientOriginalName(), 0, -4);
            $video->slug = str_slug($video->title);
            $video->user_id = Auth::user()->id;
            $video->path = 'a';
            $video->save();

            $destination = "/videos/$video->id";

            // in params: path, content, name
            Storage::putFileAs($destination, $file, 'toto.mp4');

            echo 'perfect upload';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::findOrFail($id);

        $video->delete();

        return redirect()->back()->with('success', 'Video Deleted');
    }
}
