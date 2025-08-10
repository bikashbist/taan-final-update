<section class="taan-support my-lg-5 my-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="support d-lg-flex flex-column flex-lg-row justify-content-center h-100">
                    <div class="support-message">
                        @if(isset($data['feature_page'][2]))
                        <h4>{{ $data['feature_page'][2]->title }}</h4>
                        @endif
                        <p>{!! isset($data['feature_page'][2]) ? mb_strimwidth($data['feature_page'][2]->description, 0, 600, "...") : '' !!}</p>
                    </div>
                    <div class="support-image d-flex justify-content-center p-2">
                        @if(isset($data['feature_page'][2]) && $data['feature_page'][1]->blog_thumnail)
                        <img src="{{ asset($data['feature_page'][2]->blog_thumnail) }}" alt="Support Contact Image">
                        @else
                        <p>Image Not Found's !</p>
                        @endif

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ftaan.np&amp;tabs=timeline&amp;width=340&amp;height=500&amp;small_header=false&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId=6144971828892501" width="100%" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
            </div>
        </div>
    </div>
</section>