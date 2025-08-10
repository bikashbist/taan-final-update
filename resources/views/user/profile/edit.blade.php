@extends('layouts.membership')
@section('css')
<style>
    .help-block {
        color: red;
    }
</style>
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4  text-primary">{{ $_panel }}</h1>
    <hr>
</div>
<div class="container-fluid">
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-one" role="tabpanel" aria-labelledby="pills-one-tab">
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Manage User Profile </h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('member.user_profile.update', ['id' => $data['profile']->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Full Name</label> <br>
                                            <input class="form-control rounded" type="text" id="name" name="name" value="{{ old('name', $data['profile']->name) }}" placeholder="Enter your  name">
                                            @if($errors->has('name'))
                                            <p id="name-error" class="help-block " for="name"><span>{{ $errors->first('name') }}</span></p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Post</label> <br>
                                            <input class="form-control rounded" type="text" id="post" name="member_post" value="{{ old('member_post',!empty($data['profile']->member) ? $data['profile']->member->member_post : '') }}" placeholder="Enter your position">
                                            @if($errors->has('member_post'))
                                            <p id="name-error" class="help-block " for="member_post"><span>{{ $errors->first('member_post') }}</span></p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Email</label> <br>
                                            <input class="form-control rounded" type="text" id="email" name="email" readonly value="{{ $data['profile']->email }}" placeholder="Enter your email">
                                            @if($errors->has('email'))
                                            <p id="name-error" class="help-block " for="name"><span>{{ $errors->first('email') }}</span></p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Phone</label> <br>
                                            <input class="form-control rounded" type="text" id="mobile" name="mobile" value="{{ $data['profile']->mobile }}" placeholder="Enter your phone">
                                            @if($errors->has('mobile'))
                                            <p id="name-error" class="help-block " for="name"><span>{{ $errors->first('mobile') }}</span></p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>User Profile</label> <br>
                                            <input class="form-control rounded" type="file" id="avatar" name="avatar" value="" placeholder="Enter your phone">
                                            @if($errors->has('avatar'))
                                            <p id="name-error" class="help-block " for="name"><span>{{ $errors->first('avatar') }}</span></p>
                                            @endif
                                            @if(Auth::user()->avatar)
                                            <img class="img-profile  img img-responsive img-thumbnail " src="{{ asset(Auth::user()->avatar) }}" width="150px" height="150px">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Begin Progress Bar Buttons-->
                                <div class="buttons ">
                                    <button class="btn btn-warning btn-sm " type="reset" style="cursor:pointer;"> <i class="fa fa-trash"></i> Reset</button>
                                    <button class="btn btn-success btn-sm" type="submit" style="cursor:pointer;"> <i class="fa fa-paper-plane"></i> Update</button>
                                </div>
                                <!-- End Progress Bar Buttons-->
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Manage User Credential & Security </h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('member.user_profile.passwordChange', ['id' => $data['profile']->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Current Password:*</label> <br>
                                            <input class="form-control rounded" type="password" id="current_password" name="current_password" value="" placeholder="Enter your  name">
                                            @if($errors->has('current_password'))
                                            <p id="name-error" class="help-block " for="name"><span>{{ $errors->first('current_password') }}</span></p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>New Password</label> <br>
                                            <input class="form-control rounded" type="password" id="password" name="password" value="" placeholder="New Password">
                                            @if($errors->has('password'))
                                            <p id="name-error" class="help-block " for="name"><span>{{ $errors->first('password') }}</span></p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Confirm Password:*</label> <br>
                                            <input class="form-control rounded" type="password" id="email" name="password_confirmation" value="" placeholder="Confirm Password">
                                            @if($errors->has('password_confirmation'))
                                            <p id="name-error" class="help-block " for="name"><span>{{ $errors->first('password_confirmation') }}</span></p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Begin Progress Bar Buttons-->
                                <div class="buttons ">
                                    <button class="btn btn-warning btn-sm " type="reset" style="cursor:pointer;"> <i class="fa fa-trash"></i> Reset</button>
                                    <button class="btn btn-success btn-sm" type="submit" style="cursor:pointer;"> <i class="fa fa-paper-plane"></i> Update</button>

                                </div>
                                <!-- End Progress Bar Buttons-->
                            </form>
                        </div>
                    </div>
                </div>

            </div>



        </div>

    </div>
</div>
@endsection
