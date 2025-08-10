@extends('layouts.admin')
@section('title')
Admin {{ $_panel }} Add | SCMS
@endsection

@section('styles')
<!-- PLUGINS STYLES -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
@endsection

@section('content')
@include('admin.section.flash_message_error')

<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route($_base_route.'.index') }}"><i class="fa fa-home"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route($_base_route.'.index') }}">{{ $_panel }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route($_base_route.'.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- User Information -->
                <div class="col-md-12">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Add {{ $_panel }}</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body row">
                            <div class="form-group col-md-4 col-12 col-lg-4">
                                <label for="name">Name</label>
                                <input class="form-control rounded" type="text" name="name" id="name" value="{{ old('name', $user->name) }}" placeholder="Full Name">
                                @if($errors->has('name'))
                                <p id="name-error" class="help-block " for="name"><span>{{ $errors->first('name') }}</span></p>
                                @endif
                            </div>

                            <div class="form-group col-md-4 col-12 col-lg-4">
                                <label for="email">Email</label>
                                <input class="form-control rounded" type="email" name="email" id="email" value="{{ old('email', $user->email) }}" placeholder="Email">
                            </div>
                            @if($errors->has('email'))
                            <p id="name-error" class="help-block " for="email"><span>{{ $errors->first('email') }}</span></p>
                            @endif
                            <div class="form-group col-md-4 col-12 col-lg-4">
                                <label for="mobile">Phone</label>
                                <input class="form-control rounded" type="number" name="mobile" id="mobile" value="{{ old('mobile', $user->mobile) }}" placeholder="Mobile">
                                @if($errors->has('mobile'))
                                <p id="name-error" class="help-block " for="mobile"><span>{{ $errors->first('mobile') }}</span></p>
                                @endif
                            </div>

                            <div class="form-group col-md-4 col-12 col-lg-4">
                                <label for="password">Password</label>
                                <input class="form-control rounded" type="password" name="password" id="password" value="{{ old('password') }}" placeholder="Password">
                                @if($errors->has('password'))
                                <p id="name-error" class="help-block " for="password"><span>{{ $errors->first('password') }}</span></p>
                                @endif
                            </div>

                            <div class="form-group col-md-4 col-12 col-lg-4">
                                <label for="password">Confirm Password</label>
                                <input class="form-control rounded" type="password" name="confirm_password" id="confirm_password" value="{{ old('c_password') }}" placeholder="Password">
                                @if($errors->has('confirm_password'))
                                <p id="name-error" class="help-block " for="password"><span>{{ $errors->first('confirm_password') }}</span></p>
                                @endif
                            </div>
                            <div class="form-group col-md-4 col-12 col-lg-4">
                                <label for="avatar">Profile</label>
                                <input class="form-control rounded" type="file" name="avatar" id="avatar" value="{{ old('avatar') }}" placeholder="Profile" accept="image/*">
                                @if($user->avatar != null)
                                <img src="{{ asset($user->avatar) }}" height="50" width="100" alt="avatar">
                                @endif
                                @if($errors->has('avatar'))
                                <p id="avatar-error" class="help-block " for="avatar"><span>{{ $errors->first('avatar') }}</span></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-12 text-right">
                    <a href="{{ route($_base_route.'.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                    <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-save"></i> Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/cms/js/scripts/form-plugins.js') }}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js" integrity="sha512-VvWznBcyBJK71YKEKDMpZ0pCVxjNuKwApp4zLF3ul+CiflQi6aIJR+aZCP/qWsoFBA28avL5T5HA+RE+zrGQYg==" crossorigin="anonymous"></script>

@endsection
