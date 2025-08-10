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
                <p class="text-white">Photo Gallery</p>
                @if(isset($data['album']->title))
                <h1 class="text-white"> {{ $data['album']->title }}</h1>
                @endif

            </div>
            <img class="page-title-icon" src="{{ asset('assets/site/images/layout-img/icon-page-title.png') }}"
                alt="icon">
        </div>
    </div>

</section>

<section class="teams pt-lg-5 pt-4 pb-lg-5 pb-3">
    <div class="container">
        <div class="teams__details">
            <div class="row g-4 content_gallery">
                @if(isset($data['gallery']))
                @foreach($data['gallery'] as $row)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12   "> <a data-fancybox="gallery_details" class="swipebox"
                        data-src="{{ asset($row->image) }}"
                        data-caption="Optional caption,&lt;br /&gt;that can contain &lt;em&gt;HTML&lt;/em&gt; code">
                        <img src="{{ asset($row->image)}}"
                            width="100%" height="250px" alt="img" />
                    </a>
                </div>
                @endforeach
                @endif

            </div>
        </div>
</section>



@endsection

@section('scripts')
<script>
    document.addEventListener("contextmenu", function (e) {
        e.preventDefault(); // Disable right-click on the entire page
    });

    document.addEventListener("dragstart", function (e) {
        if (e.target.tagName === "IMG") {
            e.preventDefault(); // Prevent drag-and-drop saving of images
        }
    });

    document.addEventListener("keydown", function (e) {
        if (e.ctrlKey && (e.key === "s" || e.key === "u" || e.key === "p" || e.key === "c")) {
            e.preventDefault(); // Prevent Ctrl+S, Ctrl+U, Ctrl+P, Ctrl+C
        }
    });
</script>
@endsection

