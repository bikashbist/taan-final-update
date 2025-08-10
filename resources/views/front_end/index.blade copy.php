@dd('lll')
@extends('front_end.layouts.app')
@section('content')
@include('front_end.includes.index.slider')
<!-- course-list-section-end -->
<section class="about-taan my-lg-5">
    <div class="container">
        <div class="section__title text-center text-lg-start">
            <h3>
                Our Introduction
                </h1>
        </div>
        <div class="row g-4 align-items-center">

            <div class="col-lg-6 pe-lg-4">

                <h5 class="mb-lg-4">TAAN members specialise in offering you an unrivalled collection of financially
                    protected,
                    quality adventure holidays to every corner of the Nepal.</h5>
                <p>
                    Trekking Agencies' Association of Nepal (TAAN) is an umbrella association of trekking agencies in
                    the
                    country.
                </p>
                <br>
                <p>
                    It was established in 1979 by a handful of trekking agency operators who felt it was time to devise
                    sound business principles as well as regulate the sector which was growing by leaps and bounds with
                    every
                    passing year.
                    {{-- They also felt the need of a strong lobby group that could suggest to the government on
              several issues to promote the Nepali tourism industry and develop tourism as a revenue generating industry. --}}
                </p>


                <!--
                <br><p>
                  Initially, TAAN had limited its membership only to Nepalese trekking agencies. It later opened associate membership to foreign organizations to broaden the scope of the association.
                </p>
                <br>
                <p>
                  TAAN members (around 1,729 General Members, 7 Associate Members and 155 General Members of TAAN Regional Association Pokhara) meet annually to endorse policy guidelines which govern the executive body. The executive committee work as per the TAAN Statute and guidelines of the Annual General Body meeting. The association frequently communicates with different government agencies and other stakeholders to simplify working procedures and resolve problems related to the trekking sector. The executive committee, which is elected every two years, has eight office-bearers, nine executive committee members, four nominated executive members, one immediate past president and one representative from TAAN Regional Association Pokhara.
                </p> -->


                <a class="read-more" href="#">Read More</a>
            </div>
            <div class="col-lg-6">
                <div class="about-team--img">
                    <!-- <img src="{{ asset('') }}images/about/about_image_2.png" alt="img"> -->
                    <a class="video__wrapper" href="https://www.youtube.com/watch?v=BchpIcqJy8w" data-fancybox="gallery">
                        <img src="{{ asset('user/images/Treks-In-The-World-cover_18th-Nov.webp') }}" />
                        <div class="video__play-icon">
                            <span>
                                <i class="fa-regular fa-circle-play"></i>
                            </span>

                        </div>
                    </a>
                </div>

            </div>
        </div>

        FAQs
    </div>

</section>
@include('front_end.includes.index.what-we-do')
@include('front_end.includes.index.achivement')
<!-- message from president start -->
<section class="message my-lg-5 my-3">
    <div class="container">
        <div class="president d-lg-flex flex-column flex-lg-row justify-content-center">
            <div class="president-message">
                <h3>Message from President</h3>
                <h5>Nilhari Bastola (President)</h5>
                <p>I have been elected as President of Trekking Agencies’ Association of Nepal (TAAN) and I am very
                    pleased to
                    be appointed to this position and would like to congratulate entire executive committee for being
                    elected
                    for the tenure of 2 years. We look forward to the year ahead and we hope that, with the support of
                    Executive
                    Committee, Member Agencies and staff, we can strengthen and promote the tourism industry.</p>
                <a class="btn" href="">Read More</a>
                {{-- <button>Read More</button> --}}

            </div>
            <div class="president-image d-flex justify-content-center p-2">
                <img src="{{ asset('user/images/nil-hari-bastola.jpg') }}" alt="President Image">
            </div>
        </div>
    </div>
</section>
<!-- message from president end-->





