@extends('layouts.admin')
@section('styles')
<link href="{{ asset('assets/cms/vendors/DataTables/datatables.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<style>
    .container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}

.dialog {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    align-items: center;
    justify-content: center;
}

.dialog-content {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    text-align: center;
    width: 300px;
}

.dialog-content .btn {
    margin: 10px;
    padding: 10px 20px;
    border: none;
    color: #fff;
    cursor: pointer;
}

.dialog-content .btn-success {
    background: #4caf50;
}

.dialog-content .btn-danger {
    background: #f44336;
}
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4  text-primary">Subscribed Email</h1>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table" id="example-table" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Email</th>
                        <th scope="col">Subscribed at</th>
                    </tr>
                </thead>
                <tbody>
                    @if($emails)
                    @foreach($emails as $key => $row)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $row->email}}</td>

                        <td>{{ Carbon\Carbon::parse($row->created_at)->format('Y-m-d') }}</td>

                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

 <!-- Confirmation dialog -->
 <div id="confirmationDialog" class="dialog" >
    <div class="dialog-content" style="margin-left: 39%; margin-top: 13%;">
        <p>Are you sure you want to change the status?</p>
        <button id="confirmYes" class="btn btn-success">Yes</button>
        <button id="confirmNo" class="btn btn-danger">No</button>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('assets/cms/vendors/DataTables/datatables.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

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

    <script>
        $(document).ready(function() {
            let currentCheckbox;

            // Open confirmation dialog
            $('.is-verified').on('change', function() {
                currentCheckbox = $(this);
                $('#confirmationDialog').show();
            });

            // Confirm status change
            $('#confirmYes').on('click', function() {
                let id = currentCheckbox.data('id');
                let isChecked = currentCheckbox.is(':checked');
                $.ajax({
                    url: '{{ url("admin/users/verified_user") }}/'+id,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        is_verified: isChecked ? 1 : 0
                    },
                    success: function(response) {
                        $('#confirmationDialog').hide();
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr.responseText);
                    }
                });
            });

            // Cancel status change
            $('#confirmNo').on('click', function() {
                $('#confirmationDialog').hide();
                currentCheckbox.prop('checked', !currentCheckbox.is(':checked'));
            });

            // Close the dialog when clicking outside of it
            $(window).on('click', function(event) {
                if ($(event.target).is('#confirmationDialog')) {
                    $('#confirmationDialog').hide();
                }
            });
        });
    </script>
@endsection
