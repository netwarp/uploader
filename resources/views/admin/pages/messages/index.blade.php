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
					<table class="table">
						<thead>
							<tr>
								<th>Id</th>
								<th>Subject</th>
								<th>Message</th>
								<th>Email</th>
								<th>Date</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($messages as $message)
								<tr>
									<td>{{ $message->id }}</td>
									<td><a href="{{ route('admin.messages.show', $message->id) }}">{{ $message->subject }}</a></td>
									<td><a href="{{ route('admin.messages.show', $message->id) }}">{{ $message->text }}</a></td>
									<td>{{ $message->email }}</td>
									<td>{{ $message->created_at }}</td>
									<td>
										<form action="{{ route('admin.messages.destroy', $message->id) }}" style="display: inline;" method="POST">
	                                        {{ csrf_field() }}
	                                        <input type="hidden" name="_method" value="DELETE">
	                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                    	</form>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{{ $messages->links() }}
				</div>
			</div>
		</div>
	</div>
@endsection