@extends('admin.layouts.default')

@section('title', 'Admin')

@section('title-page', 'Videos')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Show Video</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <h3>{{ $video->title }}</h3>
                    <div class="embed-responsive embed-responsive-16by9">
                        <video controls>
                            <source src="{{ "/api/video/$video->id/$video->public_id" }}">
                            Your browser does not support the video tag, please use firefox or chrome
                        </video>
                    </div>
                    <p>User: <a href="#">{{ $video->user()->first()->name  }}</a></p>
                    <p>Duration: {{ $video->duration }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tags</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form action="{{ route('admin.videos.update', $video->id) }}" method="POST">
                        <textarea name="tags" class="form-control">

                        </textarea>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection