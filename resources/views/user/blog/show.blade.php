<!DOCTYPE html>
<html lang="en">

@include('front_end.body.head')

<body>
  <!-- header start -->
  <div class="inner-banner ">
    <!-- <img src="images/trail/title-bg.jpg" alt="img"> -->
    <img src="{{asset('user/images/trail/Mount_Everest_as_seen_from_Drukair2_PLW_edit.jpg')}}" alt="img">
    <div class="inner-banner__navbar d-flex align-items-center">
        <div class="container position-relative">
            <div class="bg-breadcrumd w-75">
                <h1 class="text-white mb-3">{{ $blog->title }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item "><a class="text-white" href="#">Home</a></li>
                        <li class="breadcrumb-item "><a class="text-white" href="#">Trail</a></li>
                        <li class="breadcrumb-item text-white" aria-current="page">Everest Base Camp Trek with
                            Helicopter Return
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="quick-view d-flex align-items-center">
                <div class="quick-detail me-3">
                    <a href="#photo-gallery"><i class="fa-regular fa-image"></i> Gallery <br> <span>20 Photos</span></a>
                </div>
                <div class="quick-detail me-3">
                    <a href="#upcomming"><i class="fa-regular fa-image"></i> Upcomming <br> <span>5 Trail</span></a>
                </div>
                <div class="quick-detail ">
                    <a href="#related-packages"><i class="fa-brands fa-hive"></i> Total  <br> <span>20
                            Trails</span></a>
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
                                <img class="mb-3"
                                    src="{{asset('user/images/trail/everest-base-camp-trek-with-helicopter-return.webp')}} "
                                    alt="img">
                            </div>
                            <div class="trail-items">
                                <img class="mb-3"
                                    src="{{asset('user/images/trail/everest-base-camp-trek-with-helicopter-return.webp')}} "
                                    alt="img">
                            </div>
                            <div class="trail-items">
                                <img class="mb-3"
                                    src="{{asset('user/images/trail/everest-base-camp-trek-with-helicopter-return.webp')}} "
                                    alt="img">
                            </div>

                        </div>


                        <div class="page_content">


                            <h2>
                                Itineray
                            </h2>
                            <div class="itanery">
                                <p>Start and end in San Jose! With the Active tour Essential Costa Rica - Package
                                    with
                                    Manuel Antonio National Park, you have a 10 days tour package taking you through
                                    San
                                    Jose, Costa Rica and 4 other destinations in Costa Rica. Essential Costa Rica -
                                    Package with Manuel Antonio National Park includes accommodation in a hotel as
                                    well
                                    as an expert guide, meals, transport and more.</p>

                                <div class="itinery ">
                                    <div class="accordion" id="accordionExample">
                                        @foreach(json_decode($blog->days, true) as $key => $day)
                                        <div class="itinery__item">
                                            {{-- @dd($day) --}}

                                            <a class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#day{{ $key }}" aria-expanded="false"
                                                aria-controls="dayone">

                                                <h5>
                                                    <span>{{ !empty($day['day']) ? $day['day'] : '' }}</span> {{ !empty($day['days_title']) ? $day['days_title'] : '' }}
                                                </h5>
                                            </a>

                                            <div id="day{{ $key }}" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <p>
                                                        {{ !empty($day['days_descriptions']) ? $day['days_descriptions'] : '' }}

                                                    </p>

                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <!-- <div class="itinery__item">
                                            <a class="itinery-read-more" href="#">View More <i
                                                    class="fa-solid fa-arrow-right-long"></i></a>
                                        </div> -->
                                    </div>



                                </div>
                            </div>
                            @if($blog->map != null)
                            <h2>
                                Route Map
                            </h2>
                            <div class="map mt-3">
                                <a data-fancybox data-src="{{asset('user/images/trail/trip-map.webp')}}" data-caption="{{ $blog->title }}">
                                    <img src="{{asset($blog->map)}}" width="100%" alt="{{ $blog->title }}" />
                                </a>
                            </div>
                            @endif
                            <h2 class="my-4" id="photo-gallery">
                                Photos & Vidos
                            </h2>
                            <p>Each image tells a unique story, inviting us into a world of emotion, beauty, and
                                complexity. Get ready to be moved, inspired, and challenged as we journey through
                                this captivating collection of image</p>
                            <div class="photo-video">
                                <div class="row g-2">
                                    <div class="col-lg-12">
                                        <h2 class="my-4">
                                            Photos
                                        </h2>
                                    </div>
                                    {{-- @foreach($blog as $key => $value)

                                    @endforeach --}}
                                    <div class="col-lg-4">
                                        <a data-fancybox="gallery" data-src="{{asset('user/images/trail/Mount_Everest_as_seen_from_Drukair2_PLW_edit.jpg')}}"
                                            data-caption="Optional caption,&lt;br /&gt;that can contain &lt;em&gt;HTML&lt;/em&gt; code">
                                            <img src="{{asset('user/images/trail/Mount_Everest_as_seen_from_Drukair2_PLW_edit.jpg')}}" width="100%" height="150"
                                                alt="img" />
                                        </a>
                                    </div>
                                    <div class="col-lg-4">
                                        <a data-fancybox="gallery" data-src="{{asset('user/images/trail/Mount_Everest_as_seen_from_Drukair2_PLW_edit.jpg')}}">
                                            <img src="{{asset('user/images/trail/Mount_Everest_as_seen_from_Drukair2_PLW_edit.jpg')}}" width="100%" height="150"
                                                alt="img" />
                                        </a>
                                    </div>
                                    <div class="col-lg-4">
                                        <a data-fancybox="gallery" data-src="{{asset('user/images/trail/Mount_Everest_as_seen_from_Drukair2_PLW_edit.jpg')}}">
                                            <img src="{{asset('user/images/trail/Mount_Everest_as_seen_from_Drukair2_PLW_edit.jpg')}}" width="100%" height="150"
                                                alt="img" />
                                        </a>
                                    </div>
                                    <div class="col-lg-4">
                                        <a data-fancybox="gallery" data-src="{{asset('user/images/trail/Mount_Everest_as_seen_from_Drukair2_PLW_edit.jpg')}}"
                                            data-caption="Optional caption,&lt;br /&gt;that can contain &lt;em&gt;HTML&lt;/em&gt; code">
                                            <img src="{{asset('user/images/trail/Mount_Everest_as_seen_from_Drukair2_PLW_edit.jpg')}}" width="100%" height="150"
                                                alt="img" />
                                        </a>
                                    </div>
                                    <div class="col-lg-4">
                                        <a data-fancybox="gallery" data-src="{{asset('user/images/trail/Mount_Everest_as_seen_from_Drukair2_PLW_edit.jpg')}}">
                                            <img src="{{asset('user/images/trail/Mount_Everest_as_seen_from_Drukair2_PLW_edit.jpg')}}" width="100%" height="150"
                                                alt="img" />
                                        </a>
                                    </div>
                                    <div class="col-lg-4">
                                        <a data-fancybox="gallery" data-src="{{asset('user/images/trail/Mount_Everest_as_seen_from_Drukair2_PLW_edit.jpg')}}">
                                            <img src="{{asset('user/images/trail/Mount_Everest_as_seen_from_Drukair2_PLW_edit.jpg')}}" width="100%" height="150"
                                                alt="img" />
                                        </a>
                                    </div>
                                    <div class="col-lg-12">
                                        <h2 class="my-4" id="photo-gallery">
                                            Vidos
                                        </h2>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <a data-fancybox href="https://www.youtube.com/watch?v=CGgAyFwcNKg">
                                                <img class="card-img-top img-fluid"
                                                    src="{{asset('user/images/about/2.jpg')}}"
                                                    alt="img" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <a data-fancybox href="https://www.youtube.com/watch?v=CGgAyFwcNKg">
                                                <img class="card-img-top img-fluid"
                                                    src="{{asset('user/images/about/2.jpg')}}"
                                                    alt="img" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <a data-fancybox href="https://www.youtube.com/watch?v=CGgAyFwcNKg">
                                                <img class="card-img-top img-fluid"
                                                    src="{{asset('user/images/about/2.jpg')}}"
                                                    alt="img" />
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <br>
                            <h2 class="my-3">FAQs</h2>
                            <div class="faqs">




                                <div class="accordion" id="accordionExample">
                                    <div class="itinery__item">

                                        <a class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#q1" aria-expanded="false"
                                            aria-controls="q1">

                                            <h5>
                                                <span>Q1.</span> Arrival and Orientation?
                                            </h5>
                                        </a>

                                        <div id="q1" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>
                                                    Upon arrival, you’ll be greeted by your guide and
                                                    transferred to your hotel. After settling in, you’ll attend
                                                    an orientation meeting to go over the itinerary and meet
                                                    your fellow travelers.

                                                </p>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="itinery__item">

                                        <a class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#q-2" aria-expanded="false"
                                            aria-controls="q-2">

                                            <h5>
                                                <span>Q2.</span> Arrival and Orientation?
                                            </h5>
                                        </a>

                                        <div id="q-2" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>
                                                    Upon arrival, you’ll be greeted by your guide and
                                                    transferred to your hotel. After settling in, you’ll attend
                                                    an orientation meeting to go over the itinerary and meet
                                                    your fellow travelers.

                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="itinery__item">

                                        <a class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#q3" aria-expanded="false"
                                            aria-controls="q3">

                                            <h5>
                                                <span>Q3.</span> Arrival and Orientation
                                            </h5>
                                        </a>

                                        <div id="q3" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>
                                                    Upon arrival, you’ll be greeted by your guide and
                                                    transferred to your hotel. After settling in, you’ll attend
                                                    an orientation meeting to go over the itinerary and meet
                                                    your fellow travelers.

                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="itinery__item">

                                        <a class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#q4" aria-expanded="false"
                                            aria-controls="q4">

                                            <h5>
                                                <span>Q5</span> Arrival and Orientation?
                                            </h5>
                                        </a>

                                        <div id="q4" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>
                                                    Upon arrival, you’ll be greeted by your guide and
                                                    transferred to your hotel. After settling in, you’ll attend
                                                    an orientation meeting to go over the itinerary and meet
                                                    your fellow travelers.

                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="itinery__item">

                                        <a class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#q5" aria-expanded="false"
                                            aria-controls="q5">

                                            <h5>
                                                <span>Q 5</span> Arrival and Orientation?
                                            </h5>
                                        </a>

                                        <div id="q5" class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <p>
                                                    Upon arrival, you’ll be greeted by your guide and
                                                    transferred to your hotel. After settling in, you’ll attend
                                                    an orientation meeting to go over the itinerary and meet
                                                    your fellow travelers.

                                                </p>

                                            </div>
                                        </div>
                                    </div>

                                </div>




                            </div>
                            <h2 class="my-3">More info</h2>
                            <div class="more-info">
                                <p>Start and end in San Jose! With the Active tour Essential Costa Rica - Package
                                    with
                                    Manuel Antonio National Park, you have a 10 days tour package taking you through
                                    San
                                    Jose, Costa Rica and 4 other destinations in Costa Rica. Essential Costa Rica -
                                    Package with Manuel Antonio National Park includes accommodation in a hotel as
                                    well
                                    as an expert guide, meals, transport and more.</p>
                                <p>Start and end in San Jose! With the Active tour Essential Costa Rica - Package
                                    with
                                    Manuel Antonio National Park, you have a 10 days tour package taking you through
                                    San
                                    Jose, Costa Rica and 4 other destinations in Costa Rica. Essential Costa Rica -
                                    Package with Manuel Antonio National Park includes accommodation in a hotel as
                                    well
                                    as an expert guide, meals, transport and more.</p>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="main-content__sidebar">
                    <div class=" sidebar sidebar-border trail-details-sidebar mb-4  ">
                        <h3> Trip Facts</h3>
                        <div class="row g-2 p-3 trip-facts">
                            <div class="col-sm-6">
                                <div class="item border  text-center p-4 ">
                                    <div class="icon"><i class="fa-solid fa-map-location-dot"></i></div>
                                    <div class="text">
                                        <h6 class="info-title">Destination</h6>
                                        <h5 class="info">Nepal</h5>
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
                                        <h5 class="info">16 days</h5>
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
                                        <h5 class="info">Moderate </h5>
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
                                        <h5 class="info">Trekking</h5>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-sm-6">
                                <div class="item border  text-center p-4">
                                    <div class="icon"><i class="fa-solid fa-hotel"></i></div>
                                    <div class="text">
                                        <h6 class="info-title">Accommodation</h6>
                                        <h5 class="info">Hotel/Lodges</h5>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-sm-6">
                                <div class="item border  text-center p-4">
                                    <div class="icon"><i class="fa-solid fa-volcano"></i></div>
                                    <div class="text">
                                        <h6 class="info-title">Max.altitude</h6>
                                        <h5 class="info">5545m.</h5>
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
                                        <h5 class="info">Min. 1 Pax</h5>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-sm-6">
                                <div class="item border  text-center p-3">
                                    <div class="icon"><i class="fa-regular fa-clock"></i></div>
                                    <div class="text">
                                        <h6 class="info-title">Best Time</h6>
                                        <h5 class="info">March - May &amp; Sept - Dec</h5>
                                    </div>
                                </div>
                            </div> --}}
                        </div>



                    </div>
                    <div class=" sidebar sidebar-border trail-details-sidebar mb-4  ">


                        <h3>Other Trail </h3>
                        <div class="sidebar__package p-4">

                            <ul class="posts blog withthumb ">
                                <li class="mb-3">
                                    <div class="post_circle_thumb">
                                        <a href="#"><img class="alignleft frame post_thumb"
                                                src="{{asset('user/images/trail/Mount_Everest_as_seen_from_Drukair2_PLW_edit.jpg')}} "
                                                alt="img"></a>
                                    </div><a href="#">Everest Base Camp Trek - 13 Things to Know for Your Trip</a>
                                    <div class="post_attribute">December 10, 2016</div>
                                </li>

                                <li class="mb-3">
                                    <div class="post_circle_thumb ">
                                        <a href="#"><img class="alignleft frame post_thumb"
                                                src="{{asset('user/images/trail/america-gded4fdb31_640-300x169.jpg')}} " alt="img"></a>
                                    </div><a href="#">Everest Base Camp Trek - 13 Things to Know for Your Trip</a>
                                    <div class="post_attribute">December 10, 2016</div>
                                </li>
                                <li class="mb-3">
                                    <div class="post_circle_thumb ">
                                        <a href="#"><img class="alignleft frame post_thumb"
                                                src="{{asset('user/images/trail/1.webp')}} " alt="img"></a>
                                    </div><a href="#">Everest Base Camp Trek - 13 Things to Know for Your Trip</a>
                                    <div class="post_attribute">December 10, 2016</div>
                                </li>

                                <li class="mb-3">
                                    <div class="post_circle_thumb ">
                                        <a href="#"><img class="alignleft frame post_thumb"
                                                src="{{asset('user/images/trail/3.jpg')}} " alt="img"></a>
                                    </div><a href="#">Everest Base Camp Trek - 13 Things to Know for Your Trip</a>
                                    <div class="post_attribute">December 10, 2016</div>
                                </li>

                                <li>
                                    <div class="post_circle_thumb ">
                                        <a href="#"><img class="alignleft frame post_thumb"
                                                src="{{asset('user/images/trail/Mount_Everest_as_seen_from_Drukair2_PLW_edit.jpg')}} "
                                                alt="img"></a>
                                    </div><a href="#">Everest Base Camp Trek - 13 Things to Know for Your Trip</a>
                                    <div class="post_attribute">December 10, 2016</div>
                                </li>
                            </ul>

                        </div>

                    </div>
                </div>

            </div>
            <div class="trail-packages" id="related-packages">
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="section__title text-start w-100">
                            <h3>
                                Everest Related Trail
                                </h1>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="trail-packages__card">

                            <a class="tour_image" href="#">
                                <img src="{{asset('user/images/trail/1.webp')}} " alt="img">

                                <div class="tour-band ">
                                    NEW</div>
                            </a>

                            <div class="portfolio_info_wrapper">
                                <a class="tour_link" href="#">
                                    <h4>Everest Base Camp Helicopter Tour</h4>
                                </a>
                                <div class="tour_excerpt">
                                    <span> <i class="fa-solid fa-location-dot"></i> City Tours, Urban</span>
                                </div>
                                <div
                                    class="tour_attribute_wrapper d-flex justify-content-between align-items-center mt-3">
                                    <div class="tour_attribute_share">
                                        <a id="single_tour_share_button" href="javascript:;"
                                            class="button ghost themeborder" style="width:auto;"><i
                                                class="fa-solid fa-share-nodes"></i> Share this tour</a>
                                    </div>

                                    <div class="tour_attribute_link">
                                        <a href=""> View More <i class="fa-solid fa-arrow-right-long"></i> </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="trail-packages__card">

                            <a class="tour_image" href="#">
                                <img src="{{asset('user/images/trail/2.webp')}} " alt="img">

                                <div class="tour-band ">
                                    NEW</div>
                            </a>

                            <div class="portfolio_info_wrapper">
                                <a class="tour_link" href="#">
                                    <h4>Everest Base Camp Helicopter Tour</h4>
                                </a>
                                <div class="tour_excerpt">
                                    <span> <i class="fa-solid fa-location-dot"></i> City Tours, Urban</span>
                                </div>
                                <div
                                    class="tour_attribute_wrapper d-flex justify-content-between align-items-center mt-3">
                                    <div class="tour_attribute_share">
                                        <a id="single_tour_share_button" href="javascript:;"
                                            class="button ghost themeborder" style="width:auto;"><i
                                                class="fa-solid fa-share-nodes"></i> Share this tour</a>
                                    </div>

                                    <div class="tour_attribute_link">
                                        <a href=""> View More <i class="fa-solid fa-arrow-right-long"></i> </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="trail-packages__card">

                            <a class="tour_image" href="#">
                                <img src="{{asset('user/images/trail/3.webp')}} " alt="img">

                                <div class="tour-band ">
                                    NEW</div>
                            </a>

                            <div class="portfolio_info_wrapper">
                                <a class="tour_link" href="#">
                                    <h4>Everest Base Camp Helicopter Tour</h4>
                                </a>
                                <div class="tour_excerpt">
                                    <span> <i class="fa-solid fa-location-dot"></i> Solukhumbu , Nepal</span>
                                </div>
                                <div
                                    class="tour_attribute_wrapper d-flex justify-content-between align-items-center mt-3">
                                    <div class="tour_attribute_share">
                                        <a id="single_tour_share_button" href="javascript:;"
                                            class="button ghost themeborder" style="width:auto;"><i
                                                class="fa-solid fa-share-nodes"></i> Share this tour</a>
                                    </div>

                                    <div class="tour_attribute_link">
                                        <a href="#">View More <i class="fa-solid fa-arrow-right-long"></i> </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="trail-packages" id="upcomming">
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="section__title text-start w-100">
                            <h3>
                                Upcomming Trail
                                </h1>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="trail-packages__card">

                            <a class="tour_image" href="#">
                                <img src="{{asset('user/images/trail/1.webp')}} " alt="img">

                                <div class="tour-band upcomming ">
                                    Upcomming</div>
                            </a>

                            <div class="portfolio_info_wrapper">
                                <a class="tour_link" href="#">
                                    <h4>Everest Base Camp Helicopter Tour</h4>
                                </a>
                                <div class="tour_excerpt">
                                    <span> <i class="fa-solid fa-location-dot"></i> City Tours, Urban</span>
                                </div>
                                <div
                                    class="tour_attribute_wrapper d-flex justify-content-between align-items-center mt-3">
                                    <div class="tour_attribute_share">
                                        <a id="single_tour_share_button" href="javascript:;"
                                            class="button ghost themeborder" style="width:auto;"><i
                                                class="fa-solid fa-share-nodes"></i> Share this tour</a>
                                    </div>

                                    <div class="tour_attribute_link">
                                        <a href=""> View More <i class="fa-solid fa-arrow-right-long"></i> </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="trail-packages__card">

                            <a class="tour_image" href="#">
                                <img src="{{asset('user/images/trail/2.webp')}} " alt="img">

                                <div class="tour-band upcomming ">
                                    Upcomming</div>
                            </a>

                            <div class="portfolio_info_wrapper">
                                <a class="tour_link" href="#">
                                    <h4>Everest Base Camp Helicopter Tour</h4>
                                </a>
                                <div class="tour_excerpt">
                                    <span> <i class="fa-solid fa-location-dot"></i> City Tours, Urban</span>
                                </div>
                                <div
                                    class="tour_attribute_wrapper d-flex justify-content-between align-items-center mt-3">
                                    <div class="tour_attribute_share">
                                        <a id="single_tour_share_button" href="javascript:;"
                                            class="button ghost themeborder" style="width:auto;"><i
                                                class="fa-solid fa-share-nodes"></i> Share this tour</a>
                                    </div>

                                    <div class="tour_attribute_link">
                                        <a href=""> View More <i class="fa-solid fa-arrow-right-long"></i> </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="trail-packages__card">

                            <a class="tour_image" href="#">
                                <img src="{{asset('user/images/trail/3.webp')}} " alt="img">

                                <div class="tour-band upcomming ">
                                    Upcomming</div>
                            </a>

                            <div class="portfolio_info_wrapper">
                                <a class="tour_link" href="#">
                                    <h4>Everest Base Camp Helicopter Tour</h4>
                                </a>
                                <div class="tour_excerpt">
                                    <span> <i class="fa-solid fa-location-dot"></i> Solukhumbu , Nepal</span>
                                </div>
                                <div
                                    class="tour_attribute_wrapper d-flex justify-content-between align-items-center mt-3">
                                    <div class="tour_attribute_share">
                                        <a id="single_tour_share_button" href="javascript:;"
                                            class="button ghost themeborder" style="width:auto;"><i
                                                class="fa-solid fa-share-nodes"></i> Share this tour</a>
                                    </div>

                                    <div class="tour_attribute_link">
                                        <a href="#">View More <i class="fa-solid fa-arrow-right-long"></i> </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<a href="#" class="scrollToTop scroll-btn show"><i class="fa-solid fa-arrow-up"></i></a>

