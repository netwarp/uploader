<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Storage;
use Image;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        return view('admin.pages.settings.index', [
            'user' => $user,
            'menu_active' => 'settings'
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        $this->validate($request, [
            'file' => 'mimes:jpeg,jpg | max:1000',
            'password' => 'min:6',
            'password_confirmation' => 'same:password'
        ]);

        $user = User::findOrFail(Auth::user()->id);

        if ($request->hasFile('file')) {

            $file = $request->file('file');

            $destination = "/avatars/$id";

            $extension = $file->getClientOriginalExtension();
            $random_string = hash('ripemd160', $id);
            $filename = "$random_string.$extension";

            Storage::putFileAs($destination, $file, $filename);

            $img = storage_path("app/avatars/$id/$filename");
            $img = Image::make($img);
            $img->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save(storage_path("app/avatars/$id/$filename"));

            $user->update([
                'avatars' => $random_string
            ]);

        }

        if ($request->has('email')) {
            $user->update([
                'email' => $request->get('email')
            ]);
        }

        if ($request->has('password')) {
            $user->update([
                'password' => bcrypt($request->get('password'))
            ]);
        }

        return redirect()->route('admin.settings.index')->with('success', 'Setting updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
