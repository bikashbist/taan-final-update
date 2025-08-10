@extends('front_end.layouts.app')
@section('styles')
@endsection
@section('content')
    <section class="about-us ">
        <div class="section-bg-banner">
            <div class="hero-bg">
                <img src="{{ asset('assets/site/images/layout-img/page-title.webp') }}" alt="bg">
            </div>
            <div class="container">
                <div class="section-hero-title">
                    <p class="text-white"> Welcome to!</p>
                    <h1 class="text-white">Departments</h1>


                </div>
                <img class="page-title-icon" src="{{ asset('assets/site/images/layout-img/icon-page-title.png') }}"
                    alt="icon">
            </div>
        </div>

    </section>
    <section class="teams py-lg-5 py-3 pb-3">
        <div class="container">
            <div class="teams__details">
                <div class="row g-4 justify-content-center ">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="teams__details__list">
                            <div class="teams__details__list__box">
                                <div class="logo-img position-relative">
                                    <img src="{{ asset('assets/site/images/team/krishna-parsad-dahal-1.jpg') }}"
                                        alt="" class="img">
                                    <a class="profile-btn" href="#">View Profile <i class="fa-solid fa-eye"></i></a>

                                </div>

                                <div class="text p-lg-4 p-3 text-center position-relative">
                                    <h4 class="mb-0">
                                        Krishna Prasad Dahal</h4>
                                    <span class="py-2 d-block">Trekkers' Information Management System (TIMS) Management
                                    </span>


                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="teams__details__list h-100">
                            <div class="teams__details__list__box h-100">
                                <div class="logo-img position-relative">
                                    <img src="{{ asset('assets/site/images/team/pradip-pandit-1.jpg') }}" alt=""
                                        class="img">
                                    <a class="profile-btn" href="#">View Profile <i class="fa-solid fa-eye"></i></a>

                                </div>

                                <div class="text p-lg-4 p-3 text-center position-relative">
                                    <h4 class="mb-0">
                                        Pradip Pandit</h4>
                                    <span class="py-2 d-block"> Nepal Promotion & Exhibition
                                    </span>


                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="teams__details__list">
                            <div class="teams__details__list__box">
                                <div class="logo-img position-relative">
                                    <img src="{{ asset('assets/site/images/team/dhan-bahadur-gurung.jpg') }}" alt=""
                                        class="img">
                                    <a class="profile-btn" href="#">View Profile <i class="fa-solid fa-eye"></i></a>

                                </div>

                                <div class="text p-lg-4 p-3 text-center position-relative">
                                    <h4 class="mb-0"> Dhan Bahadur Gurung</h4>
                                    <span class="py-2 d-block">Destination Research and Promotion
                                    </span>


                                </div>

                            </div>

                        </div>
                    </div>


                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="teams__details__list">
                            <div class="teams__details__list__box">
                                <div class="logo-img position-relative">
                                    <img src="{{ asset('assets/site/images/team/binod-sapkota-taan-team.jpg') }}"
                                        alt="" class="img">
                                    <a class="profile-btn" href="#">View Profile <i class="fa-solid fa-eye"></i></a>


                                </div>

                                <div class="text p-lg-4 p-3 text-center position-relative">
                                    <h4 class="mb-0">Binod Sapkota</h4>
                                    <span class="py-2 d-block">Secretariat Management Department
                                    </span>


                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="teams__details__list">
                            <div class="teams__details__list__box">
                                <div class="logo-img position-relative">
                                    <img src="{{ asset('assets/site/images/team/homnath.jpg') }}" alt=""
                                        class="img">
                                    <a class="profile-btn" href="#">View Profile <i class="fa-solid fa-eye"></i></a>


                                </div>

                                <div class="text p-lg-4 p-3 text-center position-relative">
                                    <h4 class="mb-0">
                                        Homnath Bhattarai</h4>
                                    <span class="py-2 d-block"> Human Resource & Training
                                    </span>


                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="teams__details__list">
                            <div class="teams__details__list__box">
                                <div class="logo-img position-relative">
                                    <img src="{{ asset('assets/site/images/team/puru.jpg') }}" alt=""
                                        class="img">
                                    <a class="profile-btn" href="#">View Profile <i class="fa-solid fa-eye"></i></a>


                                </div>

                                <div class="text p-lg-4 p-3 text-center position-relative">
                                    <h4 class="mb-0">
                                        Purushotam Timalsena</h4>
                                    <span class="py-2 d-block">Finance Management Department
                                    </span>


                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="teams__details__list">
                            <div class="teams__details__list__box">
                                <div class="logo-img position-relative">
                                    <img src="{{ asset('assets/site/images/team/chhin.jpg') }}" alt=""
                                        class="img">
                                    <a class="profile-btn" href="#">View Profile <i
                                            class="fa-solid fa-eye"></i></a>


                                </div>

                                <div class="text p-lg-4 p-3 text-center position-relative">
                                    <h4 class="mb-0">
                                        Chhing Dorchi Sherpa
                                    </h4>
                                    <span class="py-2 d-block">Welfare & Humanitarian
                                    </span>


                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="teams__details__list">
                            <div class="teams__details__list__box">
                                <div class="logo-img position-relative">
                                    <img src="{{ asset('assets/site/images/team/ram-banjara-1.jpg') }}" alt=""
                                        class="img">
                                    <a class="profile-btn" href="#">View Profile <i
                                            class="fa-solid fa-eye"></i></a>


                                </div>

                                <div class="text p-lg-4 p-3 text-center position-relative">
                                    <h4 class="mb-0">
                                        Ram Prasad Banjara</h4>
                                    <span class="py-2 d-block">International Relation

                                    </span>


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
