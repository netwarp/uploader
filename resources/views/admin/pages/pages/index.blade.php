@extends('admin.layouts.default')

@section('title', 'Admin')

@section('title-page', 'Pages')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Pages</h2>
                    <div class="panel_toolbox">
                        <a href="{{ route('admin.pages.create') }}" class="btn btn-primary btn-sm">Create new page</a>
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pages as $page)
                                <tr>
                                    <td>{{ $page->id }}</td>
                                    <td>{{ $page->name }}</td>
                                    <td><a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btn btn-dark btn-sm"><i class="fa fa-pencil"></i> Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection