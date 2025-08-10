<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="TAAN members specialise in offering you an unrivalled collection of financially protected, quality adventure holidays to every corner of the Nepal.">
    <link rel="shortcut icon" href="{{ asset('assets/site/images/logo-head.png') }}" type="image/x-icon">
    <title>Taan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <link rel="stylesheet" href="{{ asset('assets/site/css/owl.carousel.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/site/scss/style.css') }}">
    @yield('styles')
</head>

<body>
    <!-- header start -->
    @include('front_end.includes.header')
    <!-- header end -->
    <!-- navbar start -->
    @include('front_end.includes.navbar')
    <!-- navbar end  -->
    <div class="inner-banner ">
        <!-- <img src="images/trail/title-bg.jpg" alt="img"> -->
        <img src="{{ asset($data['member']->company_cover_image) }}" alt="img">
        <div class="inner-banner__navbar member-page d-flex align-items-center">
            <div class="container position-relative">
                <div class="bg-breadcrumd w-75 pe-lg-5">
                    <h1 class="text-white mb-3">
                        @if (isset($data['member']))
                            {{ $data['member']->organization_name }}
                        @endif
                    </h1>
                    <!-- <nav aria-label="breadcrumb">
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item "><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item "><a class="text-white" href="#">Trail</a></li>
                            <li class="breadcrumb-item text-white" aria-current="page">Everest Base Camp Trek with Helicopter Return
                            </li>
                        </ol>
                    </nav> -->
                </div>
                <div class="quick-view d-flex align-items-center">
                    <div class="quick-detail me-3">
                        <a href="#photo-gallery"><i class="fa-regular fa-image"></i> Gallery <br> <span>20
                                Photos</span></a>
                    </div>
                    <div class="quick-detail ">
                        <a href="#related-selection"><i class="fa-brands fa-hive"></i> Our Selections <br> <span>20
                                Selections</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="main-content mt-lg-5">
        <div class="container">
            <div class="row ">

                <div class="col-lg-8">
                    <div class="main-content__details">
                        <div class="trail-details member-details-main">
                            <div class=" page_content">
                                <p>
                                    @if (isset($data['member']->about_company))
                                        {!! $data['member']->about_company !!}
                                    @endif
                                </p>
                                @if (isset($data['member']->company_cover_image) && !empty($data['member']->company_cover_image))
                                    <img class="my-3" src="{{ asset($data['member']->company_cover_image) }}"
                                        alt="img">
                                @else
                                    <p>Image Not Found !</p>
                                @endif
                                <h2 class="my-4" id="photo-gallery">
                                    Legal Documents
                                </h2>
                                <div class="leagal-docs-file">
                                    <div class="owl-carousel owl-theme owl-legal-docs ">
                                        @if (isset($data['member']->company_pan) && !empty($data['member']->company_pan))
                                            <div class="legal-docs">
                                                <a data-fancybox="legal-docs"
                                                    data-src="{{ asset($data['member']->company_pan) }}">
                                                    <img src="{{ asset($data['member']->company_pan) }}" width="100%"
                                                        height="250" alt="img">
                                                    <figcaption>PAN/VAT</figcaption>
                                                </a>
                                            </div>
                                        @else
                                            <p> PAN/VAT Not Found !</p>
                                        @endif
                                        @if (isset($data['member']->company_register) && !empty($data['member']->company_register))
                                            <div class="legal-docs">
                                                <a data-fancybox="legal-docs"
                                                    data-src="{{ asset($data['member']->company_register) }}">
                                                    <img src="{{ asset($data['member']->company_register) }}"
                                                        width="100%" height="250" alt="img">
                                                    <figcaption>Company Register</figcaption>
                                                </a>
                                            </div>
                                        @else
                                            <p> Company Register Not Found !</p>
                                        @endif
                                        @if (isset($data['member']->company_tax_clearance) && !empty($data['member']->company_tax_clearance))
                                            <div class="legal-docs">
                                                <a data-fancybox="legal-docs"
                                                    data-src="{{ asset($data['member']->company_tax_clearance) }}">
                                                    <img src="{{ asset($data['member']->company_tax_clearance) }}"
                                                        width="100%" height="250" alt="img">
                                                    <figcaption>Tax Clearance</figcaption>
                                                </a>
                                            </div>
                                        @else
                                            <p> Tax Clearance Not Found !</p>
                                        @endif
                                        @if (isset($data['member']->tourism_certificate) && !empty($data['member']->tourism_certificate))
                                            <div class="legal-docs">
                                                <a data-fancybox="legal-docs"
                                                    data-src="{{ asset($data['member']->tourism_certificate) }}">
                                                    <img src="{{ asset($data['member']->tourism_certificate) }}"
                                                        width="100%" height="250" alt="img">
                                                    <figcaption>Tourism Certificate</figcaption>
                                                </a>
                                            </div>
                                        @else
                                            <p> tourism_certificate Not Found !</p>
                                        @endif
                                        @if (isset($data['member']->nrb_certificate) && !empty($data['member']->nrb_certificate))
                                            <div class="legal-docs">
                                                <a data-fancybox="legal-docs"
                                                    data-src="{{ asset($data['member']->nrb_certificate) }}">
                                                    <img src="{{ asset($data['member']->nrb_certificate) }}"
                                                        width="100%" height="250" alt="img">
                                                    <figcaption>NRB Certificate</figcaption>
                                                </a>
                                            </div>
                                        @else
                                            <p> NRB Certificate Not Found !</p>
                                        @endif
                                        @if (isset($data['member']->cottage_industry_certificate) && !empty($data['member']->cottage_industry_certificate))
                                            <div class="legal-docs">
                                                <a data-fancybox="legal-docs"
                                                    data-src="{{ asset($data['member']->cottage_industry_certificate) }}">
                                                    <img src="{{ asset($data['member']->cottage_industry_certificate) }}"
                                                        width="100%" height="250" alt="img">
                                                    <figcaption>Cottage Industry Certificate</figcaption>
                                                </a>
                                            </div>
                                        @else
                                            <p> Cottage Industry Certificate Not Found !</p>
                                        @endif
                                        @if (isset($data['member']->renewal_certificate) && !empty($data['member']->renewal_certificate))
                                            <div class="legal-docs">
                                                <a data-fancybox="legal-docs"
                                                    data-src="{{ asset($data['member']->renewal_certificate) }}">
                                                    <img src="{{ asset($data['member']->renewal_certificate) }}"
                                                        width="100%" height="250" alt="img">
                                                    <figcaption>Renewal Certificate</figcaption>
                                                </a>
                                            </div>
                                        @else
                                            <p> Renewal Certificate Not Found !</p>
                                        @endif

                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="main-content__sidebar  sidebar sidebar-right ">
                        <!-- <h3>Travel Trails</h3> -->
                        <div class="sidebar__package sidebar-profile mb-4 ">
                            <div class="member-profile">
                                <div class="member-heading">
                                    <div class="company-log d-flex justify-content-end">
                                        @if (isset($data['member']->company_logo) && !empty($data['member']->company_logo))
                                            <img src="{{ asset($data['member']->company_logo) }}" width="50px"
                                                height="80px" class="img igm-responsive" alt="logo">
                                        @else
                                            <p>
                                                <img src="{{ asset($all_view['setting']->logo) }}" alt="logo"
                                                    width="50px" height="80px" class="img igm-responsive">
                                            </p>
                                        @endif
                                    </div>
                                </div>

                                <div class="company-detail d-flex align-items-center ">
                                 @if (!empty($data['member']->company_profile))
                                    <div class="member-sketch">
                                        <img src="{{ asset($data['member']->company_profile) }}" alt="sketch">
                                    </div>
                                @else
                                    <div class="member-sketch">
                                        <img src="{{ asset('assets/site/images/blank.png') }}" alt="blank sketch">
                                    </div>
                                @endif


                                    <div class="profile-details">
                                        <div class="d-flex">
                                            @if (isset($data['user']->name))
                                                <h4>{{ $data['user']->name }}</h4>
                                            @endif
                                           
                                        </div>


                                        <p> @if (isset($data['member']->member_id))
                                                <h6>Member ID:
                                                    {{ $data['member']->member_id }}</h6>
                                            @endif </p>
                                    </div>
                                </div>

                                <div class="contact-details text-center mt-3 px-4 pb-4">
                                    {{-- <span>@if (isset($data['user']->email)) {{ $data['user']->email}} @endif</span> --}}
                                    <div class="phone-number">

                                        <a href="tel:{{ $data['member']->mobile }}" target="_blank"
                                            class="btn btn-contact btn-call-us text-white w-100 mt-3">Call us now!:
                                            @if (isset($data['member']->mobile))
                                                {{ $data['member']->mobile }}
                                            @endif
                                        </a>
                                    </div>
                                    <a href="https://wa.me/9779851017030" target="_blank"
                                        class="btn btn-contact text-white w-100 mt-3"> <i
                                            class="fa-brands fa-whatsapp"></i> Contact Us <i
                                            class="fa-solid fa-arrow-right-long"></i></a>
                                    <small class="mt-2 d-block">Key Person Name :
                                        {{ $data['member']->key_person }}</small>
                                    <small class="mt-2 d-block"> {{ $data['member']->address }}</small>
                                    <small class="mt-2 d-block"> {{ $data['member']->email }}</small>
                                    <small class="mt-2 d-block"> {{ $data['member']->phone }}</small>
                                    <div class="more-infor  p-4 mt-3">
                                        <span class="d-block">Founded year: @if (isset($data['member']->establish_date))
                                                {{ $data['member']->establish_date }}
                                            @endif
                                        </span>
                                        <br>
                                        @if (isset($data['member']->website))
                                            <a class="d-block website-visit" href=" {{ $data['member']->website }} "
                                                target="_blank"> <span><i class="fa-solid fa-globe"></i></span> Visit
                                                Website <i class="fa-solid fa-arrow-right-long"></i></a>
                                        @endif
                                        <p>Connect with Us</p>

                                    </div>
                                    <div class="social-media d-flex justify-content-center">
                                        @if (isset($data['member']->facebook))
                                            <a href="{{ $data['member']->instagram }}" target="_blank"><i
                                                    class="fa-brands fa-facebook-f"></i></a>
                                        @endif
                                        @if (isset($data['member']->linkedin))
                                            <a href="{{ $data['member']->instagram }}" target="_blank"><i
                                                    class="fa-brands fa-linkedin-in"></i></a>
                                        @endif
                                        @if (isset($data['member']->youtube))
                                            <a href="{{ $data['member']->instagram }}" target="_blank"><i
                                                    class="fa-brands fa-youtube"></i></a>
                                        @endif
                                        @if (isset($data['member']->instagram))
                                            <a href="{{ $data['member']->instagram }}" target="_blank"><i
                                                    class="fa-brands fa-instagram"></i></a>
                                        @endif
                                    </div>
                                </div>


                            </div>

                        </div>



                    </div>
                </div>
                <div class="trail-packages" id="related-selection">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="section__title text-start w-100">
                                <h3>
                                    Best Selling Offers
                                </h3>
                                <hr>
                            </div>
                        </div>
                        @if (isset($data['posts']) && count($data['posts']) > 0)
                            @foreach ($data['posts'] as $row)
                                <div class="col-lg-4">
                                    <div class="trail-packages__card">
                                        <a class="tour_image"
                                            href="{{ route('site.post.show', ['id' => $row->post_unique_id]) }}">
                                            <img src="{{ asset($row->blog_thumnail) }} " alt="img">

                                            <div class="tour-band ">
                                                NEW</div>
                                        </a>
                                        <div class="portfolio_info_wrapper">
                                            <a class="tour_link"
                                                href="{{ route('site.post.show', ['id' => $row->post_unique_id]) }}">
                                                <h4>{{ $row->title }}</h4>
                                            </a>
                                            <div class="tour_excerpt">
                                                <span> <i class="fa-solid fa-location-dot"></i>
                                                    {{ $row->title }}</span>
                                            </div>

                                            <div class="row g-2 mt-2 trip-facts trip-facts-member">
                                                <div class="col-sm-4">
                                                    <div class="item border  text-center py-3 ">
                                                        <div class="icon"><i
                                                                class="fa-solid fa-map-location-dot"></i></div>
                                                        <div class="text">
                                                            <h6 class="info-title">Destination</h6>
                                                            <h5 class="info">{{ $row->trail_address }}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="item border  text-center py-3">
                                                        <div class="icon">
                                                            <i class="fa-regular fa-calendar-days"></i>
                                                        </div>
                                                        <div class="text">
                                                            <h6 class="info-title">Durations</h6>
                                                            <h5 class="info">{{ $row->duration }} days</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="item border  text-center py-3">
                                                        <div class="icon">
                                                            <i class="fa-solid fa-mountain-city"></i>
                                                        </div>
                                                        <div class="text">
                                                            <h6 class="info-title">Trip Difficulty</h6>
                                                            <h5 class="info">
                                                                @if (isset($row->postDifficulty))
                                                                    {{ $row->postDifficulty->title }}
                                                                @endif
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p> No Selections Found !</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer footer-members  mt-lg-5 mt-3">
        <div class="container">
            <div class="row g-lg-5 g-3 ">
                <div class="col-lg-4 col-md-4 col-12 pr-md-5 mb-4 mb-md-0">
                    <h3> About Us</h3>
                    @if (isset($data['member']->company_logo))
                        <img src="{{ asset($data['member']->company_logo) }}" height="80" alt="logo">
                    @else
                        <img src="{{ asset($all_view['setting']->logo) }}" height="80" alt="logo">
                    @endif

                    <p class="mb-4 mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis sapiente eius
                        non quisquam totam voluptatem ex officia ab natus culpa, iste odio amet veritatis nam adipisci,
                        fugit deleniti quos labore.</p>
                    <ul class="list-unstyled quick-info  mb-4">
                        <li><a href="#" class="d-flex align-items-center"><span class="me-3 "><i
                                        class="fa-solid fa-phone"></i></span>
                                @if (isset($data['member']->getUseDetail))
                                    {{ $data['member']->getUseDetail->mobile }}
                                @else
                                    Not found !
                                @endif
                            </a></li>
                        <li><a href="#" class="d-flex align-items-center"><span class="me-3"><i
                                        class="fa-solid fa-envelope"></i></span>
                                @if (isset($data['member']->getUseDetail))
                                    {{ $data['member']->getUseDetail->email }}
                                @else
                                    Not found !
                                @endif
                            </a></li>
                    </ul>
                    <form action="{{ route('site.subscribe') }}" class="subscribe">
                        <input type="email" class="form-control" name="email" placeholder="Enter your e-mail">
                        <input type="submit" class="btn btn-submit" value="Send">
                    </form>
                </div>
                <div class="col-lg-5 col-md-4 col-12 mb-4 mb-md-0">
                    <h3>Best Selling Offers</h3>

                    <ul class="list-unstyled trails-list">
                        @if (isset($data['posts']) && count($data['posts']) > 0)
                            @foreach ($data['posts'] as $row)
                                <li class="trail-package">
                                    <div class="trails-list--title d-flex">
                                        <span class="me-2"><i class="fa-solid fa-right-long"></i> </span>
                                        <a href="{{ route('site.post.show', ['id' => $row->post_unique_id]) }}">
                                            {{ $row->title }}</a>
                                    </div>

                                </li>
                            @endforeach
                        @else
                            <p> No Selections Found !</p>
                        @endif
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4 col-12 mb-4 mb-md-0">
                    <h3>Photo Gallery</h3>
                    <div class="row g-3 gallery">
                        <div class="col-6">
                            <a data-fancybox="gallery"
                                data-src="https://taan.prabidhienterprises.com.np/user/images/trail/Mount_Everest_as_seen_from_Drukair2_PLW_edit.jpg"
                                data-caption="Optional caption,<br />that can contain <em>HTML</em> code">
                                <img src="https://taan.prabidhienterprises.com.np/user/images/trail/Mount_Everest_as_seen_from_Drukair2_PLW_edit.jpg"
                                    width="100%" height="130" alt="img">
                            </a>

                        </div>

                    </div>
                </div>
                <div class="col-12">
                    <div class="py-5 footer-menu-wrap d-flex flex-wrap justify-content-between align-items-center">
                        <ul class="list-unstyled d-flex flex-wrap">
                            <li><a href="{{ route('site.index') }}">Home</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="{{ route('site.trail') }}">Trail</a></li>
                            <li><a href="{{ route('site.members') }}">Members</a></li>

                        </ul>
                        <div class="site-logo-wrap ml-auto">
                            <a href="https://softechfoundation.com/" target="_blank" class="site-logo text-white">
                                Developed By: Softech Foundation Pvt Ltd.
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </footer> <a href="#" class="scrollToTop scroll-btn show"><i class="fa-solid fa-arrow-up"></i></a>
    <!-- footer end-->
    <script src="{{ asset('assets/site/js/jquery-3.6.0.min.js') }}"></script>
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
        $('.owl-legal-docs').owlCarousel({
            items: 4,
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 1000,
            autoplayHoverPause: true,

            responsiveClass: true,
            nav: false,
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
                    nav: false,
                    dots: false,
                },
                991: {
                    items: 3,
                    nav: false,
                    dots: true,
                },

            }
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

            // document.addEventListener('click', function(event) {
            //     if (!event.target.closest('.search-trail')) {
            //         dropdownMenu.style.display = 'none';
            //     }
            // });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const filterSpans = document.querySelectorAll('.filter-member span');
            const memberList = document.querySelector('.member-list');
            const memberCards = document.querySelectorAll('.member-list .col-4');

            filterSpans.forEach(span => {
                span.addEventListener('click', () => {
                    const filterValue = span.getAttribute('data-value')[0]
                        .toUpperCase(); // Get the first letter of the filter value and convert to uppercase
                    let hasVisibleMembers = false;

                    memberCards.forEach(card => {
                        const memberName = card.getAttribute('data-member-name')
                            .toUpperCase(); // Convert member name to uppercase
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

    @yield('scripts')
</body>

</html>
