@extends('layouts.frontendpanel.master')

@section('content')
    <div class="breadcrumb-area">
        <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-3 pt-100 pb-95"
            style="background-image:url({{ asset('FrontendPanelAsset') }}/img/bg/breadcrumb-bg-5.jpg);">
            <div class="container">
                <h2>{{ $blog->title }}</h2>
                {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                .</p> --}}
            </div>
        </div>
        <div class="breadcrumb-bottom">
            <div class="container">
                <ul>
                    <li><a href="{{ route('frontend_dashboard') }}">Home</a><span><span><a
                                    href="{{ route('frontend_blog') }}"><i
                                        class="fa fa-angle-double-right"></i>Blogs</a></span> /
                            {{ $blog->title }}</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="event-area pt-130 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="blog-details-wrap mr-40">
                        <div class="blog-details-top">
                            {{-- <img src="{{ asset('FrontendPanelAsset') }}/img/blog/blog-details.jpg" alt=""> --}}
                            <img src="{{ asset($blog->images[0]->url) }}" alt="" style="height: 370px">
                            <div class="blog-details-content-wrap">
                                <div class="b-details-meta-wrap">
                                    <div class="b-details-meta">
                                        <ul>
                                            <li><i
                                                    class="fa fa-calendar-o"></i>{{ date('d M, Y', strtotime($blog->created_at)) }}
                                            </li>
                                            <li><i class="fa fa-user"></i> {{ $blog->user->name }}</li>

                                            <li><i
                                                    class="fa fa-comments-o"></i>{{ $blog->comments->where('parent_id', null)->count() }}
                                            </li>
                                            <li><i class="fa fa-thumbs-up"></i>{{ $blog->likes }}</li>

                                        </ul>
                                    </div>
                                    <span>{{ $blog->category->name }}</span>
                                </div>
                                <h3>{{ $blog->title }}</h3>
                                <p>{!! $blog->content !!}</p>
                                {{--  <textarea name="" id="basic-default-content" cols="30" rows="10">{{ $blog->content ?? '' }}</textarea>  --}}
                                <div class="blog-share-tags">
                                    <div class="blog-share">
                                        @if (auth()->check())
                                            <form method="POST" action="{{ route('likeBlog', $blog->id) }}">
                                                @csrf
                                                <button type="submit"
                                                    class="like-button {{ auth()->user()->likedBlogs->contains($blog)? 'blog-btn-close': 'blog-btn' }}">
                                                    <i class="fa fa-thumbs-up"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="blog-comment">
                            <div class="blog-comment-btn mt-40 mb-40 commrnt-toggle">
                                <a href="#">VIEW COMMENT</a>
                            </div>
                            <div class="blog-comment-content-wrap">
                                <h4>COMMENT</h4>
                                @foreach ($blog->comments as $key => $comment)
                                    @if ($comment->parent_id === null)
                                        <div class="single-blog-comment mt-3">
                                            <div class="blog-comment-img">
                                                <img src="{{ asset('FrontendPanelAsset') }}/img/blog/blog-comment.jpg"
                                                    alt="">
                                            </div>
                                            <div class="blog-comment-content">
                                                <h5>{{ $comment->user->name }}</h5>
                                                <p>{{ $comment->content }}</p>
                                                @if (auth()->id() === $comment->user_id)
                                                    <a title="Delete Comment" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal" href="#"
                                                        style="color: red">Delete</a>

                                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <p>Are you sure you want to delete this comment?</p>
                                                                <form id="delete-comment-form"
                                                                    action="{{ route('comments_destroy') }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $comment->id }}">
                                                                    <button type="submit" class="btn"
                                                                        style="color: red">Delete</button>
                                                                </form>
                                                                <button class="btn"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if (auth()->check())
                                                    <a title="Reply Comment" href="#" class="reply-toggle">Reply</a>
                                                    <div class="reply-form" style="display: none;">
                                                        <form
                                                            action="{{ route('comments_reply', ['parentComment' => $comment->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            <input type="hidden" name="blog_id"
                                                                value="{{ $blog->id }}">
                                                            <textarea name="content" rows="3" cols="84" placeholder="Your reply..." class="form-control"></textarea>
                                                            <div class="d-flex justify-content-end">
                                                                <button type="submit"
                                                                    class="btn btn-success mt-1">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                    @foreach ($comment->replies as $reply)
                                        <div class="single-blog-comment child-comment">
                                            <div class="blog-comment-img">
                                                <img src="{{ asset('FrontendPanelAsset') }}/img/blog/blog-comment-2.jpg"
                                                    alt="">
                                            </div>
                                            <div class="blog-comment-content">
                                                <h5>{{ $reply->user->name }}</h5>
                                                <p>{{ $reply->content }}</p>
                                                @if (auth()->id() === $reply->user_id)
                                                    <a title="Delete Reply" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{ $reply->id }}" href="#"
                                                        style="color: red">Delete</a>

                                                    <div class="modal fade" id="exampleModal{{ $reply->id }}"
                                                        tabindex="-1" role="dialog">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <p>Are you sure you want to delete this reply?</p>
                                                                <form id="delete-comment-form"
                                                                    action="{{ route('comments_destroy') }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $reply->id }}">
                                                                    <button type="submit" class="btn"
                                                                        style="color: red">Delete</button>
                                                                </form>
                                                                <button class="btn"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>

                        @if (auth()->check())
                            <div class="leave-comment-area">
                                <h3>Leave A Comment</h3>
                                <form action="{{ route('comments_store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="leave-form leave-btn">
                                                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                                <textarea name="content" placeholder="Add a comment"></textarea>
                                                <input type="submit" value="Post Your Comment">
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        @endif
                        <div class="related-course pt-70">
                            @if ($relatedBlogs->count() > 0)
                                <div class="related-title mb-45">
                                    <h3>Related Category Blogs</h3>
                                </div>
                                <div class="related-slider-active related-blog-slide pb-80">
                                    @foreach ($relatedBlogs as $relatedBlog)
                                        <div class="single-blog">
                                            <div class="blog-img">
                                                <a
                                                    href="{{ route('frontend_blog_details', ['id' => $relatedBlog->id]) }}"><img
                                                        src="{{ asset($relatedBlog->images[0]->url) }}"
                                                        style="height: 200px " alt=""></a>
                                            </div>
                                            <div class="blog-content-wrap">
                                                <span>{{ $relatedBlog->category->name }}</span>
                                                <div class="blog-content">
                                                    <h4><a
                                                            href="{{ route('frontend_blog_details', ['id' => $relatedBlog->id]) }}">{{ $relatedBlog->title }}</a>
                                                    </h4>
                                                    <div class="blog-meta">
                                                        <ul>
                                                            <li><a href="#"><i
                                                                        class="fa fa-user"></i>{{ $relatedBlog->user->name }}</a>
                                                            </li>
                                                            <li><a href="#"><i
                                                                        class="fa fa-comments-o"></i>{{ $relatedBlog->comments()->where('parent_id', null)->count() }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="blog-date">
                                                    <a
                                                        href="{{ route('frontend_blog_details', ['id' => $relatedBlog->id]) }}"><i
                                                            class="fa fa-calendar-o"></i>{{ date('d M, Y', strtotime($relatedBlog->created_at)) }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="sidebar-style">
                        <div class="sidebar-tag-wrap">
                            <div class="sidebar-title mb-40">
                                <h4>Tag</h4>
                            </div>
                            <div class="sidebar-tag">
                                <ul>
                                    @foreach ($tags as $tag)
                                        <li><a href="{{ route('blog_tag', ['tag' => $tag]) }}">{{ $tag }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="sidebar-category mb-40 mt-10">
                            <div class="sidebar-title mb-40">
                                <h4>Blog Category</h4>
                            </div>
                            <div class="category-list">
                                <ul>
                                    @foreach ($categories as $category)
                                        <li><a
                                                href="{{ route('categorywise_blog', ['id' => $category->id]) }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-recent-post mb-35">
                            @if ($recentBlogs->count() > 0)
                                <div class="sidebar-title mb-40">
                                    <h4>Recent Post</h4>
                                </div>
                                <div class="recent-post-wrap">
                                    @foreach ($recentBlogs as $recentBlog)
                                        <div class="single-recent-post">
                                            <div class="recent-post-img">
                                                <a href="{{ route('frontend_blog_details', ['id' => $recentBlog->id]) }}"><img
                                                        src="{{ asset($recentBlog->images[0]->url) }}"
                                                        style="height: 70px" alt=""></a>
                                            </div>
                                            <div class="recent-post-content">
                                                <h5><a
                                                        href="{{ route('frontend_blog_details', ['id' => $recentBlog->id]) }}">{{ $recentBlog->title }}</a>
                                                </h5>
                                                <span>{{ $recentBlog->category->name }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const replyToggles = document.querySelectorAll('.reply-toggle');
        replyToggles.forEach(replyToggle => {
            replyToggle.addEventListener('click', (event) => {
                event.preventDefault();
                const replyForm = replyToggle.nextElementSibling;
                replyForm.style.display = replyForm.style.display === 'none' ? 'block' : 'none';
            });
        });
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#basic-default-content'))
            .catch(error => {
                console.error(error);
            });
    </script>



@endsection
