@extends('front_end.layouts.app')
@section('styles')
<style>
    .faq__item {
        width: 100%;
        border: 1px solid #dcdcdc;
        padding: 5px 20px;
    }
</style>
@endsection
@section('content')

<section class="about-us faq profile-page">
    <div class="section-bg-banner">
        <div class="hero-bg">
            <img src="{{asset('assets/site/images/layout-img/page-title.webp')}}" alt="bg">
        </div>
        <div class="container">
            <div class="section-hero-title">
                <p class="text-white"> What help you?</p>
                <h1 class="text-white">FAQ</h1>


            </div>
            <img class="page-title-icon" src="{{asset('assets/site/images/layout-img/icon-page-title.png')}}" alt="icon">
        </div>
    </div>
    <div class="container">
        <div class="row g-5 justify-content-center">

            <div class="col-lg-12 py-lg-5 py-3">
                <div class=" mb-lg-5">
                    <h1>We will help you!</h1>
                    {{-- <h2 class="mb-4">FAQs</h2> --}}
                    <p>An FAQ page is an important part of any business website. Learn the best strategies for creating
                        FAQ
                        pages
                        that convert site visitors into paying customers.Some of the best treks of our country, are
                        accessible for hardly 3-4 months a year, in August and September. These are our treks in
                        Himachal Pradesh and J&K. Time your trek in Aug for maximum flowers, Sept for terrific colours!
                    </p>
                </div>
                <div class="accordion" id="accordionExample">
                    @if(isset($data['faq']) && $data['faq']->count() > 0)
                    @foreach($data['faq'] as $row)
                    <div class="faq__item my-1">
                        <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{$row->id}}" aria-expanded="true" aria-controls="{{$row->id}}">
                            <h5>{{ $row->question}}</h5>
                        </a>
                        <div id="{{$row->id}}" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>
                                    {{ $row->answer}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="faq__item">
                        <h5>Not FAQ Found's !</h5>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection