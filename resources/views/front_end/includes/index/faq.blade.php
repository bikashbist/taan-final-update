<section class="faq mt-lg-5 mt-3 pt-4">
    <div class="container">
        <div class="row g-5 justify-content-center">
            <div class="col-lg-3 text-left">
                @if(isset($data['feature_page'][3]))
                <h2 class="mb-4">{{ $data['feature_page'][3]->title }}</h2>
                @endif
                <p>{!! isset($data['feature_page'][3]) ? mb_strimwidth($data['feature_page'][3]->description, 0, 600, "...") : '' !!}</p>
            </div>
            <div class="col-lg-8">
                <div class="accordion" id="accordionExample">
                    @if(isset($data['faq']) && $data['faq']->count() > 0)
                    @foreach($data['faq'] as $row)
                    <div class="faq__item">
                        <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $row->id }}" aria-expanded="true" aria-controls="{{ $row->id }}">
                            <h5>{{ $row->question }}</h5>
                        </a>
                        <div id="{{ $row->id }}" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>
                                    {{ $row->answer }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @if(Route::has('site.faqs'))
                    <div class="faq__item">
                        <a class="faq-read-more" href="{{ route('site.faqs', ['id', isset($all_view['feature_page'][5]->post_unique_id) ? $all_view['feature_page'][5]->post_unique_id : 'post_unique_id']) }}">View More <i
                                class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                    @endif
                    @else
                    <div class="faq__item">
                        <p>No FAQs found's !</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</section>