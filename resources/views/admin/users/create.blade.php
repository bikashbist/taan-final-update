@extends('layouts.admin')
@section('title')
Admin {{ $_panel }} Add | SCMS
@endsection
@section('styles')
<link href="{{ asset('assets/cms/plugin/nepali.datepicker.v4.0.4/nepali.datepicker.v4.0.4.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="page-heading">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{route( $_base_route.'.index' )}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-arrow-left fa-sm text-white-50"></i> Back </a>
    </div>
</div>
<div class="page-content fade-in-up">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">{{ $_panel }}</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item">option 1</a>
                            <a class="dropdown-item">option 2</a>
                        </div>
                    </div>
                </div>
                <div class="ibox-body">
                    <form action="{{ route($_base_route.'.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="full_name" style="font-weight: bold;">Full Name (<span style="color:red">*</span>)</label>
                                <input class="form-control rounded" type="text" name="full_name" id="full_name" value="{{ old('full_name') }}" placeholder="Full Name">
                                @if($errors->has('full_name'))
                                <p id="company_name-error" class="help-block" style="color: red;" for="full_name"><span>{{ $errors->first('full_name') }}</span></p>
                                @endif
                            </div>
                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="email" style="font-weight: bold;">Email (<span style="color:red">*</span>)</label>
                                <input class="form-control rounded" type="email" name="email" id="email" value="{{ old('email') }}" id="pan-address" placeholder="Email">
                                @if($errors->has('email'))
                                <p id="pan_no-error" class="help-block" style="color: red;" for="website"><span>{{ $errors->first('email') }}</span></p>
                                @endif
                            </div>
                            <div class="form-group col-md-3 col-12 col-lg-3">
                                <label for="password" style="font-weight: bold;">Password (<span style="color:red">*</span>)</label>
                                <input class="form-control rounded" type="password" name="password" id="password" value="{{ old('password') }}" placeholder="Password">
                                @if($errors->has('password'))
                                <p id="name-error" class="help-block" style="color: red;" for="password"><span>{{ $errors->first('password') }}</span></p>
                                @endif
                            </div>

                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-primary btn-sm" type="reset" style="cursor:pointer;"><i class="fa fa-ban"></i> Reset</button>
                            <a href="{{ route($_base_route.'.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-undo"></i> Back</a>
                            <button class="btn btn-success btn-sm" type="submit" style="cursor:pointer;"><i class="fa fa-paper-plane"></i> Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/cms/plugin/nepali.datepicker.v4.0.4/nepali.datepicker.v4.0.4.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/cms/dm_js/nepalidate.js')}}"></script>
<script>
    var npDate = document.getElementsByClassName("establish_date");
    if (npDate.length > 0) {
        NepaliDatePickerCal(npDate);
    }
</script>
@endsection