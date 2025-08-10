@extends('layouts.admin')
@section('css')
<style>
    .help-block {
        color: red;
    }
</style>
@endsection
@section('content')
@include('admin.section.flash_message_error')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4  text-primary">{{ $_panel }}</h1>
    <hr>
</div>
<div class="container-fluid">
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-one" role="tabpanel" aria-labelledby="pills-one-tab">
            <div class="row">

                <div class="col-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Reset {{ $_panel }} passowrd</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.admin_users.resetPost', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
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
                                            <input class="form-control rounded" type="password" id="email" name="confirm_password" value="" placeholder="Confirm Password">
                                            @if($errors->has('confirm_password'))
                                            <p id="name-error" class="help-block " for="name"><span>{{ $errors->first('confirm_password') }}</span></p>
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
