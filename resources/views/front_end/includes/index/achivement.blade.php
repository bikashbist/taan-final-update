@if(isset($data['achivement']) && $data['achivement']->count() > 0)
<section class="achivements py-lg-5  py-3 mb-3">
    <div class="container">
        <div class="section__title text-center mb-5 ">
            <h3 class="text-white">
                Our Achivements
                </h1>
                <p class="text-white">Initially, TAAN had limited its membership only to Nepalese trekking agencies.</p>
        </div>
        <div class="owl-carousel owl-theme owl-achivement">
            @if(isset($data['achivement']) && $data['achivement']->count() > 0)
            @foreach($data['achivement'] as $row)
            <div class="col">
                <div class="achivements__details">
                    <div class="achivements__details__list__box">
                        <div class="logo-img">
                            <img src="{{ asset($row->images)}}" alt="img" class="img">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <p>
                No data found!
            </p>
            @endif
        </div>
    </div>
</section>
@endif