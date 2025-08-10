@extends('front_end.layouts.app')
@section('styles')
    <link href="{{ asset('assets/cms/plugin/toastr-master/toastr.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @include('front_end.includes.index.slider')
    <!-- course-list-section-end -->
    @include('front_end.includes.index.our-introduction')
    @include('front_end.includes.index.message-from-president')

    @include('front_end.includes.index.what-we-do')
    <!--@include('front_end.includes.index.achivement')-->
    <!-- message from president start -->
    <!-- message from president end-->
    @include('front_end.includes.index.latest-trails')
    <!-- up section-trail trail -->
    <!-- list Top Destination for vacations start -->
    <!--@include('front_end.includes.index.destination')-->
    <!-- taan support start -->
    @include('front_end.includes.index.support-counsellors')


    <!-- taan support end-->
    @include('front_end.includes.index.upcoming-trails')
    <!-- accrediation end -->
    <!--@include('front_end.includes.index.faq')-->
    <!--@include('front_end.includes.index.video')-->
        <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.10472292221!2d85.3302196111306!3d27.714052725096092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb190ce659f1eb%3A0xb0582cea48b2d507!2sTrekking%20Agencies%20Association%20of%20Nepal%20(TAAN)!5e0!3m2!1sen!2snp!4v1747990128112!5m2!1sen!2snp"
        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
@endsection
@section('scripts')
    <script src="{{ asset('assets/cms/plugin/toastr-master/toastr.js') }}"></script>
    <script>
        @if (Session::get('alert-success'))
            toastr.success("Thank you for subscribe ! ");
        @endif
    </script>
@endsection
