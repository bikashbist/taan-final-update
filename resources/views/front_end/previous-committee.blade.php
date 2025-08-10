@extends('front_end.layouts.app')
@section('styles')
@endsection
@section('content')
<section class="about-us ">
    <div class="section-bg-banner">
        <div class="hero-bg">
            <img src="https://taan.prabidhienterprises.com.np/user/images/layout-img/page-title.webp" alt="bg">
        </div>
        <div class="container">
            <div class="section-hero-title">
                <p class="text-white"> Welcome to!</p>
                <h1 class="text-white">Previous Executive Committees</h1>
            </div>
            <img class="page-title-icon" src="https://taan.prabidhienterprises.com.np/user/images/layout-img/icon-page-title.png" alt="icon">
        </div>
    </div>
</section>
<section class="teams py-lg-5 py-3 pb-3">
    <div class="container">
        <div class="teams__details">
            <div class="faq__details position-relative">
                <div class="accordion" id="accordionExample">
                    @if(isset($data['committee']) && count($data['committee']) > 0)
                    @foreach($data['committee'] as $row)
                    <div class=" team-list-faq-style">
                        <a class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#{{$row->id}}" aria-expanded="true" aria-controls="{{$row->id}}">
                            <h5>{{ $row->title }}</h5>
                        </a>

                        <div id="{{$row->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
                            <div class="accordion-body">
                                <table class="table table-hover  ">
                                    {!! $row->description !!}
                                </table>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-lg-12">
                        <div class="alert alert-warning" role="alert">
                            No Previous Executive Committee Found!
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
@section('scripts')
@endsection