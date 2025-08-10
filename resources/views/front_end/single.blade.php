@extends('front_end.layouts.app')

@section('styles')
    <style>
        .hero-banner {
            position: relative;
            height: 60vh;
            min-height: 400px;
            overflow: hidden;
            background: linear-gradient(135deg, #2F56BC 0%, #4DA42F 100%);
        }

        .hero-banner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(47, 86, 188, 0.8) 0%, rgba(77, 164, 47, 0.6) 100%);
            z-index: 2;
        }

        .hero-content {
            position: relative;
            z-index: 3;
            height: 100%;
            display: flex;
            align-items: center;
            padding: 2rem 0;
        }

        .hero-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .breadcrumb-modern {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 25px;
            padding: 0.5rem 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .breadcrumb-modern .breadcrumb-item a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb-modern .breadcrumb-item a:hover {
            color: white;
        }

        .breadcrumb-modern .breadcrumb-item.active {
            color: white;
            font-weight: 500;
        }

        .quick-actions {
            position: absolute;
            right: 2rem;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .quick-action-btn {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            padding: 1rem;
            color: white;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s ease;
            min-width: 120px;
        }

        .quick-action-btn:hover {
            background: rgba(255, 255, 255, 0.25);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }

        .quick-action-btn i {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            display: block;
        }

        .quick-action-btn span {
            font-size: 0.85rem;
            opacity: 0.9;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 1.8rem;
            }

            .quick-actions {
                position: static;
                transform: none;
                flex-direction: row;
                justify-content: center;
                margin-top: 2rem;
            }

            .quick-action-btn {
                min-width: 100px;
                padding: 0.8rem;
            }
        }

        /* Trip Facts Grid Styles */


        .fact-item {
            display: flex;
            align-items: center;
            padding: 1rem;
            border-bottom: 1px solid #e9ecef;
            transition: background-color 0.3s ease;
        }

        .fact-item:last-child {
            border-bottom: none;
        }

        .fact-item:hover {
            background-color: #f8f9fa;
        }

        .fact-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            flex-shrink: 0;
        }

        .fact-icon i {
            font-size: 1.2rem;
        }

        .fact-content {
            flex: 1;
        }

        .fact-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: #6c757d;
            margin-bottom: 0.25rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .fact-value {
            font-size: 0.95rem;
            font-weight: 500;
            color: #212529;
            margin-bottom: 0;
        }

        /* Gallery Styles */
        .gallery-thumbnail:hover {
            transform: scale(1.05);
        }

        .image-wrapper:hover .image-overlay {
            opacity: 1 !important;
        }

        .video-play-overlay {
            background: rgba(0, 0, 0, 0.6);
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Trail Card Styles */
        .trail-card .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .trail-card .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15) !important;
        }

        .card-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 2;
        }

        .detail-item {
            padding: 0.5rem;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .detail-item i {
            display: block;
            margin-bottom: 0.25rem;
        }

        /* Related Trails Section */
        .related-trails-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        .section-title {
            font-weight: 700;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(45deg, #2F56BC, #4DA42F);
            border-radius: 2px;
        }

        /* Content Text Styling */
        .content-text {
            line-height: 1.7;
            color: #495057;
        }

        .content-text h1,
        .content-text h2,
        .content-text h3,
        .content-text h4,
        .content-text h5,
        .content-text h6 {
            color: #2F56BC;
            margin-top: 1.5rem;
            margin-bottom: 1rem;
        }

        .content-text p {
            margin-bottom: 1rem;
        }

        .content-text ul,
        .content-text ol {
            margin-bottom: 1rem;
            padding-left: 2rem;
        }

        .content-text li {
            margin-bottom: 0.5rem;
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .quick-actions {
                position: static;
                transform: none;
                flex-direction: row;
                justify-content: center;
                margin-top: 2rem;
                gap: 0.5rem;
            }

            .quick-action-btn {
                min-width: 80px;
                padding: 0.6rem;
                font-size: 0.8rem;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: 1.5rem;
            }

            .fact-item {
                padding: 0.75rem;
            }

            .fact-icon {
                width: 35px;
                height: 35px;
                margin-right: 0.75rem;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Hero Banner Section -->
    <div class="inner-banner ">
        <!-- <img src="images/trail/title-bg.jpg" alt="img"> -->
        @if (isset($data['row']->blog_thumnail))
            <img src="{{ asset($data['row']->blog_thumnail) }}" alt="img">
        @endif
        <div class="inner-banner__navbar d-flex align-items-center">
            <div class="container position-relative">
                <div class="bg-breadcrumd w-75">
                    @if (isset($data['row']->title))
                        <h1 class="text-white mb-3">{{ $data['row']->title }}</h1>
                    @endif
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item "><a class="text-white" href="{{ route('site.index') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item "><a class="text-white" href="#"
                                    class="text-decortatio-none">Trail</a></li>
                            @if (isset($data['row']->title))
                                <li class="breadcrumb-item text-white" aria-current="page">
                                    {{ $data['row']->title }}
                                </li>
                            @endif
                        </ol>
                    </nav>
                </div>
                <div class="quick-view d-flex align-items-center">
                    <div class="quick-detail me-3">
                        <a href="#photo-gallery"><i class="fa-regular fa-image"></i> Gallery <br> <span> Photos</span></a>
                    </div>
                    <div class="quick-detail me-3">
                        <a href="#upcomming"><i class="fa-regular fa-image"></i> Upcomming <br> <span> Trail</span></a>
                    </div>
                    <div class="quick-detail ">
                        <a href="#related-packages"><i class="fa-brands fa-hive"></i> Total <br> <span> Trails</span></a>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- Main Content Section -->
    <section class="main-content py-5">
        <div class="container">
            <div class="row g-4">
                <!-- Main Content Column -->
                <div class="col-lg-8">
                    <div class="content-wrapper">
                        <!-- Trail Gallery Section -->
                        <div class="trail-gallery-section mb-5">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-0">
                                    <div class="owl-carousel owl-theme owl-gallery">
                                        @if (isset($data['gallery']) && count($data['gallery']) > 0)
                                            @foreach ($data['gallery'] as $gallery_item)
                                                <div class="trail-gallery-item">
                                                    <img src="{{ asset($gallery_item->image_path) }}" alt="Trail Gallery"
                                                        class="img-fluid rounded">
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="trail-gallery-item">
                                                <img src="{{ asset('user/images/trail/everest-base-camp-trek-with-helicopter-return.webp') }}"
                                                    alt="Default Trail Image" class="img-fluid rounded">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Trail Description Section -->
                        <div class="trail-description-section mb-5">
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-white border-0 py-3">
                                    <h2 class="card-title mb-0" style="color: rgb(102, 204, 0);">
                                        <i class="fas fa-info-circle me-2"></i>Trail Overview
                                    </h2>
                                </div>
                                <div class="card-body">
                                    <div class="content-text">
                                        @if (isset($data['row']->description))
                                            {!! $data['row']->description !!}
                                        @else
                                            <p class="text-muted">Trail description not available.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Route Map Section -->
                        @if (isset($data['row']->route_map))
                            <div class="route-map-section mb-5">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-header bg-white border-0 py-3">
                                        <h2 class="card-title mb-0 text-primary">
                                            <i class="fas fa-map-marked-alt me-2"></i>Route Map
                                        </h2>
                                    </div>
                                    <div class="card-body">
                                        <div class="map-container">
                                            <a data-fancybox="route-map" data-src="{{ asset($data['row']->route_map) }}"
                                                data-caption="Trail Route Map">
                                                <img src="{{ asset($data['row']->route_map) }}"
                                                    class="img-fluid rounded shadow-sm" alt="Route Map"
                                                    style="cursor: pointer; transition: transform 0.3s ease;"
                                                    onmouseover="this.style.transform='scale(1.02)'"
                                                    onmouseout="this.style.transform='scale(1)'">
                                            </a>
                                            <small class="text-muted d-block mt-2">
                                                <i class="fas fa-click me-1"></i>Click to view full size
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Photos & Videos Section -->
                        <div class="media-gallery-section mb-5" id="photo-gallery">
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-white border-0 py-3">
                                    <h2 class="card-title mb-0 text-primary">
                                        <i class="fas fa-camera me-2"></i>Photos & Videos
                                    </h2>
                                </div>
                                <div class="card-body">
                                    @if (isset($data['row']->photo_video_description))
                                        <div class="mb-4">
                                            <p class="text-muted">{!! $data['row']->photo_video_description !!}</p>
                                        </div>
                                    @endif

                                    <!-- Photos Section -->
                                    <div class="photos-section mb-5">
                                        <h3 class="h5 mb-3 text-secondary">
                                            <i class="fas fa-images me-2"></i>Photo Gallery
                                        </h3>
                                        <div class="row g-3">
                                            @if (isset($data['gallery']) && count($data['gallery']) > 0)
                                                @foreach ($data['gallery'] as $key => $gallery_item)
                                                    <div class="col-lg-4 col-md-6 col-12">
                                                        <div class="gallery-item">
                                                            <a data-fancybox="gallery"
                                                                data-src="{{ asset($gallery_item->image_path) }}"
                                                                data-caption="Trail Gallery Image {{ $key + 1 }}">
                                                                <div class="image-wrapper position-relative">
                                                                    <img src="{{ asset($gallery_item->image_path) }}"
                                                                        class="img-fluid rounded shadow-sm gallery-thumbnail"
                                                                        alt="Gallery Image {{ $key + 1 }}"
                                                                        style="height: 200px; object-fit: cover; width: 100%; cursor: pointer; transition: transform 0.3s ease;">
                                                                    <div class="image-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-dark bg-opacity-50 opacity-0 rounded"
                                                                        style="transition: opacity 0.3s ease;">
                                                                        <i class="fas fa-search-plus text-white fa-2x"></i>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="col-12">
                                                    <div class="text-center py-4">
                                                        <i class="fas fa-image fa-3x text-muted mb-3"></i>
                                                        <p class="text-muted">No photos available for this trail.</p>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Videos Section -->
                                    @php
                                        $videos = isset($data['row']->videos)
                                            ? json_decode($data['row']->videos, true)
                                            : [];
                                        $validVideos = !empty($videos)
                                            ? array_filter($videos, function ($video) {
                                                return !empty($video['link']) || !empty($video['id']);
                                            })
                                            : [];
                                    @endphp

                                    @if (!empty($validVideos))
                                        <div class="videos-section">
                                            <h3 class="h5 mb-3 text-secondary">
                                                <i class="fas fa-video me-2"></i>Video Gallery
                                            </h3>
                                            <div class="row g-3">
                                                @foreach ($validVideos as $video)
                                                    <div class="col-lg-6 col-md-6 col-12">
                                                        <div class="video-item">
                                                            <div
                                                                class="video-wrapper rounded shadow-sm overflow-hidden position-relative">
                                                                @if (!empty($video['id']))
                                                                    <a data-fancybox="videos"
                                                                        href="https://www.youtube.com/watch?v={{ $video['id'] }}">
                                                                        <div class="video-thumbnail position-relative">
                                                                            <img src="https://img.youtube.com/vi/{{ $video['id'] }}/maxresdefault.jpg"
                                                                                class="img-fluid" alt="Video Thumbnail"
                                                                                style="height: 200px; object-fit: cover; width: 100%;">
                                                                            <div
                                                                                class="video-play-overlay position-absolute top-50 start-50 translate-middle">
                                                                                <i
                                                                                    class="fas fa-play-circle fa-3x text-white"></i>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                @elseif (!empty($video['link']))
                                                                    <a data-fancybox="videos"
                                                                        href="{{ $video['link'] }}">
                                                                        <div class="video-placeholder bg-light d-flex align-items-center justify-content-center"
                                                                            style="height: 200px;">
                                                                            <i
                                                                                class="fas fa-play-circle fa-3x text-primary"></i>
                                                                        </div>
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Additional Information Section -->
                        @if (isset($data['row']->more_info) && !empty($data['row']->more_info))
                            <div class="additional-info-section mb-5">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-header bg-white border-0 py-3">
                                        <h2 class="card-title mb-0 text-primary">
                                            <i class="fas fa-plus-circle me-2"></i>Additional Information
                                        </h2>
                                    </div>
                                    <div class="card-body">
                                        <div class="additional-content">
                                            {!! $data['row']->more_info !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Sidebar Column -->
                <div class="col-lg-4">
                    <div class="sidebar-wrapper">
                        @if (isset($data['row']) && $data['row']->type != 'page')
                            <!-- Trip Facts Card -->
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-header  text-white py-3" style="background-color: #4da32f">
                                    <h3 class="card-title mb-0 h5">
                                        <i class="fas fa-info-circle me-2"></i>Trip Facts
                                    </h3>
                                </div>
                                <div class="row g-2 p-3 trip-facts">
                                    <div class="col-sm-6">
                                        <div class="item border  text-center p-4 ">
                                            <div class="icon"><i class="fa-solid fa-map-location-dot"></i></div>
                                            <div class="text">
                                                <h6 class="info-title">Destination</h6>
                                                <h5 class="info">
                                                    @if (isset($data['row']->postDestination))
                                                        {{ $data['row']->postDestination->title }}
                                                    @endif
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="item border  text-center p-4">
                                            <div class="icon">
                                                <i class="fa-regular fa-calendar-days"></i>
                                            </div>
                                            <div class="text">
                                                <h6 class="info-title">Durations</h6>
                                                @if (isset($data['row']->duration) && $data['row']->duration != null)
                                                    <h5 class="info">{{ $data['row']->duration }} days</h5>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="item border  text-center p-4">
                                            <div class="icon">
                                                <i class="fa-solid fa-mountain-city"></i>
                                            </div>
                                            <div class="text">
                                                <h6 class="info-title">Trip Difficulty</h6>
                                                <h5 class="info">
                                                    @if (isset($data['row']->postDifficulty))
                                                        {{ $data['row']->postDifficulty->title }}
                                                    @endif
                                                </h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="item border  text-center p-4">
                                            <div class="icon">
                                                <i class="fa-solid fa-passport"></i>
                                            </div>
                                            <div class="text">
                                                <h6 class="info-title">Activities</h6>
                                                @if (isset($data['row']->activities) && $data['row']->activities != null)
                                                    <h5 class="info">{{ $data['row']->activities }}</h5>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="item border  text-center p-4">
                                            <div class="icon"><i class="fa-solid fa-volcano"></i></div>
                                            <div class="text">
                                                <h6 class="info-title">Max.altitude</h6>
                                                @if (isset($data['row']->max_altitude) && $data['row']->max_altitude != null)
                                                    <h5 class="info">{{ $data['row']->max_altitude }}m.</h5>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-6">
                                        <div class="item border  text-center p-4">
                                            <div class="icon">
                                                <i class="fa-solid fa-person-hiking"></i>
                                            </div>
                                            <div class="text">
                                                <h6 class="info-title">Group Size</h6>
                                                @if (isset($data['row']->group_size) && $data['row']->group_size != null)
                                                    <h5 class="info">{{ $data['row']->group_size }}</h5>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endif

                        <!-- Related Trails Card -->
                        @if (isset($data['latest-trail']) && $data['latest-trail']->count() > 0)
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-header  text-white py-3" style="background-color: #4da32f">
                                    <h3 class="card-title mb-0 h5">
                                        <i class="fas fa-route me-2"></i>Related Trails
                                    </h3>
                                </div>
                                <div class="card-body p-3">
                                    <div class="related-trails-list">
                                        @foreach ($data['latest-trail']->take(5) as $key => $trail)
                                            <div class="trail-item mb-3 pb-3 {{ !$loop->last ? 'border-bottom' : '' }}">
                                                <div class="row g-2 align-items-center">
                                                    <div class="col-4">
                                                        <a href="{{ Route::has('site.post.show') ? route('site.post.show', ['id' => $trail->post_unique_id]) : '#' }}"
                                                            class="trail-image-link">
                                                            @if (isset($trail->blog_thumnail) && !empty($trail->blog_thumnail))
                                                                <img src="{{ asset($trail->blog_thumnail) }}"
                                                                    alt="{{ $trail->title }}"
                                                                    class="img-fluid rounded shadow-sm"
                                                                    style="height: 60px; object-fit: cover; width: 100%;">
                                                            @else
                                                                <div class="placeholder-image bg-light rounded d-flex align-items-center justify-content-center"
                                                                    style="height: 60px;">
                                                                    <i class="fas fa-image text-muted"></i>
                                                                </div>
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="trail-info">
                                                            <h6 class="trail-title mb-1">
                                                                <a href="{{ Route::has('site.post.show') ? route('site.post.show', ['id' => $trail->post_unique_id]) : '#' }}"
                                                                    class="text-decoration-none text-dark">
                                                                    {{ Str::limit($trail->title, 40) }}
                                                                </a>
                                                            </h6>
                                                            <div class="trail-meta">
                                                                <small class="text-muted d-block">
                                                                    <i class="fas fa-calendar-alt me-1"></i>
                                                                    {{ $trail->created_at->format('M d, Y') }}
                                                                </small>
                                                                @if (isset($trail->duration))
                                                                    <small class="text-muted d-block">
                                                                        <i class="fas fa-clock me-1"></i>
                                                                        {{ $trail->duration }} days
                                                                    </small>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    @if ($data['latest-trail']->count() > 5)
                                        <div class="text-center mt-3">
                                            <a href="{{ route('site.trail') }}" class="btn btn-outline-secondary btn-sm">
                                                <i class="fas fa-eye me-1"></i>View All Trails
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Trails Section -->
    @if (isset($data['category']) && count($data['category']) > 0)
        <section class="related-trails-section py-5 bg-light" id="related-trails">
            <div class="container">
                @foreach ($data['category']->take(3) as $categoryIndex => $category)
                    @if (isset($data['cat_post_' . $category->title]) && count($data['cat_post_' . $category->title]) > 0)
                        <div class="category-section mb-5">
                            <div class="section-header mb-4">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <h2 class="section-title text-primary mb-0">
                                            <i class="fas fa-mountain me-2"></i>{{ $category->title }}
                                        </h2>
                                        <p class="text-muted mb-0">Discover amazing trails in this category</p>
                                    </div>
                                    <div class="col-md-4 text-md-end">
                                        <a href="{{ route('site.trail') }}" class="btn btn-outline-primary btn-sm">
                                            <i class="fas fa-eye me-1"></i>View All
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="trails-grid">
                                <div class="row g-4">
                                    @foreach ($data['cat_post_' . $category->title]->take(4) as $trail)
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                            <div class="trail-card h-100">
                                                <div class="card border-0 shadow-sm h-100">
                                                    <div class="card-img-wrapper position-relative">
                                                        <a
                                                            href="{{ Route::has('site.post.show') ? route('site.post.show', ['id' => $trail->post_unique_id]) : '#' }}">
                                                            @if (isset($trail->blog_thumnail) && !empty($trail->blog_thumnail))
                                                                <img src="{{ asset($trail->blog_thumnail) }}"
                                                                    class="card-img-top" alt="{{ $trail->title }}"
                                                                    style="height: 200px; object-fit: cover;">
                                                            @else
                                                                <div class="placeholder-img bg-light d-flex align-items-center justify-content-center"
                                                                    style="height: 200px;">
                                                                    <i class="fas fa-image fa-3x text-muted"></i>
                                                                </div>
                                                            @endif
                                                        </a>
                                                        <div class="card-badge">
                                                            <span class="badge bg-primary">{{ $category->title }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="card-body d-flex flex-column">
                                                        <div class="trail-location mb-2">
                                                            <small class="text-muted">
                                                                <i class="fas fa-map-marker-alt me-1"></i>
                                                                {{ $trail->trail_address ?? 'Location not specified' }}
                                                            </small>
                                                        </div>
                                                        <h5 class="card-title mb-3">
                                                            <a href="{{ Route::has('site.post.show') ? route('site.post.show', ['id' => $trail->post_unique_id]) : '#' }}"
                                                                class="text-decoration-none text-dark">
                                                                {{ $trail->title }}
                                                            </a>
                                                        </h5>
                                                        <div class="trail-details mt-auto">
                                                            <div class="row g-2 text-center">
                                                                <div class="col-6">
                                                                    <div class="detail-item">
                                                                        <i class="fas fa-calendar-alt text-success"></i>
                                                                        <small
                                                                            class="d-block">{{ $trail->duration ?? 'N/A' }}
                                                                            Days</small>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="detail-item">
                                                                        <i class="fas fa-plane text-info"></i>
                                                                        <small class="d-block">
                                                                            {{ $trail->postTransport->title ?? 'N/A' }}
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>
    @endif
@endsection
@section('scripts')
@endsection
