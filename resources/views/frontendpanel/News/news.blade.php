@extends('layouts.frontendpanel.master')

@section('content')
    <div class="breadcrumb-area">
        <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-2 pt-100 pb-95"
            style="background-image:url({{ asset('FrontendPanelAsset') }}/img/bg/breadcrumb-bg-2.jpg);">
            <div class="container">
                <h2>News</h2>
            </div>
        </div>
        <div class="breadcrumb-bottom">
            <div class="container">
                <ul>
                    <li><a href="{{ route('frontend_dashboard') }}">Home</a> <span><a href="{{ route('frontend_news') }}"><i
                                class="fa fa-angle-double-right"></i>News</a></span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-50">
            <div class="col-lg-8 col-md-12 order-2 order-md-1">
            </div>
            <div class="col-lg-4 col-md-12 order-1 order-md-2">
                <div class="sidebar-search mb-40">
                    <form action="{{ route('search_news') }}" method="GET">
                        <input type="text" name="query" placeholder="Search by title/content/Category">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach ($allNews->groupBy('categories') as $category => $newsItems)
        <div class="course-area bg-img">
            <div class="container">
                <div class="section-title mb-75 course-mrg-small">
                    <h2><span>{{ $category }}</span> News</h2>
                </div>

                <div class="course-slider-active-3">
                    @foreach ($newsItems as $news)
                        <div class="single-course">
                            <div class="course-img">
                                <a href="{{ route('frontend_news_details', ['id' => $news->id]) }}">
                                    <img class="animated" src="{{ asset($news->images[0]->url) }}" style="height: 270px"
                                        alt="">
                                </a>
                            </div>
                            <div class="course-content">
                                <h4><a
                                        href="{{ route('frontend_news_details', ['id' => $news->id]) }}">{{ $news->title }}</a>
                                </h4>
                            </div>
                            <div class="course-position-content">
                                <div class="credit-duration-wrap">
                                    <div class="sin-credit-duration">
                                        <i class="fa fa-user"></i>
                                        <span>{{ $news->user->name }}</span>
                                    </div>
                                    <div class="sin-credit-duration">
                                        <i class="fa fa-calendar"></i>
                                        <span>{{ date('d M, Y', strtotime($news->created_at)) }}</span>
                                    </div>
                                </div>
                                <div class="course-btn">
                                    <a class="default-btn"
                                        href="{{ route('frontend_news_details', ['id' => $news->id]) }}">More
                                        Information</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
@endsection
