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
                    <h1 class="text-white">Video Gallery</h1>
                </div>
                <img class="page-title-icon" src="{{ asset('assets/site/images/layout-img/icon-page-title.png') }}"
                alt="icon">            </div>
        </div>
    </section>
    <section class="video py-lg-5">
        <div class="container">
            <div class="row g-4">
            @if(isset($data['video']) && $data['video']->count() > 0)
            @foreach($data['video'] as $row)
                <div class="col-lg-3">
                    <a class="video__wrapper" href="https://www.youtube.com/embed/<?php echo $row->video_id; ?>" data-fancybox="gallery">
                        
                        <img src="{{ asset($row->video_thumbnail)}}" alt="img" />
                        <div class="video__play-icon">
                            <span>
                                <i class="fa-regular fa-circle-play"></i>
                            </span>

                        </div>
                    </a>
                </div>
            @endforeach
            @else
            <p>
            No Video Found !
            </p>
            @endif
            </div> <br>   
                    <!-- Pagination -->
                    {{ $data['video']->links('pagination::bootstrap-4') }}

        </div>
    </section>


@endsection
@section('scripts')
@endsection
