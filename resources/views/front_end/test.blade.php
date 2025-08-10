@extends('front_end.layouts.app')
@section('styles')

@endsection
@section('content')
<div class="inner-banner ">
    <!-- <img src="images/trail/title-bg.jpg" alt="img"> -->
    @if(isset($data['row']->blog_thumnail))
    <img src="{{ asset($data['row']->blog_thumnail)}}" alt="img">
    @endif
    <div class="inner-banner__navbar d-flex align-items-center">
        <div class="container position-relative">
            <div class="bg-breadcrumd w-75">
                @if(isset($data['row']->title))
                <h1 class="text-white mb-3">{{ $data['row']->title }}</h1>
                @endif
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item "><a class="text-white" href="{{ route('site.index')}}">Home</a></li>
                        <li class="breadcrumb-item "><a class="text-white" href="#">Trail</a></li>
                        @if(isset($data['row']->title))
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

<section class="main-content mt-lg-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                <div class="main-content__details">
                    <div class="trail-details">

                        <div class="owl-carousel owl-theme owl-gallery ">
                            <div class="trail-items">
                                <img class="mb-3" src="{{asset('user/images/trail/everest-base-camp-trek-with-helicopter-return.webp')}} " alt="img">
                            </div>
                            <div class="trail-items">
                                <img class="mb-3" src="{{asset('user/images/trail/everest-base-camp-trek-with-helicopter-return.webp')}} " alt="img">
                            </div>
                            <div class="trail-items">
                                <img class="mb-3" src="{{asset('user/images/trail/everest-base-camp-trek-with-helicopter-return.webp')}} " alt="img">
                            </div>

                        </div>
                        <div class="page_content">
                            <p>
                                @if(isset($data['row']->description))
                            <p>{!! $data['row']->description !!}</p>
                            @endif
                            </p>
                            <h2 class="my-3">Tour Schedule</h2>
                            <div class="faqs">
                                <div class="accordion" id="accordionExample">
                                    @if(!empty($data['row']->days) && count($days = array_filter(json_decode($data['row']->days, true), function($days) {
                                    return !empty($days['days_title']) || !empty($days['days_descriptions']);
                                    })) > 0)
                                    @foreach(json_decode($data['row']->days, true) as $key => $row)
                                    <div class="itinery__item">
                                        <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q{{ $key+1 }}" aria-expanded="false" aria-controls="q{{ $key+1 }}">
                                            <h5>
                                                <span>Day{{ $key + 1 }}.</span> {{ !empty($row['days_title']) ? $row['days_title'] : '' }}
                                            </h5>
                                        </a>
                                        <div id="q{{ $key+1 }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>
                                                    {{ !empty($row['days_descriptions']) ? $row['days_descriptions'] : '' }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            @if(isset($data['row']->route_map))
                            <h2>
                                Route Map
                            </h2>
                            <div class="map mt-3">
                                @if(isset($data['row']->route_map))
                                <a data-fancybox data-src="{{ $data['row']->route_map }}" data-caption="Hello world">
                                    <img src="{{ asset($data['row']->route_map) }}" width="100%" alt="map" />
                                </a>
                                @else
                                <p>Route map not available</p>
                                @endif
                            </div>
                            @endif

                            <div class="photo-video">
                                <div class="row g-2">
                                    <div class="col-lg-12">
                                        <h2 class="my-4">
                                            Photos
                                        </h2>
                                    </div>
                                    @if(isset($data['gallery']) && count($data['gallery']) > 0)
                                    @foreach($data['gallery'] as $key => $row)
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <a data-fancybox="gallery" data-src="{{ asset($row->image_path)}}" data-caption="Optional caption,<br />that can contain <em>HTML</em> code">
                                            <img src="{{ asset($row->image_path)}}" width="100%" height="150" alt="img">
                                        </a>
                                    </div>
                                    @endforeach
                                    @else
                                    <p>Image not available</p>
                                    @endif

                                    <div class="col-lg-12">
                                        <h2 class="my-4" id="photo-gallery">
                                            Videos
                                        </h2>
                                    </div>
                                    @php
                                    $videos = json_decode($data['row']->videos, true);
                                    @endphp
                                    @if(!empty($videos) && count($videos = array_filter($videos, function($video) {
                                    return !empty($video['link']) || !empty($video['thumbnail']);
                                    })) > 0)
                                    @foreach($videos as $video)
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <a data-fancybox href="{{ !empty($video['link']) ? $video['link'] : '' }}">
                                                @if(!empty($video['thumbnail']))
                                                <img class="card-img-top img-fluid" src="{{ !empty($video['thumbnail']) ? asset($video['thumbnail']) : '' }}" alt="img" />
                                                @else
                                                <p>
                                                    Image not available.
                                                </p>
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            <br>

                            <h2 class="my-3">FAQs</h2>
                            <div class="faqs">
                                <div class="accordion" id="accordionExample">
                                    @if(!empty($data['row']->faq) && count($faq = array_filter(json_decode($data['row']->faq, true), function($faq) {
                                    return !empty($faq['question']) || !empty($faq['ans']);
                                    })) > 0)
                                    @foreach(json_decode($data['row']->faq, true) as $key => $row)
                                    <div class="itinery__item">
                                        <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q{{ $key+1 }}" aria-expanded="false" aria-controls="q{{ $key+1 }}">
                                            <h5>
                                                <span>Q{{ $key + 1 }}.</span> {{ !empty($row['question']) ? $row['question'] : '' }}
                                            </h5>
                                        </a>
                                        <div id="q{{ $key+1 }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>
                                                    {{ !empty($row['ans']) ? $row['ans'] : '' }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-4">
                <div class="main-content__sidebar">
                    @if(isset($data['row']) && $data['row']->type != 'page')
                    <div class=" sidebar sidebar-border trail-details-sidebar mb-4  ">
                        <h3> Trip Facts</h3>
                        <div class="row g-2 p-3 trip-facts">
                            <div class="col-sm-6">
                                <div class="item border  text-center p-4 ">
                                    <div class="icon"><i class="fa-solid fa-map-location-dot"></i></div>
                                    <div class="text">
                                        <h6 class="info-title">Destination</h6>
                                        <h5 class="info">@if(isset($data['row']->postDestination)) {{ $data['row']->postDestination->title }} @endif</h5>
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
                                        @if(isset($data['row']->duration) && $data['row']->duration != null)
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
                                        <h5 class="info">@if(isset($data['row']->postDifficulty)) {{ $data['row']->postDifficulty->title }} @endif </h5>
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
                                        @if(isset($data['row']->activities) && $data['row']->activities != null)
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
                                        @if(isset($data['row']->max_altitude) && $data['row']->max_altitude != null)
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
                                        @if(isset($data['row']->group_size) && $data['row']->group_size != null)
                                        <h5 class="info">{{ $data['row']->group_size }}</h5>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>



                    </div>
                    @endif
                    @if(isset($data['latest-trail']) && $data['latest-trail']->count() > 0)
                    <div class=" sidebar sidebar-border trail-details-sidebar mb-4  ">
                        <h3>Other Trail </h3>
                        <div class="sidebar__package p-4">

                            <ul class="posts blog withthumb ">
                                @foreach($data['latest-trail'] as $key => $row)
                                <li class="mb-3">
                                    <div class="post_circle_thumb">
                                        <a href="{{ Route::has('site.post.show') ? route('site.post.show', ['id'=> $row->post_unique_id]) : '#' }}">
                                            @if(isset($row->blog_thumnail) && !empty($row->blog_thumnail))
                                            <img class="alignleft frame post_thumb" src="{{ asset($row->blog_thumnail) }}" alt="" class="img">
                                            @else
                                            <p>Image Not Found's !</p>
                                            @endif
                                        </a>
                                    </div><a href="{{ Route::has('site.post.show') ? route('site.post.show', ['id'=> $row->post_unique_id]) : '#' }}">{{ $row->title }}</a>
                                    <div class="post_attribute">{{ $row->created_at->format('Y-m-d') }}</div>
                                </li>

                                @endforeach
                                @foreach($data['latest-trail'] as $key => $row)
                                <li class="mb-3">
                                    <div class="post_circle_thumb">
                                        <a href="{{ Route::has('site.post.show') ? route('site.post.show', ['id'=> $row->post_unique_id]) : '#' }}">
                                            @if(isset($row->blog_thumnail) && !empty($row->blog_thumnail))
                                            <img class="alignleft frame post_thumb" src="{{ asset($row->blog_thumnail) }}" alt="" class="img">
                                            @else
                                            <p>Image Not Found's !</p>
                                            @endif
                                        </a>
                                    </div><a href="{{ Route::has('site.post.show') ? route('site.post.show', ['id'=> $row->post_unique_id]) : '#' }}">{{ $row->title }}</a>
                                    <div class="post_attribute">{{ $row->created_at->format('Y-m-d') }}</div>
                                </li>

                                @endforeach
                            </ul>

                        </div>

                    </div>
                    @endif
                </div>

            </div>
            @if(isset($data['category-posts']) && $data['category-posts']->count() > 0)
            <div class="trail-packages" id="related-packages">
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="section__title text-start w-100">
                            <h3>
                                {{ isset($data['row']->postCategory->title) ? $data['row']->postCategory->title.' Related Trail' : 'Category title not available' }}
                                </h1>
                        </div>
                    </div>
                    @foreach($data['category-posts'] as $key => $row)
                    <div class="col-lg-4">
                        <div class="trail-packages__card">

                            <a class="tour_image" href="{{ Route::has('site.post.show') ? route('site.post.show', ['id'=> $row->post_unique_id]) : '#' }}">
                                @if(isset($row->blog_thumnail) && !empty($row->blog_thumnail) )
                                <img src="{{ asset($row->blog_thumnail) }}" alt="" class="img">
                                @else
                                <p>Image Not Found !</p>
                                @endif

                                <div class="tour-band ">
                                    NEW</div>
                            </a>

                            <div class="portfolio_info_wrapper">
                                <a class="tour_link" href="{{ Route::has('site.post.show') ? route('site.post.show', ['id'=> $row->post_unique_id]) : '#' }}">
                                    <h4>{{ $row->title }}</h4>
                                </a>
                                <div class="tour_excerpt">
                                    <span> <i class="fa-solid fa-location-dot"></i>{{ $row->trail_address }}</span>
                                </div>
                                <div class="tour_attribute_wrapper d-flex justify-content-between align-items-center mt-3">
                                    <div class="tour_attribute_share">
                                        <a id="single_tour_share_button" href="javascript:;" class="button ghost themeborder" style="width:auto;"><i class="fa-solid fa-share-nodes"></i> Share this tour</a>
                                    </div>

                                    <div class="tour_attribute_link">
                                        <a href="{{ Route::has('site.post.show') ? route('site.post.show', ['id'=> $row->post_unique_id]) : '#' }}"> View More <i class="fa-solid fa-arrow-right-long"></i> </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <div class="trail-packages" id="upcomming">
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="section__title text-start w-100">
                            @if(isset($data['category'][0]))
                            <h3>{{ $data['category'][0]->title }}</h1>
                                @endif
                        </div>
                    </div>
                    @if(isset($data['category'][0]))
                    @if(isset($data['cat_post_'.$data['category'][0]->title]) && count($data['cat_post_'.$data['category'][0]->title]) > 0)
                    @foreach($data['cat_post_'.$data['category'][0]->title] as $row)
                    <div class="col-lg-4">
                        <div class="trail-packages__card">

                            <a class="tour_image" href="{{ Route::has('site.post.show') ? route('site.post.show', ['id'=> $row->post_unique_id]) : '#' }}">
                                @if(isset($row->blog_thumnail) && !empty($row->blog_thumnail))
                                <img src="{{ asset($row->thumbs) }}" alt="" class="img">
                                @else
                                <p>Image Not Found !</p>
                                @endif

                                <div class="tour-band upcomming ">
                                    Upcomming</div>
                            </a>

                            <div class="portfolio_info_wrapper">
                                <a class="tour_link" href="{{ Route::has('site.post.show') ? route('site.post.show', ['id'=> $row->post_unique_id]) : '#' }}">
                                    <h4>{{ $row->title }}</h4>
                                </a>
                                <div class="tour_excerpt">
                                    <span> <i class="fa-solid fa-location-dot"></i> {{ $row->trai_address }}</span>
                                </div>
                                <div class="tour_attribute_wrapper d-flex justify-content-between align-items-center mt-3">
                                    <div class="tour_attribute_share">
                                        <a id="single_tour_share_button" href="javascript:;" class="button ghost themeborder" style="width:auto;"><i class="fa-solid fa-share-nodes"></i> Share this tour</a>
                                    </div>

                                    <div class="tour_attribute_link">
                                        <a href="{{ Route::has('site.post.show') ? route('site.post.show', ['id'=> $row->post_unique_id]) : '#' }}"> View More <i class="fa-solid fa-arrow-right-long"></i> </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <p>
                        Trail Not Found's !
                    </p>
                    @endif
                    @endif
                </div>
            </div>

        </div>
    </div>

</section>
@endsection
@section('scripts')

@endsection