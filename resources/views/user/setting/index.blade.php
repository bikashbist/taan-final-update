@extends('layouts.membership')
@section('content')
@php
    $legal_documents = [];
    $company = [];
    $social = [];
    if (!empty($data['member'])) {
        // $legal_documents = json_decode( $data['member']->legal_documents, true);
        $company = json_decode( $data['member']->company, true);
        // $social = json_decode( $data['member']->social, true);
    }
@endphp
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4  text-primary">Website Setting</h1>
</div>
@include('user.setting.includes.button-nav')
@if($data['member'] == null)
    <div class="alert alert-warning" role="alert">
        Your membership details are either not filled or not verified. Please contact support for more information.
    </div>
@else

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('member.setting.update',  auth()->user()->id )}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Company Name</label> <br>
                        <input class="form-control rounded" type="text" id="company_name" value="{{ old('company_name', !empty($company['company_name']) ? $company['company_name'] : '')  }}" name="company_name" placeholder="company name">
                        @if($errors->has('company_name'))
                        <p id="company_name-error" class="help-block" for="company_name"><span>{{ $errors->first('company_name') }}</span></p>
                        @endif
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Company Founded Year</label> <br>
                        <input class="form-control rounded" type="text" id="company_founded_year" value="{{ old('company_founded_year', !empty($company['company_founded_year']) ? $company['company_founded_year'] : '') }}" name="company_founded_year" placeholder="Company founded year">
                        @if($errors->has('company_founded_year'))
                        <p id="company_founded_year-error" class="help-block" for="company_founded_year"><span>{{ $errors->first('company_founded_year') }}</span></p>
                        @endif
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Website Url</label>
                        <input class="form-control rounded" type="url" value="{{ old('company_website', !empty($company['company_website']) ? $company['company_website'] : '') }}" id="company_website" name="company_website" placeholder="company website Link">
                        @if($errors->has('company_website'))
                        <p id="company_website-error" class="help-block " for="company_website"><span>{{ $errors->first('company_website') }}</span></p>
                        @endif
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>About Website </label>
                        <textarea name="about_us" cols="30" rows="5" class="form-control rounded summernote" value="">{{ old('about_us', !empty($data['member']->about_us) ? $data['member']->about_us : '') }}</textarea>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <input class="form-control rounded" type="file" name="company_logo" id="logo" value="" accept="image/*">
                        @if(!empty($company['company_logo']))
                        <img src="{{ asset($company['company_logo']) }}" alt="Company Logo" height="50" width="50">
                        @endif

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="logo">Thumbnail</label>
                        <input class="form-control rounded" type="file" name="thumbnail" id="thumbnail" value="" accept="image/*">
                        {{-- @dd($member->thumbnail) --}}
                        @if(!empty($data['member']->thumbnail))
                        <img src="{{ asset($data['member']->thumbnail) }}" alt="Thumnail" height="50" width="50">
                        @endif

                    </div>
                </div>


                <div class="col-md-3">
                    <div class="form-group rounded">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group rounded">
                    </div>
                </div>
            </div>
            <!-- Begin Progress Bar Buttons-->
            <button type="reset" class="btn btn-warning btn-sm" style="cursor: pointer;"><i class="fa fa-ban" ></i> Reset</button>
            <button class="btn btn-success btn-sm" type="submit" style="cursor: pointer;"> <i class="fa fa-paper-plane"></i> Submit </button>
            <!-- End Progress Bar Buttons-->
        </form>
    </div>
</div>
@endif
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        //summernote
        $(document).ready(function() {
            $('.summernote').summernote({
                tabsize: 2,
                height: 180
            });
        });
        //select 2
        $(".select_category").select2({
            placeholder: "Select",
            allowClear: true
        });
        //slider miages
        $(".btn-img").click(function() {
            var html = $(".clone-img").html();
            $(".slider-image-block").append(html);
        });
        $("body").on("click", ".btn-danger", function() {
            $(this).parents(".control-group").remove();
        });
    });
</script>
@endsection
