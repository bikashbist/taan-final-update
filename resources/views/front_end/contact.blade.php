@extends('front_end.layouts.app')
@section('styles')
@endsection
@section('content')
<section class="about-us faq profile-page">
    <div class="section-bg-banner">
        <div class="hero-bg">
            <img src="{{asset('assets/site/images/layout-img/page-title.webp')}}" alt="bg">
        </div>
        <div class="container">
            <div class="section-hero-title">
                <h1 class="text-white">Conatct Us</h1>
            </div>
            <img class="page-title-icon" src="{{asset('assets/site/images/layout-img/icon-page-title.png')}}" alt="icon">
        </div>
    </div>
    <div class="container pt-lg-5 pt-3">
        <div class="row g-3 justify-content-center">
            <div class="col-lg-8">
                @if(isset($all_view['setting']->map))
                {!! $all_view['setting']->map !!}
                @else
                <p>
                    Map Not Found's !
                </p>
                @endif
            </div>
            <div class="col-lg-4">
                <div class="bg-success h-100 p-4">
                    <h4 class="text-white"> Email Address</h4>
                    @if(isset($all_view['setting']->site_email))
                    <p class="text-white">{{ $all_view['setting']->site_email }}</p>
                    @else
                    <p class="text-white">Email Not Found's !</p>
                    @endif
                    <h4 class="text-white"> Phone Number</h4>
                    @if(isset($all_view['setting']->site_mobile) || isset($all_view['setting']->site_phone))
                    <p class="text-white">{{ $all_view['setting']->site_phone }}, {{ $all_view['setting']->site_mobile }}</p>
                    @else
                    <p class="text-white">Number Not Found's !</p>
                    @endif
                    <h4 class="text-white"> Address </h4>
                    @if(isset($all_view['setting']->site_first_address) || isset($all_view['setting']->site_second_address))
                    <p class="text-white"> {{ $all_view['setting']->site_first_address }}, {{ $all_view['setting']->site_second_address }} </p>
                    @else
                    <p class="text-white">Address Not Found's !</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection