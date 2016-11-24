@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:20px">
	<div class="row">
		<div class="col-md-2">
			@include('front.includes.sidebar')
		</div>
		<div class="col-md-7">
			@foreach($videos as $video)
				<div class="card">
					<a href="/watch/{{ $video->id }}/{{ $video->slug }}" title="{{ $video->title }}">
						<div class="card-image">
							<img class="img-responsive thumb" src="/api/thumbnail/{{ $video->id }}/{{ $video->public_id }}/0">
							<span class="corner br">{{ date('i:s', strtotime($video->duration)) }}</span>
						</div>
						<div class="card-content">
							{{ $video->title }}
						</div>
					</a>
				</div>
			@endforeach
		</div>
	</div>
</div>
@endsection