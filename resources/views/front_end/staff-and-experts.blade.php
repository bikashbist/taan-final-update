@extends('front_end.layouts.app')
@section('styles')
@endsection
@section('content')
<section class="about-us ">
    <div class="section-bg-banner">
        <div class="hero-bg">
            <img src="{{asset('assets/site/images/layout-img/page-title.webp')}}"  alt="bg">
        </div>
        <div class="container">
           <div class="section-hero-title">
            <p class="text-white"> Welcome to!</p>
            <h1 class="text-white">Our Amazing Team</h1>

          
           </div>
           <img class="page-title-icon" src="{{asset('assets/site/images/layout-img/icon-page-title.png')}}" alt="icon">        </div>
    </div>
   
</section>
<section class="teams py-lg-5 pb-3 py-3">
    <div class="container">
        <div class="teams__details">
            <div class="row g-4 justify-content-center ">
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="teams__details__list">
                        <div class="teams__details__list__box">
                            <div class="logo-img position-relative">
                                <img src="{{ asset('assets/site/images/team/ram-sir.jpg') }}"
                                alt="" class="img">
                                <a class="profile-btn" href="#">View Profile <i class="fa-solid fa-eye"></i></a>
                              
                            </div>

                            <div class="text p-lg-4 p-3 text-center position-relative">
                                <h4 class="mb-0">Ram Chandra Sedai</h4>
                                <span class="py-2 d-block"> Chief Executive Officer
                                </span>
                                {{-- <div class="teams__social-media d-flex justify-content-center  ">
                                    <a class="bg-facebook" href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a class="bg-insta" href="#"><i class="fa-brands fa-instagram"></i></a>
                                    <a class="bg-twitter" href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                </div> --}}
                            </div>

                        </div>

                    </div> 
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="teams__details__list">
                        <div class="teams__details__list__box">
                            <div class="logo-img position-relative">
                                <img src="{{ asset('assets/site/images/team/sarita-simkhada-finace-officer.jpg') }}"
                                alt="" class="img">
                                <a class="profile-btn" href="#">View Profile <i class="fa-solid fa-eye"></i></a>
                              
                            </div>

                            <div class="text p-lg-4 p-3 text-center position-relative">
                                <h4 class="mb-0"> Sarita Simkhada</h4>
                                <span class="py-2 d-block"> Account Officer
                                </span>
                                {{-- <div class="teams__social-media d-flex justify-content-center  ">
                                    <a class="bg-facebook" href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a class="bg-insta" href="#"><i class="fa-brands fa-instagram"></i></a>
                                    <a class="bg-twitter" href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                </div> --}}
                            </div>

                        </div>

                    </div> 
                </div>
               <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="teams__details__list">
                        <div class="teams__details__list__box">
                            <div class="logo-img position-relative">
                                <img src="{{ asset('assets/site/images/team/ina-2.jpg') }}"
                                alt="" class="img">
                                <a class="profile-btn" href="#">View Profile <i class="fa-solid fa-eye"></i></a>
                              
                            </div>

                            <div class="text p-lg-4 p-3 text-center position-relative">
                                <h4 class="mb-0"> Ina Shrestha</h4>
                                <span class="py-2 d-block">Planning & HR Officer
                                </span>
                                {{-- <div class="teams__social-media d-flex justify-content-center  ">
                                    <a class="bg-facebook" href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a class="bg-insta" href="#"><i class="fa-brands fa-instagram"></i></a>
                                    <a class="bg-twitter" href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                </div> --}}
                            </div>

                        </div>

                    </div> 
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="teams__details__list">
                        <div class="teams__details__list__box">
                            <div class="logo-img position-relative">
                                 <img src="{{ asset('assets/site/images/team/ambika.jpg') }}"
                                alt="" class="img">
                                <a class="profile-btn" href="#">View Profile <i class="fa-solid fa-eye"></i></a>
                              
                            </div>

                            <div class="text p-lg-4 p-3 text-center position-relative">
                                <h4 class="mb-0"> Ambika Adhikari</h4>
                                <span class="py-2 d-block">Admin Officer
                                </span>
                                {{-- <div class="teams__social-media d-flex justify-content-center  ">
                                    <a class="bg-facebook" href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a class="bg-insta" href="#"><i class="fa-brands fa-instagram"></i></a>
                                    <a class="bg-twitter" href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                </div> --}}
                            </div>

                        </div>

                    </div> 
                </div>
              
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="teams__details__list">
                        <div class="teams__details__list__box">
                            <div class="logo-img position-relative">
                                <img src="{{ asset('assets/site/images/team/raju.jpg') }}"
                                alt="" class="img">
                         
                              
                            </div>

                            <div class="text p-lg-4 p-3 text-center position-relative">
                                <h4 class="mb-0"> Raju Chitrakar</h4>
                                <span class="py-2 d-block">Logistic Officer
                                </span>
                                {{-- <div class="teams__social-media d-flex justify-content-center  ">
                                    <a class="bg-facebook" href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a class="bg-insta" href="#"><i class="fa-brands fa-instagram"></i></a>
                                    <a class="bg-twitter" href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                </div> --}}
                            </div>

                        </div>

                    </div> 
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="teams__details__list">
                        <div class="teams__details__list__box">
                            <div class="logo-img position-relative">
                                <img src="{{ asset('assets/site/images/team/tek-bdr-lama.jpg') }}"
                                alt="" class="img">
                              
                              
                            </div>

                            <div class="text p-lg-4 p-3 text-center position-relative">
                                <h4 class="mb-0"> Tek Bahadur Lama</h4>
                                <span class="py-2 d-block"> Assistant
                                </span>
                                {{-- <div class="teams__social-media d-flex justify-content-center  ">
                                    <a class="bg-facebook" href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a class="bg-insta" href="#"><i class="fa-brands fa-instagram"></i></a>
                                    <a class="bg-twitter" href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                </div> --}}
                            </div>

                        </div>

                    </div> 
                </div>
             
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="teams__details__list">
                        <div class="teams__details__list__box">
                            <div class="logo-img position-relative">
                                <img src="{{ asset('assets/site/images/team/laxmi_bhattarai.jpg') }}"
                                alt="" class="img">
                              
                              
                            </div>

                            <div class="text p-lg-4 p-3 text-center position-relative">
                                <h4 class="mb-0"> Laxmi Bhattarai</h4>
                                <span class="py-2 d-block">House Keeping
                                </span>
                                {{-- <div class="teams__social-media d-flex justify-content-center  ">
                                    <a class="bg-facebook" href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a class="bg-insta" href="#"><i class="fa-brands fa-instagram"></i></a>
                                    <a class="bg-twitter" href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                </div> --}}
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