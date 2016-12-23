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
					<video controls style="width: 100%;">
				 		<source src="{{ "/api/video/$video->id/$video->public_id" }}" type="video/webm">
					</video>
			
				</div>	
				<h1 class="h4">{{ $video->title }}</h1>
				<p>{{ $video->nb_views }}</p>
				@if(session()->has('error'))
					<div class="alert alert-info">
						{{ session('error') }}. <a href="/login">Login</a> or <a href="/register">Register</a> if you don't have account.
					</div>
				@endif
				<favorite></favorite>
				<button type="button" class="btn btn-info btn-sm">Rate</button>
				<form action="/api/download/{{ $video->id }}/{{ $video->public_id }}" method="POST" style="display: inline;">
					{{ csrf_field() }}
					<button type="submit" class="btn btn-dark btn-sm">Download</button>
				</form>
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

			<related></related>
			{{--
				<ul class="list-group watch-related">
					<li class="list-group-item">
						<img src="http://placehold.it/168x94" alt="img">
						<h6>test</h6>
						<h6>5 min</h6>
					</li>
				</ul>
			--}}
		</div>

	</div>
</div>
@endsection