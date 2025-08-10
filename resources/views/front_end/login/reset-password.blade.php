@extends('front_end.layouts.app')
@section('content')
    <section class="mt-lg-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login ">
                        @if(isset($data['user']))
                        <div class="login__form w-100  p-lg-5">
                            <form action="{{ route('site.reset_password.store', ['token'=>$token]) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="py-2" for="password">New Password</label>
                                    <input type="password" name="password" class="form-control " id="password"
                                        placeholder="Password">
                                        @error('password')
                                        <p style="color: red">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>


                                <div class="mb-3">
                                    <label class="py-2" for="password">Confirm Password</label>
                                    <input type="password" name="confirm_password" class="form-control " id="password"
                                        placeholder="Confirm Password">
                                        @error('confirm_password')
                                        <p style="color: red">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-login w-100">Submit</button>
                                </div>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