<section class="section-trail mb-lg-5">
    <div class="container">
        <div class="section__title text-center ">
            <h3>
                Trail & Travel
                </h1>
                <p>The complete Nepal travel guide </p>
        </div>
        <div class="section-trail__details">
            <div class="row g-4 ">
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <a href="">
                        <div class="section-trail__details__list">
                            <div class="section-trail__details__list__box">
                                <div class="logo-img">
                                    <img src="{{ asset('user/images/trail/Climbers-side-Nepali-Mount-Everest.webp') }}" alt="" class="img">
                                    {{-- <div class="bagde-flag-wrap">
                                      <a href="#" class="bagde-flag"> Top Trail </a>
                                  </div> --}}
                                </div>

                                <div class="text">

                                    <small><i class="fa-solid fa-location-dot"></i> Solukhumbu Nepal -10
                                    </small>
                                    <a href="">
                                        <h5>Everest Base Camp Trek - 13 Things to Know for Your Trip</h5>
                                    </a>
                                    <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>10 Days</b>
                                    </small>
                                    <small><i class="fa-solid fa-plane-up"></i> Transport - <b> Private vehicle / By
                                            Air
                                        </b>
                                    </small>



                                </div>

                            </div>

                        </div> <!-- list section-trail -->
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <a href="#">
                        <div class="section-trail__details__list">
                            <div class="section-trail__details__list__box">
                                <div class="logo-img">
                                    <img src="https://media.everestbasecamptravel.com/uploads/package/namche-helicopter-flight.webp" alt="" class="img">
                                    {{-- <div class="bagde-flag-wrap">
                                      <a href="#" class="bagde-flag"> Top Trail </a>
                                  </div> --}}
                                </div>

                                <div class="text">

                                    <small><i class="fa-solid fa-location-dot"></i> Kathmandu, Chitwan, Pokhara
                                    </small>
                                    <h5>Everest Base Camp Trek - 13 Things to Know for Your Trip</h5>
                                    <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>10 Days</b>
                                    </small>
                                    <small><i class="fa-solid fa-plane-up"></i> Transport - <b> Private vehicle / By
                                            Air
                                        </b>
                                    </small>

                                </div>

                            </div>

                        </div> <!-- list section-trail -->
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <a href="#">
                        <div class="section-trail__details__list">
                            <div class="section-trail__details__list__box">
                                <div class="logo-img">
                                    <img src="https://media.everestbasecamptravel.com/uploads/package/namche-helicopter-flight.webp" alt="" class="img">
                                    {{-- <div class="bagde-flag-wrap">
                                      <a href="#" class="bagde-flag"> Top Trail </a>
                                  </div> --}}
                                </div>

                                <div class="text">

                                    <small><i class="fa-solid fa-location-dot"></i> Kathmandu, Nepal </small>
                                    <h5>Everest Base Camp Trek - 13 Things to Know for Your Trip</h5>
                                    <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>10 Days</b>
                                    </small>
                                    <small><i class="fa-solid fa-plane-up"></i> Transport - <b> Private vehicle / By
                                            Air
                                        </b>
                                    </small>

                                </div>

                            </div>

                        </div> <!-- list section-trail -->
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <a href="#">
                        <div class="section-trail__details__list">
                            <div class="section-trail__details__list__box">
                                <div class="logo-img">
                                    <img src="https://media.everestbasecamptravel.com/uploads/package/namche-helicopter-flight.webp" alt="" class="img">

                                </div>

                                <div class="text">

                                    <small><i class="fa-solid fa-location-dot"></i> Kathmandu, Nepal </small>
                                    <h5>Everest Base Camp Trek - 13 Things to Know for Your Trip</h5>
                                    <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>10 Days</b>
                                    </small>
                                    <small><i class="fa-solid fa-plane-up"></i> Transport - <b> Private vehicle / By
                                            Air </b>
                                    </small>

                                </div>

                            </div>

                        </div> <!-- list section-trail -->
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <a href="#">
                        <div class="section-trail__details__list">
                            <div class="section-trail__details__list__box">
                                <div class="logo-img">
                                    <img src="https://media.everestbasecamptravel.com/uploads/package/namche-helicopter-flight.webp" alt="" class="img">

                                </div>

                                <div class="text">

                                    <small><i class="fa-solid fa-location-dot"></i> Kathmandu, Nepal </small>
                                    <h5>Everest Base Camp Trek - 13 Things to Know for Your Trip</h5>
                                    <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>10 Days</b>
                                    </small>
                                    <small><i class="fa-solid fa-plane-up"></i> Transport - <b> Private vehicle / By
                                            Air </b>
                                    </small>

                                </div>

                            </div>

                        </div> <!-- list section-trail -->
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <a href="#">
                        <div class="section-trail__details__list">
                            <div class="section-trail__details__list__box">
                                <div class="logo-img">
                                    <img src="https://media.everestbasecamptravel.com/uploads/package/namche-helicopter-flight.webp" alt="" class="img">

                                </div>

                                <div class="text">

                                    <small><i class="fa-solid fa-location-dot"></i> Kathmandu, Nepal </small>
                                    <h5>Everest Base Camp Trek - 13 Things to Know for Your Trip</h5>
                                    <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>10 Days</b>
                                    </small>
                                    <small><i class="fa-solid fa-plane-up"></i> Transport - <b> Private vehicle / By
                                            Air </b>
                                    </small>

                                </div>

                            </div>

                        </div> <!-- list section-trail -->
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <a href="#">
                        <div class="section-trail__details__list">
                            <div class="section-trail__details__list__box">
                                <div class="logo-img">
                                    <img src="https://media.everestbasecamptravel.com/uploads/package/namche-helicopter-flight.webp" alt="" class="img">

                                </div>

                                <div class="text">

                                    <small><i class="fa-solid fa-location-dot"></i> Kathmandu, Nepal </small>
                                    <h5>Everest Base Camp Trek - 13 Things to Know for Your Trip</h5>
                                    <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>10 Days</b>
                                    </small>
                                    <small><i class="fa-solid fa-plane-up"></i> Transport - <b> Private vehicle / By
                                            Air </b>
                                    </small>

                                </div>

                            </div>

                        </div> <!-- list section-trail -->
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <a href="#">
                        <div class="section-trail__details__list">
                            <div class="section-trail__details__list__box">
                                <div class="logo-img">
                                    <img src="https://media.everestbasecamptravel.com/uploads/package/namche-helicopter-flight.webp" alt="" class="img">

                                </div>

                                <div class="text">

                                    <small><i class="fa-solid fa-location-dot"></i> Kathmandu, Nepal </small>
                                    <h5>Everest Base Camp Trek - 13 Things to Know for Your Trip</h5>
                                    <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>10 Days</b>
                                    </small>
                                    <small><i class="fa-solid fa-plane-up"></i> Transport - <b> Private vehicle / By
                                            Air </b>
                                    </small>

                                </div>

                            </div>

                        </div> <!-- list section-trail -->
                    </a>
                </div>
            </div>
        </div>
    </div>
