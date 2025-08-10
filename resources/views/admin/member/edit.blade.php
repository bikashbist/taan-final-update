@extends('layouts.admin')
@section('title')
    Admin {{ $_panel }} Add | SCMS
@endsection
@section('styles')
    <link href="{{ asset('assets/cms/plugin/nepali.datepicker.v4.0.4/nepali.datepicker.v4.0.4.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/cms/vendors/summernote/dist/summernote.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <div class="page-heading">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <a href="{{ route($_base_route . '.index') }}"
                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fa fa-arrow-left fa-sm text-white-50"></i> Back </a>
        </div>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Add Company Details</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                            <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item">option 1</a>
                                <a class="dropdown-item">option 2</a>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <form action="{{ route($_base_route . '.update', $data['rows']->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="full_name" style="font-weight: bold;">Full Name (<span
                                            style="color:red">*</span>)</label>
                                    <input class="form-control rounded" type="text" name="full_name" id="full_name"
                                        value="@if (isset($data['user']->name)) {{ $data['user']->name }} @endif"
                                        placeholder="Full Name">
                                    @if ($errors->has('full_name'))
                                        <p id="company_name-error" class="help-block" style="color: red;" for="full_name">
                                            <span>{{ $errors->first('full_name') }}</span>
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="email" style="font-weight: bold;">Email (<span
                                            style="color:red">*</span>)</label>
                                    <input class="form-control rounded" type="email" name="email" id="email"
                                        value="@if (isset($data['user']->email)) {{ $data['user']->email }} @endif"
                                        id="pan-address" placeholder="Email">
                                    @if ($errors->has('email'))
                                        <p id="pan_no-error" class="help-block" style="color: red;" for="email">
                                            <span>{{ $errors->first('email') }}</span>
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="organization_name" style="font-weight: bold;">Organization Name (<span
                                            style="color:red">*</span>)</label>
                                    <input class="form-control rounded" type="text" name="organization_name"
                                        id="organization_name"
                                        value="@if (isset($data['rows']->organization_name)) {{ $data['rows']->organization_name }} @endif"
                                        placeholder="Name">
                                    @if ($errors->has('organization_name'))
                                        <p id="company_name-error" class="help-block" style="color: red;"
                                            for="organization_name"><span>{{ $errors->first('organization_name') }}</span>
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="member_type_id" style="font-weight: bold;">Member Type (<span
                                            style="color:red">*</span>)</label>
                                    <select class="form-control rounded" name="member_type_id" id="member_type">
                                        <option value="">Choose Type</option>
                                        @foreach ($data['type'] as $key => $row)
                                            <option value="{{ $row->id }}"
                                                data-has-subcategory="{{ $row->has_subcategory ? 'true' : 'false' }}"
                                                @if (old('member_type_id') == $row->id) selected @endif
                                                {{ $row->id == $data['rows']->member_type_id ? 'selected' : '' }}>
                                                {{ $row->title }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('member_type_id'))
                                        <p id="member_type_id-error" class="help-block" style="color: red;"
                                            for="member_type_id"><span>{{ $errors->first('member_type_id') }}</span></p>
                                    @endif
                                </div>

                                <!-- Member Subcategory Selection (only shown for types with subcategories) -->
                                <div class="form-group col-md-3 col-12 col-lg-3" id="subcategory_section"
                                    style="display: none;">
                                    <label for="member_subcategory_id" style="font-weight: bold;">Member Subcategory (<span
                                            style="color:red">*</span>)</label>
                                    <select class="form-control rounded" name="member_subcategory_id"
                                        id="member_subcategory_id">
                                        <option value="">Select Subcategory</option>
                                    </select>
                                    @if ($errors->has('member_subcategory_id'))
                                        <p id="member_subcategory_id-error" class="help-block" style="color: red;"
                                            for="member_subcategory_id">
                                            <span>{{ $errors->first('member_subcategory_id') }}</span>
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="member_id" style="font-weight: bold;">Member ID (<span
                                            style="color:red">*</span>)</label>
                                    <input class="form-control rounded" type="text" name="member_id" min="0"
                                        id="member_id"
                                        value="@if (isset($data['rows']->member_id)) {{ $data['rows']->member_id }} @endif"
                                        id="pan-address" placeholder="Member ID">
                                    @if ($errors->has('member_id'))
                                        <p id="member_type_id-error" class="help-block" style="color: red;"
                                            for="member_id">
                                            <span>{{ $errors->first('member_id') }}</span>
                                        </p>
                                    @endif
                                </div>

                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="register_no" style="font-weight: bold;">Reg. No. </label>
                                    <input class="form-control rounded" type="text" name="register_no"
                                        id="register_no"
                                        value="@if (isset($data['rows']->register_no)) {{ $data['rows']->register_no }} @endif"
                                        id="register_no" placeholder="Reg No.">
                                    @if ($errors->has('pan'))
                                        <p id="register_no-error" class="help-block" style="color: red;"
                                            for="register_no"><span>{{ $errors->first('register_no') }}</span></p>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="pan_vat_no" style="font-weight: bold;">PAN/VAT No.</label>
                                    <input class="form-control rounded" type="text" name="pan_vat_no"
                                        value="@if (isset($data['rows']->pan_vat_no)) {{ $data['rows']->pan_vat_no }} @endif"
                                        id="pan_vat_no" placeholder="PAN/VAT No">
                                    @if ($errors->has('pan_vat_no'))
                                        <p id="pan_no-error" class="help-block" style="color: red;" for="pan_vat_no">
                                            <span>{{ $errors->first('pan_vat_no') }}</span>
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="address" style="font-weight: bold;">Address (<span
                                            style="color:red">*</span>)</label>
                                    <input class="form-control rounded" type="text" name="address" id="address"
                                        value="@if (isset($data['rows']->address)) {{ $data['rows']->address }} @endif"
                                        id="pan-address" placeholder="Address">
                                    @if ($errors->has('address'))
                                        <p id="pan_no-error" class="help-block" style="color: red;" for="pan_no">
                                            <span>{{ $errors->first('address') }}</span>
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="country" style="font-weight: bold;">Country (<span
                                            style="color:red">*</span>)</label>
                                    <input class="form-control rounded" type="text" name="country" id="country"
                                        value="@if (isset($data['rows']->country)) {{ $data['rows']->country }} @endif"
                                        id="pan-address" placeholder="Country">
                                    @if ($errors->has('country'))
                                        <p id="pan_no-error" class="help-block" style="color: red;" for="pan_no">
                                            <span>{{ $errors->first('country') }}</span>
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="website" style="font-weight: bold;">Website </label>
                                    <input class="form-control rounded" type="url" name="website" id="website"
                                        value="@if (isset($data['rows']->website)) {{ $data['rows']->website }} @endif"
                                        id="pan-address" placeholder="Website">
                                    @if ($errors->has('website'))
                                        <p id="pan_no-error" class="help-block" style="color: red;" for="website">
                                            <span>{{ $errors->first('country') }}</span>
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="telephone" style="font-weight: bold;">Telephone </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <select class="form-control" name="telephone_country_code"
                                                id="telephone_country_code" style="width: 75px;">
                                                @php
                                                    $currentTelephone = isset($data['rows']->telephone)
                                                        ? $data['rows']->telephone
                                                        : old('telephone', '');
                                                    $currentTelephoneCountryCode = '+977'; // default
                                                    $currentTelephoneNumber = '';

                                                    // Extract country code from existing telephone number
                                                    if ($currentTelephone) {
                                                        if (str_starts_with($currentTelephone, '+977')) {
                                                            $currentTelephoneCountryCode = '+977';
                                                            $currentTelephoneNumber = substr($currentTelephone, 4);
                                                        } elseif (str_starts_with($currentTelephone, '+91')) {
                                                            $currentTelephoneCountryCode = '+91';
                                                            $currentTelephoneNumber = substr($currentTelephone, 3);
                                                        } elseif (str_starts_with($currentTelephone, '+1')) {
                                                            $currentTelephoneCountryCode = '+1';
                                                            $currentTelephoneNumber = substr($currentTelephone, 2);
                                                        } elseif (str_starts_with($currentTelephone, '+44')) {
                                                            $currentTelephoneCountryCode = '+44';
                                                            $currentTelephoneNumber = substr($currentTelephone, 3);
                                                        } elseif (str_starts_with($currentTelephone, '+86')) {
                                                            $currentTelephoneCountryCode = '+86';
                                                            $currentTelephoneNumber = substr($currentTelephone, 3);
                                                        } elseif (str_starts_with($currentTelephone, '+880')) {
                                                            $currentTelephoneCountryCode = '+880';
                                                            $currentTelephoneNumber = substr($currentTelephone, 4);
                                                        } else {
                                                            // If no country code found, assume it's just the number
        $currentTelephoneNumber = $currentTelephone;
    }
}

