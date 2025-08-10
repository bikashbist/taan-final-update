@extends('front_end.layouts.app')
@section('styles')
@endsection
@section('content')
    <section class="about-us">
        <div class="section-bg-banner">
            <div class="hero-bg">
                <img src="{{ asset('assets/site/images/layout-img/page-title.webp') }}" alt="bg">
            </div>
            <div class="container">
                <div class="section-hero-title">
                    <p class="text-white">Welcome to!</p>
                    <h1 class="text-white">
                        @if (isset($data['branch']->title))
                            {{ $data['branch']->title }}
                        @endif
                    </h1>
                </div>
                <img class="page-title-icon" src="{{ asset('assets/site/images/layout-img/icon-page-title.png') }}"
                    alt="icon">
            </div>
        </div>
    </section>

    <section class="teams py-lg-5 py-3 pb-3">
        <div class="container">
            {{-- <div class="teams__details">
                <div class="row justify-content-center">

                    @if (isset($data['staff']) && count($data['staff']) > 0)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="teams_details_list">
                                <div class="teams_detailslist_box">
                                    <div class="logo-img position-relative">
                                        @if ($data['staff'][0]->image)
                                            <img src="{{ asset($data['staff'][0]->image) }}" alt="" class="img">
                                        @else
                                            <img src="{{ asset('assets/site/images/no-image.jpg') }}" alt=""
                                                class="img">
                                        @endif
                                        <a class="profile-btn"
                                            href="{{ route('site.staff.profile', ['id' => $data['staff'][0]->id]) }}">View
                                            Profile <i class="fa-solid fa-eye"></i></a>
                                    </div>
                                    <div class="text  p-1 text-center position-relative">
                                        <h4 class="mb-0">{{ $data['staff'][0]->name }}</h4>
                                        <span class="py-2 d-block">{{ $data['staff'][0]->designation }}</span>
                                        @if (isset($data['staff'][0]->from_to_date))
                                            <strong>{{ $data['staff'][0]->from_to_date }}</strong>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>


                <div class="row g-4 justify-content-center">
                    @if (isset($data['staff']) && count($data['staff']) > 1)
                        @foreach (collect($data['staff'])->slice(1) as $row)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="teams_details_list">
                                    <div class="teams_detailslist_box">
                                        <div class="logo-img position-relative">
                                            @if ($row->image)
                                                <img src="{{ asset($row->image) }}" alt="" class="img">
                                            @else
                                                <img src="{{ asset('assets/site/images/no-image.jpg') }}" alt=""
                                                    class="img">
                                            @endif
                                            <a class="profile-btn"
                                                href="{{ route('site.staff.profile', ['id' => $row->id]) }}">View Profile
                                                <i class="fa-solid fa-eye"></i></a>
                                        </div>
                                        <div class="text  text-center position-relative">
                                            <h4 class="mb-0">{{ $row->name }}</h4>
                                            <span class="py-2 d-block">{{ $row->designation }}</span>
                                            @if (isset($row->from_to_date))
                                                <strong>{{ $row->from_to_date }}</strong>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-lg-12">
                            <div class="alert alert-warning" role="alert">
                                No Staff Found!
                            </div>
                        </div>
                    @endif
                </div>
            </div> --}}
            <div class="teams__details">
                <div class="row g-4 ">
                    @if (!empty($data['staff']) && count($data['staff']) > 0)
                        @foreach ($data['staff'] as $row)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="teams_details_list">
                                    <div class="teams_detailslist_box">
                                        <div class="logo-img position-relative">
                                            @if ($row->image)
                                                <img src="{{ asset($row->image) }}" alt="" class="img">
                                            @else
                                                <img src="{{ asset('assets/site/images/no-image.jpg') }}" alt=""
                                                    class="img">
                                            @endif
                                            <a class="profile-btn"
                                                href="{{ route('site.staff.profile', ['id' => $row->id]) }}">
                                                View Profile <i class="fa-solid fa-eye"></i>
                                            </a>
                                        </div>
                                        <div class="text text-center position-relative">
                                            <h4 class="mb-0">{{ $row->name }}</h4>
                                            <span class="py-2 d-block">{{ $row->designation }}</span>
                                            @if (!empty($row->from_to_date))
                                                <strong>{{ $row->from_to_date }}</strong>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-lg-12">
                            <div class="alert alert-warning" role="alert">
                                No Staff Found!
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </section>
@endsection

@section('scripts')
@endsection
