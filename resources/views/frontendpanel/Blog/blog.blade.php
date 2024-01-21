@extends('layouts.frontendpanel.master')

@section('content')
    <div class="breadcrumb-area">
        <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-3 pt-100 pb-95"
            style="background-image:url({{ asset('FrontendPanelAsset') }}/img/bg/breadcrumb-bg-5.jpg);">
            <div class="container">
                <h2>Blogs</h2>
                </p>
            </div>
        </div>
        <div class="breadcrumb-bottom">
            <div class="container">
                <ul>
                    <li><a href="{{ route('frontend_dashboard') }}">Home</a> <span><a href="{{ route('frontend_blog') }}"><i
                        class="fa fa-angle-double-right"></i>Blogs</a></span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="event-area pt-130 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="blog-all-wrap mr-40">
                        <div class="row">
                            @php
                                $blogPerPage = 9;
                                $currentPage = request()->get('page', 1);
                                $startIndex = ($currentPage - 1) * $blogPerPage;
                                $blogsArray = $blogs->toArray(); // Convert the collection to an array
                                $paginatedBlogs = array_slice($blogsArray, $startIndex, $blogPerPage);
                            @endphp
                            @foreach ($paginatedBlogs as $blogData)
                                {{--  {{ dd($blogData) }}  --}}
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="single-blog mb-30">
                                        <div class="blog-img">
                                            {{--  <a href="{{ route('frontend_blog_details') }}"><img src="{{ asset('FrontendPanelAsset') }}/img/blog/blog-5.jpg" alt=""></a>  --}}
                                            <a href="{{ route('frontend_blog_details', ['id' => $blogData['id']]) }}"><img
                                                    src="{{ asset($blogData['images'][0]['url']) }}" style="height: 200px"
                                                    alt=""></a>
                                        </div>
                                        <div class="blog-content-wrap">
                                            <span>{{ $blogData['category_id'] ? $categories_name[$blogData['category_id']] : '' }}</span>
                                            <div class="blog-content">
                                                <h4><a
                                                        href="{{ route('frontend_blog_details', ['id' => $blogData['id']]) }}">{{ $blogData['title'] ?? '' }}</a>
                                                </h4>
                                                {{--  <p>doloremque laudan tium, totam ersps uns iste natus</p>  --}}
                                                <div class="blog-meta">
                                                    <ul>
                                                        <li><a href="#"><i
                                                                    class="fa fa-user"></i>{{ $users[$blogData['user_id']] ?? '' }}</a>
                                                        </li>

                                                        @php
                                                            $mainCommentsCount = 0;
                                                        @endphp

                                                        @foreach ($blogData['comments'] as $comment)
                                                            @if ($comment['parent_id'] === null)
                                                                @php
                                                                    $mainCommentsCount++;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                        <li><a href="#"><i
                                                                    class="fa fa-comments-o"></i>{{ $mainCommentsCount }}
                                                            </a></li>

                                                        <li><a href="#"><i class="fa fa-thumbs-up"></i>{{ $blogData['likes'] }}</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="blog-date">
                                                <a href="#"><i class="fa fa-calendar-o"></i>
                                                    {{ date('d M, Y', strtotime($blogData['created_at'])) }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="pro-pagination-style text-center mt-25">
                            <ul>
                                @if ($currentPage > 1)
                                    <li><a class="prev" href="?page={{ $currentPage - 1 }}"><i
                                                class="fa fa-angle-double-left"></i></a></li>
                                @endif
                                @for ($i = 1; $i <= ceil(count($blogs) / $blogPerPage); $i++)
                                    <li><a class="{{ $i == $currentPage ? 'active' : '' }}"
                                            href="?page={{ $i }}">{{ $i }}</a></li>
                                @endfor
                                @if ($currentPage < ceil(count($blogs) / $blogPerPage))
                                    <li><a class="next" href="?page={{ $currentPage + 1 }}"><i
                                                class="fa fa-angle-double-right"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="sidebar-style">
                        <div class="sidebar-search mb-40">
                            <div class="sidebar-title mb-40">
                                <h4>Search</h4>
                            </div>
                            <form action="{{ route('search_blogs') }}" method="GET">
                                <input type="text" name="query" placeholder="Search by title/content/tag">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="sidebar-category mb-40">
                            <div class="sidebar-title mb-40">
                                <h4>Blog Category</h4>
                            </div>
                            <div class="category-list">
                                <ul>
                                    @foreach ($categories as $category)
                                        <li><a href="{{ route('categorywise_blog',['id' => $category->id]) }}">{{ $category->name ?? '' }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
