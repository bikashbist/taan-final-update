@extends('front_end.layouts.app')
@section('styles')
@endsection
@section('content')
<section class="about-us gallery-page ">
    <div class="section-bg-banner">
        <div class="hero-bg">
            <img src="{{ asset('assets/site/images/layout-img/page-title.webp') }}" alt="bg">
        </div>
        <div class="container">
            <div class="section-hero-title">
                <p class="text-white"> Welcome to!</p>
                <h1 class="text-white">@if(isset($data['category']->title)) {{ $data['category']->title }} @endif</h1>
            </div>
            <img class="page-title-icon" src="{{ asset('assets/site/images/layout-img/icon-page-title.png') }}"
                alt="icon">
        </div>
    </div>
</section>
@if((($data['category']->title == 'Notification' ||$data['category']->title == 'Newsletter' ||$data['category']->title == 'Publication' ||$data['category']->title == 'Pressn Release' ||$data['category']->title == 'Download' ||$data['category']->title == 'Rescue Procedure 2075') ) && !empty($data['category']->title))
<section class="newsletter py-lg-5 py-3">
    <div class="container">
        <div class="newsletter__details">
            @if(isset($data['rows']) && count($data['rows']) > 0)
            @foreach($data['rows'] as $row)
            <div class="row mb-4 g-0 ">
                <!-- <?php
                        $files = \App\Models\File::where('post_unique_id', $row->post_unique_id)->first();
                        ?> -->
                <div class="col-lg-5">
                    <div class="logo-img h-100">
                        @if(isset($row->thumbnail))
                        <img src="{{ asset($row->thumbnail)}}"
                            alt="" class="img">
                        @else
                        <img src="{{ asset($all_view['setting']->logo)}}"
                            alt="" class="img">
                        @endif
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="newsletter__file h-100 p-5">
                        <h3>{{ $row->title }}</h3>
                        <p style="background-color: #f0f0f0;">{!!substr(strip_tags($row->description),0,500); !!}... </p>
                        <a class="read-more text-white" href="{{ route('site.other.show', ['id'=> $row->post_unique_id]) }}">Read More..</a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <h3>@if(isset($data['category']->title)) {{ $data['category']->title }} @endif Not Found's !</h3>
                @endif
            </div>
        </div>
    </div>
</section>
@else
<section class="section-trail py-lg-5 py-3">
    <div class="container">
        <div class="section-trail__details">
            <div class="row g-4 ">
                @if(isset($data['rows']) && count($data['rows']) > 0)
                @foreach($data['rows'] as $row)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <a href="{{ route('site.other.show', ['id'=> $row->post_unique_id]) }}">
                        <div class="section-trail__details__list">
                            <div class="section-trail__details__list__box">
                                <div class="logo-img">
                                    @if(isset($row->thumbnail))
                                    <img src="{{ asset($row->thumbnail)}}"
                                        alt="" class="img">
                                    @else
                                    <img src="{{ asset($all_view['setting']->logo)}}"
                                        alt="" class="img">
                                    @endif
                                </div>
                                <div class="text">
                                    <small><i class="fa-solid fa-calendar-days"></i> {{ \Carbon\Carbon::parse($row->created_at)->format('jS F Y') }}
                                    </small>
                                    <a href="{{ route('site.other.show', ['id'=> $row->post_unique_id]) }}">
                                        <h5>{{ $row->title }}</h5>
                                    </a>
                                    <a class="read-more text-white" href="{{ route('site.other.show', ['id'=> $row->post_unique_id]) }}">Read More</a>
                                </div>
                            </div>
                        </div> <!-- list section-trail -->
                    </a>
                </div>
                @endforeach
                @else
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <h3>@if(isset($data['category']->title)) {{ $data['category']->title }} @endif Not Found's !</h3>
                    @endif
                </div>
               
            </div>
        </div>
    </div>
</section>
<section class="video py-lg-5">
    <div class="container">
        <div class="row g-4">
            <div class="section__title text-center text-lg-start">
                <h3>
                    News & Event Videos
                    </h1>
            </div>
       
            <div class="col-lg-3">
                <a class="video__wrapper" href="https://youtu.be/WsTt2jO_6_g" data-fancybox="gallery">
                    
                    <img src="http://127.0.0.1:8000/upload_file/blog/1733123908_1956046680_1732167203_1403675776_12.jpg" alt="img" />
                    <div class="video__play-icon">
                        <span>
                            <i class="fa-regular fa-circle-play"></i>
                        </span>

                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a class="video__wrapper" href="https://youtu.be/WsTt2jO_6_g" data-fancybox="gallery">
                    
                    <img src="http://127.0.0.1:8000/upload_file/blog/1733123908_1956046680_1732167203_1403675776_12.jpg" alt="img" />
                    <div class="video__play-icon">
                        <span>
                            <i class="fa-regular fa-circle-play"></i>
                        </span>

                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a class="video__wrapper" href="https://youtu.be/WsTt2jO_6_g" data-fancybox="gallery">
                    
                    <img src="http://127.0.0.1:8000/upload_file/blog/1733123908_1956046680_1732167203_1403675776_12.jpg" alt="img" />
                    <div class="video__play-icon">
                        <span>
                            <i class="fa-regular fa-circle-play"></i>
                        </span>

                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a class="video__wrapper" href="https://youtu.be/WsTt2jO_6_g" data-fancybox="gallery">
                    
                    <img src="http://127.0.0.1:8000/upload_file/blog/1733123908_1956046680_1732167203_1403675776_12.jpg" alt="img" />
                    <div class="video__play-icon">
                        <span>
                            <i class="fa-regular fa-circle-play"></i>
                        </span>

                    </div>
                </a>
            </div>
    
    
        </div> 

    </div>
</section>
@endif
@endsection
@section('scripts')
@endsection