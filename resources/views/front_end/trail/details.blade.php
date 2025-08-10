@extends('front_end.user_dashboard')
@section('content')
    <div class="inner-banner ">
        <!-- <img src="images/trail/title-bg.jpg" alt="img"> -->
        <img src="{{asset('user/images/trail/Mount_Everest_as_seen_from_Drukair2_PLW_edit.jpg')}}" alt="img">
        <div class="inner-banner__navbar d-flex align-items-center">
            <div class="container position-relative">
                <div class="bg-breadcrumd w-75">
                    <h1 class="text-white mb-3">Everest Base Camp Trek with Helicopter Return</h1>
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
                                <blockquote>
                                    <p>This sanctuary on a lagoon is virtually the same as it was six hundred years ago,
                                        which adds to the fascinating character.</p>
                                </blockquote>

                                <h4 class="p1"><span class="s1">Exploring the Area</span></h4>
                                <p class="p2">Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic
                                    fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard
                                    Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave.
                                    Seitan High Life reprehenderit consectetur cupidatat kogi. Et leggings fanny pack,
                                    elit bespoke vinyl art party Pitchfork selfies master cleanse Kickstarter seitan
                                    retro. Drinking vinegar stumptown yr pop-up artisan sunt. Deep v cliche lomo
                                    biodiesel Neutra selfies.</p>
                                <h4 class="p1"><span class="s1">Coastal Adventures</span></h4>
                                <p class="p2">Exercitation photo booth stumptown tote bag Banksy, elit small batch
                                    freegan sed. Craft beer elit seitan exercitation, photo booth et 8-bit kale chips
                                    proident chillwave deep v laborum. Aliquip veniam delectus.</p>

                                <h4 class="p1"><span class="s1">Eating and Drinking</span></h4>
                                <p class="p2">See-through delicate embroidered organza blue lining luxury acetate-mix
                                    stretch pleat detailing. Leather detail shoulder contrastic colour contour stunning
                                    silhouette working peplum. Statement buttons cover-up tweaks patch pockets perennial
                                    lapel collar flap chest pockets topline</p>
                                <h4 class="p2">What to See and Do</h4>
                                <p>Foam padding in the insoles leather finest quality staple flat slip-on design pointed
                                    toe off-duty shoe. Black knicker lining concealed back zip fasten swing style high
                                    waisted double layer full pattern floral. Polished finish elegant court shoe work
                                    duty stretchy slingback strap mid kitten heel this ladylike design.</p>

                                <h4 class="p2">Where to Stay</h4>
                                <p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache
                                    fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica.
                                    Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave. Seitan
                                    High Life reprehenderit consectetur cupidatat kogi. Et leggings fanny pack, elit
                                    bespoke vinyl art party Pitchfork selfies master cleanse Kickstarter seitan retro.
                                    Drinking vinegar stumptown yr pop-up artisan sunt. Deep v cliche lomo biodiesel
                                    Neutra selfies.</p>
                                <h4 class="p1"><span class="s1">How to Get Around</span></h4>
                                <p class="p2">Exercitation photo booth stumptown tote bag Banksy, elit small batch
                                    freegan sed. Craft beer elit seitan exercitation, photo booth et 8-bit kale chips
                                    proident chillwave deep v laborum. Aliquip veniam delectus.</p>

                                <h2>
                                    Highlights
                                </h2>
                                <div class="hightlight">
                                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam
                                        itaque unde
                                        facere repellendus,</p>
                                    <ul class="list-unstyled trails-list">
                                        <li class="trail-package">

                                            <div class="trails-list--title d-flex">
                                                <span class="me-2"><i class="fa-solid fa-check"></i> </span>
                                                <a href="#"> Everest Base Camp Helicopter Tour</a>
                                            </div>

                                        </li>
                                        <li class="trail-package">

                                            <div class="trails-list--title d-flex">
                                                <span class="me-2"><i class="fa-solid fa-check"></i> </span>
                                                <a href="#"> Annapurna Base Camp Trek - 7 Days</a>
                                            </div>

                                        </li>
                                        <li class="trail-package">

                                            <div class="trails-list--title d-flex">
                                                <span class="me-2"><i class="fa-solid fa-check"></i> </span>
                                                <a href="#"> Everest Base Camp Trek - 14 Days</a>
                                            </div>

                                        </li>
                                        <li class="trail-package">

                                            <div class="trails-list--title d-flex">
                                                <span class="me-2"><i class="fa-solid fa-check"></i> </span>
                                                <a href="#"> Everest Base Camp Trek - 13 Things to Know for Your
                                                    Trip</a>
                                            </div>

                                        </li>

                                    </ul>
                                </div>

                                <h2>
                                    Overviews
                                </h2>
                                <div class="overview">
                                    <p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic
                                        fingerstache
                                        fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard
                                        Helvetica.
                                        Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave. Seitan
                                        High Life reprehenderit consectetur cupidatat kogi. Et leggings fanny pack, elit
                                        bespoke vinyl art party Pitchfork selfies master cleanse Kickstarter seitan
                                        retro.
                                        Drinking vinegar stumptown yr pop-up artisan sunt. Deep v cliche lomo biodiesel
                                        Neutra selfies.</p>
                                </div>

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
                                            <div class="itinery__item">

                                                <a class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#dayone" aria-expanded="false"
                                                    aria-controls="dayone">

                                                    <h5>
                                                        <span>Day 1</span> Arrival and Orientation
                                                    </h5>
                                                </a>

                                                <div id="dayone" class="accordion-collapse collapse"
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
                                                    data-bs-toggle="collapse" data-bs-target="#day2"
                                                    aria-expanded="false" aria-controls="day2">

                                                    <h5>
                                                        <span>Day 2</span> Arrival and Orientation
                                                    </h5>
                                                </a>

                                                <div id="day2" class="accordion-collapse collapse"
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
                                                    data-bs-toggle="collapse" data-bs-target="#day3"
                                                    aria-expanded="false" aria-controls="day3">

                                                    <h5>
                                                        <span>Day 3</span> Arrival and Orientation
                                                    </h5>
                                                </a>

                                                <div id="day3" class="accordion-collapse collapse"
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
                                                    data-bs-toggle="collapse" data-bs-target="#day4"
                                                    aria-expanded="false" aria-controls="day4">

                                                    <h5>
                                                        <span>Day 4</span> Arrival and Orientation
                                                    </h5>
                                                </a>

                                                <div id="day4" class="accordion-collapse collapse"
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
                                                    data-bs-toggle="collapse" data-bs-target="#day5"
                                                    aria-expanded="false" aria-controls="day5">

                                                    <h5>
                                                        <span>Day 5</span> Arrival and Orientation
                                                    </h5>
                                                </a>

                                                <div id="day5" class="accordion-collapse collapse"
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
                                                    data-bs-toggle="collapse" data-bs-target="#day6"
                                                    aria-expanded="false" aria-controls="day6">

                                                    <h5>
                                                        <span>Day 6</span> Arrival and Orientation
                                                    </h5>
                                                </a>

                                                <div id="day6" class="accordion-collapse collapse"
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
                                                    data-bs-toggle="collapse" data-bs-target="#day7"
                                                    aria-expanded="false" aria-controls="day7">

                                                    <h5>
                                                        <span>Day 7</span> Arrival and Orientation
                                                    </h5>
                                                </a>

                                                <div id="day7" class="accordion-collapse collapse"
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
                                                    data-bs-toggle="collapse" data-bs-target="#day8"
                                                    aria-expanded="false" aria-controls="day8">

                                                    <h5>
                                                        <span>Day 8</span> Arrival and Orientation
                                                    </h5>
                                                </a>

                                                <div id="day8" class="accordion-collapse collapse"
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
                                                    data-bs-toggle="collapse" data-bs-target="#day9"
                                                    aria-expanded="false" aria-controls="day9">

                                                    <h5>
                                                        <span>Day 9</span> Arrival and Orientation
                                                    </h5>
                                                </a>

                                                <div id="day9" class="accordion-collapse collapse"
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
                                            <!-- <div class="itinery__item">
                                                <a class="itinery-read-more" href="#">View More <i
                                                        class="fa-solid fa-arrow-right-long"></i></a>
                                            </div> -->
                                        </div>



                                    </div>
                                </div>
                                <h2>
                                    Route Map
                                </h2>
                                <div class="map mt-3">
                                    <a data-fancybox data-src="{{asset('user/images/trail/trip-map.webp')}}" data-caption="Hello world">
                                        <img src="{{asset('user/images/trail/trip-map.webp')}}" width="100%" alt="map" />
                                    </a>
                                </div>
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
@endsection
