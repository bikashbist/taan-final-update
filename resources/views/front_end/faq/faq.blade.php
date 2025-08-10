@extends('front_end.layouts.app')
@section('content')
    <section class="faq mt-lg-5 mt-3 ">
        <div class="container">
            <div class="row g-5 justify-content-center">

                <div class="col-lg-8">
                    @if(isset($data['row']) && $data['row']->count() > 0)
                    <div class=" mb-lg-5 text-center">
                        <h2 class="mb-4">{{ $data['row']->title }}</h2>
                        <p>{!! $data['row']->description !!}</p>
                    </div>
                    @endif
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

                        <div class="faq__item">

                        </div>

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
@endsection
