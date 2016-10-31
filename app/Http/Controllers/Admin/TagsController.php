<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Conner\Tagging\Model\Tag;
use App\Models\Video;

class TagsController extends Controller
{
    public function index() {
    	$tags = Tag::all();

    	return view('admin.pages.tags.index', [
    		'tags' => $tags,
    		'menu_active' => 'tags'
    	]);
    }

    public function create() {
    	return view('admin.pages.tags.create', [
    		'menu_active' => 'tags'
    	]);
    }

    public function store(Request $request) {

    	$tag = Tag::create([
    		'name' => $request->input('name'),
    		'slug' => str_slug($request->input('name')),
    	]);

    	return redirect()->route('admin.tags.index')->with('success', 'Tag created');
    }

    public function show($id) {
    	$tag = Tag::findOrFail($id);
        $videos = Video::withAnyTag($tag->name)->get();

    	return view('admin.pages.tags.show', [
    		'tag' => $tag,
    		'videos' => $videos,
    		'menu_active' => 'tags'
    	]);
        
    }

    public function edit($id) {

    }

    public function update($id) {

    }

    public function destroy($id) {
    	
    }
}
