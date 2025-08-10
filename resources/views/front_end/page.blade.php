@extends('front_end.layouts.app')
@section('styles')

@endsection
@section('content')
<section class="about-us gallery-page ">
    <div class="section-bg-banner">
        <div class="hero-bg">
            <img src="{{ asset('assets/site/images/layout-img/page-title.webp')}}" alt="bg">
        </div>
        <div class="container">
            <div class="section-hero-title">
                @if(isset($data['row']->title))
                <h1 class="text-white mb-3">{{ $data['row']->title }}</h1>
                @endif
            </div>
            <img class="page-title-icon" src="{{ asset('assets/site/images/layout-img/icon-page-title.png')}}" alt="icon">
        </div>
    </div>
</section>
<section class="main-content mt-lg-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-12">
                <div class="main-content__details">
                    <div class="trail-details">


                        <div class="page_content">
                            @if(isset($data['row']->blog_thumnail) && !empty($data['row']->blog_thumnail))
                            <img src="{{ asset($data['row']->blog_thumnail)}}" alt="img">
                            @endif
                            <!--<h4 class="p1"><span class="s1">Exploring the Area</span></h4>-->
                            @if(isset($data['row']->description))
                            <p>{!! $data['row']->description !!}</p>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')

@endsection