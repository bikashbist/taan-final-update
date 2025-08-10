@extends('layouts.admin')
@section('title')
Admin {{ $_panel }} List | SCMS
@endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/cms/plugin/richtexteditor/richtexteditor/rte_theme_default.css')}}" />

@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4  text-primary">Website Setting</h1>
</div>
@include('admin.setting.includes.button-nav')
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('admin.setting.footer.update' ,$data['single']->id )}}" method="POST" enctype="multipart/form-data">
            @csrf
            <ul class="nav nav-tabs nav-fill">
                <li class="nav-item">
                    <a class="nav-link active" href="#tab-2-1" data-toggle="tab">First</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tab-2-2" data-toggle="tab">Second</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tab-2-3" data-toggle="tab">Third</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tab-2-4" data-toggle="tab">Forth</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-2-1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Site First Title (*)</label> <br>
                                <input class="form-control rounded" type="text" id="footer_first_title" value="@if(isset($data['single']->footer_first_title)) {{ $data['single']->footer_first_title }} @else {{ old('footer_first_title') }} @endif" name="footer_first_title">
                                @if($errors->has('footer_first_title'))
                                <p id="name-error" class="help-block" for="site_name"><span>{{ $errors->first('footer_first_title') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description(*)</label>
                                <textarea name="footer_first_description" id="my-editor" cols="20" rows="3" class="form-control rounded" value="">@if(isset($data['single']->footer_first_description)) {{ $data['single']->footer_first_description }} @else {{ old('footer_first_title') }} @endif</textarea>
                                @if($errors->has('footer_first_description'))
                                <p id="name-error" class="help-block " for="site_email"><span>{{ $errors->first('footer_first_description') }}</span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab-2-2">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Site Second Title (*)</label> <br>
                                <input class="form-control rounded" type="text" id="site_name" value="@if(isset($data['single']->footer_second_title)) {{ $data['single']->footer_second_title }} @else {{ old('footer_second_title') }} @endif" name="footer_second_title">
                                @if($errors->has('footer_second_title'))
                                <p id="name-error" class="help-block" for="site_name"><span>{{ $errors->first('footer_second_title') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description(*)</label>
                                <textarea name="footer_second_description" id="my-editor-1" cols="10" rows="3" class="form-control rounded" value="">@if(isset($data['single']->footer_second_description)) {{ $data['single']->footer_second_description }} @else {{ old('footer_second_description') }} @endif</textarea>
                                @if($errors->has('footer_second_description'))
                                <p id="name-error" class="help-block " for="site_email"><span>{{ $errors->first('footer_second_description') }}</span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-2-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Site Third Title (*)</label> <br>
                                <input class="form-control" type="text" id="footer_third_title" value="@if(isset($data['single']->footer_third_title)) {{ $data['single']->footer_third_title }} @else {{ old('footer_third_title') }} @endif" name="footer_third_title">
                                @if($errors->has('footer_third_title'))
                                <p id="name-error" class="help-block" for="site_name"><span>{{ $errors->first('footer_third_title') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description(*)</label>
                                <textarea name="footer_third_description" id="my-editor-2" cols="10" rows="3" class="form-control rounded" value="">@if(isset($data['single']->footer_third_description)) {{ $data['single']->footer_third_description }} @else {{ old('footer_third_description') }} @endif</textarea>
                                @if($errors->has('footer_third_description'))
                                <p id="name-error" class="help-block " for="site_email"><span>{{ $errors->first('footer_third_description') }}</span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-2-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Site Forth Title (*)</label> <br>
                                <input class="form-control" type="text" id="site_name-2" value="@if(isset($data['single']->footer_fourth_title)) {{ $data['single']->footer_fourth_title }} @else {{ old('footer_fourth_title') }} @endif" name="footer_fourth_title">
                                @if($errors->has('footer_fourth_title'))
                                <p id="name-error" class="help-block" for="site_name"><span>{{ $errors->first('footer_fourth_title') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description(*)</label>
                                <textarea name="footer_fourth_description" id="my-editor-3" cols="10" rows="3" class="form-control rounded" value="">@if(isset($data['single']->footer_fourth_description)) {{ $data['single']->footer_fourth_description }} @else {{ old('footer_fourth_description') }} @endif</textarea>
                                @if($errors->has('footer_fourth_description'))
                                <p id="name-error" class="help-block " for="site_email"><span>{{ $errors->first('footer_fourth_description') }}</span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Begin Progress Bar Buttons-->
            <button class="btn btn-success btn-sm float-right" type="submit"> <i class="fa fa-paper-plane"></i> Submit </button>
            <!-- End Progress Bar Buttons-->
            <!-- End Progress Bar Buttons-->
        </form>
    </div>
</div>

@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('assets/cms/plugin/richtexteditor/richtexteditor/rte.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/cms/plugin/richtexteditor/richtexteditor/plugins/all_plugins.js')}}"></script>
<script>
    var editor1 = new RichTextEditor("#my-editor");
    //editor1.setHTMLCode("Use inline HTML or setHTMLCode to init the default content.");

    var editor1 = new RichTextEditor("#my-editor-1");
    //editor1.setHTMLCode("Use inline HTML or setHTMLCode to init the default content.");


    var editor1 = new RichTextEditor("#my-editor-2");
    //editor1.setHTMLCode("Use inline HTML or setHTMLCode to init the default content.");


    var editor1 = new RichTextEditor("#my-editor-3");
    //editor1.setHTMLCode("Use inline HTML or setHTMLCode to init the default content.");
</script>

@endsection