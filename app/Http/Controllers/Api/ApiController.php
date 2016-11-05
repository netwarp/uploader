<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use File;
use Response;
use App\Models\Video;
use Log;
use Auth;
use App\Models\Comment;

class ApiController extends Controller
{
    public function watch($id, $string) {
    	$path = storage_path("app/videos/$id/$string.webm");

        if(!File::exists($path)) {
            dd($path);
        }
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }

    public function getComments($id) {
        $video = Video::findOrFail($id);
        $comments = $video->comments()->get();
        //return $comments;

        $comments = Comment::where('video_id', $id)->get();
        return $comments;
    }

    public function postComments($id, Request $request) {
        Log::info($request->get('content'));
        /*
        if (Auth::guest()) {
            return $response = [
                'status' => false,
                'message' => 'You must to be logged to comment'
            ];
        };
        */
        
        Comment::create([
            'user_name' => Auth::user()->name,
            'video_id' => $id,
            'content' => $request->get('content')
        ]);
        

        return $response = [
            'status' => true,
            'message' => 'Thanks for comment'
        ];
    }
}