<!-- footer end-->
<script src="{{ asset('user/js/jquery-3.6.0.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="{{ asset('user/js/owl.carousel.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
<script>
    function prettyLog(message) {
        console.log(message);
    }

    var typed = new Typed("#typed", {
        stringsElement: '#typed-strings',
        typeSpeed: 50,
        backSpeed: 25,
        backDelay: 500,
        startDelay: 1000,
        loop: true,
        onBegin: function(self) {
            prettyLog('onBegin ' + self)
        },
        onComplete: function(self) {
            prettyLog('onComplete ' + self)
        },
        preStringTyped: function(pos, self) {
            prettyLog('preStringTyped ' + pos + ' ' + self);
        },
        onStringTyped: function(pos, self) {
            prettyLog('onStringTyped ' + pos + ' ' + self)
        },
        onLastStringBackspaced: function(self) {
            prettyLog('onLastStringBackspaced ' + self)
        },
        onTypingPaused: function(pos, self) {
            prettyLog('onTypingPaused ' + pos + ' ' + self)
        },
        onTypingResumed: function(pos, self) {
            prettyLog('onTypingResumed ' + pos + ' ' + self)
        },
        onReset: function(self) {
            prettyLog('onReset ' + self)
        },
        onStop: function(pos, self) {
            prettyLog('onStop ' + pos + ' ' + self)
        },
        onStart: function(pos, self) {
            prettyLog('onStart ' + pos + ' ' + self)
        },
        onDestroy: function(self) {
            prettyLog('onDestroy ' + self)
        }
    });
</script>
<script></script>
<script>
    Fancybox.bind("[data-fancybox]", {

    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var scrollToTopButton = document.querySelector('.scrollToTop');

        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 100) {
                scrollToTopButton.classList.add('show');
            } else {
                scrollToTopButton.classList.remove('show');
            }
        });

        scrollToTopButton.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const slides = document.querySelectorAll(".slider__image");
        let currentIndex = 0;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.remove("active");
                if (i === index) {
                    slide.classList.add("active");
                }
            });
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % slides.length;
            showSlide(currentIndex);
        }

        // Initial display
        showSlide(currentIndex);

        // Change slide every 4 seconds
        setInterval(nextSlide, 4000);
    });
