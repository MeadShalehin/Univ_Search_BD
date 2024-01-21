@extends('layouts.frontendpanel.master')

@section('content')
    <div class="breadcrumb-area">
        <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-2 pt-100 pb-95"
            style="background-image:url({{ asset('FrontendPanelAsset') }}/img/bg/breadcrumb-bg-2.jpg);">
            <div class="container">
                <h2>{{ $news->title }}</h2>
                {{--  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore .</p>  --}}
            </div>
        </div>
        <div class="breadcrumb-bottom">
            <div class="container">
                <ul>
                    <li><a href="{{ route('frontend_dashboard') }}">Home</a> <span><span><a href="{{ route('frontend_news') }}"><i
                                class="fa fa-angle-double-right"></i>News</a> / {{ $news->title }}</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="course-details-area pt-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="course-left-wrap mr-40">
                        <div class="apply-area">
                            <img src="{{ asset($news->images[0]->url) }}" style="height: 400px" alt="">
                            {{--  <div class="course-apply-btn">
                            <a href="#" class="default-btn">APPLY NOW</a>
                        </div>  --}}
                        </div>

                        <div class="over-view-content mt-20">
                            <h4>News Category: {{ $news->categories }}</h4>
                            <h5>News Title: {{ $news->title }}</h5>
                            <p>{!! $news->content !!}</p>
                        </div>
                    </div>
                    <div class="related-course pt-70">
                        <div class="related-title mb-45 mrg-bottom-small">
                            <h3>Related News</h3>
                            {{--  <p>Hempor incididunt ut labore et dolore mm, itation ullamco laboris <br>nisi ut aliquip. </p>  --}}
                        </div>
                        <div class="related-slider-active">
                            @foreach ($relatedNews as $relatedNews)
                            <div class="single-course">
                                <div class="course-img">
                                    <a href="{{ route('frontend_news_details',['id' => $relatedNews->id]) }}"><img class="animated"
                                            src="{{ asset($relatedNews->images[0]->url) }}"
                                            alt="" style="height: 220px"></a>
                                </div>
                                <div class="course-content">
                                    <h4><a href="{{ route('frontend_news_details',['id' => $relatedNews->id]) }}">{{ $relatedNews->title }}</a></h4>
                                    {{--  <p>magna aliqua. Ut enim ad minim veniam, nisi ut aliquiptempor incid.</p>  --}}
                                </div>
                                <div class="course-position-content">
                                    <div class="credit-duration-wrap">
                                        <div class="sin-credit-duration">
                                            <i class="fa fa-user"></i>
                                            <span>{{ $relatedNews->user->name }}</span>
                                        </div>
                                        <div class="sin-credit-duration">
                                            <i class="fa fa-calendar"></i>
                                            <span>{{ date('d M, Y', strtotime($relatedNews->created_at)) }}</span>
                                        </div>
                                    </div>
                                    <div class="course-btn">
                                        <a class="default-btn" href="{{ route('frontend_news_details',['id' => $relatedNews->id]) }}">More Information</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4">
                    <div class="sidebar-style sidebar-res-mrg-none">
                        <div class="sidebar-search mb-40">
                            <div class="sidebar-title mb-40">
                                <h4>Search</h4>
                            </div>
                            <form action="{{ route('search_news') }}" method="GET">
                                <input type="text" name="query" placeholder="Search by title/content/Category">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>

                        <div class="sidebar-recent-post mb-35">
                            <div class="sidebar-title mb-40">
                                <h4>Recent News</h4>
                            </div>
                            <div class="recent-post-wrap">
                                @foreach ($recentNews as $recentNews)
                                <div class="single-recent-post">
                                    <div class="recent-post-img">
                                        <a href="{{ route('frontend_news_details',['id' => $recentNews->id]) }}"><img src="{{ asset($recentNews->images[0]->url) }}"
                                                alt="" style="height: 70px"></a>
                                    </div>
                                    <div class="recent-post-content">
                                        <h5><a href="{{ route('frontend_news_details',['id' => $recentNews->id]) }}">{{ $recentNews->title }}</a></h5>
                                        <span>{{ $recentNews->categories }}</span>
                                        {{--  <p>Datat non proident qui offici.hafw adec qart.</p>  --}}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="sidebar-category mb-40">
                            <div class="sidebar-title mb-40">
                                <h4>News Category</h4>
                            </div>
                            <div class="category-list">
                                <ul>
                                    @foreach ($categories as $category)
                                    <li><a href="{{ route('categorywise_news',['name' => $category]) }}">{{ $category }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
@endsection
