@extends('layouts.admin')
@section('title', 'DataTables')
@section('styles')
    <link href="{{ asset('assets/cms/vendors/DataTables/datatables.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link href="{{ asset('assets/cms/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
    <style>
        .badge-success {
            background-color: #28a745;
        }

        .badge-warning {
            background-color: #ffc107;
            color: #212529;
        }

        .badge-danger {
            background-color: #dc3545;
        }

        .badge-secondary {
            background-color: #6c757d;
        }

        .renewal-status-filter {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
        }

        .renewal-status-filter:focus {
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
    </style>

@endsection
@section('content')
    <div class="page-heading">
        <div class="d-sm-flex mb-4">
            <div class="form-group" style="margin-top: 3px;">
                <a href="{{ route($_base_route . '.create') }}"
                    class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                        class="fa fa-plus fa-sm text-white-50"></i> Add {{ $_panel }} </a>
            </div>&nbsp;
            <div class="form-group" style="margin-top: 3px;">
                <button class="btn btn-info btn-sm" id="refreshTable"><i class="fa fa-refresh" aria-hidden="true"></i>
                    Refresh</button>
            </div>&nbsp;
            <div class="form-group" style="margin-top: 3px;">
                <select name="member_type_id" id="member_type_id" class="form-control name_and_type rounded">
                    <option value="">Select Type</option>
                    @if (isset($data['type']) && $data['type']->count() > 0)
                        @foreach ($data['type'] as $row)
                            <option value="{{ $row->id }}">{{ $row->title }}</option>
                        @endforeach
                    @endif
                </select>
            </div>&nbsp;
            <div class="form-group" style="margin-top: 3px;">
                <select name="user_id" id="user_id" class="form-control name_and_type rounded">
                    <option value="">Select User</option>
                    @if (isset($data['user']) && $data['user']->count() > 0)
                        @foreach ($data['user'] as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>&nbsp;
            <div class="form-group" style="margin-top: 3px;">
                <select name="renewal_status" id="renewal_status"
                    class="form-control name_and_type rounded renewal-status-filter">
                    <option value="">All Members</option>
                    <option value="active">✅ Active Members</option>
                    <option value="expired">❌ Expired Members</option>
                    <option value="no_payment">⚪ No Payment</option>
                </select>
            </div>&nbsp;
            <div class="form-group">
                <input type="text" class="form-control" name="organization_name" id="organization_name"
                    placeholder="Organization Name">
            </div>&nbsp;
            <div class="form-group">
                <input type="text" class="form-control" name="member_id" id="member_id" placeholder="Member ID">
            </div>&nbsp;
            <div class="form-group">
                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile">
            </div>&nbsp;
            <div class="form-group" style="margin-top: 3px;">
                <a href="#" class="btn btn-sm btn-secondary my-2 my-sm-0" id="remove_filters_button">
                    <i class="fa fa-retweet" aria-hidden="true"></i>&nbsp;Clear All
                </a>
            </div>
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
                <div class="ibox-title">Total: <span id="total_records">0</span></div>
            </div>
            <div class="ibox-body card-body" style="overflow-x: auto;">
                <table id="example-table" class="table table-striped table-bordered nowrap" style="width: 100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>S.N</th>
                            <th>Full Name</th>
                            <th>Organization</th>
                            <th>Type</th>
                            <th>ID</th>
                            <th>PAN/VAT</th>
                            <th>Country</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Payment End Date</th>
                            <th>Renewal Status</th>
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
    <script src="{{ asset('assets/cms/vendors/DataTables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="{{ asset('assets/cms/vendors/select2/dist/js/select2.full.min.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        $(function() {
            var i = 1;
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
                ajax: {
                    url: "{{ route('admin.member.index') }}",
                    type: "GET",
                    data: function(d) {
                        d.user_id = $('#user_id').val();
                        d.organization_name = $('#organization_name').val();
                        d.member_type_id = $('#member_type_id').val();
                        d.member_id = $('#member_id').val();
                        d.mobile = $('#mobile').val();
                        d.renewal_status = $('#renewal_status').val();
                    },
                    dataSrc: function(json) {
                        $('#total_records').text(json.recordsTotal); // Update total count
                        return json.data;
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                },
                columns: [{
                        "data": 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'user_id',
                        name: 'user_id'
                    },
                    {
                        data: 'organization_name',
                        name: 'organization_name'
                    },
                    {
                        data: 'member_type_id',
                        name: 'member_type_id'
                    },
                    {
                        data: 'member_id',
                        name: 'member_id'
                    },
                    {
                        data: 'pan_vat_no',
                        name: 'pan_vat_no'
                    },
                    {
                        data: 'country',
                        name: 'country'
                    },
                    {
                        data: 'mobile',
                        name: 'mobile'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'payment_end_date',
                        name: 'payment_end_date',
                        orderable: true,
                        searchable: false
                    },
                    {
                        data: 'renewal_status',
                        name: 'renewal_status',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"],
                ],
                pageLength: 25,
                language: {
                    "emptyTable": "No data available in table",
                    "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                    "infoEmpty": "० Showing Entries",
                    "infoFiltered": "(filtered from _MAX_ total entries)",
                    "lengthMenu": "Show _MENU_ Entries",
                    "loadingRecords": "Loading...",
                    "processing": "Processing...",
                    "search": "Search ",
                    "zeroRecords": "No matching records found",
                    "paginate": {
                        "first": "First",
                        "last": "Last",
                        "next": "Next",
                        "previous": "Previous"
                    },
                },
            });

            $("#refreshTable").on("click", function() {
                table.ajax.reload();
            });
            $('#remove_filters_button').click(function() {
                $('#user_id, #organization_name, #member_type_id, #member_id, #mobile, #renewal_status')
                    .val('');
                table.draw();
            });
            $('#user_id, #organization_name, #member_type_id, #member_id, #mobile, #renewal_status').on(
                'keyup change',
                function() {
                    table.draw();
                });

            // Handle renewal payment button clicks
            $(document).on('click', '.renew-payment-btn', function() {
                var memberId = $(this).data('member-id');
                var memberName = $(this).data('member-name');
                var expiredDate = $(this).data('expired-date');
                var expiryDate = $(this).data('expiry-date');

                var message = '';
                var title = '';

                if (expiredDate) {
                    title = 'Payment Expired - Renewal Required';
                    message = '<div class="alert alert-danger">' +
                        '<h5><i class="fa fa-exclamation-triangle"></i> Payment Expired!</h5>' +
                        '<p><strong>Member:</strong> ' + memberName + '</p>' +
                        '<p><strong>Expired Date:</strong> ' + expiredDate + '</p>' +
                        '<p>This member\'s payment has expired and needs immediate renewal to maintain active status.</p>' +
                        '</div>';
                } else if (expiryDate) {
                    title = 'Payment Expiring Soon';
                    message = '<div class="alert alert-warning">' +
                        '<h5><i class="fa fa-clock-o"></i> Payment Expiring Soon!</h5>' +
                        '<p><strong>Member:</strong> ' + memberName + '</p>' +
                        '<p><strong>Expiry Date:</strong> ' + expiryDate + '</p>' +
                        '<p>Consider renewing early to avoid service interruption.</p>' +
                        '</div>';
                } else {
                    title = 'Add Payment Record';
                    message = '<div class="alert alert-info">' +
                        '<h5><i class="fa fa-plus"></i> No Payment Record Found</h5>' +
                        '<p><strong>Member:</strong> ' + memberName + '</p>' +
                        '<p>This member does not have any payment records. Please add a payment to activate their membership.</p>' +
                        '</div>';
                }

                $.confirm({
                    title: title,
                    content: message,
                    type: 'orange',
                    typeAnimated: true,
                    buttons: {
                        addPayment: {
                            text: '<i class="fa fa-plus"></i> Add/Renew Payment',
                            btnClass: 'btn-success',
                            action: function() {
                                // Redirect to payment creation page
                                window.location.href =
                                    '{{ route('admin.member.payment-list', ':id') }}'.replace(
                                        ':id', memberId);
                            }
                        },
                        sendReminder: {
                            text: '<i class="fa fa-envelope"></i> Send Reminder Email',
                            btnClass: 'btn-info',
                            action: function() {
                                // Send reminder email functionality
                                sendReminderEmail(memberId, memberName);
                            }
                        },
                        cancel: {
                            text: 'Cancel',
                            btnClass: 'btn-secondary'
                        }
                    }
                });
            });

            // Function to send reminder email
            function sendReminderEmail(memberId, memberName) {
                $.confirm({
                    title: 'Send Renewal Reminder',
                    content: '<p>Send payment renewal reminder email to <strong>' + memberName +
                        '</strong>?</p>',
                    type: 'blue',
                    buttons: {
                        send: {
                            text: 'Send Email',
                            btnClass: 'btn-primary',
                            action: function() {
                                // AJAX call to send reminder email
                                $.ajax({
                                    url: '{{ route('admin.member.send-reminder') }}',
                                    method: 'POST',
                                    data: {
                                        _token: '{{ csrf_token() }}',
                                        member_id: memberId
                                    },
                                    success: function(response) {
                                        $.alert({
                                            title: 'Success!',
                                            content: 'Renewal reminder email sent successfully!',
                                            type: 'green'
                                        });
                                    },
                                    error: function() {
                                        $.alert({
                                            title: 'Error!',
                                            content: 'Failed to send reminder email. Please try again.',
                                            type: 'red'
                                        });
                                    }
                                });
                            }
                        },
                        cancel: 'Cancel'
                    }
                });
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $(function() {
                $('#toggle-two').bootstrapToggle({
                    on: 'Enabled',
                    off: 'Disabled'
                });
            })
            // Select 2
            $(".name_and_type").select2({});
        });
    </script>
@endsection
