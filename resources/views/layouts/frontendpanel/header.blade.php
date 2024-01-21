<header class="header-area">
    <div class="header-top bg-img"
        style="background-image:url({{ asset('FrontendPanelAsset') }}/img/icon-img/header-shape.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7 col-12 col-sm-8">
                    <div class="header-contact">
                        <ul>
                            <li><i class="fa fa-phone"></i>+880 {{ $aboutUs->phone }}</li>
                            <li><i class="fa fa-envelope-o"></i><a href="#">{{ $aboutUs->email }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5 col-12 col-sm-4">
                    <div class="login-register">
                        @auth
                            <ul>
                                <li><a href="{{ route('admin_dashboard') }}">Admin Dashboard</a></li>
                            </ul>
                        @else
                            <ul>
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            </ul>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom sticky-bar clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-6 col-4">
                    <div class="logo">
                        <a href="{{ route('frontend_dashboard') }}">
                            <img alt="UnivSearch BD" src="{{ asset('FrontendPanelAsset') }}/img/logo/logo.png">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-6 col-8">
                    <div class="menu-cart-wrap">
                        <div class="main-menu">
                            <nav>
                                <ul>
                                    <li><a href="{{ route('frontend_dashboard') }}"> HOME </a></li>
                                    <li><a href="{{ url('/#aboutUs') }}"> ABOUT </a></li>
                                    {{--  <li><a href=""> University </a></li>  --}}
                                    <li><a href=""> University </a>
                                        <ul class="submenu">
                                            <li><a href="{{ route('frontend_university') }}">Universities List</a></li>
                                            <li><a href="{{ route('nearest_university_search') }}">University In My
                                                    Area</a></li>
                                            <li><a href="{{ route('multiple_search_universities') }}">Search Your Uni.</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('frontend_blog') }}"> Blog </a></li>
                                    <li><a href="{{ route('frontend_news') }}"> News </a></li>
                                    <li><a href="{{ route('frontend_contact') }}"> Contact </a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-area">
                <div class="mobile-menu">
                    <nav id="mobile-menu-active">
                        <ul class="menu-overflow">
                            <li><a href="{{ route('frontend_dashboard') }}"> HOME </a></li>
                            <li><a href="{{ url('/#aboutUs') }}"> ABOUT </a></li>
                            {{--  <li><a href=""> University </a></li>  --}}
                            <li><a href=""> University </a>
                                <ul class="submenu">
                                    <li><a href="{{ route('frontend_university') }}">Universities List</a></li>
                                    <li><a href="{{ route('nearest_university_search') }}">University In My Area</a>
                                    </li>
                                    <li><a href="{{ route('multiple_search_universities') }}">Search Your Uni.</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="{{ route('frontend_blog') }}"> Blog </a></li>
                            <li><a href="{{ route('frontend_news') }}"> News </a></li>
                            <li><a href="{{ route('frontend_contact') }}"> Contact </a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
