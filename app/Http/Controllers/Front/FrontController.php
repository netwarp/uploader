<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use File;
use Response;

class FrontController extends Controller
{
    public function getIndex() {

        return view('front.pages.index');
    }

    public function test() {
        $path = storage_path('app/Amphix.mp4');

        if(!File::exists($path)) {
            echo 'no';
        }
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }
}
