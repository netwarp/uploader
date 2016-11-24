@extends('admin.layouts.default')

@section('title', 'Admin')

@section('title-page', 'Videos')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Show Video</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <h3>{{ $video->title }}</h3>
                    <div class="embed-responsive embed-responsive-16by9">
                        <video controls>
                            <source src="{{ "/api/video/$video->id/$video->public_id" }}">
                            Your browser does not support the video tag, please use firefox or chrome
                        </video>
                    </div>
                    {{-- TODO round string 2 --}}
                    <p>User: <a href="#">{{ $video->user()->first()->name  }}</a></p>
                    <p>Duration: {{ $video->duration }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <form action="{{ route('admin.validations.update', $video->id) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <select name="validation" class="form-control">
                                <option value="">Validate ?</option>
                                <option value="false">No</option>
                                <option value="true">Yes</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tags">Tags</label>
                            <textarea name="tags" class="form-control" id="tags" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Validate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection