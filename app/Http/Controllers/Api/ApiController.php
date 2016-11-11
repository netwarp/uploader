<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use File;
use Illuminate\Support\Facades\Auth;
use Response;
use App\Models\Video;
use Log;
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
        if ($request->ajax()) {
            return $request;
        }
        else {
            return 'no';
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


}
