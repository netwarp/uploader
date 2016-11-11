<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use File;
use Illuminate\Support\Facades\Auth;
use Response;
use App\Models\Video;
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
        $length = File::size($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        $response->header("Content-Length", $length);
        return $response;
    }

    public function getComments($id) {
        $video = Video::findOrFail($id);
        $comments = $video->comments()->orderBy('id', 'desc')->get();
        return $comments;
    }

    public function postComments($id, Request $request) {
       
        if (Auth::check()) {
            Comment::create([
                'user_name' => Auth::user()->name,
                'video_id' => $id,
                'content' => $request->get('content')
            ]);

            return [
                'status' => 'success',
                'message' => 'Comment successfully created'
            ];
        }
        else {
            return [
                'status' => 'error',
                'message' => 'Need login'
            ];
        }
    }

    public function avatar($id, $string) {
        $path = storage_path("app/avatars/$id/$string.jpg");

        if (!File::exists($path)) {
            return;
        }

        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header('Content-Type', $type);
        return $response;

    }

    public function test() {
        Comment::create([
            'user_name' => 'toto',
            'video_id' => 1,
            'content' => 'lorem ipsim'
        ]);
        
        return 'e';
    }
}
