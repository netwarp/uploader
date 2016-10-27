@extends('admin.layouts.default')

@section('title', 'Admin')

@section('title-page', 'Users')

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Users</h2>
                <div class="panel_toolbox">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm">Create new user</a>
                </div>
                <div class="clearfix"></div>
                @if( session('success') )
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <div class="x_content">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Banned</th>
                            <th>Date register</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id  }}</td>
                                <td><a href="{{ route('admin.users.show', $user->id) }}">{{ $user->name  }}</a></td>
                                <td>{{ $user->email  }}</td>
                                <td>{{ $user->banned or 'false'  }}</td>
                                <td>{{ $user->created_at  }}</td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn btn-dark btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" style="display: inline;" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links()  }}
            </div>
        </div>
    </div>
</div>
@endsection