</script>
<script>
    $('.owl-achivement').owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        responsiveClass: true,
        nav: false,
        lazyLoad: true,
        items: 6,
        margin: 20,
        dots: true,
        navText: ['<span class="fas fa-chevron-left fa-1x"></span>',
            '<span class="fas fa-chevron-right fa-1x"></span>'
        ],
        responsive: {
            0: {
                items: 1,
                nav: false,
            },
            450: {
                items: 1,
                nav: false,

            },
            575: {
                items: 2,
                nav: false,


            },
            767: {
                items: 3
            },
            991: {
                items: 4
            },
            1199: {
                items: 5
            },
            1399: {
                items: 6,
                dots: true,
                nav: false,
            },
            1439: {
                items: 6,
                dots: true,
                nav: false,
            }
        }
    });
    // $('.owl-members').owlCarousel({
    //   loop: true,
    //   autoplay: true,
    //   autoplayTimeout: 3000,
    //   autoplayHoverPause: true,
    //   responsiveClass: true,
    //   nav: true,
    //   items: 4,
    //   margin: 20,
    //   dots: false,
    //   navText: ['<span class="fas fa-chevron-left fa-1x"></span>',
    //     '<span class="fas fa-chevron-right fa-1x"></span>'
    //   ],
    //   responsive: {
    //     0: {
    //       items: 1,
    //       nav: false,
    //       dots: true,

    //     },
    //     450: {
    //       items: 1,
    //       nav: false,
    //       dots: true,

    //     },
    //     575: {
    //       items: 1,
    //       nav: false,
    //       dots: true,

    //     },
    //     767: {
    //       items: 2
    //     },
    //     991: {
    //       items: 3
    //     },
    //     1199: {
    //       items: 4
    //     },
    //     1399: {
    //       items: 4,

    //     },
    //     1439: {
    //       items: 4,

    //     }
    //   }
    // });
    $('.owl-destination').owlCarousel({
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        responsiveClass: true,
        nav: true,
        lazyLoad: true,
        items: 3,
        margin: 20,
        dots: false,
        navText: ['<span class="fas fa-chevron-left fa-1x"></span>',
            '<span class="fas fa-chevron-right fa-1x"></span>'
        ],
        responsive: {
            0: {
                items: 1,
                nav: false,
                dots: true,
            },
            450: {
                items: 1,
                nav: false,
                dots: true,

            },
            575: {
                items: 1,
                nav: false,
                dots: true,

            },
            767: {
                items: 2,
            },
            991: {
                items: 4,
            },
            1199: {
                items: 4,
            },
            1399: {
                items: 4,

            },
            1439: {
                items: 4,

            }
        }
    });


    // $('.owl-partners').owlCarousel({
    //   items: 4,
    //   loop: true,
    //   margin: 10,
    //   autoplay: true,
    //   autoplayTimeout: 1000,
    //   autoplayHoverPause: true,

    //   responsiveClass: true,
    //   nav: false,
    //   items: 5,
    //   margin: 20,
    //   dots: false,
    //   navText: ['<span class="fas fa-chevron-left fa-1x"></span>',
    //     '<span class="fas fa-chevron-right fa-1x"></span>'
    //   ],
    //   responsive: {
    //     0: {
    //       items: 1,
    //       nav: false,
    //       dots: true,
    //     },
    //     450: {
    //       items: 1,
    //       nav: false,
    //       dots: true,

    //     },
    //     575: {
    //       items: 1,
    //       nav: false,
    //       dots: true,

    //     },
    //     767: {
    //       items: 2,
    //       nav: false,
    //       dots: false,
    //     },
    //     991: {
    //       items: 3,
    //       nav: false,
    //       dots: false,
    //     },
    //     1199: {
    //       items: 4,
    //       nav: false,
    //       dots: false,
    //     },
    //     1399: {
    //       items: 5,
    //       nav: false,
    //       dots: false,

    //     },
    //     1439: {
    //       items: 5,
    //       nav: false,
    //       dots: false,

    //     }
    //   }
    // });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const dropdownMenu = document.getElementById('dropdownMenu');

        const members = [{
                title: 'Member One',
                img: 'https://via.placeholder.com/40'
            },
            {
                title: 'Member Two',
                img: 'https://via.placeholder.com/40'
            },
            {
                title: 'Member Three',
                img: 'https://via.placeholder.com/40'
            },
            // Add more members as needed
        ];

        searchInput.addEventListener('input', function() {
            const query = searchInput.value.toLowerCase();
            dropdownMenu.innerHTML = '';

            if (query) {
                const filteredMembers = members.filter(member => member.title.toLowerCase().includes(
                    query));

                filteredMembers.forEach(member => {
                    const li = document.createElement('li');
                    const img = document.createElement('img');
                    img.src = member.img;
                    const span = document.createElement('span');
                    span.textContent = member.title;

                    li.appendChild(img);
                    li.appendChild(span);
                    dropdownMenu.appendChild(li);

                    li.addEventListener('click', function() {
                        searchInput.value = member.title;
                        dropdownMenu.style.display = 'none';
                    });
                });

                dropdownMenu.style.display = 'block';
            } else {
                dropdownMenu.style.display = 'none';
            }
        });

        document.addEventListener('click', function(event) {
            if (!event.target.closest('.search-trail')) {
                dropdownMenu.style.display = 'none';
            }
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
      const filterSpans = document.querySelectorAll('.filter-member span');
      const memberList = document.querySelector('.member-list');
      const memberCards = document.querySelectorAll('.member-list .col-4');

      filterSpans.forEach(span => {
        span.addEventListener('click', () => {
          const filterValue = span.getAttribute('data-value')[0].toUpperCase(); // Get the first letter of the filter value and convert to uppercase
          let hasVisibleMembers = false;

          memberCards.forEach(card => {
            const memberName = card.getAttribute('data-member-name').toUpperCase(); // Convert member name to uppercase
            if (memberName.startsWith(filterValue)) {
              card.style.display = 'block';
              hasVisibleMembers = true;
            } else {
              card.style.display = 'none';
            }
          });

          if (hasVisibleMembers) {
            memberList.style.display = 'block';
          } else {
            memberList.style.display = 'none';
          }
        });
      });
    });
  </script>

</body>

</html>


