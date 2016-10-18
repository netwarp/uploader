@extends('admin.layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Default title</h2>
                    <div class="clearfix"></div>
                </div>
                <pre>
                    {{ \Request::route()->getName() }}
                </pre>
            </div>
        </div>
    </div>
@endsection