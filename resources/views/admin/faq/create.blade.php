@extends('layouts.admin')
@section('title')
Admin {{ $_panel }} Add | SCMS
@endsection
@section('styles')

@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4  text-primary">{{ $_panel }}</h1>
</div>
@include('admin.section.flash_message_error')
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route($_base_route.'.store')}}" method="POST" enctype="multipart/form-data">
            <div class="row">
                @csrf
                <div class="col-md-12">
                    <div class="ibox">
                        <table class="table table-bordered" id="dynamicTable">
                            <tr>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <td style="width:20rem"><input type="text" name="addmore[0][question]" placeholder="Enter Question" class="form-control" /></td>
                                <td style="width:60rem"><input type="text" name="addmore[0][answer]" placeholder="Enter Answer" class="form-control" /></td>
                                <td colspan="1"><button type="button" name="add" id="add" class="btn btn-sm btn-success">Add More</button></td>
                            </tr>
                        </table>
                        <!-- Begin Progress Bar Buttons-->
                        <a href="{{ route($_base_route.'.index')}}" class="btn btn-warning btn-sm"><i class="fa fa-undo"></i> Back</a>
                        <button class="btn btn-success btn-sm" type="submit" style="cursor:pointer;"> <i class="fa fa-paper-plane"></i> Submit </button>
                        <!-- End Progress Bar Buttons-->
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    var i = 0;
    $("#add").click(function() {
        ++i;
        $("#dynamicTable").append('<tr><td><input type="text" name="addmore[' + i + '][question]" placeholder="Enter Question" class="form-control" /></td><td><input type="text" name="addmore[' + i + '][answer]" placeholder="Enter Answer" class="form-control" /></td><td><button type="button" class="btn btn-danger btn-sm remove-tr">Remove</button></td></tr>');
    });
    $(document).on('click', '.remove-tr', function() {
        $(this).parents('tr').remove();
    });
</script>
@endsection