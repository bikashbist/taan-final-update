@extends('front_end.layouts.app')
@section('content')
{{-- @dd($data) --}}
<section class="about-us mt-lg-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mx-auto text-center">

                <h1>{{ $data['row']->title }}</h1>

                <p> {!! $data['row']->description !!}</p>
            </div>
            <div class="col-lg-12">
                @if(isset($data['row']) && $data['row']->thumbs != null && file_exists(getcwd().$data['row']->thumbs))
                <div class="org-chart">
                    <img src="{{asset($data['row']->thumbs)}}" alt="org-chart">
                </div>
                @endif
            </div>

        </div>
    </div>

</section>

@endsection
