@extends('layouts.frontendpanel.master')

@section('content')
    <div class="slider-area">
        <div class="slider-active owl-carousel">
            <div class="single-slider slider-height-2 bg-img align-items-center d-flex slider-overlay2-1 default-overlay"
                style="background-image:url({{ asset('FrontendPanelAsset') }}/img/slider/slider-2.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                            <div class="slider-content slider-content-2 slider-animated-2 text-center">
                                <h1 class="animated">Welcome to UnivSearch BD</h1>
                                <p class="animated">{{ $aboutUs->title }}</p>
                                <div class="slider-btn">
                                    <a class="animated default-btn btn-green-color" href="{{ url('/#aboutUs') }}">ABOUT
                                        US</a>
                                    <a class="animated default-btn btn-white-color"
                                        href="{{ route('frontend_contact') }}">CONTACT US</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider slider-height-2 align-items-center d-flex bg-img slider-overlay2-2 default-overlay"
                style="background-image:url({{ asset('FrontendPanelAsset') }}/img/slider/slider-3.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                            <div class="slider-content slider-content-2 slider-animated-2 text-center">
                                <h1 class="animated">Welcome to UnivSearch BD</h1>
                                <p class="animated">{{ $aboutUs->title }}</p>
                                <div class="slider-btn">
                                    <a class="animated default-btn btn-green-color" href="{{ url('/#aboutUs') }}">ABOUT
                                        US</a>
                                    <a class="animated default-btn btn-white-color"
                                        href="{{ route('frontend_contact') }}">CONTACT US</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider slider-height-2 align-items-center d-flex bg-img slider-overlay2-3 default-overlay"
                style="background-image:url({{ asset('FrontendPanelAsset') }}/img/slider/slider-4.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                            <div class="slider-content slider-content-2 slider-animated-2 text-center">
                                <h1 class="animated">Welcome to UnivSearch BD</h1>
                                <p class="animated">{{ $aboutUs->title }}</p>
                                <div class="slider-btn">
                                    <a class="animated default-btn btn-green-color" href="{{ url('/#aboutUs') }}">ABOUT
                                        US</a>
                                    <a class="animated default-btn btn-white-color"
                                        href="{{ route('frontend_contact') }}">CONTACT US</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about-us pt-130 pb-130" id="aboutUs">
        <div class="container">
            <div class="section-title-3 section-shape-hm2-1 text-center mb-100">
                <h2>About <span>Us</span></h2>
                {{--  <p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, <br> quis nostrud exercitation ullamco laboris nisi ut aliquip </p>  --}}
            </div>
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-12">
                    <div class="about-img about-img-2 default-overlay mr-70">
                        <img src="{{ asset($aboutUs->image) }}" alt="">
                        {{--  <a class="video-btn video-popup" href="">
                        <img src="{{ asset($aboutUs->image) }}" alt="">
                    </a>  --}}
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="about-content-2 pr-70">
                        <p>{!! $aboutUs->content !!}</p>
                        <div class="about-btn mt-45">
                            <a class="default-btn" href="">ABOUT US</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="admission-area pt-125 pb-130 bg-img-position">
        <div class="container">
            <div class="admission-title text-center">
                <h2>News</h2>
            </div>
            <div class="admission-tab-list nav pt-80 pb-60">
                <a class="active" href="#course-categorie-all" data-bs-toggle="tab">
                    <h4>All</h4>
                </a>
                @foreach ($allNews->unique('categories') as $newsItem)
                    <a href="#course-categorie-{{ $newsItem->id }}" data-bs-toggle="tab">
                        <h4>{{ $newsItem->categories }}</h4>
                    </a>
                @endforeach
            </div>
            <div class="tab-content jump">
                <div class="tab-pane active" id="course-categorie-all">
                    <div class="course-slider-active-2 nav-style-1 owl-carousel">
                        @foreach ($allNews as $news)
                            <div class="course-categorie-bundle">
                                <div class="single-course mb-30">
                                    <div class="course-img">
                                        <a href="{{ route('frontend_news_details', $news->id) }}">
                                            <img src="{{ asset($news->images[0]->url) }}" style="height: 250px"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="course-content course-content-2">
                                        <h4><a
                                                href="{{ route('frontend_news_details', $news->id) }}">{{ $news->title }}</a>
                                        </h4>
                                        <p>{{ $news->categories }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @foreach ($allNews->unique('categories') as $newsItem)
                    <div class="tab-pane" id="course-categorie-{{ $newsItem->id }}">
                        <div class="course-slider-active-2 nav-style-1 owl-carousel">
                            @foreach ($allNews->where('categories', $newsItem->categories) as $news)
                                <div class="course-categorie-bundle">
                                    <div class="single-course mb-30">
                                        <div class="course-img">
                                            <a href="{{ route('frontend_news_details', $news->id) }}">
                                                <img src="{{ asset($news->images[0]->url) }}" style="height: 250px"
                                                    alt="">
                                            </a>
                                        </div>
                                        <div class="course-content course-content-2">
                                            <h4><a
                                                    href="{{ route('frontend_news_details', $news->id) }}">{{ $news->title }}</a>
                                            </h4>
                                            <p>{{ $news->categories }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>


        </div>
    </div>

    <div class="blog-event-area pt-20 pb-115">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title-3 mb-45 mrg-bottom-small">
                        <h2>Our <span>Blogs</span></h2>
                        {{--  <p>Hempor incididunt ut labore et dolore mm, <br> itation ullamco laboris nisi ut aliquip. </p>  --}}
                    </div>
                    <div class="blog-active">
                        @foreach ($Blogs as $blog)
                            <div class="single-blog">
                                <div class="blog-img">
                                    <a href="{{ route('frontend_blog_details', $blog->id) }}"><img
                                            src="{{ asset($blog->images[0]->url) }}" alt="" style="height: 220px"/a>
                                </div>
                                <div class="blog-content-wrap">
                                    <span>{{ $blog->category->name }}</span>
                                    <div class="blog-content">
                                        <h4><a
                                                href="{{ route('frontend_blog_details', $blog->id) }}">{{ $blog->title }}</a>
                                        </h4>
                                        {{--  <p>{{ $blog->content }}</p>  --}}
                                        <div class="blog-meta">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-user"></i>
                                                        {{ $blog->user->name }}</a></li>
                                                <li><a href="#"><i class="fa fa-comments-o"></i>
                                                        {{ $blog->comments->where('parent_id', null)->count() }}</a></li>
                                                <li><a href="#"><i
                                                            class="fa fa-thumbs-up"></i>{{ $blog->likes }}</a></li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="blog-date">
                                        <a href="#"><i class="fa fa-calendar-o"></i>
                                            {{ date('M, d Y', strtotime($blog->created_at)) }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="section-title-3 mb-45 ml-70">
                        <h2><span>Universities</span></h2>
                        {{--  <p>Hempor incididunt ut labore et dolore mm, <br> itation ullamco laboris nisi ut aliquip. </p>  --}}
                    </div>
                    <div class="event-active-2 ml-70">
                        @foreach ($universities as $university)
                            <div class="single-event single-event-2">
                                <div class="event-img">
                                    <a href="{{ route('frontend_university_details', ['id' => $university->id]) }}"><img
                                            src="{{ asset($university->banner) }}" alt=""></a>
                                    <div class="event-date-wrap">
                                        <span class="event-date">Rank</span>
                                        <span>{{ $university->ranking }}</span>
                                    </div>
                                </div>
                                <div class="event-content">
                                    <h3><a
                                            href="{{ route('frontend_university_details', ['id' => $university->id]) }}">{{ $university->name }}</a>
                                    </h3>
                                    <p>{!! substr($university->description, 0, 100) !!}..</p>
                                    <div class="event-meta-wrap">
                                        <div class="event-meta">
                                            <i class="fa fa-location-arrow"></i>
                                            <span>{{ $university->address }}</span>
                                        </div>
                                        {{--  <div class="event-meta">
                                        <i class="fa fa-clock-o"></i>
                                        <span>10:30 am</span>
                                    </div>  --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
