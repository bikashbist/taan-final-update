@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4  text-primary"> Location List</h1>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">New Location</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>

                    </div>
                </div>
                <div class="ibox-body">
                    <form>
                        <div class="form-group">
                            <label for="title">New Location :</label>
                            <input class="form-control rounded" type="text" name="title" id="title" placeholder="New Location">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm add_ac" type="submit" style="cursor:pointer;"><i class="fa fa-paper-plane"></i> Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Location List</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>

                    </div>
                </div>
                <div class="ibox-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $data['rows'] as $key=> $row)
                            <tr>
                                <td>{{ $key+1}}.</td>
                                <td>{{ $row->title }}</td>
                                <td>
                                    <input type="checkbox" class="toggle-class" data-toggle="toggle" data-id="{{ $row->id }}" data-size="xs" data-width="80" data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="warning" {{ $row->status == 1 ? 'checked' : ''}}>
                                </td>
                                <td>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '.add_ac', function(e) {
            e.preventDefault();
            var title = $('#title').val();
            var url = "{{route('admin.location.store')}}";
            $.ajax({
                type: 'POST',
                url: url,
                dataType: 'json',
                data: {
                    'title': title,
                    _token: '{{csrf_token()}}'
                },
                success: function(response) {
                    location.reload(true);

                },
                error: function(response) {
                    alert("Ajax calling error !");
                }
            });
        });
    });
</script>
@endsection