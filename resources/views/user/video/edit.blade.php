@extends('layouts.membership')
@section('title')
Admin {{ $_panel }} Add | SCMS
@endsection
@section('styles')
<!-- PLUGINS STYLES-->
<style>
    .nav-pills {
        justify-content: space-around;
    }

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
        transition: color .15s ease-in-out, background-color .15s ease-in-out,
            border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }
</style>

@endsection
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4  text-primary">{{ $_panel }} Add</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route($_base_route.'.update', $data['rows']->id )}}" method="POST" enctype="multipart/form-data">
            <div class="row">
                @csrf
                <div class="col-md-12">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Add {{ $_panel }}</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="form-group">
                                <label for="title">Video Title</label>
                                <input class="form-control" type="text" name="video_title" id="video_title" value="@if(isset($data['rows']->video_title)) {{ $data['rows']->video_title   }} @endif" placeholder="Video Name">
                                @if($errors->has('video_title'))
                                <p id="name-error" class="help-block " for="site_email"><span>{{ $errors->first('video_title') }}</span></p>
                                @endif

                                <div class="form-group">
                                    <label for="url">Video Url</label>
                                    <input class="form-control" type="url" name="video_url" id="video_url" value="@if(isset($data['rows']->video_url)) {{ $data['rows']->video_url   }} @endif" placeholder="Video url">
                                    @if($errors->has('video_url'))
                                    <p id="name-error" class="help-block " for="site_email"><span>{{ $errors->first('video_url') }}</span></p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="url">Video Thumbnail</label>
                                    <input class="form-control" type="file" name="video_thumbnail" id="video_thumbnail"  value="{{ old('video_thumbnail') }}" placeholder="Video Thumbnail">
                                    @if($errors->has('video_thumbnail'))
                                    <p id="video_thumbnail-error" class="help-block " for="video_thumbnail"><span>{{ $errors->first('video_thumbnail') }}</span></p>
                                    @endif
                                    @if($data['rows']->video_thumbnail != null)
                                    <img src="{{ asset($data['rows']->video_thumbnail) }}" alt="Video Thumbnail" height="100" width="200">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Published</label>
                                    <div class="form-group">
                                        <label class="ui-checkbox">
                                            <input type="hidden" name="status" value=0><span class="input-span"></span>
                                            <input type="checkbox" name="status" value=1 @if($data['rows']->status){{ "checked" }} @endif ><span class="input-span"></span> </label>
                                        </label>
                                    </div>
                                </div>
                                <!-- Begin Progress Bar Buttons-->
                                <a href="{{ route($_base_route.'.index')}}" class="btn btn-warning btn-sm"><i class="fa fa-undo"></i> Back</a>
                                <button class="btn btn-success btn-sm" type="submit" style="cursor:pointer;"> <i class="fa fa-paper-plane"></i> Submit </button>
                                <!-- End Progress Bar Buttons-->
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/cms/js/scripts/form-plugins.js')}}" type="text/javascript"></script>
@endsection
