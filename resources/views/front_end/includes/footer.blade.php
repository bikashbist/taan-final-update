<footer class="footer" style="margin-top: -10px;">
    <div class="container">
        <div class="row g-lg-5 g-3 ">
            <div class="col-lg-4 col-md-4 col-12 pr-md-5 mb-4 mb-md-0">
                @if (isset($all_view['common']->footer_first_title))
                    <h3>{{ $all_view['common']->footer_first_title }}</h3>
                @endif
                <p class="mb-4">

                    @if (isset($all_view['common']->footer_first_description))
                        {!! $all_view['common']->footer_first_description !!}
                    @endif
                </p>
                <ul class="list-unstyled quick-info mb-4">
                    <li><a href="#" class="d-flex align-items-center"><span class="me-3 "><i
                                    class="fa-solid fa-phone"></i></span>{{ !empty($all_view['setting']->site_phone) ? $all_view['setting']->site_phone : '' }}</a>
                    </li>
                    <li><a href="#" class="d-flex align-items-center"><span class="me-3"><i
                                    class="fa-solid fa-envelope"></i></span>{{ !empty($all_view['setting']->site_email) ? $all_view['setting']->site_email : '' }}</a>
                    </li>
                </ul>
                <form action="{{ route('site.subscribe') }}" class="subscribe">
                    <input type="email" class="form-control" name="email" placeholder="Enter your e-mail">
                    <input type="submit" class="btn btn-submit" value="Send">
                </form>
            </div>
            <div class="col-lg-5 col-md-4 col-12 mb-4 mb-md-0">
                @if (isset($all_view['common']->footer_second_title))
                    <h3>{{ $all_view['common']->footer_second_title }}</h3>
                @endif
                <ul class="list-unstyled trails-list">
                    @if (isset($all_view['latest_trail']))
                        @foreach ($all_view['latest_trail'] as $row)
                            <li class="trail-package">
                                <div class="trails-list--title d-flex">
                                    <span class="me-2"><i class="fa-solid fa-right-long"></i> </span>
                                    <a href="{{ route('site.post.show', ['id' => $row->post_unique_id]) }}">
                                        {{ $row->title }}</a>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>

            </div>
            <div class="col-lg-3 col-md-4 col-12 mb-4 mb-md-0">
                @if (isset($all_view['common']->footer_third_title))
                    <h3>{{ $all_view['common']->footer_third_title }}</h3>
                @endif
                <div class="row g-3 ">
                    @if (isset($all_view['gallery']))
                        @foreach ($all_view['gallery']->slice(0, 4) as $key => $gallery)
                            @if (isset($gallery->image))
                                <div class="col-6">
                                    <a data-fancybox="gallery" data-src="{{ asset($gallery->image) }}"
                                        data-caption="Optional caption,&lt;br /&gt;that can contain &lt;em&gt;HTML&lt;/em&gt; code">
                                        {{-- <img src="{{ asset($gallery->image) }}"
                                width="100%" height="130" alt="{{ $gallery->image }}" /> --}}
                                        <img src="{{ asset($gallery->image) }}" width="100%" height="130"
                                            alt="img" />
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    @endif

                </div>
            </div>
            <div class="site-logo-wrap ml-auto" style="font-size: 12px;">
                <marquee behavior="scroll" direction="left" scrollamount="4">
                    <a href="https://softechfoundation.com/" target="_blank" class="site-logo text-white">
                        Developed with support from UNDP/NTB-Sustainable Tourism for Livelihood Recovery Project
                        (STLRP).
                    </a>
                </marquee>
            </div>

        </div>

    </div>

</footer>
