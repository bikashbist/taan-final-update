@extends('layouts.admin')

@section('title', 'Member Subcategories')

@section('content')


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Member Subcategories List</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.member_subcategory.create') }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-plus"></i> Add New Subcategory
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            @if (session('alert-success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="fa fa-check-circle me-2"></i>
                                    {{ session('alert-success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            @if (session('alert-danger'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="fa fa-exclamation-circle me-2"></i>
                                    {{ session('alert-danger') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="subcategoriesTable">
                                    <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Member Type</th>
                                            <th>Subcategory Name</th>
                                            <th>Status</th>
                                            <th>Members Count</th>
                                            <th>Created Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($data['rows'] as $key => $row)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    <span
                                                        class="badge badge-info">{{ $row->memberType->title ?? 'N/A' }}</span>
                                                </td>
                                                <td>{{ $row->name }}</td>
                                                <td>
                                                    @if ($row->status)
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="badge badge-secondary">{{ $row->members->count() }}</span>
                                                </td>
                                                <td>{{ $row->created_at->format('M d, Y') }}</td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('admin.member_subcategory.show', $row->id) }}"
                                                            class="btn btn-info btn-sm" title="View">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('admin.member_subcategory.edit', $row->id) }}"
                                                            class="btn btn-warning btn-sm" title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        @if ($row->members->count() == 0)
                                                            <form
                                                                action="{{ route('admin.member_subcategory.destroy', $row->id) }}"
                                                                method="POST" class="d-inline"
                                                                onsubmit="return confirm('Are you sure you want to delete this subcategory?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm"
                                                                    title="Delete">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        @else
                                                            <button class="btn btn-danger btn-sm" disabled
                                                                title="Cannot delete - has members">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">No subcategories found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#subcategoriesTable').DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ordering": true,
                "info": true,
                "paging": true,
                "searching": true,
                "order": [
                    [1, "asc"],
                    [2, "asc"]
                ]
            });

            // Auto-hide alerts after 5 seconds
            setTimeout(function() {
                $('.alert').fadeOut('slow');
            }, 5000);
        });
    </script>
@endsection
