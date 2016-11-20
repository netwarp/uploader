@extends('admin.layouts.default')

@section('title', 'Admin')

@section('title-page', 'Menu')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Menu</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<menu-editor></menu-editor>
				</div>
			</div>
		</div>
	</div>
@endsection
