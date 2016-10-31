@extends('admin.layouts.default')

@section('title', 'Admin')

@section('title-page', 'Tags')

@section('content')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
                    <h2>Show Tag: {{ $tag->name }}</h2>
                    <div class="clearfix"></div>
                </div>
				<div class="x_content">
			         @foreach($videos as $video)
                        <div class="col-md-3">
                        	<a href="{{ route('admin.videos.show', $video->id) }}">{{ $video->title }}</a>
                        </div>
                     @endforeach
				</div>
			</div>
		</div>
	</div>
@endsection