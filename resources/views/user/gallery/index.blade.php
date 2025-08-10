@extends('layouts.membership')

@section('styles')
<link href="{{ asset('assets/cms/vendors/DataTables/datatables.min.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<style>
    .gallery-img {
        position: relative;
        display: inline-block;
        margin: 10px;
    }

    .gallery-img img {
        max-width: 100%;
        max-height: 150px;
        display: block;
    }

    .gallery-img .checkbox {
        position: absolute;
        top: -3px;
        left: 15px;
        z-index: 1;
    }

    .delete_all {
        margin-left: 10px;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <h1 class="h4 text-primary">{{ $_panel }} List</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{ route($_base_route.'.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fa fa-plus fa-sm text-white-50"></i> Add {{ $_panel }}
        </a>
    </div>
    <div class="ibox">
        <div class="ibox-body">
            <div class="d-flex justify-content-between mb-3">
                <div class="check-all-button">
                    <input type="checkbox" id="master">
                    <label for="master" class="mb-0">Select All</label>
                </div>
                <button class="btn btn-danger delete_all" onclick="deleteSelected()" style="height: fit-content">
                    <i class="fas fa-trash"></i> Delete Selected
                </button>
            </div>
            <form id="deleteForm" action="{{ route('member.gallery.selected_delete') }}" method="POST">
                @csrf
                <div class="row">
                    @foreach($data['rows'] as $row)
                    <div class="col-md-2 gallery-img">
                        <div class="checkbox">
                            <input type="checkbox" class="sub_chk" name="ids[]" value="{{ $row->id }}">
                        </div>
                        @if($row->image_path)
                        <img src="{{ asset($row->image_path) }}" class="img img-responsive" alt="{{ $row->title }}">
                        @else
                        <p>Image Not Found!</p>
                        @endif
                    </div>
                    @endforeach
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('assets/cms/vendors/DataTables/datatables.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#master').on('click', function(e) {
            var isChecked = $(this).is(':checked', true);
            $(".sub_chk").prop('checked', isChecked);
        });

        $('.sub_chk').on('click', function(e) {
            var allChecked = $('.sub_chk:checked').length == $('.sub_chk').length;
            $('#master').prop('checked', allChecked);
        });
    });

    function deleteSelected() {
        var ids = [];
        $('.sub_chk:checked').each(function() {
            ids.push($(this).val());
        });

        if (ids.length > 0) {
            $.confirm({
                title: 'Confirm!',
                content: 'Are you sure you want to delete the selected items?',
                buttons: {
                    confirm: function() {
                        $('#deleteForm').submit();
                    },
                    cancel: function() {
                        $.alert('Canceled!');
                    }
                }
            });
        } else {
            $.alert('Please select at least one item.');
        }
    }
</script>
@endsection
