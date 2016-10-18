@extends('admin.layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Show User</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p>Name: {{ $user->name }}</p>
                    <p>Email: {{ $user->email }}</p>
                    <p>Status: {{ $user->status or 'status' }}</p>
                    <p>Banned: {{ $user->banned or 'false' }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection