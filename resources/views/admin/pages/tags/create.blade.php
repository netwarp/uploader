@extends('admin.layouts.default')

@section('title', 'Admin')

@section('title-page', 'Tags')

@section('content')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
                    <h2>Create Tag</h2>
                    <div class="clearfix"></div>
                </div>
				<div class="x_content">
					@if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.tags.store') }}" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                        	<label for="file">File</label>
                        	<input type="file" name="file">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Create</button>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>
@endsection