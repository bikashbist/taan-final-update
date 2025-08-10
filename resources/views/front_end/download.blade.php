@extends('front_end.layouts.app')
@section('content')


    <section class="about-us gallery-page ">
        <div class="section-bg-banner">
            <div class="hero-bg">
                <img src="{{asset('assets/site/images/layout-img/page-title.webp')}}"  alt="bg">
            </div>
            <div class="container">
                <div class="section-hero-title">
                    <p class="text-white"> Welcome to!</p>
                    <h1 class="text-white">Downloads</h1>


                </div>
                <img class="page-title-icon" src="{{asset('assets/site/images/layout-img/icon-page-title.png')}}" alt="icon">
            </div>
        </div>

    </section>

    <section class="newsletter py-lg-5 py-3">
        <div class="container">
            <div class="newsletter__details">
                <div class="row mb-4 g-0 ">
                    <div class="col-lg-5">
                        <iframe src="https://www.taan.org.np/public/files/download/download_eNews_Vol_I_Year_XII.pdf" width="100%" height="100%">
                            
                        </iframe>
                    </div>
                    <div class="col-lg-7">
                        <div class="newsletter__file h-100 p-5">
                          
                        <h3 > Agreement between TAAN & Workers' Unions - 2069 B.S</h3>

                        <p >Tej Bahadur Gurung, 1st Vice President of TAAN and coordinator of TAAN Lhosar Cultural
                            Program 2016, the association is organizing the festival in Hyatt Regency Kathmandu to
                            make it more managed and entertaining. "There will be cultural programs of Gurungs,
                            Tamangs and Sherpas as well as different entertainment programs and other fun-filled
                            events," he said, adding, "There will be a buffet dinner where tourism entrepreneurs can
                            enjoy the evening with their friends and families."</p>
                            <a class="read-more text-white" href="https://www.taan.org.np/public/files/download/download_eNews_Vol_I_Year_XII.pdf" download>Downloads</a>
                        </div>
                    
                           
                       
                    </div>

                


                </div>
             
                <div class="row mb-4 g-0 ">
                    <div class="col-lg-5">
                        <div class="logo-img h-100">
                            <img src="{{ asset('user/images/trail/Climbers-side-Nepali-Mount-Everest.webp') }}"
                                alt="" class="img">

                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="newsletter__file h-100 p-5">
                          
                        <h3 >TAAN Lhosar Cultural Program 2016 on February 19</h3>

                        <p >Tej Bahadur Gurung, 1st Vice President of TAAN and coordinator of TAAN Lhosar Cultural
                            Program 2016, the association is organizing the festival in Hyatt Regency Kathmandu to
                            make it more managed and entertaining. "There will be cultural programs of Gurungs,
                            Tamangs and Sherpas as well as different entertainment programs and other fun-filled
                            events," he said, adding, "There will be a buffet dinner where tourism entrepreneurs can
                            enjoy the evening with their friends and families."</p>
                            <a class="read-more text-white" href="#">Read More</a>
                        </div>

                    
                           
                       
                    </div>

                


                </div>
            </div>
    </section>

@endsection