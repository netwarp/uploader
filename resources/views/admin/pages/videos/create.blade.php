@extends('admin.layouts.default')

@section('title', 'Admin')

@section('title-page', 'Videos')

@section('styles')
    {{-- 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
     --}}
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
    {{--
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
    <script>
        Dropzone.options.myAwesomeDropzone = {
            paramName: 'file',
            maxFiles: 1,
            maxFilesize: 50,
            autoProcessQueue: true,
            url: 'localhost:8080',
        //    acceptedFiles: 'video/*',
            headers: {
                'X-CSRF-TOKEN': Laravel.csrfToken
            },

            init: function() {
                this.on("addedfile", function(file) {
                    console.log("Added file.")
                });

                this.on('sending', function(file, xhr, formData) {
                    console.log('sending');
                })

                this.on('success', function(data, response) {
                    console.log('success')
                    console.log(' response ' + response)
                    console.log('data ' + data)
                })

                this.on('uploadprogress', function(event, progress, par3) {
                    console.log('uploadprogress')
                    console.log(event, progress, par3)
                })
            },
        }

    </script>
    --}}
@endsection
