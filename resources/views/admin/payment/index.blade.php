@extends('layouts.admin')
@section('styles')
<link href="{{ asset('assets/cms/vendors/DataTables/datatables.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 text-primary">{{ $_panel }} List</h1>
        <div class="btn-group">
            <button type="button" class="btn btn-primary btn-sm" id="checkAll">Check All</button>&nbsp;
            <button type="button" class="btn btn-secondary btn-sm" id="uncheckAll">Uncheck All</button>&nbsp;
            <button type="button" class="btn btn-danger btn-sm" id="deleteChecked" onclick="deleteChecked()">Delete Selected</button>
        </div>
    </div>
    <div class="ibox">
        <div class="ibox-body">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="newrequest">
                    <table id="example-table" class="table table-striped table-bordered nowrap" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Check</th>
                                <th>S.N</th>
                                <th>ID</th>
                                <th>Organization</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Amount</th>
                                <th>Voucher</th>
                                <th>Voucher Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Rows will be populated by DataTables -->
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
        var table = $('#example-table').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            scrollX: true,
            searching: true,
            pageLength: 25,
            responsive: true,
            lengthChange: true,
            autoWidth: true,
            scrollCollapse: true,
            ajax: "{{ route('admin.payment.index') }}",
            columns: [{
                    data: 'check',
                    name: 'check',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row) {
                        return '<input type="checkbox" class="row-checkbox" value="' + row.id + '">';
                    }
                },
                {
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'member_id',
                    name: 'member_id'
                },
                {
                    data: 'member_u_id',
                    name: 'member_u_id'
                },
                {
                    data: 'start_date',
                    name: 'start_date'
                },
                {
                    data: 'end_date',
                    name: 'end_date'
                },
                {
                    data: 'amount',
                    name: 'amount'
                },
                {
                    data: 'voucher',
                    name: 'voucher'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });
        // Check All
        $('#checkAll').click(function() {
            $('.row-checkbox').prop('checked', true);
        });
        // Uncheck All
        $('#uncheckAll').click(function() {
            $('.row-checkbox').prop('checked', false);
        });

        // Delete Checked
        $('#deleteChecked').click(function() {
            var ids = [];
            $('.row-checkbox:checked').each(function() {
                ids.push($(this).val());
            });

            if (ids.length <= 0) {
                $.alert('Please select at least one record to delete.');
                return false;
            }

            $.confirm({
                title: 'Are you sure?',
                content: 'This action cannot be undone.',
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Delete',
                        btnClass: 'btn-red',
                        action: function() {
                            $.ajax({
                                url: "{{ route('admin.payment.deleteChecked') }}",
                                type: "POST",

                                data: {
                                    ids: ids.join(",")
                                },
                                success: function(data) {
                                    if (data.success) {
                                        $.alert(data.success);
                                        table.ajax.reload();
                                    } else {
                                        $.alert(data.error);
                                    }
                                },
                                error: function(data) {
                                    $.alert(data.responseJSON.message);
                                }
                            });
                        }
                    },
                    close: function() {
                        $.alert('action is canceled');
                    }
                }
            });
        });
    });
</script>
@endsection