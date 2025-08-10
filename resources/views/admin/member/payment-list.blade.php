@extends('layouts.admin')
@section('styles')
<link href="{{ asset('assets/cms/vendors/DataTables/datatables.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 text-primary">Payment List</h1>
    </div>
    <div class="ibox">
        <div class="ibox-body">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="newrequest">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>ID</th>
                                <th>Organization</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Amount</th>
                                <th>Voucher</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['payments'] as $key => $payment)
                            <tr>
                                <td>{{ $key+1 }}.</td>
                                <td>{{ $payment->member_id }}</td>
                                <td>{{ $payment->organization_name }}</td>
                                <td>{{ $payment->start_date }}</td>
                                <td>{{ $payment->end_date }}</td>
                                <td>{{ $payment->amount }}</td>
                                <td><a href="" target="_blank">View</a></td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="" class="btn btn-danger btn-sm delete">Delete</a>
                                </td>
                            </tr>
                            @endforeach 

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/cms/vendors/DataTables/datatables.min.js')}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example-table').DataTable();
    });
   
</script>

@endsection