@extends('front_end.layouts.app')
@section('content')
<div class="trail-profile py-lg-5 pb-lg-5">
    <div class="container">
        <div class="row ">
            <div class="col-lg-7 col-md-10 col-12 mx-auto">
                <h1 class="text-center text-white py-lg-4 py-3">Looking For Trail?</h1>
                <div class="search-trail">
                    <form id="searchForm" action="#" method="GET">
                        <div class="d-flex align-items-center justify-content-between search-trail__search">
                            <div class="search-trail__search--input d-flex align-items-center flex-fill">
                                <b><i class="fa-solid fa-magnifying-glass"></i></b>
                                <input id="searchInput" name="query" class="search-trail__search--input-type" type="text" placeholder="Search Trail">
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
<section class="section-trail mb-3">
    <div class="container">
        <div class="section__title text-center py-lg-3 text-lg-start">
            <h3 class="text-center d-block">
                {{ isset($data['destination']) ? $data['destination']->title : "Top Destination"}}
                </h1>
        </div>
        <div class="section-trail__details">
            <div class="row g-4 " id="search-results">
                @if (isset($data['posts']) && $data['posts']->count() > 0)
                @foreach($data['posts'] as $key => $row)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <a href="{{ route('site.post.show', ['id'=> $row->post_unique_id]) }}">
                        <div class="section-trail__details__list">
                            <div class="section-trail__details__list__box">
                                <div class="logo-img">
                                    @if(isset($row->blog_thumnail) && !empty($row->blog_thumnail))
                                    <img src="{{ asset($row->blog_thumnail) }}" alt="" class="img">
                                    @else
                                    <p>Image Not Found's!</p>
                                    @endif
                                </div>
                                <div class="text">
                                    <small><i class="fa-solid fa-location-dot"></i> {{ $row->trail_address }}
                                    </small>
                                    <a href="{{ route('site.post.show', ['id'=> $row->post_unique_id]) }}">
                                        <h5>{{ $row->title }}</h5>
                                    </a>
                                    <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>{{ $row->durations }}</b>
                                    </small>

                                    <small><i class="fa-solid fa-plane-up"></i> Transport - <b> {{ isset($row->transport_id) ? $row->blogTransport()->title : " " }}</b></b>
                                    </small>
                                </div>
                            </div>
                        </div> <!-- list section-trail -->
                    </a>
                </div>
                @endforeach

                @else
                <p class="text-center text-muted">No trails found.</p>
                @endif
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#searchForm').on('submit', function(e) {
            e.preventDefault(); // Prevent the form from submitting normally

            let query = $('#searchInput').val();

            $.ajax({
                url: '{{ route("site.post.search") }}', // The route that handles the search
                method: 'GET',
                data: {
                    query: query,
                    destination: {
                        {
                            isset($data['destination']) ? $data['destination'] - > id : null
                        }
                    }
                }, // Send the search query as a GET parameter
                success: function(response) {
                    $('#search-results').empty(); // Clear previous results

                    if (response.length > 0) {
                        response.forEach(function(post) {
                            console.log(post.thumbs);
                            let baseUrl = "{{ url('/') }}";
                            let postHtml = `
                            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                <a href="${baseUrl}/post/${post.post_unique_id}">
                                    <div class="section-trail__details__list">
                                        <div class="section-trail__details__list__box">
                                            <div class="logo-img">
                                                <img src="${baseUrl}${post.thumbs}" alt="" class="img">
                                            </div>
                                            <div class="text">
                                                <small><i class="fa-solid fa-location-dot"></i> ${post.trail_address}</small>
                                                <h5>${post.title}</h5>
                                                <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>${post.durations}</b></small>
                                                <small><i class="fa-solid fa-plane-up"></i> Transport - <b></b></small>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        `;
                            $('#search-results').append(postHtml);
                        });
                    } else {
                        $('#search-results').html('<p class="text-center text-muted">No trails found.</p>');
                    }
                },
                error: function(error) {
                    console.error('Error:', error);
                    $('#search-results').html('<p class="text-center text-danger">An error occurred while searching.</p>');
                }
            });
        });
    });
</script>

@endsection