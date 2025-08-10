@extends('front_end.layouts.app')
@section('title', 'Search')
@section('content')
<section class="section-trail mb-3">
    <div class="container">
        <div class="section__title text-center text-lg-start">
            <h3>
                @if(isset($data['total']))
                Search Result {{$data['total']}} Trails !
                @endif
            </h3>

        </div>
        <div class="section-trail__details">
            <div class="row g-4 ">
                @if(isset($data['search']) && count($data['search']) > 0)
                @foreach($data['search'] as $row)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    @if( route('site.post.show', ['id'=> $row->post_unique_id]))
                    <a href="{{ route('site.post.show', ['id'=> $row->post_unique_id]) }}">
                        <div class="section-trail__details__list">
                            <div class="section-trail__details__list__box">
                                <div class="logo-img">
                                    <img src="{{ asset($row->blog_thumnail)}}" alt="" class="img">
                                </div>
                                <div class="text">
                                    <small><i class="fa-solid fa-location-dot"></i> Kathmandu, Nepal </small>
                                    <h5>{{ $row->title }}</h5>
                                    <small><i class="fa-regular fa-calendar-days"></i> Duration - <b>{{$row->duration}} Days</b>
                                    </small>
                                    <small><i class="fa-solid fa-plane-up"></i> Transport - <b> Private vehicle / By
                                            Air </b>
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
            </div>
        </div>
    </div>
</section>
@endsection