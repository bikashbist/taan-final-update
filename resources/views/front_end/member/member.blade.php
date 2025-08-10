@extends('front_end.layouts.app')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <link rel="stylesheet" href="{{asset('user/css/owl.carousel.min.css')}} ">
    <link rel="stylesheet" href="{{asset('user/scss/style.css')}}">
    @endsection
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="trail-profile member-search pb-lg-5">
        <div class="container py-lg-5">
            <div class="row">
                <div class="col-lg-7 col-md-10 col-12 mx-auto">
                    <h1 class="text-center text-white py-lg-4 py-3">Looking For {{ !empty($memberType->title) ? $memberType->title : '' }} Member agencies?</h1>
                    <h4 class="text-center text-white member-filter-title mb-3">Filter Alphabetically</h4>
                    <input type="hidden" value="{{ !empty($memberType->id) ? $memberType->id : '' }}" id="member-type-id">
                    <div class="filter-member text-center">
                        <span data-value="A"> A</span>
                        <span data-value="B"> B</span>
                        <span data-value="C"> C</span>
                        <span data-value="d"> D</span>
                        <span data-value="E"> E</span>
                        <span data-value="F"> F</span>
                        <span data-value="G"> G</span>
                        <span data-value="H"> H</span>
                        <span data-value="I"> I</span>
                        <span data-value="J"> J</span>
                        <span data-value="K"> K</span>
                        <span data-value="L"> L</span>
                        <span data-value="M"> M</span>
                        <span data-value="N"> N</span>
                        <span data-value="O"> O</span>
                        <span data-value="P"> P</span>
                        <span data-value="Q"> Q</span>
                        <span data-value="R"> R</span>
                        <span data-value="S"> S</span>
                        <span data-value="T"> T</span>
                        <span data-value="U"> U</span>
                        <span data-value="V"> V</span>
                        <span data-value="W"> W</span>
                        <span data-value="X"> X</span>
                        <span data-value="Y"> Y</span>
                        <span data-value="Z"> Z</span>
                    </div>
                    <div class="search-trail">
                        <form id="searchForm" action="#">
                            <div class="d-flex align-items-center justify-content-between search-trail__search">
                                <div class="search-trail__search--input d-flex align-items-center flex-fill">
                                    <b><i class="fa-solid fa-magnifying-glass"></i></b>
                                    <input id="searchInput" class="search-trail__search--input-type" type="text"
                                        placeholder="Search Member">
                                </div>
                                <button id="searchButton" class="btn-search" type="submit">
                                    <i class="fa-solid fa-magnifying-glass"></i> Search
                                </button>
                            </div>
                        </form>
                        {{-- <ul id="dropdownMenu" class="dropdown-menu"></ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="member-list">

        <div class="container">
            <div class="member-details p-lg-5">
                <div class="row g-3 member-list-display"></div>
            </div>

        </div>

    </div>

    <div class="section mt-lg-5">
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
                                    <a href="package-grid.html" class="secondary-btn1">View The Members</a>
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
                                <a href="package-grid.html" class="text">Discover Trail</a>
                                <a href="package-grid.html" class="primary-btn1">View The Trail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
    $('.filter-member span').click(function(event) {
        event.preventDefault(); // Prevent the default link behavior
        var selectedLetter = $(this).data('value');
        console.log('Selected Letter: ' + selectedLetter);
        $('.member-list').removeAttr('style');
        $.ajax({
            url: '{{ url("members/filter") }}/' + selectedLetter, // Use the correct URL here
            method: 'GET',
            dataType: 'json',
            data: { member_type : $('#member-type-id').val() },
            success: function(response) {
                console.log('Response: ', response);
                $('.member-list-display').empty(); // Clear the current member list
                if (response.length > 0) {
                    response.forEach(function(member) {
                        var memberId = member.member_id ? member.member_id : '000000';
                        var memberCard = `
                            <div class="col-4 col-md-3" data-member-name="${member.company}">
                                <div class="card text-center">
                                    <img class="card-img-top bg-success" src="{{asset('user/images/profile/everest-base-camp-trek-with-helicopter-return.webp')}}" />
                                    <img class="card-img-avatar rounded-circle" src="{{asset('${member.user.profile}')}}" />
                                    <div class="card-body">
                                        <h5 class="card-title">${member.company}</h5>
                                        <a href="{{ url('/members/profile/${memberId}') }}" class="btn-view-more">View Details</a>
                                    </div>
                                </div>
                            </div>`;
                        $('.member-list-display').append(memberCard); // Append each member card
                    });
                }else{
                    $('.member-list-display').append('<div class="col-12 text-center">No members found for the selected letter.</div>');
                }

                console.log('Member cards appended successfully');
            },
            error: function(error) {
                console.error('Error: ', error);
            }
        });
    });

    $('#searchButton').click(function(event) {
        event.preventDefault();
        var query = $('#searchInput').val();
        console.log(query);
        $.ajax({
            url: '{{ url("/search/member") }}', // Use the correct URL here
            method: 'GET',
            dataType: 'json',
            data: { member_type : $('#member-type-id').val(), query: query },
            success: function(response) {
                console.log('Response: ', response);
                $('.member-list-display').empty(); // Clear the current member list
                if (response.length > 0) {
                    response.forEach(function(member) {
                        var memberId = member.member_id ? member.member_id : '000000';
                        var memberCard = `
                            <div class="col-4 col-md-3" data-member-name="${member.company}">
                                <div class="card text-center">
                                    <img class="card-img-top bg-success" src="{{asset('user/images/profile/everest-base-camp-trek-with-helicopter-return.webp')}}" />
                                    <img class="card-img-avatar rounded-circle" src="{{asset('${member.user.profile}')}}" />
                                    <div class="card-body">
                                        <h5 class="card-title">${member.company}</h5>
                                        <a href="{{ url('/members/profile/${memberId}') }}" class="btn-view-more">View Details</a>
                                    </div>
                                </div>
                            </div>`;
                        $('.member-list-display').append(memberCard); // Append each member card
                    });
                }else{
                    $('.member-list-display').append('<div class="col-12 text-center">No members found for the selected letter.</div>');
                }

                console.log('Member cards appended successfully');
            },
            error: function(error) {
                console.error('Error: ', error);
            }
        });
    });
});

</script>
@endsection
