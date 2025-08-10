@extends('front_end.layouts.app')
@section('content')
    <section class="mt-lg-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login ">
                        <div class="login__form w-100  p-lg-5">
                            @if(session('success-message'))
                                <div class="alert alert-success">
                                    {{ session('success-message') }}
                                </div>
                            @endif
                            <form action="{{ route('site.check_email') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="py-2" for="password">Email</label>
                                    <input type="email" name="email" class="form-control " id="email"
                                    placeholder="Enter Email" required>
                                    @if (session('message'))
                                    <p class="text-danger">{{ session('message') }}</p>
                                    @endif

                                </div>
                                {{-- <div class="mb-3">
                                    <label class="py-2" for="password">New Password</label>
                                    <input type="password" name="password" class="form-control " id="password"
                                        placeholder="Password" required>

                                </div>


                                <div class="mb-3">
                                    <label class="py-2" for="password">Confirm Password</label>
                                    <input type="password" name="password" class="form-control " id="password"
                                        placeholder="Password" required>

                                </div> --}}

                                <div class="text-center">
                                    <button type="submit" class="btn btn-login w-100">Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