// Override with old values if validation failed
$currentTelephoneCountryCode = old(
    'telephone_country_code',
    $currentTelephoneCountryCode,
);
$currentTelephoneNumber = old(
    'telephone_number',
                                                        $currentTelephoneNumber,
                                                    );
                                                @endphp
                                                <option value="+977"
                                                    {{ $currentTelephoneCountryCode == '+977' ? 'selected' : '' }}>+977
                                                    (NP)</option>
                                                <option value="+91"
                                                    {{ $currentTelephoneCountryCode == '+91' ? 'selected' : '' }}>+91 (IN)
                                                </option>
                                                <option value="+1"
                                                    {{ $currentTelephoneCountryCode == '+1' ? 'selected' : '' }}>+1 (US)
                                                </option>
                                                <option value="+44"
                                                    {{ $currentTelephoneCountryCode == '+44' ? 'selected' : '' }}>+44 (UK)
                                                </option>
                                                <option value="+86"
                                                    {{ $currentTelephoneCountryCode == '+86' ? 'selected' : '' }}>+86 (CN)
                                                </option>
                                                <option value="+81"
                                                    {{ $currentTelephoneCountryCode == '+81' ? 'selected' : '' }}>+81 (JP)
                                                </option>
                                                <option value="+82"
                                                    {{ $currentTelephoneCountryCode == '+82' ? 'selected' : '' }}>+82 (KR)
                                                </option>
                                                <option value="+65"
                                                    {{ $currentTelephoneCountryCode == '+65' ? 'selected' : '' }}>+65 (SG)
                                                </option>
                                                <option value="+60"
                                                    {{ $currentTelephoneCountryCode == '+60' ? 'selected' : '' }}>+60 (MY)
                                                </option>
                                                <option value="+66"
                                                    {{ $currentTelephoneCountryCode == '+66' ? 'selected' : '' }}>+66 (TH)
                                                </option>
                                                <option value="+84"
                                                    {{ $currentTelephoneCountryCode == '+84' ? 'selected' : '' }}>+84 (VN)
                                                </option>
                                                <option value="+62"
                                                    {{ $currentTelephoneCountryCode == '+62' ? 'selected' : '' }}>+62 (ID)
                                                </option>
                                                <option value="+63"
                                                    {{ $currentTelephoneCountryCode == '+63' ? 'selected' : '' }}>+63 (PH)
                                                </option>
                                                <option value="+880"
                                                    {{ $currentTelephoneCountryCode == '+880' ? 'selected' : '' }}>+880
                                                    (BD)</option>
                                                <option value="+94"
                                                    {{ $currentTelephoneCountryCode == '+94' ? 'selected' : '' }}>+94 (LK)
                                                </option>
                                                <option value="+61"
                                                    {{ $currentTelephoneCountryCode == '+61' ? 'selected' : '' }}>+61 (AU)
                                                </option>
                                                <option value="+49"
                                                    {{ $currentTelephoneCountryCode == '+49' ? 'selected' : '' }}>+49 (DE)
                                                </option>
                                                <option value="+33"
                                                    {{ $currentTelephoneCountryCode == '+33' ? 'selected' : '' }}>+33 (FR)
                                                </option>
                                                <option value="+39"
                                                    {{ $currentTelephoneCountryCode == '+39' ? 'selected' : '' }}>+39 (IT)
                                                </option>
                                                <option value="+34"
                                                    {{ $currentTelephoneCountryCode == '+34' ? 'selected' : '' }}>+34 (ES)
                                                </option>
                                            </select>
                                        </div>
                                        <input class="form-control rounded" type="text" name="telephone_number"
                                            id="telephone_number" value="{{ $currentTelephoneNumber }}"
                                            placeholder="Telephone Number">
                                        <input type="hidden" name="telephone" id="telephone_combined"
                                            value="{{ $currentTelephone }}">
                                    </div>
                                    @if ($errors->has('telephone'))
                                        <p id="pan_no-error" class="help-block" style="color: red;" for="telephone">
                                            <span>{{ $errors->first('telephone') }}</span>
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="mobile" style="font-weight: bold;">Mobile (<span
                                            style="color:red">*</span>)</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <select class="form-control" name="country_code" id="country_code"
                                                style="width: 75px;">
                                                @php
                                                    $currentMobile = isset($data['rows']->mobile)
                                                        ? $data['rows']->mobile
                                                        : old('mobile', '');
                                                    $currentCountryCode = '+977'; // default
                                                    $currentMobileNumber = '';

                                                    // Extract country code from existing mobile number
                                                    if ($currentMobile) {
                                                        if (str_starts_with($currentMobile, '+977')) {
                                                            $currentCountryCode = '+977';
                                                            $currentMobileNumber = substr($currentMobile, 4);
                                                        } elseif (str_starts_with($currentMobile, '+91')) {
                                                            $currentCountryCode = '+91';
                                                            $currentMobileNumber = substr($currentMobile, 3);
                                                        } elseif (str_starts_with($currentMobile, '+1')) {
                                                            $currentCountryCode = '+1';
                                                            $currentMobileNumber = substr($currentMobile, 2);
                                                        } elseif (str_starts_with($currentMobile, '+44')) {
                                                            $currentCountryCode = '+44';
                                                            $currentMobileNumber = substr($currentMobile, 3);
                                                        } elseif (str_starts_with($currentMobile, '+86')) {
                                                            $currentCountryCode = '+86';
                                                            $currentMobileNumber = substr($currentMobile, 3);
                                                        } elseif (str_starts_with($currentMobile, '+880')) {
                                                            $currentCountryCode = '+880';
                                                            $currentMobileNumber = substr($currentMobile, 4);
                                                        } else {
                                                            // If no country code found, assume it's just the number
        $currentMobileNumber = $currentMobile;
    }
}

