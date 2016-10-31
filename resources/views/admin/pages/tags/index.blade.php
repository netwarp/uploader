@extends('admin.layouts.default')

@section('title', 'Admin')

@section('title-page', 'Tags')

@section('content')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Tags</h2>
					<div class="panel_toolbox">
                	    <a href="{{ route('admin.tags.create') }}" class="btn btn-primary btn-sm">Create new tag</a>
             	   </div>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					@foreach($tags as $tag)
						<a href="{{ route('admin.tags.show', $tag->id) }}">{{ $tag->name }}</a>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection