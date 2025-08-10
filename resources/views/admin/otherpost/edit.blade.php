@extends('layouts.admin')
@section('title')
Admin Post Add | SCMS
@endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/cms/plugin/richtexteditor/richtexteditor/rte_theme_default.css')}}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
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
        <form action="{{ route($_base_route.'.update', $data['row']->post_unique_id )}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Create {{ $_panel }}</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="form-group">
                                <label for="title" style="font-weight: bold;">Category(<span style="color:red">*</span>)</label>
                                <select name="category_id" class="form-control category_id" id="category_id">
                                    @if(isset($data['category']) && $data['category']->count() > 0)
                                    @foreach($data['category'] as $key => $row)
                                    <option value="{{ $row->id }}" @if(old('category_id')==($row->id)) selected @endif {{ $row->id == $data['row']->category_id ? 'selected' : '' }}>{{$row->title}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title" style="font-weight: bold;">Title(<span style="color:red">*</span>)</label>
                                <input class="form-control rounded" type="text" name="title" value="@if(isset($data['row']->title)) {{ $data['row']->title   }} @endif" id="title" placeholder="Title">
                            </div>
                            <div class="form-group" style="font-weight: bold;"><label>Description (<span style="color:red">*</span>)</label>
                                <textarea name="description" id="my-editor" style=".rte-modern.rte-desktop.rte-toolbar-default {  min-width: 626px;}" cols="30" rows="5" class="form-control rounded" value="">@if(!empty($data['row']->description)) {{ $data['row']->description }} @else {{ old('row') }} @endif</textarea>
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
                                    <label for="image" class="">Thumbnail</label>
                                    <input class=" form-control" type="file" id="thumbnail" name="thumbnail" value="" accept="image/*">
                                </div>
                                @if(isset($data['row']->thumbnail) && !empty($data['row']->thumbnail))
                                <div class="form-group">
                                    <img src="{{ $data['row']->thumbnail }}" class="img  img-responsive" width="50px" height="50px" alt="{{ $data['row']->title }}" title="{{ $data['row']->title }}">
                                </div>
                                @else
                                <p>Thumbnail Not Found's !</p>
                                @endif
                                <div class="form-group ">
                                    <label for="video_url" class="">Video Url</label>
                                    <input class=" form-control" type="url" name="video_url" value="@if(isset($data['row']->video_url)) {{ $data['row']->video_url   }} @endif" accept="image/*">
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">File Section</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="box box-solid box-success">
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="increment-resource" style="float: right;">
                                        <button type="button" class="btn btn-primary btn-xs btn-file "><i class="fa fa-solid fa-plus"></i> Add New</button>
                                    </div>
                                    <div class="file-block"></div>
                                    <div class="clone-file hidden">
                                        <div class="control-group">
                                            <hr>
                                            <div class="form-group">
                                                <label for="titleFile">Document Title</label>
                                                <input type="title" name="file_title[]" class="form-control rounded" id="titleFile" placeholder="Enter document title" value="">
                                            </div>
                                            <div class="form-group">
                                                <label for="uploadFile">Document</label>
                                                <input type="file" name="files[]" class="form-control rounded" id="uploadFile" placeholder="Enter Username" value="">
                                            </div>
                                            <button type="button" class="btn btn-danger btn-xs  pull-right btn-file-remove">Remove File </button><br>
                                        </div>
                                    </div><br>
                                    @if(isset($data['file']) && $data['file']->count() > 0)
                                    <table class="display table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>File Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data['file'] as $row)
                                            <tr class="gradeX">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $row->title }}</td>
                                                <td>
                                                    @include('admin.section.buttons.button-delete-file')
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                    <p>File Not Found's !</p>
                                    @endif
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
                                        <input type="checkbox" name="status" value=1 @if($data['row']->status){{ "checked" }} @endif ><span class="input-span"></span>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script>
    $(document).ready(function() {
        var editor = new RichTextEditor("#my-editor");
        //widgets: ['Image', 'Link', 'Source code'],
        editor.setTheme('dark');
    });

    //file append
    $(".btn-file").click(function() {
        var html = $(".clone-file").html();
        $(".file-block").append(html);
    });
    $("body").on("click", ".btn-danger", function() {
        $(this).parents(".control-group").remove();
    });
</script>
@endsection