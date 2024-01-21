@extends('layouts.adminpanel.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        @if (\Session::has('success'))
            <div class="row">
                <div class="col-md-12">
                    <div id="notificationAlert" style="display: block;">
                        <div class="alert alert-warning">
                            <span style="color:black;">
                                {!! \Session::get('success') !!}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Blog / </span> Edit</h4>
        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Blog Information</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-title">title <span
                                        style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="basic-default-title"
                                        placeholder="Enter Title" name="title" value="{{ $blog->title ?? '' }}"
                                        required />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-category">Category <span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <select name="category_id" class="form-control" id="basic-default-category">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option @if ($category->id == $blog->category_id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-content">Content <span
                                        style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="basic-default-content" cols="30" rows="10">{{ $blog->content ?? '' }}</textarea>
                                    @error('content')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label" for="basic-default-image">Images </label>
                                        <div class="col-sm-8">
                                            <input type="file" class="form-control" id="basic-default-image"
                                                name="file[]" multiple />
                                            <span style="font-weight: 800; color:red">(Upload if you want to change
                                                image)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label" for="basic-default-image2">Preview
                                            Images</label>
                                        <div class="col-sm-10">
                                            @if ($blog->images->isNotEmpty())
                                                @foreach ($blog->images as $image)
                                                    <img src="{{ asset($image->url) }}" alt="Blog Image"
                                                        style="max-width: 100px;max-height:80px;">
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-tag">Tag</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="basic-default-tag"
                                        name="tag" value="{{ $blog->tag ?? '' }}" placeholder="Enter tags separated by commas" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-status">Status </label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="basic-default-status" name="status" required>
                                        <option value="1" @if (isset($blog) && $blog->status == 1) selected @endif>Active</option>
                                        <option value="0" @if (isset($blog) && $blog->status == 0) selected @endif>Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-success btn-sm">Save Changes</button>
                                    <a href="{{ route('blog.index') }}" class="btn btn-dark btn-sm">Back to List</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>

    </div>

@endsection

@section('footer_js')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#basic-default-content' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>
        $('#notificationAlert').delay(3000).fadeOut('slow');
    </script>
@endsection
