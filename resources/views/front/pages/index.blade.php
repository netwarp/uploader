@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:20px">
	<div class="row">
		<div class="col-md-2">
			@include('front.includes.sidebar')
		</div>
		<div class="col-md-7">
			@foreach($videos as $video)
				<div class="col-md-3">
					<div class="card well well-sm">
						<a href="/watch/{{ $video->id }}/{{ $video->slug }}">
							<div class="card-image">
								<img class="img-responsive" src="http://material-design.storage.googleapis.com/publish/v_2/material_ext_publish/0Bx4BSt6jniD7TDlCYzRROE84YWM/materialdesign_introduction.png">
							</div>

							<div class="card-content">
								<p>{{ $video->title }}</p>
							</div>
						</a>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</div>
	{{---
	@foreach($videos as $video)
        <div class="card"">
			<a href="/watch/{{ $video->id }}/{{ $video->slug }}">
	            <div class="card-image">
	                <img class="img-responsive" src="http://material-design.storage.googleapis.com/publish/v_2/material_ext_publish/0Bx4BSt6jniD7TDlCYzRROE84YWM/materialdesign_introduction.png">
	            </div>
	            
	            <div class="card-content">
	                <p>{{ $video->title }}</p>
	            </div>
			</a>
        </div>
	@endforeach
	--}}
@endsection