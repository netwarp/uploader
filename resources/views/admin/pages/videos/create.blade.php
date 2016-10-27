@extends('admin.layouts.default')

@section('title', 'Admin')

@section('title-page', 'Videos')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Upload Video</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p>
                        Drag and drop file to the box.
                    </p>
                    {{--
                    <form action="{{ route('admin.videos.store') }}" method="POST" enctype="multipart/form-data" class="dropzone dz-clickable" id="my-awesome-dropzone">
                        {{ csrf_field() }}
                    </form>
                    <button type="button" id="button" class="btn btn-primary" style="margin-top: 15px;">Upload</button>
                    --}}

                    <form action="{{ route('admin.videos.store') }}" method="POST" enctype="multipart/form-data" class="d-ropzone d-z-clickable" id="my-awesome-dropzone">
                        {{ csrf_field() }}
                        <input type="file" name="file">
                        <button type="submit" id="button" class="btn btn-primary" style="margin-top: 15px;">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
    <script>
        Dropzone.options.myAwesomeDropzone = {
            paramName: 'file',
            maxFiles: 1,
            maxFilesize: 50,
            autoProcessQueue: false,
           // acceptedFiles: 'video/*',

            init: function() {
                this.on("addedfile", function(file) { console.log("Added file."); });

                var button = document.getElementById('button');
                button.addEventListener('click', function() {

                })
            },

            sending: function(file, xhr, formData) {
                formData.append('foo', {
                    k: 'v',
                    k1: 'v1'
                })
            },

            success: function(data, response) {
                console.log(response)
                console.log(data)
            },

            uploadprogress: function(par1, par2, par3) {
                console.log(par1);
                console.log(par2);
                console.log(par3)
            }
        }

    </script>
@endsection