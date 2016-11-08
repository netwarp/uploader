<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Video;
use App\Models\Comment;

class DeleteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.delete.index', [
            'menu_active' => 'delete'
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
        //
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
    public function destroy($id, Request $request)
    {
        // TODO: test with multiples resources
        $resource = $request->get('resource');
        switch ($resource) {
            case 'users':
                $users = $request->get('users');
                $users = explode(' ', $users);
                User::destroy($users);
                break;
            case 'videos':
                $videos = $request->get('videos');
                $videos = explode(' ', $videos);
                Video::destroy($videos);
                Comment::where('video_id', $videos)->delete();
                break;
            case 'comments':
                $comments = $request->get('comments');
                $comments = explode(' ', $comments);
                Comment::destroy($comments);
                break;
        }

        return redirect()->back()->with('success', 'Deleted');
    }
}
