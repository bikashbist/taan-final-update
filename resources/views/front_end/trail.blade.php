@extends('front_end.layouts.app')
@section('title', 'Trail')
@section('styles')
    <style>
        .trail-profile--meta-search span {
            color: #424242;
            padding: 6px 20px;
            border-radius: 20px;
            display: inline-block;
            font-weight: 500;
            font-size: 14px;
            margin: 5px 0px;
            background: #FFFFFF;
            border: 1px solid #d9d9d9;
            font-family: "Poppins", sans-serif;
        }
    </style>
@endsection
@section('content')
    <div class="trail-profile  pb-lg-5">
        <div class="container">
            <div class="row ">
                <div class="col-lg-7 col-md-10 col-12 mx-auto">
                    <h1 class="text-center text-white py-lg-5 py-3">Looking For Trekking Trail?</h1>
                    <div class="trail-profile--meta-search text-center">
                        <a href="{{ route('site.searchTrai') }}"><span data-value="Search Trails"> <i
                                    class="fa-solid fa-magnifying-glass"></i> All
                                Trail</span></a>

                        @if (isset($data['trail-category']))
                            @foreach ($data['trail-category']->slice(0, 3) as $row)
                                <a
                                    href="{{ Route::has('site.searchTraiByCategory') ? route('site.searchTraiByCategory', ['id' => $row->id]) : '#' }}"><span
                                        data-value="Existing Trails"> <i class="fa-solid fa-magnifying-glass"></i>
                                        {{ $row->title }}</span></a>
                            @endforeach
                        @else
                            <p>
                                Trail Category Not Found's !
                            </p>
                        @endif
                    </div>
                    <div class="search-trail">
                        <form action="{{ route('site.searchTrai') }}">
                            @csrf <div class="d-flex align-items-center justify-content-between search-trail__search">
                                <div class="search-trail__search--input d-flex align-items-center flex-fill">
                                    <b><i class="fa-solid fa-magnifying-glass"></i></b>
                                    <input id="searchInput" class="search-trail__search--input-type" type="text"
                                        placeholder="Search Trail">
                                </div>
                                <button id="searchButton" class="btn-search" type="submit">
                                    <i class="fa-solid fa-magnifying-glass"></i> Search
                                </button>
                            </div>
                        </form>
                        <ul id="dropdownMenu" class="dropdown-menu search-container"></ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <section class="about-taan my-lg-5">
        @if (isset($data['feature_page'][4]))
            <div class="container">
                <div class="section__title text-center text-lg-start">
                    <h3>
                        {{ $data['feature_page'][4]->title }}
                    </h3>
                    <hr>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-6 pe-lg-4">
                        <p>
                            {!! $data['feature_page'][4]->description !!}
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <div class="taan-trail-video">
                            <!-- <img src="https://taan.prabidhienterprises.com.np/images/about/about_image_2.png" alt="img"> -->
                            <a class="video__wrapper" href="https://www.youtube.com/watch?v=BchpIcqJy8w"
                                data-fancybox="gallery">
                                <img src="https://i3.ytimg.com/vi/cz-X7Ss_Vuw/maxresdefault.jpg" />
                                <div class="video__play-icon">
                                    <span>
                                        <i class="fa-regular fa-circle-play"></i>
                                    </span>

                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <p>
                Content Not Found's !
            </p>
        @endif
    </section>
    <section class="section-trail mb-3">
        <div class="container">
            <div class="section__title text-center text-lg-start">
                @if (isset($data['category'][4]))
                    <h3>{{ $data['category'][4]->title }}</h1>
                @endif
            </div>
            <div class="section-trail__details">
                <div class="row g-4 ">
                    @if (isset($data['category'][4]))
                        @if (isset($data['cat_post_' . $data['category'][4]->title]) &&
                                count($data['cat_post_' . $data['category'][4]->title]) > 0)
                            @foreach ($data['cat_post_' . $data['category'][4]->title] as $row)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                    @if (route('site.post.show', ['id' => $row->post_unique_id]))
                                        <a href="{{ route('site.post.show', ['id' => $row->post_unique_id]) }}">
                                            <div class="section-trail__details__list">
                                                <div class="section-trail__details__list__box">
                                                    <div class="logo-img">
                                                        <img src="{{ asset($row->blog_thumnail) }}" alt=""
                                                            class="img">

                                                        <div class="bagde-flag-wrap">
                                                            <a href="{{ route('site.post.show', ['id' => $row->post_unique_id]) }}"
                                                                class="bagde-flag"> {{ $data['category'][4]->title }} </a>
                                                        </div>
                                                    </div>
                                                    <div class="text">
                                                        <small><i class="fa-solid fa-location-dot"></i>
                                                            {{ $row->trail_address }}
                                                        </small>
                                                        <a
                                                            href="{{ route('site.post.show', ['id' => $row->post_unique_id]) }}">
                                                            <h5>{{ $row->title }}</h5>
                                                        </a>
                                                        <small><i class="fa-regular fa-calendar-days"></i> Duration -
                                                            <b>{{ $row->duration }} Days</b>
                                                        </small>
                                                        <small><i class="fa-solid fa-plane-up"></i> Transport - <b>
                                                                @if (isset($row->postTransport))
                                                                    {{ $row->postTransport->title }}
                                                                @endif
                                                            </b>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div> <!-- list section-trail -->
                                        </a>
                                    @endif
                                </div>
                            @endforeach
                        @else
                            <p>
                                Trail Not Found's !
                            </p>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="section-trail mt-lg-5 my-3">
        <!-- <div class="container">
            <div class="section__title text-center text-lg-start">
                @if (isset($data['category'][1]))
    <h3>{{ $data['category'][1]->title }}</h1>
    @endif
            </div>
            <div class="section-trail__details">
                <div class="row g-4 ">
                    @if (isset($data['category'][1]))
                    @if (isset($data['cat_post_' . $data['category'][1]->title]) &&
                            count($data['cat_post_' . $data['category'][1]->title]) > 0)
                    @foreach ($data['cat_post_' . $data['category'][1]->title] as $row)
    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <a href="{{ route('site.post.show', ['id' => $row->post_unique_id]) }}">
                            <div class="section-trail__details__list">
                                <div class="section-trail__details__list__box">
                                    <div class="logo-img">
                                        <img src="{{ asset($row->blog_thumnail) }}" alt="" class="img">
                                        <div class="bagde-flag-wrap">
                                            <a href="{{ route('site.post.show', ['id' => $row->post_unique_id]) }}" class="bagde-flag"> {{ $data['category'][1]->title }} </a>
                                        </div>
                                    </div>
                                    <div class="text">
                                        <small><i class="fa-solid fa-location-dot"></i> {{ $row->trail_address }}
                                        </small>
                                        <a href="{{ route('site.post.show', ['id' => $row->post_unique_id]) }}">
                                            <h5>{{ $row->title }}</h5>
                                        </a>
                                        <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>{{ $row->duration }} Days</b>
                                        </small>
                                        <small><i class="fa-solid fa-plane-up"></i> Transport - <b> @if (isset($row->postTransport))
    {{ $row->postTransport->title }}
    @endif
                                                Air </b>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
    @endforeach
