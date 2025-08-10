@extends('front_end.layouts.app')
@section('styles')
@endsection
@section('content')
<section class="mt-lg-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="login d-flex justify-content-center">
                    <div class="login__form flex-fill  p-lg-5">
                        @if (Session::has('alert-danger'))
                        <div class="alert alert-danger"><small>{{ Session::get('alert-danger') }}</small>
                        </div>
                        @endif
                        <h3>सबमिसन नं राख्नुहोस</h3>
                        <p>सदस्य बनाउँदा प्राप्त भएको आफ्नो सबमिशन नम्बर राख्नुहोस्</p>
                        <form action="{{route('site.storePayment')}}" method="GET">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" id="member_id" value="{{ old('member_id') }}" name="member_id" placeholder="नम्बर राख्नुहोस्" required>
                            </div>
                            <div class="text-start">
                                <button type="submit" class="btn btn-login ">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
    setTimeout(function() {
        $('.alert').slideUp();
    }, 5000);
</script>
@endsection