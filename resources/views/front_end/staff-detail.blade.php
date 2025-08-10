@extends('front_end.layouts.app')
@section('styles')
@endsection
@section('content')
<section class="about-us profile-page">
    <div class="section-bg-banner">
        <div class="hero-bg">
            <img src="https://taan.prabidhienterprises.com.np/user/images/layout-img/page-title.webp" alt="bg">
        </div>
        <div class="container">
            <div class="section-hero-title">
                <p class="text-white"> Welcome !</p>
                <h1 class="text-white">{{ $data['single']->name }}</h1>
            </div>
            <img class="page-title-icon" src="https://taan.prabidhienterprises.com.np/user/images/layout-img/icon-page-title.png" alt="icon">
        </div>
    </div>
    <div class="container py-lg-5 py-3">
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="an-user mb-4 pb-xl-2 d-flex align-items-center">
                    <div class="image image-big">
                        @if(isset($data['single']->image))
                        <img src="{{ asset($data['single']->image)}}" width="100%" alt="">
                        @else
                        <img src="{{ asset('assets/site/images/no-image.jpg')}}" width="100%" alt="">
                        @endif
                    </div>
                    <div class="text">
                        <h6 class="name">{{ $data['single']->name }}</h6>
                        <p class="mb-0">{{ $data['single']->designation }} </p>
                        @if(isset($data['single']->social_profile_wikipedia))
                        <a href="{{$data['single']->social_profile_wikipedia}}">
                            <div class="more-details d-flex align-items-center">
                                <img src="https://en.wikipedia.org/static/images/icons/wikipedia.png" height="20" alt="img"> <span class="ms-2">Wiki Profile</span>
                            </div>
                        </a>
                        @endif
                    </div>
                </div>
                <div class="teams__social-media d-flex mb-lg-4 mb-3 ">
                    @if(isset($data['single']->social_profile_fb))
                    <a class="bg-facebook" href="{{ $data['single']->social_profile_fb}}"><i class="fa-brands fa-facebook-f"></i></a>
                    @endif
                    @if(isset($data['single']->social_profile_twitter))
                    <a class="bg-insta" href="{{ $data['single']->social_profile_twitter}}"><i class="fa-brands fa-instagram"></i></a>
                    @endif
                    @if(isset($data['single']->social_profile_insta))
                    <a class="bg-twitter" href="{{ $data['single']->social_profile_insta}}"><i class="fa-brands fa-x-twitter"></i></a>
                    @endif
                </div>
                <div>
                    <p>
                        {!! $data['single']->description !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
@endsection