@extends('layouts.membership')
@section('title', 'DataTables')
@section('styles')
<link href="{{ asset('assets/cms/vendors/DataTables/datatables.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection
@section('content')
<div class="page-heading">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{route( $_base_route.'.create' )}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> Add {{ $_panel }} </a>
        <strong>Total {{ $_panel }}: {{ $data['total']}} </strong>
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
                        <th>Title</th>
                        <th>Category</th>
                        <th>Thumbnail</th>
                        <th>Created_at</th>
                        <th>Visit Count</th>
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
            // lengthChange: true,
            pageLength: 10,
            paging: true,
            // info: true,
            // autoWidth: false,
            responsive: true,
            ajax: "{{ route('member.blog.indexMemberPost') }}",
            columns: [{
                    "data": 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'category_id',
                    name: 'category_id'
                },
                {
                    data: 'image',
                    name: 'image'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },

                {
                    data: 'visit_no',
                    name: 'visit_no'
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