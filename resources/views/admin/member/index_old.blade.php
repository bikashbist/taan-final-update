@extends('layouts.admin')
@section('styles')
<link href="{{ asset('assets/cms/vendors/DataTables/datatables.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{route( $_base_route.'.create' )}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> Add {{ $_panel }} </a>
        <a href="{{ route($_base_route.'.deleted_item')}}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fa fa-trash-o fa-sm text-white-50"></i> Recycle Bin </a>
    </div>
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">{{ $_panel }} List</div>
        </div>
        <div class="ibox-body">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="newrequest">
                    <table class="table table-striped table-bordered table-hover table-responsive" id="example-table" style="width:100%">
                        <thead>
                            <tr>
                                <th rowspan="3">S.N</th>
                                <th rowspan="3">Organization Name</th>
                                <th rowspan="3">Type</th>
                                <th rowspan="3">Email</th>
                                <th rowspan="3">Reg. No</th>
                                <th rowspan="3">PAN/VAT No</th>
                                <th rowspan="3">Address</th>
                                <th rowspan="3">Country</th>
                                <th rowspan="3">Telephone</th>
                                <th rowspan="3">Mobile</th>
                                <th rowspan="3">Fax</th>
                                <th rowspan="3">PO Box</th>
                                <th rowspan="3">Key Person</th>
                                <th rowspan="3">Establish Date</th>
                                <th rowspan="3">Website</th>
                                <th rowspan="3">Status</th>
                                <th rowspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($data['rows']) && $data['rows']->count() > 0)
                            @foreach( $data['rows'] as $key=> $row)
                            <tr>
                                <td>{{ $key+1}}.</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><span class="badge badge-{{ ($row->status == 1) ? 'success' : 'warning'}} badge-pill m-r-5 m-b-5">{{ ($row->status == 1) ? 'Published' : 'Unpublished'}}</span></td>
                                <td>
                                    @include('admin.section.buttons.button-edit')
                                    @include('admin.section.buttons.button-delete')
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="16" class="text-center">No data available in table</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/cms/vendors/DataTables/datatables.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        $(function() {
            $('#example-table').DataTable({
                pageLength: 10,
                responsive: true
            });
        })

    });
</script>
@endsection