@extends('front_end.layouts.app')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <link rel="stylesheet" href="{{ asset('user/css/owl.carousel.min.css') }} ">
    {{-- <link rel="stylesheet" href="{{asset('user/scss/style.css')}}"> --}}
@endsection
@section('content')

    <div class="trail-profile member-search pb-lg-5">
        <div class="container py-lg-5">
            <div class="row">
                <div class="col-lg-7 col-md-10 col-12 mx-auto">
                    <h3 class="text-center text-white py-lg-4 py-3">Looking For Trekking Agencies</h3>
                    <!-- <h5 class="text-center text-white member-filter-title mb-3">Filter Alphabetically</h5> -->
                    <input type="hidden" value="{{ !empty($memberType->id) ? $memberType->id : '' }}" id="member-type-id">
                    <div class="filter-member text-center">
                        @foreach (range('A', 'Z') as $letter)
                            <a href="{{ route('site.filterByLetter', $letter) }}"> <span> {{ $letter }}</span></a>
                        @endforeach
                    </div>
                    <div class="search-trail">
                        <form id="searchForm" action="{{ route('site.searchByName') }}">
                            @csrf
                            <div class="d-flex align-items-center justify-content-between search-trail__search">
                                <div class="search-trail__search--input d-flex align-items-center flex-fill">
                                    <b><i class="fa-solid fa-magnifying-glass"></i></b>
                                    <input id="search" name="search" class="search-trail__search--input-type"
                                        type="text" placeholder="Search Member">
                                </div>
                                <button id="searchButton" class="btn-search" type="submit">
                                    <i class="fa-solid fa-magnifying-glass"></i> Search
                                </button>
                            </div>
                        </form>
                        @if (isset($data['total']))
                            <h6 style="color: #fff;">Search Result {{ $data['total'] }} Member's !</h6>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="member-list">
        <div class="container">
            <div class="member-details p-lg-4 p-3 row g-4">
                @if (isset($data['search']) && $data['search']->count() > 0)
                    @foreach ($data['search'] as $row)
                        <div class="col-12 col-md-4 col-lg-3" data-member-name="{{ $row->organization_name }}"
                            style="display: block;">
                            <div class="card text-center">
                                @if (isset($row->company_cover_image))
                                    <img class="card-img-top bg-success" src="{{ asset($row->company_cover_image) }}">
                                @else
                                    @if (isset($all_view['setting']->logo))
                                        <img class="card-img-top bg-success" src="{{ asset($all_view['setting']->logo) }}">
                                    @endif
                                @endif

                                @if (isset($row->company_logo))
                                    <img class="card-img-avatar rounded-circle" src="{{ asset($row->company_logo) }}">
                                @else
                                    <img class="card-img-avatar rounded-circle"
                                        src="{{ asset('assets/site/images/blank.png') }}">
                                @endif
                                <p>1234566789</p>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $row->organization_name }}</h5>
                                    <a href="{{ route('site.single.member', ['member_id' => $row->member_id]) }}"
                                        class="btn-view-more">View Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Member Not Found's !</p>
                @endif
            </div>
        </div>
    </div>

    <!-- <div class="section mt-lg-5">
            <div class="container justify-content-center">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="banner2-card five">
                            <img src="https://demo-egenslab.b-cdn.net/html/triprex/preview/assets/img/home3/banner4-card-img2.png"
                                alt="">
                            <div class="banner2-content-wrap d-flex align-items-center">
                                <div class="w-100 d-flex flex-column align-items-end">
                                    <div class="banner2-content">
                                        <span>Connect With Us</span>
                                        <h5>Up to <span>2500 +</span> Members.</h5>
                                        <a href="{{ route('site.index') }}" class="secondary-btn1">Contact Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="banner4-card four">
                            <img src="https://demo-egenslab.b-cdn.net/html/triprex/preview/assets/img/home3/banner4-card-img1.png"
                                alt="">
                            <div class="banner4-content-wrapper">
                                <div class="banner4-content">
                                    <span>About Trail</span>
                                    <h3>225 + <small>More</small></h3>
                                    <a href="#" class="text">Discover Trail</a>
                                    <a href="{{ route('site.trail') }}" class="primary-btn1">View The Trail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
@endsection
@section('scripts')
@endsection