// Override with old values if validation failed
$currentCountryCode = old('country_code', $currentCountryCode);
$currentMobileNumber = old('mobile_number', $currentMobileNumber);
                                                @endphp
                                                <option value="+977"
                                                    {{ $currentCountryCode == '+977' ? 'selected' : '' }}>+977 (NP)
                                                </option>
                                                <option value="+91"
                                                    {{ $currentCountryCode == '+91' ? 'selected' : '' }}>+91 (IN)</option>
                                                <option value="+1"
                                                    {{ $currentCountryCode == '+1' ? 'selected' : '' }}>+1 (US)</option>
                                                <option value="+44"
                                                    {{ $currentCountryCode == '+44' ? 'selected' : '' }}>+44 (UK)</option>
                                                <option value="+86"
                                                    {{ $currentCountryCode == '+86' ? 'selected' : '' }}>+86 (CN)</option>
                                                <option value="+81"
                                                    {{ $currentCountryCode == '+81' ? 'selected' : '' }}>+81 (JP)</option>
                                                <option value="+82"
                                                    {{ $currentCountryCode == '+82' ? 'selected' : '' }}>+82 (KR)</option>
                                                <option value="+65"
                                                    {{ $currentCountryCode == '+65' ? 'selected' : '' }}>+65 (SG)</option>
                                                <option value="+60"
                                                    {{ $currentCountryCode == '+60' ? 'selected' : '' }}>+60 (MY)</option>
                                                <option value="+66"
                                                    {{ $currentCountryCode == '+66' ? 'selected' : '' }}>+66 (TH)</option>
                                                <option value="+84"
                                                    {{ $currentCountryCode == '+84' ? 'selected' : '' }}>+84 (VN)</option>
                                                <option value="+62"
                                                    {{ $currentCountryCode == '+62' ? 'selected' : '' }}>+62 (ID)</option>
                                                <option value="+63"
                                                    {{ $currentCountryCode == '+63' ? 'selected' : '' }}>+63 (PH)</option>
                                                <option value="+880"
                                                    {{ $currentCountryCode == '+880' ? 'selected' : '' }}>+880 (BD)
                                                </option>
                                                <option value="+94"
                                                    {{ $currentCountryCode == '+94' ? 'selected' : '' }}>+94 (LK)</option>
                                                <option value="+61"
                                                    {{ $currentCountryCode == '+61' ? 'selected' : '' }}>+61 (AU)</option>
                                                <option value="+49"
                                                    {{ $currentCountryCode == '+49' ? 'selected' : '' }}>+49 (DE)</option>
                                                <option value="+33"
                                                    {{ $currentCountryCode == '+33' ? 'selected' : '' }}>+33 (FR)</option>
                                                <option value="+39"
                                                    {{ $currentCountryCode == '+39' ? 'selected' : '' }}>+39 (IT)</option>
                                                <option value="+34"
                                                    {{ $currentCountryCode == '+34' ? 'selected' : '' }}>+34 (ES)</option>
                                            </select>
                                        </div>
                                        <input class="form-control rounded" type="text" name="mobile_number"
                                            id="mobile_number" value="{{ $currentMobileNumber }}"
                                            placeholder="Mobile Number">
                                        <input type="hidden" name="mobile" id="mobile_combined"
                                            value="{{ $currentMobile }}">
                                    </div>
                                    @if ($errors->has('mobile'))
                                        <p id="name-error" class="help-block" style="color: red;" for="mobile">
                                            <span>{{ $errors->first('mobile') }}</span>
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="fax" style="font-weight: bold;">Fax </label>
                                    <input class="form-control rounded" type="text" name="fax" id="fax"
                                        id="fax"
                                        value="@if (isset($data['rows']->fax)) {{ $data['rows']->fax }} @endif"
                                        placeholder="fax">
                                    @if ($errors->has('fax'))
                                        <p id="name-error" class="help-block" style="color: red;" for="fax">
                                            <span>{{ $errors->first('fax') }}</span>
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="po_box" style="font-weight: bold;">PO Box</label>
                                    <input class="form-control rounded" type="text" name="po_box" id="po_box"
                                        id="po_box"
                                        value="@if (isset($data['rows']->po_box)) {{ $data['rows']->po_box }} @endif"
                                        placeholder="PO Box">
                                    @if ($errors->has('po_box'))
                                        <p id="name-error" class="help-block" style="color: red;" for="fax">
                                            <span>{{ $errors->first('po_box') }}</span>
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="key_person" style="font-weight: bold;">Key Person</label>
                                    <input class="form-control rounded" type="text" name="key_person" id="key_person"
                                        id="key_person"
                                        value="@if (isset($data['rows']->key_person)) {{ $data['rows']->key_person }} @endif"
                                        placeholder="Key Person">
                                    @if ($errors->has('key_person'))
                                        <p id="name-error" class="help-block" style="color: red;" for="fax">
                                            <span>{{ $errors->first('key_person') }}</span>
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="establish_date" style="font-weight: bold;">Establish Date (<span
                                            style="color:red">*</span>)</label>
                                    <input class="form-control rounded establish_date" type="text" readonly
                                        name="establish_date" id="establish_date"
                                        value="@if (isset($data['rows']->establish_date)) {{ $data['rows']->establish_date }} @endif"
                                        placeholder="Establish Date">
                                    @if ($errors->has('establish_date'))
                                        <p id="name-error" class="help-block" style="color: red;" for="fax">
                                            <span>{{ $errors->first('establish_date') }}</span>
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="avatar" style="font-weight: bold;">Profile </label>
                                    <input class="form-control rounded" type="file" name="avatar" id="avatar"
                                        value="@if (isset($data['rows']->avatar)) {{ $data['rows']->avatar }} @endif"
                                        placeholder="Profile">
                                    @if ($errors->has('avatar'))
                                        <p id="avatar-error" class="help-block" style="color: red;" for="avatar">
                                            <span>{{ $errors->first('avatar') }}</span>
                                        </p>
                                    @endif
                                    @if (isset($data['user']->avatar) && !empty($data['user']->avatar))
                                        <img src="{{ asset($data['user']->avatar) }}" alt=""
                                            style="width: 100px;">
                                    @else
                                        <p>Profile Not Found !</p>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="company_cover_image" style="font-weight: bold;">Cover Image </label>
                                    <input class="form-control rounded" type="file" name="company_cover_image"
                                        id="company_cover_image" value="" placeholder="Profile">
                                    @if ($errors->has('company_cover_image'))
                                        <p id="avatar-error" class="help-block" style="color: red;"
                                            for="company_cover_image">
                                            <span>{{ $errors->first('company_cover_image') }}</span>
                                        </p>
                                    @endif
                                    @if (isset($data['rows']->company_cover_image) && !empty($data['rows']->company_cover_image))
                                        <img src="{{ asset($data['rows']->company_cover_image) }}" alt=""
                                            style="width: 100px;">
                                    @else
                                        <p>Cover Image Not Found !</p>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="company_logo" style="font-weight: bold;">Logo</label>
                                    <input class="form-control rounded" type="file" name="company_logo"
                                        id="company_logo"
                                        value="@if (isset($data['rows']->company_logo)) {{ $data['rows']->company_logo }} @endif"
                                        placeholder="Company Logo">
                                    @if ($errors->has('company_logo'))
                                        <p id="company_logo-error" class="help-block" style="color: red;"
                                            for="company_logo"><span>{{ $errors->first('company_logo') }}</span></p>
                                    @endif
                                    @if (isset($data['rows']->company_logo) && !empty($data['rows']->company_logo))
                                        <img src="{{ asset($data['rows']->company_logo) }}" alt=""
                                            style="width: 100px;">
                                    @else
                                        <p>Logo Not Found !</p>
                                    @endif
                                </div>

                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="company_pan" style="font-weight: bold;">PAN/VAT </label>
                                    <input class="form-control rounded" type="file" name="company_pan"
                                        id="company_pan" placeholder="Upload PAN">
                                    @if ($errors->has('company_pan'))
                                        <p id="pan-error" class="help-block" style="color: red;" for="pan">
                                            <span>{{ $errors->first('company_pan') }}</span>
                                        </p>
                                    @endif
                                    @if (isset($data['rows']->company_pan) && !empty($data['rows']->company_pan))
                                        <img src="{{ asset($data['rows']->company_pan) }}" alt=""
                                            style="width: 100px;">
                                    @else
                                        <p>PAN/VAT Not Found !</p>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="company_register" style="font-weight: bold;">Company Register </label>
                                    <input class="form-control rounded" type="file" name="company_register"
                                        id="company_register" placeholder="Register File">
                                    @if ($errors->has('company_register'))
                                        <p id="register_file-error" class="help-block" style="color: red;"
                                            for="register_file"><span>{{ $errors->first('company_register') }}</span></p>
                                    @endif
                                    @if (isset($data['rows']->company_register) && !empty($data['rows']->company_register))
                                        <img src="{{ asset($data['rows']->company_register) }}" alt=""
                                            style="width: 100px;">
                                    @else
                                        <p>Company Register Not Found !</p>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="company_tax_clearance" style="font-weight: bold;">Tax Clearance</label>
                                    <input class="form-control rounded" type="file" name="company_tax_clearance"
                                        id="company_tax_clearance" placeholder="Tax Clearance File">
                                    @if ($errors->has('tax_clearance'))
                                        <p id="tax_clearance-error" class="help-block" style="color: red;"
                                            for="company_tax_clearance">
                                            <span>{{ $errors->first('company_tax_clearance') }}</span>
                                        </p>
                                    @endif
                                    @if (isset($data['rows']->company_tax_clearance) && !empty($data['rows']->company_tax_clearance))
                                        <img src="{{ asset($data['rows']->company_tax_clearance) }}" alt=""
                                            style="width: 100px;">
                                    @else
                                        <p>Tax Clearance Not Found !</p>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="payment_slip" style="font-weight: bold;">Payment Slip</label>
                                    <input class="form-control rounded" type="file" name="payment_slip"
                                        id="payment_slip" placeholder="Payment Slip">
                                    @if ($errors->has('payment_slip'))
                                        <p id="tax_clearance-error" class="help-block" style="color: red;"
                                            for="payment_slip"><span>{{ $errors->first('payment_slip') }}</span></p>
                                    @endif
                                    @if (isset($data['rows']->payment_slip) && !empty($data['rows']->payment_slip))
                                        <img src="{{ asset($data['rows']->payment_slip) }}" alt=""
                                            style="width: 100px;">
                                    @else
                                        <p>Payment Slip Not Found !</p>
                                    @endif
                                </div>
                                {{-- Tourism Certificate --}}
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="tourism_certificate" style="font-weight: bold;">Tourism
                                        Certificate</label>
                                    <input class="form-control rounded" type="file" name="tourism_certificate"
                                        id="tourism_certificate">
                                    @if ($errors->has('tourism_certificate'))
                                        <p class="help-block text-danger">
                                            <span>{{ $errors->first('tourism_certificate') }}</span>
                                        </p>
                                    @endif
                                    @if (isset($data['rows']->tourism_certificate) && !empty($data['rows']->tourism_certificate))
                                        <img src="{{ asset($data['rows']->tourism_certificate) }}" alt=""
                                            style="width: 100px;">
                                    @else
                                        <p>Tourism Certificate Not Found!</p>
                                    @endif
                                </div>

                                {{-- NRB Certificate --}}
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="nrb_certificate" style="font-weight: bold;">NRB Certificate</label>
                                    <input class="form-control rounded" type="file" name="nrb_certificate"
                                        id="nrb_certificate">
                                    @if ($errors->has('nrb_certificate'))
                                        <p class="help-block text-danger">
                                            <span>{{ $errors->first('nrb_certificate') }}</span>
                                        </p>
                                    @endif
                                    @if (isset($data['rows']->nrb_certificate) && !empty($data['rows']->nrb_certificate))
                                        <img src="{{ asset($data['rows']->nrb_certificate) }}" alt=""
                                            style="width: 100px;">
                                    @else
                                        <p>NRB Certificate Not Found!</p>
                                    @endif
                                </div>

                                {{-- Cottage Industry Certificate --}}
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="cottage_industry_certificate" style="font-weight: bold;">Cottage Industry
                                        Certificate</label>
                                    <input class="form-control rounded" type="file"
                                        name="cottage_industry_certificate" id="cottage_industry_certificate">
                                    @if ($errors->has('cottage_industry_certificate'))
                                        <p class="help-block text-danger">
                                            <span>{{ $errors->first('cottage_industry_certificate') }}</span>
                                        </p>
                                    @endif
                                    @if (isset($data['rows']->cottage_industry_certificate) && !empty($data['rows']->cottage_industry_certificate))
                                        <img src="{{ asset($data['rows']->cottage_industry_certificate) }}"
                                            alt="" style="width: 100px;">
                                    @else
                                        <p>Cottage Industry Certificate Not Found!</p>
                                    @endif
                                </div>

                                {{-- Renewal Certificate --}}
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="renewal_certificate" style="font-weight: bold;">Renewal
                                        Certificate</label>
                                    <input class="form-control rounded" type="file" name="renewal_certificate"
                                        id="renewal_certificate">
                                    @if ($errors->has('renewal_certificate'))
                                        <p class="help-block text-danger">
                                            <span>{{ $errors->first('renewal_certificate') }}</span>
                                        </p>
                                    @endif
                                    @if (isset($data['rows']->renewal_certificate) && !empty($data['rows']->renewal_certificate))
                                        <img src="{{ asset($data['rows']->renewal_certificate) }}" alt=""
                                            style="width: 100px;">
                                    @else
                                        <p>Renewal Certificate Not Found!</p>
                                    @endif
                                </div>
                                <div class="form-group col-md-6 col-12 col-lg-6">
                                </div>
                                <div class="ibox-head">
                                    <div class="ibox-title">Social Link</div>
                                </div>
                                <div class="ibox-body row">
                                    <div class="form-group col-md-3 col-12 col-lg-3">
                                        <label for="facebook" style="font-weight: bold;">Facebook</label>
                                        <input class="form-control rounded" type="url" name="facebook"
                                            id="facebook"
                                            value="@if (isset($data['rows']->facebook)) {{ $data['rows']->facebook }} @endif"
                                            placeholder="Faceook link">
                                    </div>
                                    <div class="form-group col-md-3 col-12 col-lg-3">
                                        <label for="instagram" style="font-weight: bold;">Instagram</label>
                                        <input class="form-control rounded" type="url" name="instagram"
                                            id="instagram"
                                            value="@if (isset($data['rows']->instagram)) {{ $data['rows']->instagram }} @endif"
                                            placeholder="instagram link">
                                    </div>
                                    <div class="form-group col-md-3 col-12 col-lg-3">
                                        <label for="twiter" style="font-weight: bold;">Twitter</label>
                                        <input class="form-control rounded" type="url" name="twitter" id="twitter"
                                            value="@if (isset($data['rows']->twitter)) {{ $data['rows']->twitter }} @endif"
                                            placeholder="Twiter link">
                                    </div>
                                    <div class="form-group col-md-3 col-12 col-lg-3">
                                        <label for="youtube" style="font-weight: bold;">Youtube</label>
                                        <input class="form-control rounded" type="url" name="youtube" id="youtube"
                                            value="@if (isset($data['rows']->youtube)) {{ $data['rows']->youtube }} @endif"
                                            placeholder="Youtube link">
                                    </div>
                                    <div class="form-group col-md-3 col-12 col-lg-3">
                                        <label for="linkedin" style="font-weight: bold;">Linked In</label>
                                        <input class="form-control rounded" type="url" name="linkedin"
                                            id="linkedin"
                                            value="@if (isset($data['rows']->linkedin)) {{ $data['rows']->linkedin }} @endif"
                                            placeholder="Linkedin link">
                                    </div>
                                    <div class="form-group col-md-9 col-12 col-lg-9">
                                        <label for="about_company" style="font-weight: bold;">About Company</label>
                                        <textarea name="about_company" placeholder=""
                                            class="form form-control {{ $errors->has('about_company') ? 'is-invalid' : '' }}" id="about_company"
                                            cols="30" rows="4">
