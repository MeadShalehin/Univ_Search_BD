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
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">University /</span> list</h4>
            </div>
            <div class="my-auto">
                <a href="{{ route('university.create') }}">
                    <button class="btn btn-info rounded-pill">Add University</button>
                </a>
            </div>
        </div>
        <!-- Basic Bootstrap Table -->
        <div class="card">

            <div class="table-responsive text-nowrap p-4">
                <table class="table" id="DataTable">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @if ($universities->isNotEmpty())
                            @foreach ($universities as $key => $data)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ asset($data->logo) }}" alt="University Image"
                                            style="max-width: 100px;max-height:80px;">
                                    </td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->contact }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('update-university-status', ['id' => $data->id]) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-{{ $data->status == 1 ? 'success' : 'warning' }} btn-sm">
                                                {{ $data->status == 1 ? 'Active' : 'Inactive' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('university.edit', $data->id) }}"
                                            class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a href="#"
                                            onclick="if(!confirm('Are you sure you want to delete this University?')){event.preventDefault();}else{document.getElementById('delete-form-{{ $key }}').submit();}"
                                            class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                                        </a>
                                        <a href="" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modalScrollable{{ $data->id }}">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>

                                        <form id="delete-form-{{ $key }}"
                                            action="{{ route('university.destroy', $data->id) }}" method="POST"
                                            style="display: none;">
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
                                                                    for="basic-default-contact">Contact</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="basic-default-contact"
                                                                        value="{{ $data->contact ?? '' }}" readonly />
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-email">Email</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="basic-default-email"
                                                                        value="{{ $data->email ?? '' }}" readonly />
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-address">Address</label>
                                                                <div class="col-sm-10">
                                                                    {{--  <p class="form-control">{!! $data->content !!}</p>  --}}
                                                                    <textarea class="form-control" name="content" id="basic-default-address" cols="30" rows="10" readonly>{!! $data->address ?? '' !!}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-website">Website</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="basic-default-website"
                                                                        value="{{ $data->website ?? '' }}" readonly />
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-short_description">Short
                                                                    Des.</label>
                                                                <div class="col-sm-10">
                                                                    {{--  <p class="form-control">{!! $data->content !!}</p>  --}}
                                                                    <textarea class="form-control" name="content" id="basic-default-short_description" cols="20" rows="10"
                                                                        readonly>{!! $data->short_description ?? '' !!}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-description">Description</label>
                                                                <div class="col-sm-10">
                                                                    {{--  <p class="form-control">{!! $data->content !!}</p>  --}}
                                                                    <textarea class="form-control" name="content" id="basic-default-description" cols="30" rows="10"
                                                                        readonly>{!! $data->description ?? '' !!}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-gps">Iframe Link</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="basic-default-gps"
                                                                        value="{{ $data->gps ?? '' }}" readonly />
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-ranking">Ranking</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="basic-default-ranking"
                                                                        value="{{ $data->ranking ?? '' }}" readonly />
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-scholarship">Scholarship</label>
                                                                <div class="col-sm-10">
                                                                    {{--  <p class="form-control">{!! $data->content !!}</p>  --}}
                                                                    <textarea class="form-control" name="content" id="basic-default-scholarship" cols="30" rows="10"
                                                                        readonly>{!! $data->scholarship ?? '' !!}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-waiver">Waiver</label>
                                                                <div class="col-sm-10">
                                                                    {{--  <p class="form-control">{!! $data->content !!}</p>  --}}
                                                                    <textarea class="form-control" name="content" id="basic-default-waiver" cols="30" rows="10" readonly>{!! $data->waiver ?? '' !!}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-departments">Departments</label>
                                                                <div class="col-sm-10">
                                                                    @php
                                                                        $departmentsJson = $data->department_id ?? '[]';
                                                                        $departmentIds = json_decode($departmentsJson);
                                                                        $departments = \App\Models\Department::whereIn('id', $departmentIds)->pluck('name')->implode(', ');
                                                                    @endphp
                                                                    <input type="text" class="form-control"
                                                                        id="basic-default-departments"
                                                                        value="{{ $departments ?? '' }}"
                                                                        readonly />
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-banner">
                                                                    Banner</label>
                                                                <div class="col-sm-10">
                                                                    <img src="{{ asset($data->banner) }}"
                                                                        id="basic-default-banner" alt="University Banner"
                                                                        style="max-width: 100px;max-height:80px;">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-logo">
                                                                    Logo</label>
                                                                <div class="col-sm-10">
                                                                    <img src="{{ asset($data->logo) }}"
                                                                        id="basic-default-logo" alt="University logo"
                                                                        style="max-width: 100px;max-height:80px;">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-image2">
                                                                    Images</label>
                                                                <div class="col-sm-10">
                                                                    @if ($data->images->isNotEmpty())
                                                                        @foreach ($data->images as $image)
                                                                            <img src="{{ asset($image->url) }}"
                                                                                id="basic-default-image2" alt="University Images"
                                                                                style="max-width: 100px;max-height:80px;">
                                                                        @endforeach
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-facebook">Facebook</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="basic-default-facebook"
                                                                        value="{{ $data->facebook ?? '' }}" readonly />
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-linkedin">Linkedin</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="basic-default-linkedin"
                                                                        value="{{ $data->linkedin ?? '' }}" readonly />
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-students">Total Students</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="basic-default-students"
                                                                        value="{{ $data->students ?? '' }}" readonly />
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-award">Total Award</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="basic-default-award"
                                                                        value="{{ $data->award ?? '' }}" readonly />
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-graduate">Total Graduate</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="basic-default-graduate"
                                                                        value="{{ $data->graduate ?? '' }}" readonly />
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-faculties">Total Faculties</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="basic-default-faculties"
                                                                        value="{{ $data->faculties ?? '' }}" readonly />
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-ssc">Min. SSC Req.</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="basic-default-ssc"
                                                                        value="{{ $data->ssc ?? '' }}" readonly />
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label class="col-sm-2 col-form-label"
                                                                    for="basic-default-hsc">Min. HSC Req.</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="basic-default-hsc"
                                                                        value="{{ $data->hsc ?? '' }}" readonly />
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
                                                            href="{{ route('university.edit', $data->id) }}">Edit</a>
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
    {{--  <script>
        // Handle toggle switch change event
        $('input[type="checkbox"]').change(function() {
            var isChecked = $(this).prop('checked');
            var universityId = $(this).data('id');

            // Assuming you have a route to update the university status
            $.ajax({
                type: 'POST',
                url: '{{ route('update-university-status') }}',
                data: {
                    id: universityId,
                    status: isChecked ? 1 : 0,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        // Status updated successfully
                    } else {
                        // Handle error if needed
                        console.error('Error updating status');
                    }
                },
                error: function(error) {
                    // Handle error
                    console.error('Error:', error);
                }
            });
        });
    </script>  --}}
@endsection
