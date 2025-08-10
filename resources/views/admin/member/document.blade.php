@extends('layouts.admin')
@section('styles')
    <link href="{{ asset('assets/cms/vendors/summernote/dist/summernote.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h4 text-primary">Document List</h1>
        </div>
        <div class="row">
            <div class="ibox col-md-5">
                <div class="ibox-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="newrequest">
                            <table class="table table-striped table-bordered table-hover " id="example-table"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Title </th>
                                        <th>Document</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="col-md-1">
                                        <td>1. </td>
                                        <td>PAN</td>
                                        <td>
                                            @if (isset($data['single']->company_pan) && !empty($data['single']->company_pan))
                                                <a href="{{ $data['single']->company_pan }}" target="_blank"
                                                    class="bnt btn-sm btn-dark"><i class="fa fa-cloud-download"
                                                        aria-hidden="true"></i> View</a>
                                            @else
                                                <span>N/A</span>
                                            @endif
                                        </td>
                                        </td>
                                    </tr>
                                    <tr class="col-md-1">
                                        <td>2. </td>
                                        <td>Company Register</td>
                                        <td>
                                            @if (isset($data['single']->company_register) && !empty($data['single']->company_register))
                                                <a href="{{ $data['single']->company_register }}" target="_blank"
                                                    class="bnt btn-sm btn-dark"><i class="fa fa-cloud-download"
                                                        aria-hidden="true"></i> View</a>
                                            @else
                                                <span>N/A</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr class="col-md-1">
                                        <td>3. </td>
                                        <td>Tax Clearance</td>
                                        <td>
                                            @if (isset($data['single']->company_tax_clearance) && !empty($data['single']->company_tax_clearance))
                                                <a href="{{ $data['single']->company_tax_clearance }}" target="_blank"
                                                    class="bnt btn-sm btn-dark"><i class="fa fa-cloud-download"
                                                        aria-hidden="true"></i> View</a>
                                            @else
                                                <span>N/A</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr class="col-md-1">
                                        <td>4.</td>
                                        <td>Tourism Certificate</td>
                                        <td>
                                            @if (isset($data['single']->tourism_certificate) && !empty($data['single']->tourism_certificate))
                                                <a href="{{ asset($data['single']->tourism_certificate) }}" target="_blank"
                                                    class="btn btn-sm btn-dark">
                                                    <i class="fa fa-cloud-download" aria-hidden="true"></i> View
                                                </a>
                                            @else
                                                <span>N/A</span>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr class="col-md-1">
                                        <td>5.</td>
                                        <td>NRB Certificate</td>
                                        <td>
                                            @if (isset($data['single']->nrb_certificate) && !empty($data['single']->nrb_certificate))
                                                <a href="{{ asset($data['single']->nrb_certificate) }}" target="_blank"
                                                    class="btn btn-sm btn-dark">
                                                    <i class="fa fa-cloud-download" aria-hidden="true"></i> View
                                                </a>
                                            @else
                                                <span>N/A</span>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr class="col-md-1">
                                        <td>6.</td>
                                        <td>Cottage Industry Certificate</td>
                                        <td>
                                            @if (isset($data['single']->cottage_industry_certificate) && !empty($data['single']->cottage_industry_certificate))
                                                <a href="{{ asset($data['single']->cottage_industry_certificate) }}"
                                                    target="_blank" class="btn btn-sm btn-dark">
                                                    <i class="fa fa-cloud-download" aria-hidden="true"></i> View
                                                </a>
                                            @else
                                                <span>N/A</span>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr class="col-md-1">
                                        <td>7.</td>
                                        <td>Renewal Certificate</td>
                                        <td>
                                            @if (isset($data['single']->renewal_certificate) && !empty($data['single']->renewal_certificate))
                                                <a href="{{ asset($data['single']->renewal_certificate) }}" target="_blank"
                                                    class="btn btn-sm btn-dark">
                                                    <i class="fa fa-cloud-download" aria-hidden="true"></i> View
                                                </a>
                                            @else
                                                <span>N/A</span>
                                            @endif
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ibox col-md-7">
                <div class="ibox" id="mailbox-container">
                    <form class="form-horizontal" action="{{ route($_base_route . '.send-email') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mailbox-header d-flex justify-content-between">
                            <h5 class="inbox-title">Compose mail</h5>
                            <div class="inbox-toolbar m-l-20">
                                <button class="btn btn-default btn-sm" type="reset" data-toggle="tooltip"
                                    data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
                            </div>
                        </div>
                        <div class="mailbox-body">
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">To:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="email" readonly
                                        value="@if (isset($data['user']->email)) {{ $data['user']->email }} @endif">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">Full Name:</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="name" readonly
                                        value="@if (isset($data['user']->name)) {{ $data['user']->name }} @endif">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label"><small>Member ID:</small></label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="member_id"
                                        value="{{ $data['single']->member_id }}" readonly>
                                </div>
                            </div>
                            <div class="form-group text-left">
                                <a href="{{ route($_base_route . '.index') }}" class="btn btn-warning btn-sm"><i
                                        class="fa fa-undo"></i> Back</a>
                                <button class="btn btn-danger btn-sm" type="submit" style="cursor:pointer;"><i
                                        class="fa fa-paper-plane"></i> Send Mail</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/cms/vendors/summernote/dist/summernote.min.js') }}" type="text/javascript"></script>
    >
    <script type="text/javascript">
        $(function() {
            $('#summernote').summernote({
                placeholder: 'Hello Bootstrap 4',
                tabsize: 2,
                height: 100
            });
        });
    </script>
@endsection
