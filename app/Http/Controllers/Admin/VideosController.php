<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Video;
use Linkthrow\Ffmpeg\Classes\FFMPEG;
Use Validator;
use Auth;
use Storage;
use App\User;
use Log;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::where('validated', true)->paginate(20);

        return view('admin.pages.videos.index', [
            'videos' => $videos,
            'menu_active' => 'videos'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.videos.create', [
            'menu_active' => 'videos'
        ]);
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
            $video->path = '';
            $video->save();

            $destination = "/videos/$video->id";

            $extension = $file->getClientOriginalExtension();
            $random_string = str_random(10);
            $filename = "$random_string.$extension";

            $video->public_id = $random_string;

            // in params: path, content, name
            Storage::putFileAs($destination, $file, $filename);

            $video->path = "/videos/$video->id/$random_string";

            $file_path = storage_path("app/videos/$video->id");
            chdir($file_path);

            $video->duration = FFMPEG::getMediaInfo($filename)['format']['duration'];
            $video->save();

            if ($extension != 'webm') {
                $command = "ffmpeg -i $filename $random_string.webm > /dev/null &";
                exec($command);
            }

            return redirect()->route('admin.videos.index')->with('success', 'Video uploaded');
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
        $video = Video::findOrFail($id);

        return view('admin.pages.videos.show', [
            'video' => $video,
            'menu_active' => 'videos'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::findOrFail($id);

        return view('admin.pages.videos.edit', [
            'video' => $video,
            'menu_active' => 'videos'
        ]);
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
        $video = Video::findOrFail($id);

        $tags = $request->get('tags');
        $tags = explode(' ', $tags);
        
        $video->tag($tags);

        return redirect()->route('admin.videos.index')->with('success', 'Video updated');
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
        Storage::deleteDirectory("videos/$id");

        return redirect()->back()->with('success', 'Video Deleted');
    }
}
