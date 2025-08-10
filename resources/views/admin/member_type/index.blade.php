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
        <h1 class="h4 text-primary"> {{ $_panel }} List</h1>
        <a href="{{ route($_base_route.'.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> Add {{ $_panel }} </a>
    </div>
    <div class="ibox">
        <div class="ibox-body">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="newrequest">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['rows'] as $key => $row)
                            <tr>
                                <td>{{ $key + 1 }}.</td>
                                <td>{{ $row->title }}</td>
                                <td>
                                    <input type="checkbox" class="toggle-class" data-id="{{ $row->id }}" {{ $row->status ? 'checked' : '' }} >
                                </td>
                                <td>
                                    @include('admin.section.buttons.button-edit')
                                    @include('admin.section.buttons.button-delete')
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
<script src="{{ asset('assets/cms/vendors/DataTables/datatables.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<script>
    $(function() {
        $('#toggle-two').bootstrapToggle({
            on: '1',
            off: '0'
        });
    });

    $('.toggle-class').on('change', function() {
        var status = $(this).prop('checked') ? 1 : 0;
        var user_id = $(this).data('id');
        var url = "{{ route($_base_route.'.status') }}";

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: url,
            data: {
                'status': status,
                'user_id': user_id,
                '_token': '{{ csrf_token() }}'
            },
            success: function(data) {
                $('#notifDiv').fadeIn().css('background', 'green').text('Status updated successfully!');
                setTimeout(() => {
                    $('#notifDiv').fadeOut();
                }, 3000);
            },
            error: function(data) {
                $('#notifDiv').fadeIn().css('background', 'red').text('Error updating status!');
                setTimeout(() => {
                    $('#notifDiv').fadeOut();
                }, 3000);
            }
        });
    });

    $(document).ready(function() {
        $('#example-table').DataTable({
            pageLength: 10,
            responsive: true
        });
    });
</script>
@endsection
