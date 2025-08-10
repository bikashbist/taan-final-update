@extends('layouts.admin')
@section('content')
@php
    $legal_documents = [];
    $company = [];
    $legal_documents = [];
    if (!empty($user->member)) {
        $legal_documents = json_decode($user->member->legal_documents, true);
        $company = json_decode($user->member->company, true);
    }
@endphp

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 text-primary">View User Details</h1>
        <a href="{{ route('admin.users.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fa fa-arrow-left fa-sm text-white-50"></i> Back
        </a>
    </div>

    <form action="{{ route($_base_route.'.update', $user->id) }}" method="POST">
        @csrf
        <div class="row">
            <!-- User Information -->
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">User Information</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                            <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body row">
                        <div class="form-group col-md-4">
                            <label for="name">Name</label>
                            <p class="form-control-static">{{ $user->name }}</p>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="email">Email</label>
                            <p class="form-control-static">{{ $user->email }}</p>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="mobile">Phone</label>
                            <p class="form-control-static">{{ $user->mobile }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Company Details -->
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Company Details</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                            <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body row">
                        <div class="form-group col-md-4">
                            <label for="company_name">Company Name</label>
                            <p class="form-control-static">{{ !empty($company['company_name']) ? $company['company_name'] : '' }}</p>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="company_name">Company Registration No.</label>
                            <p class="form-control-static">{{ !empty($legal_documents['company']['register_no']) ? $legal_documents['company']['register_no'] : '' }}</p>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="pan">PAN No.</label>
                            <p class="form-control-static">{{ !empty($legal_documents['pan']['pan_no']) ? $legal_documents['pan']['pan_no'] : '' }}</p>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="pan">PAN</label>
                            @if(!empty($legal_documents['pan']['image']) && file_exists(public_path($legal_documents['pan']['image'])))
                                <img src="{{ asset($legal_documents['pan']['image']) }}" alt="PAN Document" class="img-thumbnail mt-2" width="150">
                            @else
                                <p class="form-control-static">No PAN Document Uploaded</p>
                            @endif
                        </div>

                        <div class="form-group col-md-4">
                            <label for="register_file">Company Register File</label>
                            @if(!empty($legal_documents['company']['register_no']) && file_exists(public_path($legal_documents['company']['register_no'])))
                                <img src="{{ asset($legal_documents['company']['register_no']) }}" alt="Register File" class="img-thumbnail mt-2" width="150">
                            @else
                                <p class="form-control-static">No Company Register File Uploaded</p>
                            @endif
                        </div>

                        <div class="form-group col-md-4">
                            <label for="tax_clearance">Tax Clearance Certificate</label>
                            @if(!empty($legal_documents['tax_clearance']) && file_exists(public_path($legal_documents['tax_clearance'])))
                                <img src="{{ asset($legal_documents['tax_clearance']) }}" alt="Tax Clearance Certificate" class="img-thumbnail mt-2" width="150">
                            @else
                                <p class="form-control-static">No Tax Clearance Certificate Uploaded</p>
                            @endif
                        </div>

                        <div class="form-group col-md-4">
                            <label>Is Approved</label>
                            <p class="form-control-static">
                                {{ $user->member->is_active ? 'Approved' : 'Not Approved' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
