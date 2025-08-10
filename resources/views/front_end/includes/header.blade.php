<style>
    .dropdown-times.show {
        display: block;
        z-index: 1021;
    }

    .btn-secondary {
        background-color: #564aeb;
        color: #fff;
        /* border: 2px solid transparent; */
        background-image: linear-gradient(90deg, #fe4939 0, #cb1606 100%);
    }

    .digital-tims {
        background-color: #ff9900;
        color: #fff;
        border: 2px solid transparent;

    }

    /* .btn-secondary:hover{
   background-color: #fe4939;
    color: #000000;
    background-image: none;
} */
</style>


<div class="header">
    <div class="container">
        <div
            class="header__content justify-content-lg-between justify-content-sm-center d-flex align-items-center flex-wrap">
            @if (isset($all_view['setting']->site_mobile))
                <!--<p class="pe-lg-5"> <i class="fa-solid fa-phone-volume"></i> {{ $all_view['setting']->site_mobile }}</p>-->
            @else
                <!--<p class="pe-lg-5">Number Not Found's !</p>-->
            @endif
            <!-- <p>
        <a href="{{ route('site.submission') }}"><button class="btn btn-login be-member text-white" type="submit">Submission</button></a>
      </p> -->

            <div class="d-flex">
                <img src="{{ asset('assets/site/images/flag-nepal.gif') }}" alt="flag" style="max-height: 40px;">
                <!--<p class="taan">Official website of Trekking Agencies' Association of Nepal (TAAN)</p>-->
            </div>&nbsp;
            <p class="pe-lg-5" style="">
                <a class="text-decoration-none" href="https://taan.bakersgallerycafe.com/" style="color: #fff;"
                    target="_blank"><i class="fa-regular fa-sun"></i> Weather Forecast
                </a>
            </p>
            <div class="d-flex align-items-center mobile-r-c" role="search">
                <div class="dropdown me-2 ">
                    <button class="digital-tims dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">

                        Digital TIMS
                    </button>
                    <ul class="dropdown-menu dropdown-times">
                        <li><a class="dropdown-item" href="{{ route('site.tims-overview') }}">TIMS Overview</a></li>
                        <li><a class="dropdown-item" href="{{ route('login') }}">TIMS Login/Register</a></li>

                    </ul>
                </div>
                @auth
                    @if (auth()->user()->role == 'user')
                        <a href="{{ route('site.sign_in') }}"><button class="btn btn-login be-member text-white"
                                type="submit">My Account</button></a>
                    @else
                        <a href="{{ route('site.sign_in') }}"><button class="btn btn-login be-member text-white"
                                type="submit"><i class="fa fa-dashboard"></i>&nbsp;Dashboard</button></a>
                    @endif
                @else
                    <a href="{{ route('site.sign_in') }}"><button class="btn btn-login be-member bg-success text-white"
                            type="submit"><i class="fa fa-lock"></i>&nbsp;Login</button></a>
                @endauth
                <a href="{{ route('register') }}"><button class="btn btn-signup btn-bg ms-2 text-white"
                        type="submit"><i class="fa-regular fa-user"></i>
                        Become a member
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
