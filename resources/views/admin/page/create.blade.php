@extends('layouts.admin')
@section('title')
Admin Post Add | SCMS
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
                <input name="type" type="hidden" value="page">
                <div class="col-md-8">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Create Pages</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <input name="type" type="hidden" value="page">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title" style="font-weight: bold;">Title(<span style="color:red">*</span>)</label>
                                <input class="form-control rounded" type="text" name="title" value="{{ old('title') }}" id="title" placeholder="Title">
                            </div>
                            <div class="form-group">
                                <label for="title" style="font-weight: bold;">Video Url </label>
                                <input class="form-control rounded" type="url" name="url" value="{{ old('url') }}" id="url" placeholder="Video Url">
                            </div>
                            <div class="form-group" style="font-weight: bold;"><label>Description (<span style="color:red">*</span>)</label>
                                <textarea name="description" id="my-editor" style=".rte-modern.rte-desktop.rte-toolbar-default {  min-width: 626px;}" cols="30" rows="5" class="form-control rounded" value="">{{ old('description') }}</textarea>
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
                                    <label for="image" class="">Thumbnail Image <small>(for post or video thumbnail)</small></label>
                                    <input class=" form-control" type="file" id="blog_thumnail" name="blog_thumnail" value="" accept="image/*">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="font-weight: bold;">Published</label>
                                <div class="form-group">
                                    <label class="ui-checkbox">
                                        <input type="hidden" name="status" value=0><span class="input-span"></span>
                                        <input type="checkbox" name="status" value=1><span class="input-span"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="featured" style="font-weight: bold;">Featured</label>
                                <div class="form-group">
                                    <label class="ui-checkbox">
                                        <input type="hidden" name="featured" value=0><span class="input-span"></span>
                                        <input type="checkbox" name="featured" value=1><span class="input-span"></span>
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