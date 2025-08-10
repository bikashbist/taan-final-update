<section class="message my-lg-5 my-3">
    <div class="container">
        @if(isset($data['feature_page'][1]))
        <div class="president d-lg-flex flex-column flex-lg-row justify-content-center">
            <div class="president-message">
                @if(isset($data['feature_page'][1]))
                <h3>{{ $data['feature_page'][1]->title }}</h3>
                @endif
                <p> {!! isset($data['feature_page'][1]) ? mb_strimwidth($data['feature_page'][1]->description, 0, 600, "...") : '' !!}</p>
                @if(Route::has('site.page.show'))
                <a class="btn" href="{{ route('site.page.show', [ 'id'=>$data['feature_page'][1]->post_unique_id ]) }}">Read More</a>
                @endif
            </div>
            <div class="president-image d-flex justify-content-center p-2">
                @if(isset($data['feature_page'][1]) && $data['feature_page'][1]->blog_thumnail)
                <img src="{{ asset($data['feature_page'][1]->blog_thumnail) }}" alt="President Image">
                @else
                <p>Image Not Found's !</p>
                @endif
            </div>

        </div>
        @else
        <p>Content Not Found's !</p>
        @endif
    </div>
</section>