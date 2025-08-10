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
                        <form action="{{ route($_base_route . '.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="member_type" style="font-weight: bold;">Member Type (<span
                                            style="color:red">*</span>)</label>
                                    <select class="form-control rounded" name="member_type_id" id="member_type">
                                        <option value="">Choose Type</option>
                                        @foreach ($data['type'] as $key => $row)
                                            <option value="{{ $row->id }}"
                                                data-has-subcategory="{{ $row->has_subcategory ? 'true' : 'false' }}"
                                                @if (old('member_type_id') == $row->id) selected @endif>{{ $row->title }}
                                            </option>
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
                                    <input class="form-control rounded" type="number" name="member_id" min="0"
                                        id="member_id" value="{{ old('member_id') }}" id="pan-address"
                                        placeholder="Member ID">
                                    @if ($errors->has('member_id'))
                                        <p id="member_type_id-error" class="help-block" style="color: red;" for="member_id">
                                            <span>{{ $errors->first('member_id') }}</span>
                                        </p>
                                    @endif
                                </div>

                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="organization_name" style="font-weight: bold;">Organization Name (<span
                                            style="color:red">*</span>)</label>
                                    <input class="form-control rounded" type="text" name="organization_name"
                                        id="organization_name" value="{{ old('organization_name') }}" placeholder="Name">
                                    @if ($errors->has('organization_name'))
                                        <p id="company_name-error" class="help-block" style="color: red;"
                                            for="organization_name"><span>{{ $errors->first('organization_name') }}</span>
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="register_no" style="font-weight: bold;">Reg. No.</label>
                                    <input class="form-control rounded" type="text" name="register_no" id="register_no"
                                        value="{{ old('register_no') }}" id="register_no" placeholder="Reg No.">
                                    @if ($errors->has('pan'))
                                        <p id="register_no-error" class="help-block" style="color: red;" for="register_no">
                                            <span>{{ $errors->first('register_no') }}</span>
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="pan_vat_no" style="font-weight: bold;">PAN/VAT No.</label>
                                    <input class="form-control rounded" type="text" name="pan_vat_no"
                                        value="{{ old('pan_vat_no') }}" id="pan_vat_no" placeholder="PAN/VAT No">
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
                                        value="{{ old('address') }}" id="pan-address" placeholder="Address">
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
                                        value="Nepal" id="pan-address" placeholder="Country">
                                    @if ($errors->has('country'))
                                        <p id="pan_no-error" class="help-block" style="color: red;" for="pan_no">
                                            <span>{{ $errors->first('country') }}</span>
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="website" style="font-weight: bold;">Website </label>
                                    <input class="form-control rounded" type="text" name="website" id="website"
                                        value="{{ old('website') }}" id="pan-address" placeholder="Website">
                                    @if ($errors->has('website'))
                                        <p id="pan_no-error" class="help-block" style="color: red;" for="website">
                                            <span>{{ $errors->first('country') }}</span>
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="email" style="font-weight: bold;">Email (<span
                                            style="color:red">*</span>)</label>
                                    <input class="form-control rounded" type="email" name="email" id="email"
                                        value="{{ old('email') }}" id="pan-address" placeholder="Email">
                                    @if ($errors->has('email'))
                                        <p id="pan_no-error" class="help-block" style="color: red;" for="email">
                                            <span>{{ $errors->first('email') }}</span>
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="telephone" style="font-weight: bold;">Telephone </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <select class="form-control" name="telephone_country_code"
                                                id="telephone_country_code" style="width: 75px;">
                                                <option value="+977"
                                                    {{ old('telephone_country_code') == '+977' ? 'selected' : '' }}>+977
                                                    (NP)</option>
                                                <option value="+91"
                                                    {{ old('telephone_country_code') == '+91' ? 'selected' : '' }}>+91 (IN)
                                                </option>
                                                <option value="+1"
                                                    {{ old('telephone_country_code') == '+1' ? 'selected' : '' }}>+1 (US)
                                                </option>
                                                <option value="+44"
                                                    {{ old('telephone_country_code') == '+44' ? 'selected' : '' }}>+44 (UK)
                                                </option>
                                                <option value="+86"
                                                    {{ old('telephone_country_code') == '+86' ? 'selected' : '' }}>+86 (CN)
                                                </option>
                                                <option value="+81"
                                                    {{ old('telephone_country_code') == '+81' ? 'selected' : '' }}>+81 (JP)
                                                </option>
                                                <option value="+82"
                                                    {{ old('telephone_country_code') == '+82' ? 'selected' : '' }}>+82 (KR)
                                                </option>
                                                <option value="+65"
                                                    {{ old('telephone_country_code') == '+65' ? 'selected' : '' }}>+65 (SG)
                                                </option>
                                                <option value="+60"
                                                    {{ old('telephone_country_code') == '+60' ? 'selected' : '' }}>+60 (MY)
                                                </option>
                                                <option value="+66"
                                                    {{ old('telephone_country_code') == '+66' ? 'selected' : '' }}>+66 (TH)
                                                </option>
                                                <option value="+84"
                                                    {{ old('telephone_country_code') == '+84' ? 'selected' : '' }}>+84 (VN)
                                                </option>
                                                <option value="+62"
                                                    {{ old('telephone_country_code') == '+62' ? 'selected' : '' }}>+62 (ID)
                                                </option>
                                                <option value="+63"
                                                    {{ old('telephone_country_code') == '+63' ? 'selected' : '' }}>+63 (PH)
                                                </option>
                                                <option value="+880"
                                                    {{ old('telephone_country_code') == '+880' ? 'selected' : '' }}>+880
                                                    (BD)</option>
                                                <option value="+94"
                                                    {{ old('telephone_country_code') == '+94' ? 'selected' : '' }}>+94 (LK)
                                                </option>
                                                <option value="+61"
                                                    {{ old('telephone_country_code') == '+61' ? 'selected' : '' }}>+61 (AU)
                                                </option>
                                                <option value="+49"
                                                    {{ old('telephone_country_code') == '+49' ? 'selected' : '' }}>+49 (DE)
                                                </option>
                                                <option value="+33"
                                                    {{ old('telephone_country_code') == '+33' ? 'selected' : '' }}>+33 (FR)
                                                </option>
                                                <option value="+39"
                                                    {{ old('telephone_country_code') == '+39' ? 'selected' : '' }}>+39 (IT)
                                                </option>
                                                <option value="+34"
                                                    {{ old('telephone_country_code') == '+34' ? 'selected' : '' }}>+34 (ES)
                                                </option>
                                            </select>
                                        </div>
                                        <input class="form-control rounded" type="text" name="telephone_number"
                                            id="telephone_number" value="{{ old('telephone_number') }}"
                                            placeholder="Telephone Number">
                                        <input type="hidden" name="telephone" id="telephone_combined"
                                            value="{{ old('telephone') }}">
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
                                                <option value="+977"
                                                    {{ old('country_code') == '+977' ? 'selected' : '' }}>+977 (NP)
                                                </option>
                                                <option value="+91"
                                                    {{ old('country_code') == '+91' ? 'selected' : '' }}>+91 (IN)</option>
                                                <option value="+1"
                                                    {{ old('country_code') == '+1' ? 'selected' : '' }}>+1 (US)</option>
                                                <option value="+44"
                                                    {{ old('country_code') == '+44' ? 'selected' : '' }}>+44 (UK)</option>
                                                <option value="+86"
                                                    {{ old('country_code') == '+86' ? 'selected' : '' }}>+86 (CN)</option>
                                                <option value="+81"
                                                    {{ old('country_code') == '+81' ? 'selected' : '' }}>+81 (JP)</option>
                                                <option value="+82"
                                                    {{ old('country_code') == '+82' ? 'selected' : '' }}>+82 (KR)</option>
                                                <option value="+65"
                                                    {{ old('country_code') == '+65' ? 'selected' : '' }}>+65 (SG)</option>
                                                <option value="+60"
                                                    {{ old('country_code') == '+60' ? 'selected' : '' }}>+60 (MY)</option>
                                                <option value="+66"
                                                    {{ old('country_code') == '+66' ? 'selected' : '' }}>+66 (TH)</option>
                                                <option value="+84"
                                                    {{ old('country_code') == '+84' ? 'selected' : '' }}>+84 (VN)</option>
                                                <option value="+62"
                                                    {{ old('country_code') == '+62' ? 'selected' : '' }}>+62 (ID)</option>
                                                <option value="+63"
                                                    {{ old('country_code') == '+63' ? 'selected' : '' }}>+63 (PH)</option>
                                                <option value="+880"
                                                    {{ old('country_code') == '+880' ? 'selected' : '' }}>+880 (BD)
                                                </option>
                                                <option value="+94"
                                                    {{ old('country_code') == '+94' ? 'selected' : '' }}>+94 (LK)</option>
                                                <option value="+61"
                                                    {{ old('country_code') == '+61' ? 'selected' : '' }}>+61 (AU)</option>
                                                <option value="+49"
                                                    {{ old('country_code') == '+49' ? 'selected' : '' }}>+49 (DE)</option>
                                                <option value="+33"
                                                    {{ old('country_code') == '+33' ? 'selected' : '' }}>+33 (FR)</option>
                                                <option value="+39"
                                                    {{ old('country_code') == '+39' ? 'selected' : '' }}>+39 (IT)</option>
                                                <option value="+34"
                                                    {{ old('country_code') == '+34' ? 'selected' : '' }}>+34 (ES)</option>
                                            </select>
                                        </div>
                                        <input class="form-control rounded" type="text" name="mobile_number"
                                            id="mobile_number" value="{{ old('mobile_number') }}"
                                            placeholder="Mobile Number">
                                        <input type="hidden" name="mobile" id="mobile_combined"
                                            value="{{ old('mobile') }}">
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
                                        id="fax" value="{{ old('fax') }}" placeholder="fax">
                                    @if ($errors->has('fax'))
                                        <p id="name-error" class="help-block" style="color: red;" for="fax">
                                            <span>{{ $errors->first('fax') }}</span>
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="po_box" style="font-weight: bold;">PO Box</label>
                                    <input class="form-control rounded" type="text" name="po_box" id="po_box"
                                        id="po_box" value="{{ old('po_box') }}" placeholder="PO Box">
                                    @if ($errors->has('po_box'))
                                        <p id="name-error" class="help-block" style="color: red;" for="fax">
                                            <span>{{ $errors->first('po_box') }}</span>
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="establish_date" style="font-weight: bold;">Establish Date (<span
                                            style="color:red">*</span>)</label>
                                    <input class="form-control rounded establish_date" type="text" readonly
                                        name="establish_date" id="establish_date" value="{{ old('establish_date') }}"
                                        placeholder="Establish Date">
                                    @if ($errors->has('establish_date'))
                                        <p id="name-error" class="help-block" style="color: red;" for="fax">
                                            <span>{{ $errors->first('establish_date') }}</span>
                                        </p>
                                    @endif
                                </div>

                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="key_person" style="font-weight: bold;">Key Person </label>
                                    <input class="form-control rounded" type="text" name="key_person" id="key_person"
                                        id="key_person" value="{{ old('key_person') }}" placeholder="Key Person">
                                    @if ($errors->has('key_person'))
                                        <p id="name-error" class="help-block" style="color: red;" for="fax">
                                            <span>{{ $errors->first('key_person') }}</span>
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="full_name" style="font-weight: bold;">Full Name (<span
                                            style="color:red">*</span>)</label>
                                    <input class="form-control rounded" type="text" name="full_name" id="full_name"
                                        value="{{ old('full_name') }}" placeholder="Full Name">
                                    @if ($errors->has('full_name'))
                                        <p id="company_name-error" class="help-block" style="color: red;"
                                            for="full_name"><span>{{ $errors->first('full_name') }}</span></p>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="avatar" style="font-weight: bold;">Profile </label>
                                    <input class="form-control rounded" type="file" name="avatar" id="avatar"
                                        value="{{ old('avatar') }}" placeholder="Profile" accept="image/*">
                                    @if ($errors->has('avatar'))
                                        <p id="avatar-error" class="help-block" style="color: red;" for="avatar">
                                            <span>{{ $errors->first('avatar') }}</span>
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="company_cover_image" style="font-weight: bold;">Cover Image </label>
                                    <input class="form-control rounded" type="file" name="company_cover_image"
                                        id="company_cover_image" placeholder="Profile" accept="image/*">
                                    @if ($errors->has('company_cover_image'))
                                        <p id="avatar-error" class="help-block" style="color: red;" for="cover_image">
                                            <span>{{ $errors->first('company_cover_image') }}</span>
                                        </p>
                                    @endif
                                </div>
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="company_logo" style="font-weight: bold;">Logo </label>
                                    <input class="form-control rounded" type="file" name="company_logo"
                                        id="company_logo" value="{{ old('company_logo') }}" placeholder="Company Logo">
                                    @if ($errors->has('company_logo'))
                                        <p id="company_logo-error" class="help-block" style="color: red;"
                                            for="company_logo"><span>{{ $errors->first('company_logo') }}</span></p>
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
                                </div>
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="company_register" style="font-weight: bold;">Company Register </label>
                                    <input class="form-control rounded" type="file" name="company_register"
                                        id="company_register" placeholder="Register File">
                                    @if ($errors->has('company_register'))
                                        <p id="register_file-error" class="help-block" style="color: red;"
                                            for="register_file"><span>{{ $errors->first('company_register') }}</span></p>
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
                                </div>
                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="tourism_certificate" style="font-weight: bold;">Tourism Office
                                        Certificate</label>
                                    <input class="form-control rounded" type="file" name="tourism_certificate"
                                        id="tourism_certificate">
                                    @if ($errors->has('tourism_certificate'))
                                        <p class="help-block text-danger">{{ $errors->first('tourism_certificate') }}</p>
                                    @endif
                                </div>

                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="nrb_certificate" style="font-weight: bold;">NRB Certificate</label>
                                    <input class="form-control rounded" type="file" name="nrb_certificate"
                                        id="nrb_certificate">
                                    @if ($errors->has('nrb_certificate'))
                                        <p class="help-block text-danger">{{ $errors->first('nrb_certificate') }}</p>
                                    @endif
                                </div>

                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="cottage_industry_certificate" style="font-weight: bold;">Department of
                                        Cottage & Small Industries Certificate</label>
                                    <input class="form-control rounded" type="file"
                                        name="cottage_industry_certificate" id="cottage_industry_certificate">
                                    @if ($errors->has('cottage_industry_certificate'))
                                        <p class="help-block text-danger">
                                            {{ $errors->first('cottage_industry_certificate') }}</p>
                                    @endif
                                </div>

                                <div class="form-group col-md-3 col-12 col-lg-3">
                                    <label for="renewal_certificate" style="font-weight: bold;">Renewal
                                        Certificate</label>
                                    <input class="form-control rounded" type="file" name="renewal_certificate"
                                        id="renewal_certificate">
                                    @if ($errors->has('renewal_certificate'))
                                        <p class="help-block text-danger">{{ $errors->first('renewal_certificate') }}</p>
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
                                </div>
                                <div class="form-group col-md-6 col-12 col-lg-6"></div>
                                <div class="ibox-head col-md-3">
                                    <div class="ibox-title">Social Link</div>
                                </div>
                                <div class="ibox-body row">
                                    <div class="form-group col-md-3 col-12 col-lg-3">
                                        <label for="facebook" style="font-weight: bold;">Facebook</label>
                                        <input class="form-control rounded" type="url" name="facebook"
                                            id="facebook" value="{{ old('facebook') }}" placeholder="Faceook link">
                                    </div>
                                    <div class="form-group col-md-3 col-12 col-lg-3">
                                        <label for="instagram" style="font-weight: bold;">Instagram</label>
                                        <input class="form-control rounded" type="url" name="instagram"
                                            id="instagram" value="{{ old('instagram') }}" placeholder="instagram link">
                                    </div>
                                    <div class="form-group col-md-3 col-12 col-lg-3">
                                        <label for="twiter" style="font-weight: bold;">Twitter</label>
                                        <input class="form-control rounded" type="url" name="twitter" id="twitter"
                                            value="{{ old('twitter') }}" placeholder="Twiter link">
                                    </div>
                                    <div class="form-group col-md-3 col-12 col-lg-3">
                                        <label for="youtube" style="font-weight: bold;">Youtube</label>
                                        <input class="form-control rounded" type="url" name="youtube" id="youtube"
                                            value="{{ old('youtube') }}" placeholder="Youtube link">
                                    </div>
                                    <div class="form-group col-md-3 col-12 col-lg-3">
                                        <label for="linkedin" style="font-weight: bold;">Linked In</label>
                                        <input class="form-control rounded" type="url" name="linkedin"
                                            id="linkedin" value="{{ old('linkedin') }}" placeholder="Linkedin link">
                                    </div>
                                    <div class="form-group col-md-9 col-12 col-lg-9">
                                        <label for="about_company" style="font-weight: bold;">About Company</label>
                                        <textarea name="about_company" placeholder=""
                                            class="form form-control {{ $errors->has('about_company') ? 'is-invalid' : '' }}" id="about_company"
                                            cols="30" rows="4">
@if (!empty($data['single']->about_company))
{{ $data['single']->about_company }}
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
                placeholder: 'Hello Bootstrap 4',
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

            // Check if there's an old member_type_id value and trigger change
            const oldMemberTypeId = '{{ old('member_type_id') }}';
            if (oldMemberTypeId) {
                $('#member_type').val(oldMemberTypeId).trigger('change');
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
                            const selected = '{{ old('member_subcategory_id') }}' == subcategory.id ?
                                'selected' : '';
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
