@extends('front_end.layouts.app')
@section('styles')
    <link href="{{ asset('assets/cms/plugin/nepali.datepicker.v4.0.4/nepali.datepicker.v4.0.4.min.css') }}"
        rel="stylesheet" />
@endsection
@section('content')
    <section class="mt-lg-5">
        <div class="container">
            <div class="row justify-content-center">
                @if (isset($data['single']) && !empty($data['single']))
                    <div class="col-lg-10">
                        @if (Session::has('alert-success'))
                            <div class="alert alert-success"><small>{{ Session::get('alert-success') }}</small>
                                <small style="font-weight: bold;">Organization Name :
                                    {{ $data['single']->organization_name }}</small>
                            </div>
                        @endif

                        <div class="login d-flex justify-content-center">
                            <div class="login__form flex-fill  p-lg-2">
                                <h5 style="color: #fff;">भौचर अपलोड गर्नुहोस</h5>
                                <form action="#" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="member_u_id" value="{{ $data['single']->id }}">
                                    <input type="hidden" name="member_id" value="{{ $data['single']->member_id }}">
                                    <input type="hidden" name="user_id" value="{{ $data['single']->user_id }}">
                                    <div class="row">

                                        <div class="form-group col-md-6 col-12 col-lg-6">
                                            <label for="amount" style="font-weight: bold;">Amount (<span
                                                    style="color:red">*</span>)</label>
                                            <input class="form-control rounded " type="text" name="amount"
                                                id="amount" value="{{ old('amount') }}" placeholder="Rs.">
                                            @if ($errors->has('amount'))
                                                <small id="amount-error" class="help-block" style="color: red;"
                                                    for="amount"><span>{{ $errors->first('amount') }}</span></small>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6 col-12 col-lg-6">
                                            <label for="voucher" style="font-weight: bold;">Voucher (<span
                                                    style="color:red">*</span>)</label>
                                            <input class="form-control rounded" type="file" name="voucher" id="voucher"
                                                value="{{ old('voucher') }}">
                                            @if ($errors->has('voucher'))
                                                <small id="voucher-error" class="help-block" style="color: red;"
                                                    for="voucher"><span>{{ $errors->first('voucher') }}</span></small>
                                            @endif
                                        </div>
                                    </div> <br>
                                    <div class="text-start">
                                        <button type="submit" class="btn btn-login ">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-lg-10">
                        @if (Session::has('alert-success'))
                            <div class="alert alert-success"><small>{{ Session::get('alert-success') }}</small>
                                <small style="font-weight: bold;"></small>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
    </section>
@endsection
@section('scripts')
    <script src="{{ asset('assets/cms/plugin/nepali.datepicker.v4.0.4/nepali.datepicker.v4.0.4.min.js') }}"
        type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $("#start_date").nepaliDatePicker({
                dateFormat: "%y-%m-%d",
                language: "english",
                ndpYear: true,
                ndpMonth: true,
                closeOnDateSelect: true,
            });
            $("#end_date").nepaliDatePicker({
                dateFormat: "%y-%m-%d",
                language: "english",
                ndpYear: true,
                ndpMonth: true,
                closeOnDateSelect: true,
            });

            //
        });
    </script>
@endsection