@else
    <p>
                        Trail Not Found's !
                    </p>
                    @endif
                    @endif
                </div>
            </div>
        </div> -->
    </section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 my-lg-4 pt-3 mt-3">
                <div class="trail-card ">
                    <img src="https://taan.prabidhienterprises.com.np/user/images/home-banner.png" alt="banner">
                    <div class="trail-card__details d-flex justify-content-center align-items-center">
                        <div class="trail-card__content text-center">
                            <h1 class="text-white title">Start planning your next trail adventure</h1>
                            <p class="text-white subtitle ">TAAN helps adventure-seekers plan and book travel to
                                some of the most popular mountain destinations around the Nepal</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section-trail mb-3">
        <!-- <div class="container">
            <div class="section__title text-center text-lg-start">
                @if (isset($data['category'][2]))
    <h3>{{ $data['category'][2]->title }}</h1>
    @endif
            </div>

            <div class="section-trail__details">
                <div class="row g-4 ">
                    @if (isset($data['category'][2]))
                    @if (isset($data['cat_post_' . $data['category'][2]->title]) &&
                            count($data['cat_post_' . $data['category'][2]->title]) > 0)
                    @foreach ($data['cat_post_' . $data['category'][2]->title] as $row)
    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <a href="https://taan.prabidhienterprises.com.np/trail-details">
                            <div class="section-trail__details__list">
                                <div class="section-trail__details__list__box">
                                    <div class="logo-img">
                                        <img src="{{ asset($row->blog_thumnail) }}"
                                            alt="" class="img">
                                        <div class="bagde-flag-wrap">
                                            <a href="{{ route('site.post.show', ['id' => $row->post_unique_id]) }}" class="bagde-flag"> {{ $data['category'][1]->title }} </a>
                                        </div>
                                    </div>
                                    <div class="text">
                                        <small><i class="fa-solid fa-location-dot"></i> {{ $row->trail_address }}
                                        </small>
                                        <a href="{{ route('site.post.show', ['id' => $row->post_unique_id]) }}">
                                            <h5>{{ $row->title }}</h5>
                                        </a>
                                        <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>{{ $row->duration }} Days</b>
                                        </small>
                                        <small><i class="fa-solid fa-plane-up"></i> Transport - <b> @if (isset($row->postTransport))
    {{ $row->postTransport->title }}
    @endif </b>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
    @endforeach
