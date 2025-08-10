@extends('layouts.admin')
@section('styles')
<link href="{{ asset('assets/cms/vendors/DataTables/datatables.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection
@section('content')
<div class="container-fluid">
    <h1 class="h4  text-primary"> {{ $_panel }} List</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{route( $_base_route.'.create' )}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> Add {{ $_panel }} </a>
    </div>
    <div class="ibox">
        <div class="ibox-body">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="newrequest">
                    <table class="table table-striped table-bordered table-hover data-table" id="example-table" cellspacing="0" width="100%">
                        <thead class="thead-light">
                            <tr>
                                <th>S.N</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Branch</th>
                                <th>Phone</th>
                                <th>Images</th>
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
    </div>
</div>
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
            // lengthChange: true,
            pageLength: 10,
            paging: true,
            // info: true,
            // autoWidth: false,
            responsive: true,
            ajax: "{{ route('admin.staff.index') }}",
            columns: [{
                    "data": 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'designation',
                    name: 'designation'
                },
                {
                    data: 'branch_id',
                    name: 'branch_id'
                },
                {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'image',
                    name: 'image',
                    orderable: false,
                    searchable: false
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
</script>
@endsection