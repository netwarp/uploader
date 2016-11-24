<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Video;
use Storage;
use File;
use Image;

class ValidationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::where('validated', false)->paginate(20);

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        $video = Video::findOrFail($id);

        return view('admin.pages.videos.validation', [
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
        $this->validate($request, [
            'validation' => 'required'
        ]);
        $video = Video::findOrFail($id);

        $validation = $request->get('validation');

        if ($validation == 'true') {
            if ($request->has('tags')) {
                $tags = $request->get('tags');
                $tags = explode(' ', $tags);
                $video->tag($tags);
            }

            $nb_thumbnails = 12;

            $path = storage_path("app/videos/$id");
            chdir($path);

            $file = File::files($path)[0];
            $name = File::name($file);
            $complete_name = basename($file);

            $total_seconds = shell_exec("ffprobe -i $file -show_format -v quiet | sed -n 's/duration=//p'");
            $total_seconds = floor($total_seconds);

            $fps = $total_seconds / $nb_thumbnails;
            $fps = floor($fps);

            $command = "ffmpeg -i $complete_name -vf fps=1/$fps __thumb-$name-%d.jpg";
            exec($command);

            $images = File::files($path);
            $images = array_slice($images, 2);
            // TODO if extension = jpg
            foreach ($images as $image) {
                $img = Image::make($image);
                $img->resize(220, null, function($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($image);
            }
                
            $video->validated = true;
            $video->save();
            return redirect()->route('admin.validations.index')->with('success', 'The video has been validated');
        }

        return redirect()->back();
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
