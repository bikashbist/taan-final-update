@extends('layouts.admin')
@section('title')
Admin {{ $_panel }} Edit | SCMS
@endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/cms/plugin/richtexteditor/richtexteditor/rte_theme_default.css')}}" />
<style>
    .rte-modern.rte-desktop.rte-toolbar-default {
        min-width: 626px !important;
    }
</style>
@endsection
@section('content')
@include('admin.section.flash_message_error')
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index')}}"><i class="fa fa-home"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route($_base_route.'.index')}}">{{ $_panel }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route($_base_route.'.update', $data['rows']->post_unique_id )}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                @csrf
                <input name="type" type="hidden" value="page">
                <div class="col-md-8">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Edit Pages</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="form-group">
                                <label for="title" style="font-weight: bold;">Title(<span style="color:red">*</span>)</label>
                                <input class="form-control rounded" type="text" name="title" value="@if(isset($data['rows']->title)) {{ $data['rows']->title   }} @endif" id="title" placeholder="Title">
                            </div>
                            <div class="form-group">
                                <label for="title" style="font-weight: bold;">Video Url</label>
                                <input class="form-control rounded" type="url" name="url" value="{{ old('url', $data['rows']->url) }}" id="url" placeholder="Video Url">
                            </div>
                            <div class="form-group">
                                <label style="font-weight: bold;">Description (<span style="color:red">*</span>)</label>
                                <textarea name="description" id="my-editor" cols="30" rows="5" class="form-control rounded" value="">@if(isset($data['rows']->description)) {{ $data['rows']->description   }} @endif</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Thumbnail</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="panel-body">
                                <div class="form-group ">
                                    <label for="image" class="">Thumbnail Image</label>
                                    <input class=" form-control" type="file" id="blog_thumnail" name="blog_thumnail" accept="image/*">
                                </div>
                            </div>
                            @if($data['rows']->blog_thumnail)
                            <div class="form-group">
                                <img src="{{ asset($data['rows']->blog_thumnail) }}" class="img img-thumbnail img-responsive" width="100px" alt="{{ $data['rows']->title }}" title="{{ $data['rows']->title }}">
                            </div>
                            @else
                            <p>No Image Found</p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Published</label>
                                <div class="form-group">
                                    <label class="ui-checkbox">
                                        <input type="hidden" name="status" value=0><span class="input-span"></span>
                                        <input type="checkbox" name="status" value=1 @if($data['rows']->status){{ "checked" }} @endif ><span class="input-span">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Published</label>
                                <div class="form-group">
                                    <label class="ui-checkbox">
                                        <input type="hidden" name="featured" value=0><span class="input-span"></span>
                                        <input type="checkbox" name="featured" value=1 @if($data['rows']->featured){{ "checked" }} @endif ><span class="input-span">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group pull-right">
                        <!-- Begin Progress Bar Buttons-->
                        <button class="btn btn-success btn-sm" type="submit" style="cursor:pointer;"> <i class="fa fa-paper-plane"></i> Submit </button>
                        <a href="{{ route($_base_route.'.index')}}" class="btn btn-warning btn-sm "><i class="fa fa-undo"></i> Back</a>
                        <!-- End Progress Bar Buttons-->
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<!-- <script src="//cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script> -->
<script type="text/javascript" src="{{ asset('assets/cms/plugin/richtexteditor/richtexteditor/rte.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/cms/plugin/richtexteditor/richtexteditor/plugins/all_plugins.js')}}"></script>
<script>
    $(document).ready(function() {
        var editor = new RichTextEditor("#my-editor");
        //widgets: ['Image', 'Link', 'Source code'],
        editor.setTheme('dark');
    });
</script>

@endsection