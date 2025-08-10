@extends('layouts.admin')
@section('styles')
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
    }

    .certificate-container {
        width: 800px;
        height: 1132px;
        margin: 20px auto;
        position: relative;
        background: url('certificate.jpg') no-repeat center center;
        background-size: cover;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        padding: 20px;
    }

    .field {
        position: absolute;
        font-size: 16px;
        color: #000;
        font-weight: bold;
    }

    .presented-to {
        top: 336px;
        width: 100%;
        left: 0;
        text-align: center;
    }

    .membership-id {
        right: 35px;
        text-align: right;
        top: 513px;
    }

    .renewal-details {
        top: 584px;
        left: 50px;
        display: flex;
        flex-wrap: wrap;
        width: 90%;
        gap: 5px;
    }

    .renewal-box {
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        border: none;
        text-align: center;
        height: 76px;
    }

    .receipt-no {
        width: 95px;
    }

    .validity {
        width: 144px;
    }

    .president {
        width: 217px;
    }

    .general-secretary {
        width: 236px;
    }

    #print-btn {
        display: block;
        margin: 20px auto;
        padding: 10px 20px;
        background-color: #007BFF;
        color: white;
        font-size: 18px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-align: center;
    }

    #print-btn:hover {
        background-color: #0056b3;
    }


    @media print {
        .certificate-container {
            background-image: url('certificate.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        body {
            margin: 0;
            padding: 0;
        }

        #print-btn {
            display: none;
        }
    }
</style>
@endsection
@section('content')
<div class="page-heading">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{route( $_base_route.'.index' )}}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fa fa-long-arrow-left fa-sm text-white-50"></i> Back </a>
        
        <button
            class="btn btn-info bnt-sm"
            type="button"
            onclick="javascript:window.print();">
            <i class="fa fa-print"></i> Print
        </button>
    </div>
</div>
<!-- START PAGE CONTENT-->
<div id="certificate" class="certificate-container" style="background-image: url('{{ asset('assets/cms/certificate/certificate.jpg')}}');">
    <div class="field presented-to text-center">
        This certificate is presented to: <span>
            @if(isset($data['user']->name)) {{ $data['user']->name }} @else N/A @endif
        </span>
    </div>
    <div class="field membership-id">
        <span style="margin-left: 50px;">
            @if(isset($data['single']->member_id)) {{ $data['single']->member_id }} @else N/A @endif
        </span>
    </div>
    <div class="field renewal-details">
        <div class="renewal-box receipt-no">12345</div>
        <div class="renewal-box validity">12/2024</div>
        <div class="renewal-box president">John Smith</div>
        <div class="renewal-box general-secretary">Jane Doe</div>
    </div>
</div>
@endsection