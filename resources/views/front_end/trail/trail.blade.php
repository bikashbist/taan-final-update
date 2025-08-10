@extends('front_end.layouts.app')
@section('content')
    <div class="trail-profile  pb-lg-5">
        <div class="container">
            <div class="row ">
                <div class="col-lg-7 col-md-10 col-12 mx-auto">
                    <h1 class="text-center text-white py-lg-5 py-3">Looking For New Trail?</h1>
                    <div class="trail-profile--meta-search text-center">
                        <span data-value="All Trails"> <i class="fa-solid fa-magnifying-glass"></i> All
                            Trail</span>
                        <span data-value="Upsection-trail Trails"> <i class="fa-solid fa-magnifying-glass"></i>
                            Up Coming Trail</span>
                        <span data-value="New Trails"> <i class="fa-solid fa-magnifying-glass"></i> New Trail</span>
                        <span data-value="Existing Trails"> <i class="fa-solid fa-magnifying-glass"></i> Existing
                            Trail</span>
                    </div>
                    <div class="search-trail">
                        <form id="searchForm" action="#">
                            <div class="d-flex align-items-center justify-content-between search-trail__search">
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
                        {{-- <ul id="dropdownMenu" class="dropdown-menu search-container"></ul> --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
<div class="trailResults">

    {{-- trail defination --}}
    {{-- @dd($all_view['feature_page']) --}}
    @if(isset($all_view['feature_page'][6]))
        <section class="about-taan my-lg-5">
            <div class="container">
                <div class="section__title text-center text-lg-start">
                    <h3>{{ $all_view['feature_page'][6]->title }} </h1>
                    <hr>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-6 pe-lg-4">
                        <p>{{ $all_view['feature_page'][6]->description }}</p>

                    </div>
                    <div class="col-lg-6">
                        <div class="taan-trail-video">
                            <!-- <img src="{{ asset('') }}images/about/about_image_2.png" alt="img"> -->
                            <a class="video__wrapper" href="{{ $all_view['feature_page'][6]->url }}" data-fancybox="gallery">
                                @if($all_view['feature_page'][6]->thumbs != null && file_exists(getcwd().$all_view['feature_page'][6]->thumbs))
                                <img src="{{ asset($all_view['feature_page'][6]->thumbs) }}" />
                                @else
                                    <p>No image</p>
                                @endif
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

        </section>
    @endif
    {{-- trail defination end --}}
    {{-- trail category  start --}}
    @if(isset($data['categories']) &&  $data['categories']->count() > 0)
    @foreach ( $data['categories'] as $key => $category)
    @if(!$category->posts->isEmpty() && $category->posts->count() > 0)
    <section class="section-trail mb-3">
        <div class="container">
            <div class="section__title text-center text-lg-start">
                <h3>{{ $category->title }}</h1>
            </div>
            <div class="section-trail__details">
                <div class="row g-4 ">
                    @foreach($category->posts as $key => $row)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <a href="{{ route('site.post.show', ['id'=> $row->post_unique_id]) }}">
                            <div class="section-trail__details__list">
                                <div class="section-trail__details__list__box">
                                    <div class="logo-img">
                                        @if(isset($row->thumbs) && !empty($row->thumbs) && file_exists(getcwd().($row->thumbs)))
                                        <img src="{{ asset($row->thumbs) }}" alt="" class="img">
                                        @else
                                        <p>Image Not Found's !</p>
                                        @endif
                                        <div class="bagde-flag-wrap">
                                            <a href="#" class="bagde-flag"> Top Trail </a>
                                        </div>
                                    </div>

                                    <div class="text">

                                        <small><i class="fa-solid fa-location-dot"></i> {{ $row->trail_address }}
                                        </small>
                                        <a href="{{ route('site.post.show', ['id'=> $row->post_unique_id]) }}">
                                            <h5>{{ $row->title }}</h5>
                                        </a>
                                        <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>{{ $row->durations }} days</b>
                                        </small>
                                        <small><i class="fa-solid fa-plane-up"></i> Transport - <b> @if(isset($row->TransportCategory)) {{ $row->TransportCategory->title }} @endif
                                            </b>
                                        </small>



                                    </div>

                                </div>

                            </div> <!-- list section-trail -->
                        </a>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
    @endif
    @endforeach

    @endif
    @if(isset($all_view['feature_page'][5]))
    <div class="container">
        <div class="row">

            <div class="col-lg-12 my-lg-4 pt-3 mt-3">
                <div class="trail-card ">
                    @if($all_view['feature_page'][5]->thumbs != null && file_exists(getcwd().$all_view['feature_page'][5]->thumbs))
                    <img src="{{ asset($all_view['feature_page'][5]->thumbs) }}" alt="banner">
                    @else
                    @endif
                    <div class="trail-card__details d-flex justify-content-center align-items-center">
                        <div class="trail-card__content text-center">
                            <h1 class="text-white title">{{ $all_view['feature_page'][5]->title }}</h1>
                            <p class="text-white subtitle ">{!! $all_view['feature_page'][5]->description !!}</p>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
    @endif
</div>
<section class="section-trail mb-3">
    <div class="container">
        <div class="section__title text-center text-lg-start">
            <h3>Search Results</h1>
        </div>
        <div class="section-trail__details">
            <div class="row g-4 trail-contents">

            </div>

        </div>
    </div>
</section>
    <section class="trail-list-overal  py-lg-5 ">
        <div class="container">
            <div class="section__title text-center text-lg-start mb-lg-4">
                <h3>
                    Trail by Category
                    </h1>

            </div>
            <div class="row g-2">
                @if(isset($data['seasion']) && $data['seasion']->count() > 0)
                <div class="col-lg-2">
                    <div class="trail-list-overal__details">

                        <h5 class="mb-lg-4">Trail by Season</h5>

                        <ul>
                            @foreach ($data['season'] as $key=>$row)
                            <li><a class="search-by-category" data-type="season" data-id="{{ $row->id }}">{{ $row->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
                @if(isset($data['months']) && $data['months']->count() > 0)
                <div class="col-lg-2">
                    <div class="trail-list-overal__details">

                        <h5 class="mb-lg-4">Trail by Month</h5>

                        <ul class="d-flex">
                            <div class="w-50">
                                @foreach ($data['months']->slice(0, 6) as $key => $row)
                                <li><a class="search-by-category" data-type="months" data-id="{{ $row->id }}">{{ $row->title }}</a></li>

                                @endforeach
                            </div>
                            <div class="w-50">
                                @foreach ($data['months']->slice(6) as $key => $row)
                                <li><a class="search-by-category" data-type="months" data-id="{{ $row->id }}">{{ $row->title }}</a></li>
                                @endforeach
                            </div>
                        </ul>

                    </div>
                </div>
                @endif
                @if(isset($data['difficulty']) && $data['difficulty']->count() > 0)

                <div class="col-lg-2">
                    <div class="trail-list-overal__details">

                        <h5 class="mb-lg-4">Trail by Difficulty </h5>

                        <ul>
                            @foreach($data['difficulty'] as $key => $row)
                            <li><a class="search-by-category" data-type="difficulty" data-id="{{ $row->id }}">{{ $row->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                <div class="col-lg-2">
                    <div class="trail-list-overal__details">

                        <h5 class="mb-lg-4">Trail by Duration</h5>

                        <ul>
                            <li><a href="#" >1 Day
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
                    </div>
                </div>
                @if(isset($data['culture']) && $data['culture']->count() > 0)
                <div class="col-lg-2">
                    <div class="trail-list-overal__details">
                        <h5 class="mb-lg-4">Trail by Cultural</h5>
                        <ul>
                            @foreach($data['culture'] as $key => $row)
                            <li><a class="search-by-category" data-type="culture" data-id="{{ $row->id }}">{{ $row->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
                @if(isset($data['experience']) && $data['experience']->count() > 0)
                <div class="col-lg-2">
                    <div class="trail-list-overal__details">
                        <h5 class="mb-lg-4">Trail by Experience</h5>
                        <ul>
                            @foreach($data['experience'] as $key => $row)
                            <li><a class="search-by-category" data-type="experience" data-id="{{ $row->id }}">{{ $row->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>



@endsection

@section('scripts')
<script>

    $(document).ready(function () {
        $('.search-by-category').on('click', function(){
            let id = $(this).data('id');
            let type = $(this).data('type');
            console.log(type);
            performSearch(null, null, type, id);
        });
        $('.trail-profile--meta-search span').on('click', function () {
            let filter = $(this).data('value');
            performSearch(filter);
        });
    $('#searchForm').on('submit', function (e) {
        e.preventDefault();
        let query = $('#searchInput').val();
        performSearch(null, query);

    });

    function performSearch(filter = null, query = null, type = null, id = null) {
        $.ajax({
            url: "{{ route('site.post.search_all') }}",
            type: 'GET',
            data: { filter: filter, query: query, id: id, type : type },
            success: function (data) {
                let trailSection = $('.trailResults');
                trailSection.empty(); // Clear existing content
                let contetts = $('.trail-contents');
                contetts.empty(); // Clear existing content

                if (data.length > 0) {
                    data.forEach(function (trail) {
                        let baseUrl = "{{ url('/') }}";
                        contetts.append(`
                            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                <a href="${baseUrl}/post/${trail.post_unique_id}">
                                    <div class="section-trail__details__list">
                                        <div class="section-trail__details__list__box">
                                            <div class="logo-img">
                                                ${trail.thumbs ? `<img src="${baseUrl}/${trail.thumbs}" alt="" class="img">` : `<p>Image Not Found!</p>`}
                                                <div class="bagde-flag-wrap">
                                                    <a href="#" class="bagde-flag">Top Trail</a>
                                                </div>
                                            </div>
                                            <div class="text">
                                                <small><i class="fa-solid fa-location-dot"></i> ${trail.trail_address}</small>
                                                <a href="/post/show/${trail.post_unique_id}">
                                                    <h5>${trail.title}</h5>
                                                </a>
                                                <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>${trail.durations} days</b></small>
                                                <small><i class="fa-solid fa-plane-up"></i> Transport - <b>${trail.TransportCategory ? trail.TransportCategory.title : ''}</b></small>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        `);
                    });
                } else {
                    contetts.append('<p>No trails found.</p>');
                }
            }
        });
    }
});
</script>
@endsection
