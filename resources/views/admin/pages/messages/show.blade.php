@extends('admin.layouts.default')

@section('title', 'Admin')

@section('title-page', 'Messages')

@section('content')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Messages</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<p>Name: {{ $message->name }}</p>
					<p>Email: {{ $message->email }}</p>
					<p>Text: {{ $message->text }}</p>
					<p>Date: {{ $message->created_at }}</p>
					<p>Ip: {{ $message->ip }}</p>
				</div>
			</div>
		</div>
	</div>
@endsection