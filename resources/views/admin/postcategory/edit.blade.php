@extends('layouts.admin')
@section('title')
Admin {{ $_panel }} Edit | SCMS
@endsection
@section('styles')
<!-- PLUGINS STYLES-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
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
        <form action="{{ route($_base_route.'.update', $data['category']->id )}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Edit Category</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="form-group">
                                <label for="title">Category Name</label>
                                <input class="form-control" type="text" name="title" id="title" value="@if(isset($data['category']->title)) {{ $data['category']->title   }} @endif" placeholder="Category Name">
                            </div>
                            <div class="form-group">
                                <label for="title">Description</label>
                                <textarea name="description" id="my-editor" cols="30" rows="5" class="form-control rounded" value="">@if(isset($data['category']->description)) {{ $data['category']->description   }} @endif</textarea>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Published</label>
                                    <div class="form-group">
                                        <label class="ui-checkbox">
                                            <input type="hidden" name="status" value=0><span class="input-span"></span>
                                            <input type="checkbox" name="status" value=1 @if($data['category']->status){{ "checked" }} @endif ><span class="input-span"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <!-- Begin Progress Bar Buttons-->
                                <button class="btn btn-success btn-sm" type="submit" style="cursor:pointer;"> <i class="fa fa-paper-plane"></i> Submit </button>
                                <a href="{{ route($_base_route.'.index')}}" class="btn btn-warning btn-sm "><i class="fa fa-undo"></i> Back</a>
                                <!-- End Progress Bar Buttons-->
                            </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js" integrity="sha512-VvWznBcyBJK71YKEKDMpZ0pCVxjNuKwApp4zLF3ul+CiflQi6aIJR+aZCP/qWsoFBA28avL5T5HA+RE+zrGQYg==" crossorigin="anonymous"></script>
@endsection