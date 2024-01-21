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
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">University Departments /</span> list</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="table-responsive text-nowrap p-4">
                    <table class="table" id="DataTable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                {{--  <th>Subjects</th>  --}}
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @if ($departments->isNotEmpty())

                            @foreach ($departments as $key=> $data)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $data->name }}</td>
                                {{--  <td>{{ $data->subject }}</td>  --}}
                                <td>
                                    <form method="POST" action="{{ route('update-department-status', ['id' => $data->id]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-{{ $data->status == 1 ? 'success' : 'warning' }} btn-sm">
                                            {{ $data->status == 1 ? 'Active' : 'Inactive' }}
                                        </button>
                                    </form>
                                </td>

                                <td>
                                    <a href="{{ route('department.edit', $data->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                    <a href="#" onclick="if(!confirm('Are you sure you want to delete this blog?')){event.preventDefault();}else{document.getElementById('delete-form-{{ $key }}').submit();}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                                    </a>
                                    <a href="" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modalScrollable{{ $data->id }}">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>

                                    <form id="delete-form-{{ $key }}" action="{{route('department.destroy', $data->id)}}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <div class="modal fade" id="modalScrollable{{ $data->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalScrollableTitle">University Full
                                                        Information</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="row mb-3">
                                                            <label class="col-sm-2 col-form-label"
                                                                for="basic-default-name">Name</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control"
                                                                    id="basic-default-name"
                                                                    value="{{ $data->name ?? '' }}" readonly />
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <label class="col-sm-2 col-form-label"
                                                                for="basic-default-subject">Subjects</label>
                                                            <div class="col-sm-10">
                                                                <textarea name="" class="form-control" id="basic-default-subject" cols="30" rows="10" readonly>{{ $data->subject ?? '' }}</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <label class="col-sm-2 col-form-label"
                                                                for="basic-default-status">Status</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control"
                                                                    id="basic-default-status"
                                                                    value="{{ $data->status == 1 ? 'Active' : 'Inactive' }}" readonly />
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <a class="btn btn-primary"
                                                        href="{{ route('department.edit', $data->id) }}">Edit</a>
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
        </div>
        <div class="col-md-5">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Department Add</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('department.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Name <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" placeholder="Enter Category Name"
                                    name="name" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-subject">Subjects</label>
                            <div class="col-sm-10">
                                <select id="basic-default-subject" class="form-control subject" name="subject[]" multiple>
                                    <!-- Options for subjects here -->
                                    <option value="">Select Subjects</option>
                                    <option value="bangla">Bangla</option>
                                    <option value="english">English</option>
                                    <option value="gmath">General Math</option>
                                    <option value="hmath">Higher Math</option>
                                    <option value="physics">Physics</option>
                                    <option value="chemistry">Chemistry</option>
                                    <option value="biology">Biology</option>
                                    <option value="ict">ICT</option>
                                    <option value="accounting">Accounting</option>
                                    <option value="finance">Finance</option>
                                    <option value="marketing">Marketing</option>
                                    <option value="management">Management</option>
                                    <option value="economics">Economics</option>
                                    <option value="statistics">Statistics</option>
                                </select>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                {{--  <a href="{{ route('department.index') }}" class="btn btn-dark btn-sm">Back to List</a>  --}}
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>





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
