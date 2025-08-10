@extends('front_end.layouts.app')
@section('content')
<section class="mt-lg-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="login d-flex justify-content-center">
          <div class="login__form flex-fill p-lg-5">
            <h3>Welcome Back</h3>
            <p>Welcome Back! Please enter your details.</p>
            @if (Session::has('success'))
            <div class="alert alert-info">{{ Session::get('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <form action="{{ route('login') }}" method="POST">
              @csrf
              <div class="mb-3">
                @if (session('verificationalerror'))
                <div class="alert alert-warning" role="alert">
                  {{ session('verificationalerror') }}
                </div>
                @endif
              </div>

              <div class="mb-3">

                <label class="py-2" for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                @error('email')
                <div class="invalid-feedback" style="color: #1a1818">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="py-2" for="password">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              @if(Route::has('site.forgot_password'))
              <div class="mb-3 text-center">
                <a href="{{ route('site.forgot_password') }}">Forgot Password?</a>
              </div>
              @endif
              <div class="text-center">
                <button type="submit" class="btn btn-login w-100">Sign In</button>
              </div>
            </form>
          </div>
          <div class="login__img flex-fill">
            <img src="{{asset('user/images/login-temple-1.jpg')}}" alt="img">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection