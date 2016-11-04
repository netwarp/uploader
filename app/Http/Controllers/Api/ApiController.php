<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use File;
use Response;
use App\Models\Video;


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

        $comments = $video->getComments()->get();

        return $comments;
    }
}
