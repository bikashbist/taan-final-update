@extends('admin.layouts.master')

@section('title', 'View Member Subcategory')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3>Member Subcategory Details</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.member_subcategory.index') }}">Member Subcategories</a></li>
                    <li class="breadcrumb-item active">View</li>
                </ol>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Subcategory Information</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin.member_subcategory.index') }}" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-arrow-left"></i> Back to List
                                </a>
                                <a href="{{ route('admin.member_subcategory.edit', $data['row']->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <strong>Member Type:</strong>
                                    <p class="text-muted">
                                        <span class="badge badge-info badge-lg">{{ $data['row']->memberType->title ?? 'N/A' }}</span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <strong>Subcategory Name:</strong>
                                    <p class="text-muted">{{ $data['row']->name }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <strong>Status:</strong>
                                    <p class="text-muted">
                                        @if($data['row']->status)
                                            <span class="badge badge-success badge-lg">Active</span>
                                        @else
                                            <span class="badge badge-danger badge-lg">Inactive</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <strong>Members Count:</strong>
                                    <p class="text-muted">
                                        <span class="badge badge-secondary badge-lg">{{ $data['row']->members->count() }}</span>
                                    </p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <strong>Created Date:</strong>
                                    <p class="text-muted">{{ $data['row']->created_at->format('F d, Y \a\t h:i A') }}</p>
                                </div>
                                <div class="col-md-6">
                                    <strong>Last Updated:</strong>
                                    <p class="text-muted">{{ $data['row']->updated_at->format('F d, Y \a\t h:i A') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Quick Actions</h3>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <a href="{{ route('admin.member_subcategory.edit', $data['row']->id) }}" class="btn btn-warning">
                                    <i class="fas fa-edit"></i> Edit Subcategory
                                </a>
                                
                                @if($data['row']->members->count() == 0)
                                    <form action="{{ route('admin.member_subcategory.destroy', $data['row']->id) }}" 
                                          method="POST" 
                                          onsubmit="return confirm('Are you sure you want to delete this subcategory?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger w-100">
                                            <i class="fas fa-trash"></i> Delete Subcategory
                                        </button>
                                    </form>
                                @else
                                    <button class="btn btn-danger w-100" disabled title="Cannot delete - has members">
                                        <i class="fas fa-trash"></i> Delete Subcategory
                                    </button>
                                    <small class="text-muted">Cannot delete subcategory with existing members</small>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if($data['row']->members->count() > 0)
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Members in this Subcategory ({{ $data['row']->members->count() }})</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="membersTable">
                                        <thead>
                                            <tr>
                                                <th>S.N.</th>
                                                <th>Member ID</th>
                                                <th>Organization Name</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Joined Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data['row']->members as $key => $member)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $member->member_id }}</td>
                                                    <td>{{ $member->organization_name }}</td>
                                                    <td>{{ $member->getUserName->email ?? 'N/A' }}</td>
                                                    <td>
                                                        @if($member->status)
                                                            <span class="badge badge-success">Active</span>
                                                        @else
                                                            <span class="badge badge-danger">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $member->created_at->format('M d, Y') }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.member.show', $member->id) }}" 
                                                           class="btn btn-info btn-sm" title="View Member">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('admin.member.edit', $member->id) }}" 
                                                           class="btn btn-warning btn-sm" title="Edit Member">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
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
            @endif
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            @if($data['row']->members->count() > 0)
                $('#membersTable').DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "ordering": true,
                    "info": true,
                    "paging": true,
                    "searching": true,
                    "order": [[5, "desc"]]
                });
            @endif
        });
    </script>
@endsection