@if (!empty($data['rows']->about_company))
{{ $data['rows']->about_company }}
@else
{{ old('about_company') }}
@endif
</textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group text-right">
                                <button class="btn btn-primary btn-sm" type="reset" style="cursor:pointer;"><i
                                        class="fa fa-ban"></i> Reset</button>
                                <a href="{{ route($_base_route . '.index') }}" class="btn btn-warning btn-sm"><i
                                        class="fa fa-undo"></i> Back</a>
                                <button class="btn btn-success btn-sm" type="submit" style="cursor:pointer;"><i
                                        class="fa fa-paper-plane"></i> Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/cms/plugin/nepali.datepicker.v4.0.4/nepali.datepicker.v4.0.4.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('assets/cms/dm_js/nepalidate.js') }}"></script>
    <script src="{{ asset('assets/cms/vendors/summernote/dist/summernote.min.js') }}" type="text/javascript"></script>

    <script>
        var npDate = document.getElementsByClassName("establish_date");
        if (npDate.length > 0) {
            NepaliDatePickerCal(npDate);
        }
    </script>
    <script type="text/javascript">
        $(function() {
            $('#about_company').summernote({
                tabsize: 2,
                height: 100
            });
        });

        // Combine country code and mobile number
        function combineMobileNumber() {
            var countryCode = $('#country_code').val();
            var mobileNumber = $('#mobile_number').val();
            var combined = '';

            if (countryCode && mobileNumber) {
                combined = countryCode + mobileNumber;
            }

            $('#mobile_combined').val(combined);
        }

        // Combine country code and telephone number
        function combineTelephoneNumber() {
            var countryCode = $('#telephone_country_code').val();
            var telephoneNumber = $('#telephone_number').val();
            var combined = '';

            if (countryCode && telephoneNumber) {
                combined = countryCode + telephoneNumber;
            }

            $('#telephone_combined').val(combined);
        }

        // Update combined mobile number when either field changes
        $('#country_code, #mobile_number').on('change keyup', function() {
            combineMobileNumber();
        });

        // Update combined telephone number when either field changes
        $('#telephone_country_code, #telephone_number').on('change keyup', function() {
            combineTelephoneNumber();
        });

        // Ensure numbers are combined before form submission
        $('form').on('submit', function() {
            combineMobileNumber();
            combineTelephoneNumber();
        });

        // Initialize on page load if values exist
        $(document).ready(function() {
            combineMobileNumber();
            combineTelephoneNumber();

            // Handle member type change to show/hide subcategory
            $('#member_type').on('change', function() {
                const selectedOption = $(this).find('option:selected');
                const hasSubcategory = selectedOption.data('has-subcategory');
                const memberTypeId = $(this).val();

                if (hasSubcategory === true || hasSubcategory === 'true') {
                    // Show subcategory section
                    $('#subcategory_section').show();

                    // Load subcategories via AJAX
                    if (memberTypeId) {
                        loadSubcategories(memberTypeId);
                    }
                } else {
                    // Hide subcategory section
                    $('#subcategory_section').hide();
                    $('#member_subcategory_id').html('<option value="">Select Subcategory</option>');
                }
            });

            // Check current member type and trigger change if it has subcategories
            const currentMemberTypeId = '{{ $data['rows']->member_type_id ?? '' }}';
            const currentSubcategoryId = '{{ $data['rows']->member_subcategory_id ?? '' }}';

            if (currentMemberTypeId) {
                $('#member_type').trigger('change');
            }
        });

        // Function to load subcategories
        function loadSubcategories(memberTypeId) {
            $.ajax({
                url: '{{ route('get-subcategories') }}',
                type: 'GET',
                data: {
                    member_type_id: memberTypeId
                },
                success: function(response) {
                    let options = '<option value="">Select Subcategory</option>';
                    if (response.subcategories && response.subcategories.length > 0) {
                        response.subcategories.forEach(function(subcategory) {
                            const currentSubcategoryId =
                                '{{ $data['rows']->member_subcategory_id ?? '' }}';
                            const oldSubcategoryId = '{{ old('member_subcategory_id') }}';
                            const selectedId = oldSubcategoryId || currentSubcategoryId;
                            const selected = selectedId == subcategory.id ? 'selected' : '';
                            options +=
                                `<option value="${subcategory.id}" ${selected}>${subcategory.name}</option>`;
                        });
                    }
                    $('#member_subcategory_id').html(options);
                },
                error: function() {
                    $('#member_subcategory_id').html('<option value="">Error loading subcategories</option>');
                }
            });
        }
    </script>
@endsection
