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
        <form action="{{ route($_base_route.'.update', $data['rows']->id )}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Edit {{ $_panel }}</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="form-group">
                                <label for="name" style="font-weight: bold;">Name(<span style="color:red">*</span>)</label>
                                <input class="form-control rounded" type="text" name="name" value="@if(isset($data['rows']->name)) {{ $data['rows']->name   }} @endif" id="name" placeholder="Title">
                            </div>
                            <div class="form-group">
                                <label for="title" style="font-weight: bold;">Designation</label>
                                <input class="form-control rounded" type="text" name="designation" value="@if(isset($data['rows']->designation)) {{ $data['rows']->designation   }} @endif" id="designation" placeholder="Designation">
                            </div>
                            <div class="form-group" style="font-weight: bold;"><label>Description </label>
                                <textarea name="description" id="my-editor" style=".rte-modern.rte-desktop.rte-toolbar-default {  min-width: 626px;}" cols="30" rows="5" class="form-control rounded" value="">@if(isset($data['rows']->description)) {{ $data['rows']->description   }} @endif</textarea>
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
                                    <label for="image" class="">Thumbnail Image </label>
                                    <input class=" form-control" type="file" id="image" name="image" value="" accept="image/*">
                                </div>
                                @if(isset($data['rows']->image) && !empty($data['rows']->image))
                                <div class="form-group">
                                    <img src="{{ $data['rows']->image }}" class="img  img-responsive" width="50px" height="50px" alt="{{ $data['rows']->title }}" title="{{ $data['rows']->title }}">
                                </div>
                                @else
                                <p>Image Not Found's !</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="branch_id" style="font-weight: bold;">Branch</label>
                            <select name="branch_id" class="form-control difficult_id branch_id" id="branch_id">
                                <option selected>---Select Branch---</option>
                                @if(isset($data['branch']) && $data['branch']->count() > 0)
                                @foreach($data['branch'] as $row)
                                <option value="{{ $row->id }}" {{ old('branch_id',$data['rows']->branch_id) == $row->id ? 'selected' : ''  }}>{{ $row->title }}</option>
                                @endforeach
                                @endif
                            </select>
                            @if($errors->has('phone'))
                            <p id="name-error" class="help-block " for="phone"><span>{{ $errors->first('phone') }}</span></p>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label for="phone" style="font-weight: bold;">Phone</label>
                            <input class="form-control" type="text" id="phone" name="phone" value="@if(isset($data['rows']->phone)) {{ $data['rows']->phone   }} @endif" placeholder="Phone ">
                            @if($errors->has('phone'))
                            <p id="name-error" class="help-block " for="phone"><span>{{ $errors->first('phone') }}</span></p>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label for="email" style="font-weight: bold;">Email</label>
                            <input class="form-control" type="email" id="email" name="email" value="@if(isset($data['rows']->email)) {{ $data['rows']->email   }} @endif" placeholder="email ">
                            @if($errors->has('email'))
                            <p id="name-error" class="help-block " for="email"><span>{{ $errors->first('email') }}</span></p>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label for="name" style="font-weight: bold;">Facebook</label>
                            <input class=" form-control" type="url" id="facebook" name="facebook" value="@if(isset($data['rows']->social_profile_fb)) {{ $data['rows']->social_profile_fb   }} @endif" placeholder="social_profile_fb ">
                            @if($errors->has('name'))
                            <p id="name-error" class="help-block " for="site_email"><span>{{ $errors->first('name') }}</span></p>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label for="name" style="font-weight: bold;">Twitter</label>
                            <input class=" form-control" type="url" id="twitter" name="twitter" value="@if(isset($data['rows']->social_profile_twitter)) {{ $data['rows']->social_profile_twitter   }} @endif" placeholder="social_profile_twitter ">
                            @if($errors->has('name'))
                            <p id="name-error" class="help-block " for="site_email"><span>{{ $errors->first('name') }}</span></p>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label for="name" style="font-weight: bold;">Instagram</label>
                            <input class=" form-control" type="url" id="insta" name="insta" value="@if(isset($data['rows']->social_profile_insta)) {{ $data['rows']->social_profile_insta   }} @endif" placeholder="social_profile_insta ">
                            @if($errors->has('name'))
                            <p id="name-error" class="help-block " for="site_email"><span>{{ $errors->first('name') }}</span></p>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label for="social_profile_wikipedia" style="font-weight: bold;">Wikipedia</label>
                            <input class=" form-control" type="url" id="social_profile_wikipedia" name="social_profile_wikipedia" value="@if(isset($data['rows']->social_profile_wikipedia)) {{ $data['rows']->social_profile_wikipedia   }} @endif" placeholder="social_profile_wikipedia ">
                            @if($errors->has('social_profile_wikipedia'))
                            <p id="name-error" class="help-block " for="social_profile_wikipedia"><span>{{ $errors->first('social_profile_wikipedia') }}</span></p>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label for="from_to_date" style="font-weight: bold;">From-To Date (1974 – 1976)</label>
                            <input class="form-control" type="text" id="from_to_date" name="from_to_date" value="@if(isset($data['rows']->from_to_date)) {{ $data['rows']->from_to_date   }} @endif " placeholder="from_to_date">
                            @if($errors->has('from_to_date'))
                            <p id="name-error" class="help-block " for="from_to_date"><span>{{ $errors->first('from_to_date') }}</span></p>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="font-weight: bold;">Published</label>
                                <div class="form-group">
                                    <label class="ui-checkbox">
                                        <input type="hidden" name="status" value=0><span class="input-span"></span>
                                        <input type="checkbox" name="status" value=1 @if($data['rows']->status){{ "checked" }} @endif ><span class="input-span"></span>
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