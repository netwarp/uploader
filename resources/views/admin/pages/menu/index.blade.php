@extends('admin.layouts.default')

@section('title', 'Admin')

@section('title-page', 'Menu')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Menu</h2>
				<div class="panel_toolbox">
                    <a href="{{ route('admin.menu.edit', 0) }}" class="btn btn-primary btn-sm">Edit menu</a>
                </div>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<table class="table">
					<tbody>
						@if($items)
							<ul class="list-group">
								@foreach($items as $item)
									<li class="list-group-item">
										{{ $item }}
									</li>
								@endforeach
							</ul>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection

