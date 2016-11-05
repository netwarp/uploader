<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Video;
use Mail;
use App\Mail\Contacted;
use App\Models\Page;
use Cache;
use Auth;
use App\Models\Comment;

class FrontController extends Controller
{
    public function getIndex() {
        
        $videos = Cache::remember('index', 20, function() {
            return Video::where('validated', true)->get();
        });
        
        //$videos = Video::where('validated', true)->get();

        return view('front.pages.index', [
            'videos' => $videos
        ]);
        

    }

    public function getWatch($id, $slug) {
        $video = Video::findOrFail($id);

        return view('front.pages.watch', [
            'video' => $video
        ]);
    }

    public function getTag($tag) {
        $videos = Video::withAnyTag($tag)->get();

        return view('front.pages.index', [
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

    public function getConditions() {

        $page = Page::where('name', 'conditions')->first();

        return view('front.pages.conditions', [
            'page' => $page
        ]);
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

        /*
        $video = Video::findOrFail(1);

        $comments = $video->comments()->get();
        dd($comments);
        */

        Comment::create([
            'user_name' => 'bob',
            'video_id' => 1,
            'content' => 'commentaire 1'
        ]);
    }
}
