@extends('layouts.admin')
@section('content')
<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h4 class="page-title">{{ $_panel }} Detail</h4>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{route( $_base_route.'.index' )}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fa fa-long-arrow-left fa-sm text-white-50"></i> Back </a>
        <button
            class="btn btn-info"
            type="button"
            onclick="javascript:window.print();">
            <i class="fa fa-print"></i> Print
        </button>
    </div>
</div>
<div class="page-content fade-in-up">
    <div class="ibox invoice">
        <div class="invoice-header">
            <div class="row">
                <div class="col-3">
                    <div>
                        <div class="m-b-5 font-bold">Full Name</div>
                        <div>@if(isset($data['user']->name)) {{ $data['user']->name }} @else N/A @endif </div>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <div class="m-b-5 font-bold">Email</div>
                        <div>@if(isset($data['user']->email)) {{ $data['user']->email }} @else N/A @endif </div>
                    </div>
                </div>

                <div class="col-3">
                    <div>
                        <div class="m-b-5 font-bold">Organization Name</div>
                        <div>@if(isset($data['single']->organization_name)) {{ $data['single']->organization_name }} @else N/A @endif </div>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <div class="m-b-5 font-bold">Member Type</div>
                        <div>@if(isset($data['single']->memberType)) {{ $data['single']->memberType->title }} @else N/A @endif </div>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <div class="m-b-5 font-bold">Reg. No.</div>
                        <div>@if(isset($data['single']->register_no)) {{ $data['single']->register_no }} @else N/A @endif</div>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <div class="m-b-5 font-bold">PAN/VAT No.</div>
                        <div>@if(isset($data['single']->pan_vat_no)) {{ $data['single']->pan_vat_no }} @else N/A @endif</div>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <div class="m-b-5 font-bold">Address</div>
                        <div>@if(isset($data['single']->address)) {{ $data['single']->address }} @else N/A @endif</div>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <div class="m-b-5 font-bold">Country</div>
                        <div>@if(isset($data['single']->country)) {{ $data['single']->country }} @else N/A @endif</div>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <div class="m-b-5 font-bold">Website</div>
                        <div><a href="@if(isset($data['single']->website)) {{ $data['single']->website }} @else N/A @endif">@if(isset($data['single']->website)) {{ $data['single']->website }} @else N/A @endif</a></div>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <div class="m-b-5 font-bold">Telephone</div>
                        <div>@if(isset($data['single']->telephone)) {{ $data['single']->telephone }} @else N/A @endif</div>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <div class="m-b-5 font-bold">Mobile </div>
                        <div>@if(isset($data['single']->mobile)) {{ $data['single']->mobile }} @else N/A @endif</div>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <div class="m-b-5 font-bold">Fax </div>
                        <div>@if(isset($data['single']->fax)) {{ $data['single']->fax }} @else N/A @endif</div>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <div class="m-b-5 font-bold">PO Box </div>
                        <div>@if(isset($data['single']->po_box)) {{ $data['single']->po_box }} @else N/A @endif</div>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <div class="m-b-5 font-bold">Key Person </div>
                        <div>@if(isset($data['single']->key_person)) {{ $data['single']->key_person }} @else N/A @endif</div>
                    </div>
                </div>
                <div class="col-3">
                    <div>
                        <div class="m-b-5 font-bold">Establish Date </div>
                        <div>@if(isset($data['single']->establish_date)) {{ $data['single']->establish_date }} @else N/A @endif</div>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped no-margin table-invoice">
            <thead>
                <tr>
                    <th>Profile</th>
                    <th>Logo</th>
                    <th>PAN/VAT</th>
                    <th>Company Register</th>
                    <th>Tax Clearance</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

    </div>
    <style>
        .invoice {
            padding: 20px;
        }

        .invoice-header {
            margin-bottom: 50px;
        }

        .invoice-logo {
            margin-bottom: 50px;
        }

        .table-invoice tr td:last-child {
            text-align: right;
        }
    </style>
</div>
@endsection