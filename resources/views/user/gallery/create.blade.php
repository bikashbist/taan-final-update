@extends('layouts.membership')
@section('title')
Member {{ $_panel }} Add | SCMS
@endsection
@section('styles')
<!-- PLUGINS STYLES-->
<style>
    .help-block {
        color: red;
    }

    .bootstrap-tagsinput {
        width: 100%;
    }

    .label-info {
        background-color: #17a2b8;
    }

    .label {
        display: inline-block;
        padding: .25em .4em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25rem;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    .col-spart {
        width: 15%;
        float: left;
        padding: 5px;
    }

    .clearfix {
        clear: both;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/spartan-multi-image-picker@1.2.2/css/spartan-multi-image-picker.min.css" rel="stylesheet">
@endsection
@section('content')

<h1 class="h4 text-primary"> Add Photos to Gallery</h1>
<a href="{{ route($_base_route.'.index') }}" class="d-none d-sm-inline-block btn btn-xs btn-info shadow-sm"><i class="fa fa-arrow-left fa-sm text-white-50"></i> Back </a><br><br>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route($_base_route.'.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="images">Images</label>
                <div id="image-picker"></div>
                <input type="hidden" id="images" name="images">
            </div>
            <div class="clearfix"></div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/spartan-multi-image-picker/dist/js/spartan-multi-image-picker.min.js"></script>

<script>
    $("#image-picker").spartanMultiImagePicker({
        fieldName: 'images[]',
        maxCount: 500,
        rowHeight: '100px',
        groupClassName: 'col-spart', // Class name for each image group
        maxFileSize: '',
        placeholderImage: {
            image: 'https://via.placeholder.com/200',
            width: '100%'
        },
        dropFileLabel: "Drop Here",
        onExtensionErr: function (index, file) {
            console.log(index, file, 'extension err');
            alert('Please only input png or jpg type file');
        },
        onSizeErr: function (index, file) {
            console.log(index, file, 'file size too big');
            alert('File size too big');
        },
        init: function (input) {
            if (oldImages.length > 0) {
                oldImages.forEach(function(image, index) {
                    var img = $('<img />').attr('src', image).css('width', '100%');
                    $(input).before(img);
                });
            }
        }
    });
</script>
@endsection
