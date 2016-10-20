<template>

    <form action="{{ route('admin.videos.store') }}" method="POST" enctype="multipart/form-data" class="dropzone dz-clickable" id="my-awesome-dropzone">
        {{ csrf_field() }}
    </form>
</template>

<script>
    export default {
        mounted() {
            Dropzone.options.myAwesomeDropzone = {
                paramName: 'file',
                maxFilesize: 50,

                init: function() {
                    this.on("addedfile", function(file) { console.log("Added file."); });
                },
                success: function(data, response) {
                    console.log(response)
                    console.log(data)
                }
            }
        }
    }
</script>