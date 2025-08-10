@extends('layouts.admin')
@section('title')
Admin {{ $_panel }} Add | SCMS
@endsection
@section('styles')
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index')}}"><i class="fa fa-home"></i> Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route($_base_route.'.index')}}">{{ $_panel }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>
        <!--breadcrumbs end -->
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-md-5">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Category List</div>
                        <div class="ibox-tools">
                            <a href="#myModal3" class="btn btn-success btn-sm" style="color: #fff;" data-toggle="modal"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModal3">Category List</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="title" style="font-weight: bold;">Title</label>
                                            <input class="form-control" type="text" id="title" name="title" id="title" value="{{ old('title') }}" placeholder="Gallery Name">
                                            @if($errors->has('title'))
                                            <p id="company_name-error" class="help-block" style="color: red;" for="title"><span>{{ $errors->first('title') }}</span></p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <select name="status" id="status" class="form-control">
                                                <option value="">Select Status</option>
                                                <option value="1" selected>Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal -->
                    </div>
                    <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($data['rows']) && $data['rows']->count() > 0)
                                @foreach($data['rows'] as $key => $row)
                                <tr>
                                    <th scope="row">{{ $key+1}}</th>
                                    <td>{{ $row->title }}</td>
                                    <td>
                                        @if($row->status == 1)
                                        <span class="badge badge-success">Active</span>
                                        @else
                                        <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route($_base_route.'.edit', $row->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                        <button style="cursor:pointer" data-id="{{ $row->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="4" class="text-center">No data found</td>
                                </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Add {{ $_panel }}</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                            <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                        </div>
                    </div>
                    <form action="{{ route($_base_route.'.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="ibox-body">
                            <div class="form-group">
                                <label for="title" style="font-weight: bold;">Choose Category</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Select Category</option>
                                    @if(isset($data['category']) && $data['category']->count() > 0)
                                    @foreach($data['category'] as $key => $row)
                                    <option value="{{ $row->id }}">{{ $row->title }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if($errors->has('category_id'))
                                <p id="company_name-error" class="help-block" style="color: red;" for="category_id"><span>{{ $errors->first('category_id') }}</span></p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="title" style="font-weight: bold;">Name</label>
                                <input class="form-control" type="text" id="title" name="title" id="title" value="{{ old('title') }}" placeholder="Gallery Name">
                                @if($errors->has('title'))
                                <p id="company_name-error" class="help-block" style="color: red;" for="title"><span>{{ $errors->first('title') }}</span></p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="url" style="font-weight: bold;">Thumbnail</label>
                                <input class="form-control" type="file" name="image" id="image" value="{{ old('image') }}">
                                @if($errors->has('image'))
                                <p id="company_name-error" class="help-block" style="color: red;" for="image"><span>{{ $errors->first('image') }}</span></p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label style="font-weight: bold;">Published</label>
                                <div class="form-group">
                                    <label class="ui-checkbox">
                                        <input type="hidden" name="status" value=0><span class="input-span"></span>
                                        <input type="checkbox" name="status" value=1><span class="input-span"></span>
                                    </label>
                                </div>
                            </div>
                            <a href="{{ route($_base_route.'.index')}}" class="btn btn-warning btn-sm"><i class="fa fa-undo"></i> Back</a>
                            <button class="btn btn-success btn-sm" type="submit" style="cursor:pointer;"> <i class="fa fa-paper-plane"></i> Submit </button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        // Store Gallery Category
        $('#myModal3 .btn-primary').click(function() {
            var title = $('#title').val();
            var status = $('#status').val();
            $.ajax({
                url: "{{ route('admin.gallery.storeCategory') }}",
                type: 'POST',
                data: {
                    title: title,
                    status: status,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    console.log(data);
                    if (data.success == true) {
                        toastr.success(data.message);
                        $('#myModal3').modal('hide');
                        // $('#title').val('');
                        // $('#status').val('');
                        location.reload();
                    } else {
                        // Validation Error Message...
                        toastr.error(data.message);
                    }
                }
            });
        });
        // Delete Gallery Category
        $('.btn-danger').click(function() {
            var id = $(this).data('id');
            $.ajax({
                url: "{{ route('admin.gallery.destroyCategory') }}",
                type: 'POST',
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    console.log(data);
                    if (data.success == true) {
                        toastr.success(data.message);
                        location.reload();
                    } else {
                        // Validation Error Message...
                        toastr.error(data.message);
                    }
                }
            });
        });
    });
</script>
@endsection