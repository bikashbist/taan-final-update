@extends('layouts.admin')
@section('content')
@include('admin.section.flash_message_error')
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index')}}"><i class="fa fa-home"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route($_base_route.'.index')}}">{{ $_panel }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route($_base_route.'.store')}}" method="POST" enctype="multipart/form-data">
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
                                <input class="form-control" type="text" name="video_title" id="video_title" value="{{ old('video_title') }}" placeholder="Video Name">
                                @if($errors->has('video_title'))
                                <p id="name-error" class="help-block " for="site_email"><span>{{ $errors->first('video_title') }}</span></p>
                                @endif

                                <div class="form-group">
                                    <label for="url">Video Url</label>
                                    <input class="form-control" type="url" name="video_url" id="video_url"  value="{{ old('video_url') }}" placeholder="Video url">
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
                                </div>
                                <div class="form-group">
                                    <label>Published</label>
                                    <div class="form-group">
                                        <label class="ui-checkbox">
                                            <input type="hidden" name="status" value=0><span class="input-span"></span>
                                            <input type="checkbox" name="status" value=1><span class="input-span"></span>
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
