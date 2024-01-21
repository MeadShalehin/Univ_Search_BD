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
        <div class="d-flex justify-content-between">
            <div>
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">About Us /</span> list</h4>
            </div>
        </div>
        <!-- Basic Bootstrap Table -->
        <div class="card">

            <div class="table-responsive text-nowrap p-4">
                <table class="table" id="DataTable">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <td>
                                <img src="{{ asset($aboutUs->image) }}" alt="About Us Image"
                                    style="max-width: 100px;max-height:80px;">
                            </td>
                            <td>{{ $aboutUs->title }}</td>
                            <td>{{ $aboutUs->phone }}</td>
                            <td>{{ $aboutUs->email }}</td>
                            <td>{{ date('h:ia', strtotime($aboutUs->created_at)) }} <br>
                                {{ date('d M, Y', strtotime($aboutUs->created_at)) }}
                            </td>

                            <td>
                                <a href="{{ route('aboutUs.edit', $aboutUs->id) }}" class="btn btn-primary btn-sm"><i
                                        class="fa fa-pencil"></i></a>
                                </a>
                                <a href="" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modalScrollable{{ $aboutUs->id }}">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>

                                <div class="modal fade" id="modalScrollable{{ $aboutUs->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalScrollableTitle">About US Full Information
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="row mb-3">
                                                        <label class="col-sm-2 col-form-label"
                                                            for="basic-default-title">Title</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control"
                                                                id="basic-default-title" value="{{ $aboutUs->title ?? '' }}"
                                                                readonly />
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-sm-2 col-form-label"
                                                            for="basic-default-content">Content</label>
                                                        <div class="col-sm-10">
                                                            {{--  <p class="form-control">{!! $data->content !!}</p>  --}}
                                                            <textarea class="form-control" name="content" id="basic-default-content" cols="30" rows="10" readonly>{!! $aboutUs->content ?? '' !!}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-sm-2 col-form-label" for="basic-default-image2">
                                                            Images</label>
                                                        <div class="col-sm-10">
                                                            <img src="{{ asset($aboutUs->image) }}" alt="Blog Image"
                                                                style="max-width: 100px;max-height:80px;">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label class="col-sm-2 col-form-label" for="basic-default-tag">Phone
                                                            No.</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control"
                                                                id="basic-default-tag" value="{{ $aboutUs->phone ?? '' }}"
                                                                readonly />
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label class="col-sm-2 col-form-label"
                                                            for="basic-default-views">Email</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control"
                                                                id="basic-default-views"
                                                                value="{{ $aboutUs->email ?? '' }}" readonly />
                                                        </div>
                                                    </div>
                                            </div>
                                            </form>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <a class="btn btn-primary"
                                                    href="{{ route('aboutUs.edit', $aboutUs->id) }}">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->



    </div>
@endsection

@section('header_css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@endsection

@section('footer_js')
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>
    {{--  <script>
        ClassicEditor
            .create(document.querySelector('#basic-default-content'))
            .catch(error => {
                console.error(error);
            });
    </script>  --}}
    <script>
        $('#notificationAlert').delay(3000).fadeOut('slow');
        $(document).ready(function() {
            $('#DataTable').DataTable();
        });
    </script>
@endsection
