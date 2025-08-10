@extends('layouts.admin')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4  text-primary">Website Setting</h1>
</div>
@include('admin.setting.includes.button-nav')
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('admin.setting.update',  $data['setting']->id )}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Website Name</label> <br>
                        <input class="form-control rounded" type="text" id="site_name" value="@if(isset($data['setting']->site_name)) {{ $data['setting']->site_name }} @else {{ old('site_name') }} @endif" name="site_name" placeholder="Site Name">
                        @if($errors->has('site_name'))
                        <p id="name-error" class="help-block" for="site_name"><span>{{ $errors->first('site_name') }}</span></p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control rounded" type="email" value="@if(isset($data['setting']->site_email)) {{ $data['setting']->site_email }} @else {{ old('site_email') }} @endif" id="site_email" name="site_email" placeholder="Email">
                        @if($errors->has('site_email'))
                        <p id="name-error" class="help-block " for="site_email"><span>{{ $errors->first('site_email') }}</span></p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Tepehone</label>
                        <input class="form-control rounded" type="text" value="@if(isset($data['setting']->site_phone)) {{ $data['setting']->site_phone }} @else {{ old('site_phone') }} @endif" id="site_phone" name="site_phone" placeholder="Phone">
                        @if($errors->has('site_phone'))
                        <p id="name-error" class="help-block " for="site_phone"><span>{{ $errors->first('site_phone') }}</span></p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Mobile No</label>
                        <input class="form-control rounded" type="text" value="@if(isset($data['setting']->site_mobile)) {{ $data['setting']->site_mobile }} @else {{ old('site_mobile') }} @endif" id="site_mobile" name="site_mobile" placeholder="Mobile no">
                        @if($errors->has('site_mobile'))
                        <p id="name-error" class="help-block " for="mobile"><span>{{ $errors->first('site_mobile') }}</span></p>
                        @endif
                    </div>
                </div>
                {{-- <div class="col-md-3">
                    <div class="form-group">
                        <label>Fax</label>
                        <input class="form-control rounded" type="text" value="@if(isset($data['setting']->site_fax)) {{ $data['setting']->site_fax }} @else {{ old('site_fax') }} @endif" id="site_fax" name="site_fax" placeholder="मोबाइल नं">
                @if($errors->has('site_fax'))
                <p id="name-error" class="help-block " for="mobile"><span>{{ $errors->first('site_fax') }}</span></p>
                @endif
            </div>
    </div> --}}
    <div class="col-md-3">
        <div class="form-group">
            <label>Address 1</label>
            <input class="form-control rounded" type="text" value="@if(isset($data['setting']->site_first_address)) {{ $data['setting']->site_first_address }} @else {{ old('site_first_address') }} @endif" id="site_first_address" name="site_first_address" placeholder="Address 1">
            @if($errors->has('site_first_address'))
            <p id="name-error" class="help-block " for="mobile"><span>{{ $errors->first('site_first_address') }}</span></p>
            @endif
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Address 2</label>
            <input class="form-control rounded" type="text" value="@if(isset($data['setting']->site_second_address)) {{ $data['setting']->site_second_address }} @else {{ old('site_second_address') }} @endif" id="site_second_address" name="site_second_address" placeholder="Address 2">
            @if($errors->has('site_second_address'))
            <p id="name-error" class="help-block " for="mobile"><span>{{ $errors->first('site_second_address') }}</span></p>
            @endif
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Website Url</label>
            <input class="form-control rounded" type="url" value="@if(isset($data['setting']->site_url)) {{ $data['setting']->site_url }} @else {{ old('site_url') }} @endif" id="site_url" name="site_url" placeholder="Link">
            @if($errors->has('site_url'))
            <p id="name-error" class="help-block " for="mobile"><span>{{ $errors->first('site_url') }}</span></p>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>About Website </label>
            <textarea name="site_description" cols="30" rows="5" class="form-control rounded" value="">@if(isset($data['setting']->site_description)) {{ $data['setting']->site_description }} @else {{ old('site_description') }} @endif</textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Map </label>
            <textarea name="map" cols="30" rows="5" class="form-control rounded" value="">@if(isset($data['setting']->map)) {{ $data['setting']->map }} @else {{ old('map') }} @endif</textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Mail Subject <small style="color: red">(mail subject for member register)</small> </label>
            <input type="text" name="member_notice_mail_subject" class="form-control rounded" value="{{ old('member_notice_mail_subject', $data['setting']->member_notice_mail_subject) }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Mail Message <small style="color: red">(Mail Message for member register)</small></label>
            <textarea name="member_notice_mail" cols="30" rows="5" class="form-control rounded" value="">@if(isset($data['setting']->member_notice_mail)) {{ $data['setting']->member_notice_mail }} @else {{ old('member_notice_mail') }} @endif</textarea>
        </div>
    </div>
    {{-- <div class="col-md-6">
                    <div class="form-group">
                        <label>Mail Subject <small style="color: red">(mail subject for forgot password)</small> </label>
                        <input type="text" name="member_notice_mail_subject" class="form-control rounded" value="{{ old('member_notice_mail_subject', $data['setting']->member_notice_mail_subject) }}">
</div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label>Mail Message <small style="color: red">(Mail Message for forgot password)</small></label>
        <textarea name="member_notice_mail" cols="30" rows="5" class="form-control rounded" value="">@if(isset($data['setting']->member_notice_mail)) {{ $data['setting']->member_notice_mail }} @else {{ old('member_notice_mail') }} @endif</textarea>
    </div>
</div> --}}
<div class="col-md-6">
    <div class="form-group">
        <label>Member Counters </label>
        <input type="text" name="member_counters" class="form-control rounded" value="{{ old('member_counters', $data['setting']->member_counters) }}">
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label for="logo">Logo</label>
        <input class="form-control rounded" type="file" name="logo" id="logo" value="" accept="image/*">
    </div>
</div>

<div class="col-md-3">
    @if($data['setting']->logo)
    <div class="form-group">
        <label for=""></label><br>
        <img src="{{ asset($data['setting']->logo) }}" class="img  img-responsive" width="200px" alt="">
    </div>
    @else
    <p>No Image Found</p>
    @endif
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
<button type="reset" class="btn btn-warning btn-sm" style="cursor: pointer;"><i class="fa fa-ban"></i> Reset</button>
<button class="btn btn-success btn-sm" type="submit" style="cursor: pointer;"> <i class="fa fa-paper-plane"></i> Submit </button>
<!-- End Progress Bar Buttons-->
</form>
</div>
</div>
@endsection