@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:100px">
	<div class="row">
		<div class="col-md-2">
			@include('front.includes.sidebar')
		</div>
		<div class="col-md-7">
			<div class="well">
				<div class="embed-responsive embed-responsive-16by9">
					<video controls preload>
						<source src="{{ "/api/video/$video->id/$video->public_id" }}">
					</video>
				</div>	
				<h1 class="h4">{{ $video->title }}</h1>
				<p>{{ $video->nb_views }}</p>
				
				<button type="button" class="btn btn-primary btn-sm">Favorite</button>
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

			<div class="well">
				<h3 class="h5">Comments</h3>
				<form action="#">
					<div class="form-group">
						<textarea rows="4" class="form-control"></textarea>	
					</div>
					<div class="form-group">
						<button type="button" class="btn btn-default">Send</button>
					</div>
				</form>
				<hr>
				<ul class="list-group">
					@for($i = 0; $i < 10; $i++)
						<li class="list-group-item">
							<div>
								toto <span class="small">01 12 12</span>
							</div>
							<div>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero natus corrupti dicta quia excepturi aliquam accusantium commodi recusandae, consequuntur. Consequuntur, nulla. Illum quos expedita illo saepe dicta minus magni unde!
							</div>
						</li>
					@endfor
				</ul>
			</div>
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