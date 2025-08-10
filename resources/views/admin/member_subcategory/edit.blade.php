@extends('admin.layouts.master')

@section('title', 'Edit Member Subcategory')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3>Edit Member Subcategory</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.member_subcategory.index') }}">Member Subcategories</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Member Subcategory</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.member_subcategory.index') }}" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-arrow-left"></i> Back to List
                                </a>
                            </div>
                        </div>

                        <form action="{{ route('admin.member_subcategory.update', $data['row']->id) }}" method="POST">
                            @csrf
                            <div class="card-body">
                                @if (session('alert-success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <i class="fas fa-check-circle me-2"></i>
                                        {{ session('alert-success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                @if (session('alert-danger'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="fas fa-exclamation-circle me-2"></i>
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
                                                @foreach($data['member_types'] as $memberType)
                                                    <option value="{{ $memberType->id }}" 
                                                            {{ (old('member_type_id') ?? $data['row']->member_type_id) == $memberType->id ? 'selected' : '' }}>
                                                        {{ $memberType->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('member_type_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <small class="form-text text-muted">Only member types with subcategory support are shown</small>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Subcategory Name <span class="text-danger">*</span></label>
                                            <input type="text" 
                                                   class="form-control @error('name') is-invalid @enderror" 
                                                   name="name" 
                                                   id="name" 
                                                   value="{{ old('name') ?? $data['row']->name }}" 
                                                   placeholder="Enter subcategory name"
                                                   required>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input type="checkbox" 
                                                       class="form-check-input" 
                                                       name="status" 
                                                       id="status" 
                                                       value="1" 
                                                       {{ (old('status') ?? $data['row']->status) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="status">
                                                    Active Status
                                                </label>
                                            </div>
                                            <small class="form-text text-muted">Check to make this subcategory active</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-info">
                                            <i class="fas fa-info-circle me-2"></i>
                                            <strong>Note:</strong> This subcategory is currently used by {{ $data['row']->members()->count() }} member(s).
                                            @if($data['row']->members()->count() > 0)
                                                Changing the member type may affect existing members.
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update Subcategory
                                </button>
                                <a href="{{ route('admin.member_subcategory.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Cancel
                                </a>
                                <a href="{{ route('admin.member_subcategory.show', $data['row']->id) }}" class="btn btn-info">
                                    <i class="fas fa-eye"></i> View Details
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Auto-hide alerts after 5 seconds
            setTimeout(function() {
                $('.alert').fadeOut('slow');
            }, 5000);
        });
    </script>
@endsection
