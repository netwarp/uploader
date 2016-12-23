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
use App\User;
use Session;

class FrontController extends Controller
{
    public function getIndex() {

        Cache::add('index', Video::where('validated', true)->orderBy('id', 'desc')->get(), 2);

        $videos = Cache::get('index', function() {
            return Video::where('validated', true)->orderBy('id', 'desc')->get();
        });

        return view('front.pages.index', [
            'videos' => $videos
        ]);
    }

    public function getWatch($id, $slug) {

        Cache::add("video:$id", Video::findOrFail($id), 2);

        $video = Cache::get("video:$id", function() {
            return Video::findOrFail($id);;
        });

        $video_session = Session::get('video_session');

        if (empty($video_session)) {
            $video->increment('nb_views');
            Session::push('video_session', $id);

        }
        else {
            if (!in_array($id, $video_session)) {
                $video->increment('nb_views');
                Session::push('video_session', $id);

            }
        }

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

    public function getNews() {
        $videos = Cache::remember('index', 20, function() {
            return Video::where('validated', true)->get();
        });
        
        return view('front.pages.index', [
            'videos' => $videos
        ]);
    }

    public function getMostViewed() {
        $videos = Cache::remember('index', 20, function() {
            return Video::where('validated', true)->get();
        });
        
        return view('front.pages.index', [
            'videos' => $videos
        ]);
    }

    public function getTopRated() {
        $videos = Cache::remember('index', 20, function() {
            return Video::where('validated', true)->get();
        });
        
        return view('front.pages.index', [
            'videos' => $videos
        ]);
    }

    public function getRandom() {
        $videos = Cache::remember('index', 20, function() {
            return Video::where('validated', true)->get();
        });
        
        return view('front.pages.index', [
            'videos' => $videos
        ]);
    }

    public function getStars() {

    }

    public function getChannels() {
        $channels = User::orderBy('id', 'desc')->get();

        return view('front.pages.channels', [
            'channels' => $channels
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

        dd(proc_get_status("ffmpeg -i yp90OWWU04.mp4 yp90OWWU04.webm > /dev/null &"));

    }
}