@else
    <p>
                        Trail Not Found's !
                    </p>
                    @endif
                    @endif
                </div>
            </div>
        </div> -->
    </section>
    <section class="section-trail mb-3">
        <!-- <div class="container">
            <div class="section__title text-center text-lg-start">
                @if (isset($data['category'][3]))
    <h3>{{ $data['category'][3]->title }}</h1>
    @endif
            </div>
            <div class="section-trail__details">
                <div class="row g-4 ">
                    @if (isset($data['category'][3]))
                    @if (isset($data['cat_post_' . $data['category'][3]->title]) &&
                            count($data['cat_post_' . $data['category'][3]->title]) > 0)
                    @foreach ($data['cat_post_' . $data['category'][3]->title] as $row)
    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <a href="{{ route('site.post.show', ['id' => $row->post_unique_id]) }}">
                            <div class="section-trail__details__list">
                                <div class="section-trail__details__list__box">
                                    <div class="logo-img">
                                        <img src="{{ asset($row->blog_thumnail) }}"
                                            alt="" class="img">

                                    </div>

                                    <div class="text">

                                        <small><i class="fa-solid fa-location-dot"></i> {{ $row->trail_address }}
                                        </small>
                                        <a href="{{ route('site.post.show', ['id' => $row->post_unique_id]) }}">
                                            <h5>{{ $row->title }}</h5>
                                        </a>
                                        <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>{{ $row->duration }} Days</b>
                                        </small>
                                        <small><i class="fa-solid fa-plane-up"></i> Transport - <b> @if (isset($row->postTransport))
    {{ $row->postTransport->title }}
    @endif </b>
                                        </small>



                                    </div>

                                </div>

                            </div>
                        </a>
                    </div>
    @endforeach
@else
    <p>
                        Trail Not Found's !
                    </p>
                    @endif
                    @endif
                </div>
            </div>
        </div> -->
    </section>
    <section class="section-trail mb-3">
        <!-- <div class="container">
            <div class="section__title text-center text-lg-start">
                @if (isset($data['category'][4]))
    <h3>{{ $data['category'][4]->title }}</h1>
    @endif
            </div>

            <div class="section-trail__details">
                <div class="row g-4 ">
                    @if (isset($data['category'][4]))
                    @if (isset($data['cat_post_' . $data['category'][4]->title]) &&
                            count($data['cat_post_' . $data['category'][4]->title]) > 0)
                    @foreach ($data['cat_post_' . $data['category'][4]->title] as $row)
    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <a href="{{ route('site.post.show', ['id' => $row->post_unique_id]) }}">
                            <div class="section-trail__details__list">
                                <div class="section-trail__details__list__box">
                                    <div class="logo-img">
                                        <img src="{{ asset($row->blog_thumnail) }}"
                                            alt="" class="img">

                                    </div>

                                    <div class="text">

                                        <small><i class="fa-solid fa-location-dot"></i> {{ $row->trail_address }}
                                        </small>
                                        <a href="{{ route('site.post.show', ['id' => $row->post_unique_id]) }}">
                                            <h5>{{ $row->title }}</h5>
                                        </a>
                                        <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>{{ $row->duration }} Days</b>
                                        </small>
                                        <small><i class="fa-solid fa-plane-up"></i> Transport - <b> @if (isset($row->postTransport))
    {{ $row->postTransport->title }}
    @endif
    </b>
                                        </small>



                                    </div>

                                </div>

                            </div>
                        </a>
                    </div>
    @endforeach
