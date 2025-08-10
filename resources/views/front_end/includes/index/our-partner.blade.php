<section class="accrediation my-lg-5 my-3">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            
            </div>
            <div class="col-lg-6">
                <div class="our-partner">
                    <div class="section__title py-2  ">
                        <h4 class="mb-0 pb-0">
                            We Work With
                        </h4>
                    </div>
                </div>
                <div class="partners-list mt-4">
                    <div class="owl-carousel owl-theme owl-working-partners">
                        @if(isset($data['partner']) && $data['partner']->count() > 0)
                        @foreach($data['partner'] as $row)
                        <div class="partners ">
                            <a href="{{$row->url}}" target="_balck">
                                <img src="{{ asset($row->image)}}" alt="{{$row->name}}" style="height:200px">
                            </a>
                        </div>
                        @endforeach
                        @else
                        <p>Data Not Found's !</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="our-partner">
                    <div class="section__title py-2  ">
                        <h4 class="mb-0 pb-0">
                           
                            Strategic Partner
                        </h4>
                    </div>
                </div>
                <div class="partners-list mt-4">
                    <div class="owl-carousel owl-theme owl-strategy-partners">
                        @if(isset($data['partner']) && $data['partner']->count() > 0)
                        @foreach($data['partner'] as $row)
                        <div class="partners ">
                            <a href="{{$row->url}}" target="_balck">
                                <img src="{{ asset($row->image)}}" alt="{{$row->name}}" style="height:200px">
                            </a>
                        </div>
                        @endforeach
                        @else
                        <p>Data Not Found's !</p>
                        @endif
                    </div>
                </div>
            </div>

           
        </div>

    </div>
</section>