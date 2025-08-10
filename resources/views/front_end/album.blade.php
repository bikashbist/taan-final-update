@extends('front_end.layouts.app')
@section('styles')
@endsection
@section('content')
<section class="about-us gallery-page ">
    <div class="section-bg-banner">
        <div class="hero-bg">
            <img src="{{ asset('assets/site/images/layout-img/page-title.webp') }}" alt="bg">
        </div>
        <div class="container">
            <div class="section-hero-title">
                <p class="text-white"> Welcome to!</p>
                <h1 class="text-white">Photo Album</h1>
            </div>
            <img class="page-title-icon" src="{{ asset('assets/site/images/layout-img/icon-page-title.png') }}"
                alt="icon">
        </div>
    </div>
</section>
<section class="gallery-part mt-lg-5 mt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    @if(isset($data['category']) && count($data['category']) > 0)
                    @foreach ($data['category'] as $row)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="{{$row->id}}" data-bs-toggle="tab" data-bs-target="#content_{{ $row->id }}"
                            type="button" role="tab" aria-controls="{{$row->id }}" aria-selected="true">{{ $row->title }}
                        </button>
                    </li>
                    @endforeach
                    @else
                    <p>Category Not Found's !</p>
                    @endif
                </ul>
                <div class="tab-content" id="myTabContent">
                    @if(isset($data['category']) && count($data['category']) > 0)
                    @foreach ($data['category'] as $row)
                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="content_{{ $row->id }}" role="tabpanel" aria-labelledby="{{$row->category_id}}"
                        tabindex="0">
                        <section class="teams pt-lg-5 pt-4 pb-lg-5 pb-3">
                            <div class="teams__details">
                                <div class="row g-4 content_gallery">
                                    @if(isset($row->albums))
                                    @foreach($row->albums as $row)
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 ">
                                        @if (Route::has('site.album.show'))
                                        <a href="{{ route('site.album.show', ['id' => $row->id]) }}"
                                            class="swipebox" title="A Small Taan Tour">
                                            <img decoding="async" src="{{ asset($row->image) }}"
                                                alt="A Small Taan Tour">
                                            <span class="gallery-item">
                                                <h4 class="title">{{ $row->title }}</h4>
                                            </span>
                                        </a>
                                        @endif
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </section>
                    </div>
                    @endforeach
                    @else
                    <p>Categort Not Found's !</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
@endsection