@else
    <p>
                        Trail Not Found's !
                    </p>
                    @endif
                    @endif
                </div>
            </div>
        </div> -->
    </section>
    <section class="trail-list-overal  py-lg-5 mb-lg-3 mb-3 ">
        <div class="container">
            <div class="section__title text-center text-lg-start mb-lg-4">
                <h3>
                    Trail by Category
                    </h1>
            </div>
            <div class="row g-2">
                <div class="col-lg-2">
                    <div class="trail-list-overal__details">
                        <h5 class="mb-lg-4">Trail by Season</h5>
                        <ul>
                            @if (isset($data['season']))
                                @foreach ($data['season'] as $row)
                                    <li>
                                        <a
                                            href="{{ Route::has('site.searchBySeason') ? route('site.searchBySeason', ['id' => $row->id]) : '#' }}">
                                            {{ $row->title }}
                                        </a>
                                    </li>
                                @endforeach
                            @else
                                <p>
                                    Season Not Found's !
                                </p>
                            @endif

                        </ul>
                        <div class="img-part-logo">
                            <img src="https://cvsqtgaxsa.cloudimg.io/https://indiahikes.com/assets/icons/seasons.svg?w=960&blur=80&org_if_sml=1"
                                alt="img">
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="trail-list-overal__details">
                        <h5 class="mb-lg-4">Trail by Month</h5>
                        <ul class="d-flex ">
                            @if (isset($data['month']))
                                <div class="w-50">
                                    @foreach ($data['month']->slice(0, 6) as $row)
                                        <li><a
                                                href="{{ Route::has('site.searchByMonth') ? route('site.searchByMonth', ['id' => $row->id]) : '#' }}">{{ $row->title }}
                                            </a>
                                        </li>
                                    @endforeach
                                </div>
                                <div class="w-50">
                                    @foreach ($data['month']->slice(6, 12) as $row)
                                        <li><a
                                                href="{{ Route::has('site.searchByMonth') ? route('site.searchByMonth', ['id' => $row->id]) : '#' }}">{{ $row->title }}
                                            </a>
                                        </li>
                                    @endforeach
                                </div>
                            @else
                                <p>
                                    Month Not Found's !
                                </p>
                            @endif
                        </ul>
                        <div class="img-part-logo">
                            <img src="https://cvsqtgaxsa.cloudimg.io/https://indiahikes.com/assets/icons/months.svg?w=960&blur=80&org_if_sml=1"
                                alt="img">
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="trail-list-overal__details">

                        <h5 class="mb-lg-4">Trail by Duration</h5>

                        <ul>
                            <li><a href="#">1 Day
                                </a></li>
                            <li><a href="#">2 Day
                                </a></li>
                            <li><a href="#">3 Day
                                </a></li>
                            <li><a href="#">4 Day
                                </a></li>
                            <li><a href="#">5 Day
                                </a></li>
                            <li><a href="#">6 Day
                                </a></li>
                            <li><a href="#">7+ Day
                                </a></li>


                        </ul>
                        <div class="img-part-logo">
                            <img src="https://cvsqtgaxsa.cloudimg.io/https://indiahikes.com/assets/icons/duration.svg?w=1920&org_if_sml=1"
                                alt="img">
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="trail-list-overal__details">

                        <h5 class="mb-lg-4">Trail by Difficulty</h5>

                        <ul>
                            @if (isset($data['difficulty']))
                                @foreach ($data['difficulty'] as $row)
                                    <li><a
                                            href="{{ Route::has('site.searchByDifficulty') ? route('site.searchByDifficulty', ['id' => $row->id]) : '#' }}">
                                            {{ $row->title }}
                                        </a>
                                    </li>
                                @endforeach
                            @else
                                <p>
                                    Difficulty Not Found's !
                                </p>
                            @endif
                        </ul>
                        <div class="img-part-logo">
                            <img src="https://cvsqtgaxsa.cloudimg.io/https://indiahikes.com/assets/icons/difficulty.svg?w=960&blur=80&org_if_sml=1"
                                alt="img">
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="trail-list-overal__details">

                        <h5 class="mb-lg-4">Trail by Cultural</h5>

                        <ul>
                            @if (isset($data['culture']))
                                @foreach ($data['culture'] as $row)
                                    <li><a
                                            href="{{ Route::has('site.searchByCultural') ? route('site.searchByCultural', ['id' => $row->id]) : '#' }}">
                                            {{ $row->title }}
                                        </a></li>
                                @endforeach
                            @else
                                <p>
                                    Culture Not Found's !
                                </p>
                            @endif
                        </ul>
                        <div class="img-part-logo">
                            <img src="https://cvsqtgaxsa.cloudimg.io/https://indiahikes.com/assets/icons/specialtreks.svg?w=960&blur=80&org_if_sml=1"
                                alt="img">
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="trail-list-overal__details">
                        <h5 class="mb-lg-4">Trail by Experience</h5>
                        <ul>
                            @if (isset($data['experience']))
                                @foreach ($data['experience'] as $row)
                                    <li><a
                                            href="{{ Route::has('site.searchByExperience') ? route('site.searchByExperience', ['id' => $row->id]) : '#' }}">
                                            {{ $row->title }}
                                        </a></li>
                                @endforeach
                            @else
                                <p>
                                    Experience Not Found's !
                                </p>
                            @endif
                        </ul>
                        <div class="img-part-logo">
                            <img src="https://cvsqtgaxsa.cloudimg.io/https://indiahikes.com/assets/icons/region.svg?w=960&blur=80&org_if_sml=1"
                                alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