</section><!-- up section-trail trail -->
<!-- list Top Destination for vacations start -->
@include('front_end.includes.index.destination')
<!-- taan support start -->
<section class="taan-support my-lg-5 my-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="trip-advisor">
                    <a href="https://www.tripadvisor.com/Attraction_Review-g293890-d6031354-Reviews-Nepal_Trek_Adventure_and_Expedition-Kathmandu_Kathmandu_Valley_Bagmati_Zone_Centr.html"><img src="https://media.nepaltrekadventures.com/themes/images/ta-widget.png" width="100%" alt="img">
                    </a>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="support d-lg-flex flex-column flex-lg-row justify-content-center h-100">
                    <div class="support-message">
                        <h4>Get Started by Speaking with our Support counsellors</h4>
                        <p>Our Taan Support are working from home, ready to help you stay open for business with answers
                            and
                            advice
                            24/7/365. Send your queries about trekking, Help or complain your trekking services.</p>
                        <button>Contact Us</button>
                    </div>
                    <div class="support-image d-flex justify-content-center p-2">
                        <img src="{{ asset('user/images/support-cover.png') }}" alt="Support Contact Image">
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
<!-- taan support end-->
@include('front_end.includes.index.upcoming-trails')
<!-- accrediation end -->
@include('front_end.includes.index.faq')
@include('front_end.includes.index.video')
@endsection
