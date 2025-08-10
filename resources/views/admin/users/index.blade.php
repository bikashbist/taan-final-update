@extends('layouts.admin')
@section('title', 'DataTables')
@section('styles')
<link href="{{ asset('assets/cms/vendors/DataTables/datatables.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection
@section('content')
<div class="page-heading">
    <div class="d-sm-flex align-items-left  mb-4">
        <a href="{{route( $_base_route.'.create' )}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> Add New</a> &nbsp;&nbsp;
        <button onclick="refreshDataTable()" class="btn btn-secondary btn-sm"><i class="fa fa-refresh" aria-hidden="true"></i> Refresh</button>
    </div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
    </ol>
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">{{ $_panel }} List</div>
        </div>
        <div class="ibox-body card-body" style="overflow-x: auto;">
            <table class="table table-striped table-bordered table-hover data-table" id="example-table" cellspacing="0" width="100%">
                <thead class="thead-light">
                    <tr>
                        <th>S.N</th>
                        <th>Organization</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Created</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT-->
@endsection
@section('scripts')
<script src="{{ asset('assets/cms/vendors/DataTables/datatables.min.js')}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<script type="text/javascript">
    $(function() {
        var i = 1;
        var table = $('#example-table').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            searching: true,
            lengthChange: true,
            pageLength: 10,
            paging: true,
            info: true,
            autoWidth: false,
            responsive: true,
            stateSave: true,
            stateDuration: -1,
            ajax: "{{ route('admin.users.index') }}",
            columns: [{
                    "data": 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'organization_name',
                    name: 'organization_name'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'mobile',
                    name: 'mobile'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }

            ]
        });
    });
    // Refresh Data Table
    function refreshDataTable() {
        $('#example-table').DataTable().ajax.reload();
    }
    // setInterval(function() {
    //     $('#example-table').DataTable().ajax.reload();
    // }, 2000); // Refresh every 5 seconds
</script>
<script type="text/javascript">
    function statusChange(checkbox) {
        var id = checkbox.dataset.id;
        var value = checkbox.checked ? 1 : 0;
        var url = "{{route('admin.users.status')}}";
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: url,
            data: {
                'is_member': value,
                'id': id,
                _token: '{{csrf_token()}}',
            },
            success: function(data) {
                // location.reload(true);
            },
            error: function(data) {
                // location.reload(true);
            }
        });
    }
</script>
@endsection