<!DOCTYPE html>
<html>
<head>
    <title>Laravel 11 Drag and Drop File Upload with Dropzone JS - CodeTutHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css"/>
    <style type="text/css">
        .dz-preview .dz-image img {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card mt-5">
        <h3 class="card-header p-3">Laravel 11 Drag and Drop File Upload with Dropzone JS - codetuthub.com</h3>
        <div class="card-body">
            <form action="{{ route('upload.store') }}" method="post" enctype="multipart/form-data"
                  id="uploadForm"
                  class="dropzone">
                @csrf
                <div>
                    <h4>Upload multiple image by click on box</h4>
                </div>
            </form>
            <button id="uploadFile" class="btn btn-success mt-1">Upload Images</button>
        </div>
    </div>
</div>

<script type="text/javascript">

    Dropzone.autoDiscover = false;

    var images = {{ Js::from($images) }};

    const dropzone = new Dropzone('#uploadForm', {
        autoProcessQueue: false,
        paramName: 'files',
        uploadMultiple: true,
        parallelUploads: 5, // 5 files sent per batch (2 is default)
        maxFilesize: 5,
        acceptedFiles: '.jpeg,.jpg,.png,.gif',
        init: function() {
            const dropzoneInstance = this;
            $.each(images, function(key, value) {
                var mockFile = {name: value.name, size: value.filesize};
                dropzoneInstance.emit('addedfile', mockFile);
                dropzoneInstance.emit('thumbnail', mockFile, value.path);
                dropzoneInstance.emit('complete', mockFile);
            });
        },
    });

    $('#uploadFile').click(function() {
        dropzone.processQueue();
    });
    $('#uploadForm').submit(function(e) { e.preventDefault(); });

</script>

</body>
</html>
