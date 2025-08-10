<style>
    .video-banner {
        position: relative;
        width: 100%;
        height: 88vh;
        overflow: hidden;
    }

    .video-banner__video {
        position: absolute;
        top: 50%;
        left: 50%;
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
        transform: translate(-50%, -50%);
        object-fit: cover;
        z-index: -1;
    }
</style>

{{-- <div class="banner">

    <div class="banner__details  d-flex justify-content-center">
        <div class="slider">
            @if (isset($data['banner']) && count($data['banner']) > 0)
            @foreach ($data['banner'] as $row)
            <div class="slider__image active"><img src="{{ asset($row->image)}}" alt="banner"></div>
            @endforeach
            @else
            <p>
                No Banner Found
            </p>
            @endif
        </div>
        <div class="banner__article">
            <div class="banner__article--content pt-140 position-relative">
                <div id="typed-strings" style="clip: rect(0px, 0px, 0px, 0px); clip-path: inset(50%); height: 1px; overflow: hidden; position: absolute; white-space: nowrap; width: 1px;">
                    <p>The Largest association of the tourism agencies in Nepal</p>
                </div>
                <h4 class="position-absolute typed-title" id="typed">The Largest associat</h4><span class="typed-cursor" aria-hidden="true">|</span>

                <h1 id="typingText">Save our Trekking Trails for <br> Sustainable Mountain Tourism</h1>
                <p>Welcome to Trekking Agencies' Association of Nepal</p>
                <div class="member">
                    <form action="{{route('site.searchTrai')}}">
                        @csrf
                        <div class="d-flex align-items-center justify-content-between member__search">
                            <div class="member__search--input flex-fill">
                                <b><i class="fa-regular fa-user"></i></b>
                                <input id="searchInput" name="search" class="member__search--input-type" type="text" placeholder="Where To Go?">
                            </div>
                            <button class="btn-search" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="video-banner">
    @php
        $videoPath = $data['banner']->video ?? null;
        $videoUrl = $videoPath ? asset($videoPath) : null;
    @endphp

    @if ($videoUrl)
        {{-- Debug check --}}
        {{-- <p>Video Path: {{ $videoUrl }}</p> --}}

        <video class="video-banner__video" autoplay muted loop playsinline preload="auto">
            <source src="{{ $videoUrl }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    @else
        {{-- Fallback video --}}
        <video class="video-banner__video" autoplay muted loop playsinline preload="auto">
            <source src="https://www.nepalmountaineering.org/storage/website/amadablam.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    @endif
</div>
