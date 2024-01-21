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
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Blog Category /</span> list</h4>
        </div>
    </div>
    <!-- Basic Bootstrap Table -->
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="table-responsive text-nowrap p-4">
                    <table class="table" id="DataTable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @if ($categories->isNotEmpty())

                            @foreach ($categories as $key=> $data)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $data->name }}</td>

                                <td>
                                    <a href="{{ route('category.edit', $data->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                    <a href="#" onclick="if(!confirm('Are you sure you want to delete this blog?')){event.preventDefault();}else{document.getElementById('delete-form-{{ $key }}').submit();}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                                    </a>

                                    <form id="delete-form-{{ $key }}" action="{{route('category.destroy', $data->id)}}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Category Add</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Name <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" placeholder="Enter Category Name"
                                    name="name" required />
                            </div>
                        </div>


                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                {{--  <a href="{{ route('category.index') }}" class="btn btn-dark btn-sm">Back to List</a>  --}}
                            </div>
                        </div>
                    </form>
                </div>

            </div>
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
<script>
    $('#notificationAlert').delay(3000).fadeOut('slow');
    $(document).ready(function () {
        $('#DataTable').DataTable();
    });
</script>
@endsection
