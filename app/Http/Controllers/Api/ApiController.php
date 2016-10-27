<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use File;
use Response;


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
}
