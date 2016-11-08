@extends('admin.layouts.default')

@section('title', 'Admin')

@section('title-page', 'Settings')

@section('content')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Settings</h2>
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
					<form action="{{ route('admin.settings.update', $user->id) }}" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="_method" value="PUT">
						{{ csrf_field() }}

						<div class="form-group">
							<label>Avatar</label>
							<input type="file" name="file">
						</div>

						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="email" value="{{ $user->email }}">
						</div>

						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" name="password">
						</div>

						<div class="form-group">
							<label>Password confirmation</label>
							<input type="password" class="form-control" name="password_confirmation">
						</div>

						<div class="form-group">
							<button type="submint" class="btn btn-primary">Send</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection