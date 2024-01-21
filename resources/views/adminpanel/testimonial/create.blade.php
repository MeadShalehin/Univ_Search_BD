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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Testimonial / </span> Create</h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Testimonial Information</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-university">University <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <select name="university_id" class="form-control" id="basic-default-university" required>
                                    <option value="">Select University</option>
                                    @foreach ($universities as $university)
                                        <option value="{{ $university->id }}">{{ $university->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-faculty_name">Faculty Name<span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-faculty_name" placeholder="Enter Faculty Name"
                                    name="faculty_name" required />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-faculty_designation">Faculty Designation<span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-faculty_designation" placeholder="Enter Faculty Designation"
                                    name="faculty_designation" required />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-content">Content <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="basic-default-content" cols="30" rows="10" placeholder="Enter Content" maxlength="484"></textarea>
                                <span style="font-weight: 800; color:red">(Write maximum 80 words or 484 charcters)</span>
                                @error('content')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-image">Faculty Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="basic-default-image" name="faculty_image" required/>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                <a href="{{ route('testimonial.index') }}" class="btn btn-dark btn-sm">Back to List</a>
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

<script>
    $('#notificationAlert').delay(3000).fadeOut('slow');
</script>
@endsection
