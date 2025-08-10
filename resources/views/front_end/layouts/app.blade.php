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
    <style>
        /* .custom-modal {
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100vw;
            height: 100vh;
            padding-top: 200px;
            background-color: rgba(0, 0, 0, 0.6);
            overflow-y: auto;
            /* enables scroll
        }

        .custom-modal-content {
            background-color: white;
            width: 600px;
            max-width: 90%;
            padding: 30px;
            border-radius: 10px;
            margin-top: 100px;
            position: relative;
            animation: fadeIn 0.3s ease-in-out;
            margin-top: 0px
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 24px;
            cursor: pointer;
        }

        .img-notice {
            width: 100%;
        }
        .close-btn{
            width: 30px;
            height: 30px;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;

        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }*/
        .custom-modal-width {
            max-width: 600px;
            width: 100%;
        }

        .img-notice {
            width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .popup-item {
            text-align: center;
            padding: 10px;
        }

        .popup-title h6 {
            color: #333;
            font-weight: 600;
            margin: 0;
        }

        .popup-item a {
            text-decoration: none;
            display: block;
        }

        .popup-item a:hover .img-notice {
            transform: scale(1.02);
            transition: transform 0.3s ease;
        }

        a {
            text-decoration: none !important;
        }
    </style>
    @yield('styles')
    <style>
        .footer {
            span {
                color: #c2c2c2 !important;
            }
        }

        img.img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <!-- header start -->
    @include('front_end.includes.header')
    <!-- header end -->
    <!-- navbar start -->
    @include('front_end.includes.navbar')
    <!-- navbar end  -->
    @yield('content')

    <!-- Modal (button removed) -->
    @if (isset($all_view['popups']) && count($all_view['popups']) > 0)
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog custom-modal-width">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">
                            {{ $all_view['popups'][0]->title ?? 'Notice' }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="owl-carousel owl-theme owl-notice-board">
                            @foreach ($all_view['popups'] as $popup)
                                <div class="popup-item">
                                    @if ($popup->url)
                                        <a href="{{ $popup->url }}" target="_blank">
                                            <img src="{{ asset($popup->image) }}" class="img-notice"
                                                alt="{{ $popup->title }}" title="{{ $popup->title }}">
                                        </a>
                                    @else
                                        <img src="{{ asset($popup->image) }}" class="img-notice"
                                            alt="{{ $popup->title }}" title="{{ $popup->title }}">
                                    @endif
                                    @if ($popup->title)
                                        <div class="popup-title mt-2 text-center">
                                            <h6>{{ $popup->title }}</h6>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif



    @include('front_end.includes.footer')
    <a href="#" class="scrollToTop scroll-btn show"><i class="fa-solid fa-arrow-up"></i></a>
    <!-- footer end-->
    <script src="{{ asset('assets/site/js/jquery-3.6.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('user/js/owl.carousel.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
    <!-- Script to auto-show modal -->

    <script>
        $(document).ready(function() {
            $(".owl-notice-board").owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                dots: true,
                items: 1,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                navText: [
                    '<i class="fas fa-chevron-left"></i>',
                    '<i class="fas fa-chevron-right"></i>'
                ]
            });
        });

        function closeModal() {
            document.getElementById('popupModal').style.display = 'none';
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (isset($all_view['popups']) && count($all_view['popups']) > 0)
                // Check if popup was closed recently (within 24 hours)
                var popupClosed = localStorage.getItem('popupClosed');
                var currentTime = new Date().getTime();
                var oneDayInMs = 24 * 60 * 60 * 1000; // 24 hours in milliseconds

                if (!popupClosed || (currentTime - parseInt(popupClosed)) > oneDayInMs) {
                    var modalElement = document.getElementById('staticBackdrop');
                    if (modalElement) {
                        var myModal = new bootstrap.Modal(modalElement);
                        myModal.show();

                        // Store timestamp when popup is closed
                        modalElement.addEventListener('hidden.bs.modal', function() {
                            localStorage.setItem('popupClosed', currentTime.toString());
                        });
                    }
                }
            @endif
        });
    </script>
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
        $('.owl-strategy-partners').owlCarousel({
            items: 2,
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 2500,
            autoplayHoverPause: true,
            responsiveClass: true,
            nav: false,
            dots: false,
            slideBy: 2, // Moves 2 items per slide (default behavior)
            margin: 20,
            navText: [
                '<span class="fas fa-chevron-left fa-1x"></span>',
                '<span class="fas fa-chevron-right fa-1x"></span>'
            ],
            responsive: {
                0: {
                    items: 1,
                    nav: false,
                    dots: true
                },
                450: {
                    items: 1,
                    nav: false,
                    dots: true
                },
                575: {
                    items: 1,
                    nav: false,
                    dots: true
                },
                767: {
                    items: 2,
                    nav: false,
                    dots: false
                },
                991: {
                    items: 2,
                    nav: false,
                    dots: false
                },
                1199: {
                    items: 2,
                    nav: false,
                    dots: false
                },
                1399: {
                    items: 2,
                    nav: false,
                    dots: false
                },
                1439: {
                    items: 2,
                    nav: false,
                    dots: false
                }
            }
        });

        $('.owl-working-partners').owlCarousel({
            items: 2,
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsiveClass: true,
            nav: false,
            dots: false,
            slideBy: 1, // Moves only one item at a time
            rtl: true, // Makes the slider move in the opposite direction
            margin: 20,
            navText: [
                '<span class="fas fa-chevron-left fa-1x"></span>',
                '<span class="fas fa-chevron-right fa-1x"></span>'
            ],
            responsive: {
                0: {
                    items: 1,
                    nav: false,
                    dots: true
                },
                450: {
                    items: 1,
                    nav: false,
                    dots: true
                },
                575: {
                    items: 1,
                    nav: false,
                    dots: true
                },
                767: {
                    items: 2,
                    nav: false,
                    dots: false
                },
                991: {
                    items: 2,
                    nav: false,
                    dots: false
                },
                1199: {
                    items: 2,
                    nav: false,
                    dots: false
                },
                1399: {
                    items: 2,
                    nav: false,
                    dots: false
                },
                1439: {
                    items: 2,
                    nav: false,
                    dots: false
                }
            }
        });

        $('.owl-working-partners').owlCarousel({
            items: 2,
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,

            responsiveClass: true,
            nav: false,

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
                    items: 2,
                    nav: false,
                    dots: false,
                },
                1199: {
                    items: 2,
                    nav: false,
                    dots: false,
                },
                1399: {
                    items: 2,
                    nav: false,
                    dots: false,

                },
                1439: {
                    items: 2,
                    nav: false,
                    dots: false,

                }
            }
        });

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
