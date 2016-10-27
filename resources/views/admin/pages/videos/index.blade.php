@extends('admin.layouts.default')

@section('title', 'Admin')

@section('title-page', 'Videos')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Users</h2>
                    <div class="panel_toolbox">
                        <a href="{{ route('admin.videos.create') }}" class="btn btn-primary btn-sm">Create new Video</a>
                    </div>
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
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>title</th>
                            <th>User</th>
                            <th>Duration</th>
                            <th>Date upload</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($videos as $video)
                            <tr>
                                <td>{{ $video->id  }}</td>
                                @if (\Request::route()->getName() == 'admin.videos.index')
                                    <td><a href="{{ route('admin.videos.show', $video->id) }}">{{ $video->title  }}</a></td>
                                @elseif(\Request::route()->getName() == 'admin.validations.index')
                                    <td><a href="{{ route('admin.validations.edit', $video->id) }}">{{ $video->title  }}</a></td>
                                @endif
                                <td>{{ $video->user_id }}</td>
                                <td>12</td>
                                <td>{{ $video->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.videos.edit', $video->id) }}" class="btn btn btn-dark btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                                    <form action="{{ route('admin.videos.destroy', $video->id) }}" style="display: inline;" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $videos->links()  }}
                </div>
            </div>
        </div>
    </div>
@endsection