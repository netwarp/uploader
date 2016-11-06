@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:20px">
	<link rel="stylesheet" href="https://cdn.plyr.io/2.0.10/plyr.css">
	<div class="row">
		<div class="col-md-2">
			@include('front.includes.sidebar')
		</div>
		<div class="col-md-7">
			<div class="well">
				<div class="{{-- embed-responsive embed-responsive-16by9 --}}">
					<custom-video src="{{ "/api/video/$video->id/$video->public_id" }}"></custom-video>
					{{--
					<video controls>
				 		<source src="{{ "/api/video/$video->id/$video->public_id" }}" type="video/webm">
					</video>
					--}}
				</div>	
				<h1 class="h4">{{ $video->title }}</h1>
				<p>{{ $video->nb_views }}</p>

				<favorite></favorite>
				<button type="button" class="btn btn-dark btn-sm">Download</button>
				<button type="button" class="btn btn-info btn-sm">Rate</button>

				<p>
					<a href="#">{{ $video->user->name }}</a>	
				</p>
			</div>

			<div class="well">
				<div class="col-md-3">
					video
				</div>
				<div class="col-md-3">
					video
				</div>
				<div class="col-md-3">
					video
				</div>
				<div class="col-md-3">
					video
				</div>
			</div>

			<comments></comments>

		</div>
		<div class="col-md-3">
			<div class="well">
				<ul class="list-group">
					<li class="list-group-item">
						video
					</li>
					<li class="list-group-item">
						video
					</li>
					<li class="list-group-item">
						video
					</li>
					<li class="list-group-item">
						video
					</li>
				</ul>
			</div>
		</div>

	</div>
</div>
@endsection