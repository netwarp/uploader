<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Video;

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
