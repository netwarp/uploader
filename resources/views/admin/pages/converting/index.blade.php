@extends('admin.layouts.default')

@section('title', 'Admin')

@section('title-page', 'converting')

@section('content')
	<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        	<div class="x_panel">
                <div class="x_title">
               		<h2>Converting</h2>
               		<div class="clearfix"></div>
               		@if( session('success') )
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ session('success') }}
                        </div>
                    @endif
       			</div>
       			<div class="x_content">
       				<table class="table" id="converting">
       					<thead>
       						<tr>
       							<td>id</td>
       						</tr>
       					</thead>
       					<tbody>
       						
       					</tbody>
       				</table>
       			</div>
       		</div>
        </div>
  	</div>
@endsection

@section('scripts')

@endsection