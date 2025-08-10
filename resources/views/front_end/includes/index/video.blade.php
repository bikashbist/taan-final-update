@if(isset($data['video']) && $data['video']->count() > 0)
<section class="video mt-lg-5">
    <div class="container">
        <div class="row g-4">
            @if(isset($data['video']) && $data['video']->count() > 0)
            @foreach($data['video'] as $row)
            <div class="col-lg-3">
                <a class="video__wrapper" href="https://www.youtube.com/embed/<?php echo $row->video_id; ?>" data-fancybox="gallery">
                    @if(isset($row->video_thumbnail))
                    <img src="{{ asset($row->video_thumbnail)}}" alt="img" />
                        @else
                        <p>Image not Found's</p>
                    @endif
                    <div class="video__play-icon">
                        <span>
                            <i class="fa-regular fa-circle-play"></i>
                        </span>
                    </div>
                </a>
            </div>
            @endforeach
            @else
            <div class="col-lg-12">
                <div class="alert alert-warning" role="alert">
                    No Video Found !
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endif
