@extends('layouts.membership')
@section('styles')
<link href="{{ asset('assets/cms/vendors/DataTables/datatables.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{route( $_base_route.'.create' )}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm "><i class="fa fa-plus fa-sm text-white-50"></i> Add {{ $_panel }} </a>
    </div>

    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">{{ $_panel }}</div>
        </div>
        <div class="ibox-body">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="newrequest">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Video Title</th>
                                <th>Video</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($data['rows']))
                            @foreach( $data['rows'] as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->video_title }}</td>
                                <td>
                                    @if($row->video_id)
                                    <iframe  src="https://www.youtube.com/embed/<?php echo $row->video_id; ?>" frameborder="0"></iframe>
                                    @else
                                    Video Not found !
                                    @endif
                                </td>
                                <td><span class="badge badge-{{ ($row->status == 1) ? 'success' : 'warning'}} badge-pill m-r-5 m-b-5">{{ ($row->status == 1) ? 'Published' : 'Unpublished'}}</span></td>
                                <td>
                                    @include('admin.section.buttons.button-edit')
                                    @include('admin.section.buttons.button-delete')
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <p>Data Not Founds !</p>
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
