@extends('layouts.admin')
@section('title')
    Admin {{ $_panel }} Add | SCMS
@endsection
@section('styles')
    <!-- PLUGINS STYLES-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"
        integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg=="
        crossorigin="anonymous" />
    <style>
        .nav-pills {
            justify-content: space-around;
        }

        .help-block {
            color: red;
        }

        .bootstrap-tagsinput {
            width: 100%;
        }

        .label-info {
            background-color: #17a2b8;

        }

        .label {
            display: inline-block;
            padding: .25em .4em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
            transition: color .15s ease-in-out, background-color .15s ease-in-out,
                border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }
    </style>
@endsection
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4  text-primary">{{ $_panel }} Add</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.member_subcategory.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    @if (session('alert-success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fa fa-check-circle me-2"></i>
                            {{ session('alert-success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('alert-danger'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fa fa-exclamation-circle me-2"></i>
                            {{ session('alert-danger') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="member_type_id">Member Type <span class="text-danger">*</span></label>
                                <select class="form-control @error('member_type_id') is-invalid @enderror"
                                    name="member_type_id" id="member_type_id" required>
                                    <option value="">Select Member Type</option>
                                    @foreach ($data['member_types'] as $memberType)
                                        <option value="{{ $memberType->id }}"
                                            {{ old('member_type_id') == $memberType->id ? 'selected' : '' }}>
                                            {{ $memberType->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('member_type_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Only member types with subcategory support
                                    are shown</small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Subcategory Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" id="name" value="{{ old('name') }}"
                                    placeholder="Enter subcategory name" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="status" id="status" value="1"
                                    {{ old('status', true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="status">
                                    Active Status
                                </label>
                            </div>
                            <small class="form-text text-muted">Check to make this subcategory
                                active</small>
                        </div>
                    </div>

                    @if ($data['member_types']->isEmpty())
                        <div class="alert alert-warning">
                            <i class="fa fa-exclamation-triangle me-2"></i>
                            No member types with subcategory support found. Please create a member type with
                            subcategory support first.
                        </div>
                    @endif
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"
                        {{ $data['member_types']->isEmpty() ? 'disabled' : '' }}>
                        <i class="fa fa-save"></i> Create Subcategory
                    </button>
                    <a href="{{ route('admin.member_subcategory.index') }}" class="btn btn-secondary">
                        <i class="fa fa-times"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/cms/js/scripts/form-plugins.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"
        integrity="sha512-VvWznBcyBJK71YKEKDMpZ0pCVxjNuKwApp4zLF3ul+CiflQi6aIJR+aZCP/qWsoFBA28avL5T5HA+RE+zrGQYg=="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // Auto-hide alerts after 5 seconds
            setTimeout(function() {
                $('.alert').fadeOut('slow');
            }, 5000);
        });
    </script>
@endsection
