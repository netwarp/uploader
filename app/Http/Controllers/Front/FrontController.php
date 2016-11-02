<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Video;
use Mail;
use App\Mail\Contacted;

class FrontController extends Controller
{
    public function getIndex() {

        $videos = Video::where('validated', true)->get();

        return view('front.pages.index', [
            'videos' => $videos
        ]);
    }

    public function getTag($tag) {
        $videos = Video::withAnyTag($tag)->get();

        return view('front.pages.cards', [
            'videos' => $videos
        ]);
    }

    public function getContact() {
        return view('front.pages.contact');
    }

    public function postContact(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'subject' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        Mail::to('foo@bar.com')->send(new Contacted);

        return redirect()->back()->with('success', 'Your email is sent');
    }

    public function test() {
        /*
        $path = storage_path('app/toto.mp4');

        if(!File::exists($path)) {
            echo 'no';
        }
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
        */
        /*
        $path = storage_path('app');
        chdir($path);
        FFMPEG::convert()->input('toto.mp4')->bitrate(128)->output('test3.avi')->go();
        echo 'az';
        */
        echo "string";
    }
}
