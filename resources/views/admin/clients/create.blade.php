@extends('layouts.admin')
@section('title')
Admin {{ $_panel }} Add | SCMS
@endsection
@section('styles')
<!-- PLUGINS STYLES-->
<link href="{{ asset('assets/cms/vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4  text-primary">{{ $_panel }} Add</h1>
</div>
@include('admin.section.flash_message_error')
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route($_base_route.'.store')}}" method="POST" enctype="multipart/form-data">
            <div class="row">
                @csrf
                <div class="col-md-12">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Add {{ $_panel }}</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="name">Clients Name</label>
                                    <input class="form-control rounded" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Client Name">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="url">Clients Link</label>
                                    <input class="form-control rounded" type="url" name="url" id="url" value="{{ old('url') }}" placeholder="Clients Link">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="title">Thumbnail</label>
                                    <input class="form-control rounded" type="file" name="image" id="title" value="" placeholder="Product Url" accept="image/png, image/gif, image/jpeg">
                                    @if($errors->has('image'))
                                    <p id="name-error" class="help-block " for="site_email"><span>{{ $errors->first('image') }}</span></p>
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Published</label>
                                    <div class="form-group">
                                        <label class="ui-checkbox">
                                            <input type="hidden" name="status" value=0><span class="input-span"></span>
                                            <input type="checkbox" name="status" value=1><span class="input-span"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            

                            <!-- Begin Progress Bar Buttons-->
                            <a href="{{ route($_base_route.'.index')}}" class="btn btn-warning btn-sm"><i class="fa fa-undo"></i> Back</a>
                            <button class="btn btn-success btn-sm" type="submit" style="cursor:pointer;"> <i class="fa fa-paper-plane"></i> Submit </button>
                            <!-- End Progress Bar Buttons-->
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/cms/vendors/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
<script>
    //select 2
    $(".select_category").select2({
        placeholder: "Select",
        allowClear: true
    });
</script>
@endsection