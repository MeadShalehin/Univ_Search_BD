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
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Contact /</span> list</h4>
            </div>
         
        </div>
        <!-- Basic Bootstrap Table -->
        <div class="card">

            <div class="table-responsive text-nowrap p-4">
                <table class="table" id="DataTable">
                    <thead>
                        <tr>
                            <th>SL</th>
                             <th>Name</th>
                             <th>Email</th>
                             <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @if ($contacts->isNotEmpty())
                            @foreach ($contacts as $key => $data)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ date('h:ia', strtotime($data->created_at)) }} <br>
                                        {{ date('d M, Y', strtotime($data->created_at)) }}
                                    </td>

                                   
                                    <td>
                                        <a href="" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modalScrollable{{ $data->id }}">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <div class="modal fade" id="modalScrollable{{ $data->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalScrollableTitle">Contact Information</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            <div class="row mb-3">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default_name">Name</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="basic-default_name"
                                                                        value="{{ $data->name ?? '' }}" readonly />
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-email">
                                                                    Email</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="basic-default-email"
                                                                        value="{{ $data->email ?? '' }}"
                                                                        readonly />
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-subject">
                                                                    Subject</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="basic-default-subject"
                                                                        value="{{ $data->subject ?? '' }}"
                                                                        readonly />
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-content">Message</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control" name="content" id="basic-default-content" cols="30" rows="10" readonly>{{ $data->message }}</textarea>
                                                                </div>
                                                            </div>
                                                            
                                                        </form>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-dismiss="modal">
                                                            Close
                                                        </button>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </td>
                                </tr>
                            @endforeach
                        @endif

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
 
    <script>
        $('#notificationAlert').delay(3000).fadeOut('slow');
        $(document).ready(function() {
            $('#DataTable').DataTable();
        });
    </script>
@endsection
