@extends('front_end.layouts.app')
@section('styles')
    <style>
        .error {
            color: red;
        }

        /* Custom Alert Styles */
        .alert {
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
            padding: 1rem 1.25rem;
        }

        .alert-success {
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            color: #155724;
            border-left: 4px solid #28a745;
        }

        .alert-danger {
            background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
            color: #721c24;
            border-left: 4px solid #dc3545;
        }

        .alert i {
            font-size: 1.1rem;
        }

        .alert .btn-close {
            padding: 0.5rem;
            opacity: 0.7;
        }

        .alert .btn-close:hover {
            opacity: 1;
        }

        .alert ul {
            padding-left: 1.5rem;
        }

        .alert ul li {
            margin-bottom: 0.25rem;
        }

        /* Form Enhancement */
        .register {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .form-control:focus {
            border-color: #2F56BC;
            box-shadow: 0 0 0 0.2rem rgba(47, 86, 188, 0.25);
        }

        .btn-login {
            background: linear-gradient(135deg, #2F56BC 0%, #4DA42F 100%);
            border: none;
            border-radius: 8px;
            padding: 12px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(47, 86, 188, 0.3);
        }

        .form-label {
            color: #000 !important;
        }
    </style>
@endsection
@section('content')
    <section class="mt-lg-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="login  register">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="p-lg-5">
                                    <h3>Apply for Membership</h3>

                                    <!-- Success/Error Messages -->
                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <i class="fas fa-check-circle me-2"></i>
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif

                                    @if (session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <i class="fas fa-exclamation-circle me-2"></i>
                                            {{ session('error') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif

                                    @if (session('alert-success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <i class="fas fa-check-circle me-2"></i>
                                            {{ session('alert-success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif

                                    @if (session('alert-danger'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <i class="fas fa-exclamation-circle me-2"></i>
                                            {{ session('alert-danger') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif

                                    <!-- General Error Messages -->
                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <i class="fas fa-exclamation-triangle me-2"></i>
                                            <strong>Please fix the following errors:</strong>
                                            <ul class="mb-0 mt-2">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif

                                    <form class="row" action="{{ route('signup-process') }}" method="POST"
                                        id="form" enctype="multipart/form-data">
                                        @csrf

                                        <div class="col-lg-6 mb-3">
                                            <label for="organization_name" class="form-label">Company Name</label>
                                            <input type="text" id="organization_name" name="organization_name"
                                                value="{{ old('organization_name') }}" class="form-control"
                                                placeholder="Organization Name">
                                            @if ($errors->has('organization_name'))
                                                <p id="name-error" class="help-block" style="color: red;font-size:14px;"
                                                    for="organization_name">
                                                    <span>{{ $errors->first('organization_name') }}</span>
                                                </p>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label for="name" class="form-label">Full Name</label>
                                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                                class="form-control" placeholder=" Name">
                                            @if ($errors->has('name'))
                                                <p id="name-error" class="help-block" style="color: red;font-size:14px;"
                                                    for="name"><span>{{ $errors->first('name') }}</span></p>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label for="email" class="form-label"> Email</label>
                                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                                class="form-control" placeholder="Email">
                                            @if ($errors->has('email'))
                                                <p id="name-error" class="help-block" style="color: red;font-size:14px;"
                                                    for="email"><span>{{ $errors->first('email') }}</span></p>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label for="mobile" class="form-label">Phone Number</label>
                                            <input type="text" id="mobile" name="mobile" value="{{ old('mobile') }}"
                                                class="form-control" placeholder=" Phone Number">
                                            @if ($errors->has('mobile'))
                                                <p id="name-error" class="help-block" style="color: red;font-size:14px;"
                                                    for="email"><span>{{ $errors->first('mobile') }}</span></p>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label for="member_type_id" class="form-label">Member Type</label>
                                            <select class="form-select" name="member_type_id" id="member_type_id">
                                                <option value="">Select Member Type</option>
                                                @if (isset($data['member-type']) && !empty($data['member-type']))
                                                    @foreach ($data['member-type'] as $row)
                                                        <option value="{{ $row->id }}"
                                                            data-has-subcategory="{{ $row->has_subcategory ? 'true' : 'false' }}"
                                                            @if (old('member_type_id') == $row->id) selected @endif>
                                                            {{ $row->title }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @if ($errors->has('member_type_id'))
                                                <p id="name-error" class="help-block" style="color: red;font-size:14px;"
                                                    for="member_type_id">
                                                    <span>{{ $errors->first('member_type_id') }}</span>
                                                </p>
                                            @endif
                                        </div>

                                        <!-- Member Subcategory Selection (only shown for type 'd') -->
                                        <div class="col-lg-6 mb-3" id="subcategory_section" style="display: none;">
                                            <label for="member_subcategory_id" class="form-label">Member
                                                Subcategory</label>
                                            <select class="form-select" name="member_subcategory_id"
                                                id="member_subcategory_id">
                                                <option value="">Select Subcategory</option>
                                            </select>
                                            @if ($errors->has('member_subcategory_id'))
                                                <p id="subcategory-error" class="help-block"
                                                    style="color: red;font-size:14px;" for="member_subcategory_id">
                                                    <span>{{ $errors->first('member_subcategory_id') }}</span>
                                                </p>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label for="company_pan" class="form-label">Upload PAN </label>
                                            <input class="form-control" type="file" name="company_pan"
                                                id="company_pan">
                                            @if ($errors->has('company_pan'))
                                                <p id="name-error" class="help-block" style="color: red;font-size:14px;"
                                                    for="company_pan"><span>{{ $errors->first('company_pan') }}</span></p>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label for="company_register" class="form-label">Upload Company Register
                                                File</label>
                                            <input class="form-control" type="file" name="company_register"
                                                id="company_register">
                                            @if ($errors->has('company_register'))
                                                <p id="name-error" class="help-block" style="color: red;font-size:14px;"
                                                    for="company_register">
                                                    <span>{{ $errors->first('company_register') }}</span>
                                                </p>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label for="company_tax_clearance" class="form-label">Tax Clearance
                                                Certificate</label>
                                            <input class="form-control" type="file" name="company_tax_clearance"
                                                id="company_tax_clearance">
                                            @if ($errors->has('company_tax_clearance'))
                                                <p id="name-error" class="help-block" style="color: red;font-size:14px;"
                                                    for="company_tax_clearance">
                                                    <span>{{ $errors->first('company_tax_clearance') }}</span>
                                                </p>
                                            @endif
                                        </div>
                                        <div class="col-lg-6 mb-3">

                                            <label for="tourism_certificate" class="form-label">Tourism Office
                                                Certificate</label>
                                            <input class="form-control rounded" type="file" name="tourism_certificate"
                                                id="tourism_certificate">
                                            @if ($errors->has('tourism_certificate'))
                                                <p class="help-block text-danger">
                                                    {{ $errors->first('tourism_certificate') }}</p>
                                            @endif
                                        </div>

                                        <div class="col-lg-6 mb-3">

                                            <label for="nrb_certificate" class="form-label">NRB
                                                Certificate</label>
                                            <input class="form-control rounded" type="file" name="nrb_certificate"
                                                id="nrb_certificate">
                                            @if ($errors->has('nrb_certificate'))
                                                <p class="help-block text-danger">{{ $errors->first('nrb_certificate') }}
                                                </p>
                                            @endif
                                        </div>

                                        <div class="col-lg-6 mb-3">

                                            <label for="cottage_industry" class="form-label">Department of Cottage &
                                                Small Industries
                                                Certificate</label>
                                            <input class="form-control rounded" type="file"
                                                name="cottage_industry_certificate" id="cottage_industry_certificate">
                                            @if ($errors->has('cottage_industry_certificate'))
                                                <p class="help-block text-danger">
                                                    {{ $errors->first('cottage_industry_certificate') }}</p>
                                            @endif
                                        </div>

                                        <div class="col-lg-6 mb-3">

                                            <label for="renewal_certificate" class="form-label">Renewal
                                                Certificate</label>
                                            <input class="form-control rounded" type="file" name="renewal_certificate"
                                                id="renewal_certificate">
                                            @if ($errors->has('renewal_certificate'))
                                                <p class="help-block text-danger">
                                                    {{ $errors->first('renewal_certificate') }}</p>
                                            @endif
                                        </div>

                                        <br>
                                        <div class="col-lg-6">
                                            <label for="company_tax_clearance" class="form-label"></label>
                                            <button type="submit" value="Submit" class="btn btn-login w-100"
                                                id="submitBtn">
                                                <span class="submit-text">Apply Now</span>
                                                <span class="submit-loading d-none">
                                                    <i class="fas fa-spinner fa-spin me-2"></i>Processing...
                                                </span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <img width="100%" height="100%" src="{{ asset('user/images/hikin.png') }}"
                                    alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .error {
            color: red;
        }
    </style>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            // Handle member type change to show/hide subcategory
            $('#member_type_id').on('change', function() {
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
                                const selected = '{{ old('member_subcategory_id') }}' ==
                                    subcategory.id ? 'selected' : '';
                                options +=
                                    `<option value="${subcategory.id}" ${selected}>${subcategory.name}</option>`;
                            });
                        }
                        $('#member_subcategory_id').html(options);
                    },
                    error: function() {
                        $('#member_subcategory_id').html(
                            '<option value="">Error loading subcategories</option>');
                    }
                });
            }

            // Check if there's an old member_type_id value and trigger change
            const oldMemberTypeId = '{{ old('member_type_id') }}';
            if (oldMemberTypeId) {
                $('#member_type_id').val(oldMemberTypeId).trigger('change');
            }

            // Handle form submission loading state
            $('#form').on('submit', function() {
                const submitBtn = $('#submitBtn');
                const submitText = $('.submit-text');
                const submitLoading = $('.submit-loading');

                // Show loading state
                submitBtn.prop('disabled', true);
                submitText.addClass('d-none');
                submitLoading.removeClass('d-none');

                // Optional: Add a timeout to re-enable the button if something goes wrong
                setTimeout(function() {
                    if (submitBtn.prop('disabled')) {
                        submitBtn.prop('disabled', false);
                        submitText.removeClass('d-none');
                        submitLoading.addClass('d-none');
                    }
                }, 30000); // 30 seconds timeout
            });

            // Auto-hide alerts after 10 seconds
            setTimeout(function() {
                $('.alert').fadeOut('slow');
            }, 10000);

            // Smooth scroll to alerts if they exist
            if ($('.alert').length > 0) {
                $('html, body').animate({
                    scrollTop: $('.alert').first().offset().top - 100
                }, 500);
            }
        });
    </script>
@endsection
