@extends('layouts.membership')
@section('title')
Admin {{ $_panel }} List | SCMS
@endsection
@section('content')
@php

    $social = [];
    if (!empty($data['member'])) {
        $social = json_decode( $data['member']->social, true);
    }
@endphp
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4  text-primary"> {{ $_panel }}</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('member.setting.social.store', auth()->user()->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group ">
                <div class="row">
                    <label for="facebook" class="control-label col-md-2">Facebook Link</label>
                    <div class="col-md-10">
                        <input class=" form-control rounded" type="url" id="facebook" name="facebook" value="{{ old('facebook', !empty($social['facebook']) ? $social['facebook'] : '') }}">
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <div class="row">
                    <label for="facebook" class="control-label col-md-2">Twitter Link</label>
                    <div class="col-md-10">
                        <input class=" form-control rounded" type="url" id="twitter" name="twiter" value="{{ old('twitter', !empty($social['twiter']) ? $social['twiter'] : '') }}">
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <div class="row">
                    <label for="facebook" class="control-label col-md-2">Instagram</label>
                    <div class="col-md-10">
                        <input class=" form-control rounded" type="url" id="insta" name="instagram" value="{{ old('instagram', !empty($social['instagram']) ? $social['instagram'] : '') }}">
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <div class="row">
                    <label for="facebook" class="control-label col-md-2">Youtube</label>
                    <div class="col-md-10">
                        <input class=" form-control rounded" type="url" id="youtube" name="youtube" value="{{ old('youtube', !empty($social['youtube']) ? $social['youtube'] : '') }}">
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <div class="row">
                    <label for="facebook" class="control-label col-md-2">Linkedin</label>
                    <div class="col-md-10">
                        <input class=" form-control rounded" type="url" id="linked_in" name="linked_in" value="{{ old('linked_in', !empty($social['linked_in']) ? $social['linked_in'] : '') }}">
                    </div>
                </div>
            </div>
            <!-- Begin Progress Bar Buttons-->
            <button type="reset" class="btn btn-warning btn-sm"><i class="fa fa-ban"></i> Reset</button>
            <button class="btn btn-success btn-sm" type="submit"> <i class="fa fa-paper-plane"></i> Submit </button>

            <!-- End Progress Bar Buttons-->
        </form>
    </div>
</div>
@endsection
