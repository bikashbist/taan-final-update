@extends('layouts.membership')
@section('title')
Admin {{ $_panel }} List | SCMS
@endsection
@section('styles')
@endsection
@section('content')
@php
    $footer = [];
    if (!empty($data['member'])) {
        // $legal_documents = json_decode( $data['member']->legal_documents, true);
        $footer = json_decode( $data['member']['footer'], true);
        // $social = json_decode( $data['member']->social, true);
    }
@endphp
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4  text-primary">Website Setting</h1>
</div>
@include('user.setting.includes.button-nav')
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('member.setting.footer.update' ,auth()->user()->id )}}" method="POST" enctype="multipart/form-data">
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
                                <input class="form-control rounded" type="text" id="footer_first_title" value="{{ old('footer_first_title', !empty($footer['footer_first_title']) ? $footer['footer_first_title'] : '' ) }}" name="footer_first_title">
                                @if($errors->has('footer_first_title'))
                                <p id="name-error" class="help-block" for="site_name"><span>{{ $errors->first('footer_first_title') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description(*)</label>
                                <textarea name="footer_first_description" id="my-editor" cols="20" rows="3" class="form-control rounded" value="">{!! old('footer_first_description', !empty($footer['footer_first_description']) ? $footer['footer_first_description'] : '' ) !!}</textarea>
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
                                <input class="form-control rounded" type="text" id="site_name" value="{!! old('footer_second_title', !empty($footer['footer_second_title']) ? $footer['footer_second_title'] : '' ) !!}" name="footer_second_title">
                                @if($errors->has('footer_second_title'))
                                <p id="name-error" class="help-block" for="site_name"><span>{{ $errors->first('footer_second_title') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description(*)</label>
                                <textarea name="footer_second_description" id="my-editor-1" cols="10" rows="3" class="form-control rounded" value="">{!! old('footer_second_description', !empty($footer['footer_second_description']) ? $footer['footer_second_description'] : '' ) !!}</textarea>
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
                                <input class="form-control" type="text" id="footer_third_title" value="{!! old('footer_third_title', !empty($footer['footer_third_title']) ? $footer['footer_third_title'] : '' ) !!}" name="footer_third_title">
                                @if($errors->has('footer_third_title'))
                                <p id="name-error" class="help-block" for="site_name"><span>{{ $errors->first('footer_third_title') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description(*)</label>
                                <textarea name="footer_third_description" id="my-editor-2" cols="10" rows="3" class="form-control rounded" value="">{!! old('footer_third_description', !empty($footer['footer_third_description']) ? $footer['footer_third_description'] : '' ) !!}</textarea>
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
                                <input class="form-control" type="text" id="site_name-2" value="{!! old('footer_fourth_title', !empty($footer['footer_fourth_title']) ? $footer['footer_fourth_title'] : '' ) !!}" name="footer_fourth_title">
                                @if($errors->has('footer_fourth_title'))
                                <p id="name-error" class="help-block" for="site_name"><span>{{ $errors->first('footer_fourth_title') }}</span></p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description(*)</label>
                                <textarea name="footer_fourth_description" id="my-editor-3" cols="10" rows="3" class="form-control rounded" value="">{!! old('footer_fourth_description', !empty($footer['footer_fourth_description']) ? $footer['footer_fourth_description'] : '' ) !!}</textarea>
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
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('my-editor', options);
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
    CKEDITOR.replace('my-editor-1', options);
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
    CKEDITOR.replace('my-editor-2', options);
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
    CKEDITOR.replace('my-editor-3', options);
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
</script>

@endsection
