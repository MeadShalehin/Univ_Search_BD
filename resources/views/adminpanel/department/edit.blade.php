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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Department / </span> Edit</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Department Information</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('department.update', $department->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Name <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" placeholder="Enter Department Name"
                                    name="name" value="{{ $department->name ?? '' }}" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-subject">Subjects</label>
                            <div class="col-sm-10">
                                <select id="basic-default-subject" class="form-control subject" name="subject[]" multiple>
                                    <!-- Options for subjects here -->
                                    <option value="">Select Subjects</option>
                                    <option value="bangla"  {{ in_array( 'bangla', $selected_subject) ? 'selected' : '' }}>Bangla</option>
                                    <option value="english" {{ in_array( 'english', $selected_subject) ? 'selected' : '' }}>English</option>
                                    <option value="gmath" {{ in_array( 'gmath', $selected_subject) ? 'selected' : '' }}>General Math</option>
                                    <option value="hmath" {{ in_array( 'hmath', $selected_subject) ? 'selected' : '' }}>Higher Math</option>
                                    <option value="physics" {{ in_array( 'physics', $selected_subject) ? 'selected' : '' }}>Physics</option>
                                    <option value="chemistry" {{ in_array( 'chemistry', $selected_subject) ? 'selected' : '' }}>Chemistry</option>
                                    <option value="biology" {{ in_array( 'biology', $selected_subject) ? 'selected' : '' }}>Biology</option>
                                    <option value="ict" {{ in_array( 'ict', $selected_subject) ? 'selected' : '' }}>ICT</option>
                                    <option value="accounting" {{ in_array( 'accounting', $selected_subject) ? 'selected' : '' }}>Accounting</option>
                                    <option value="finance" {{ in_array( 'finance', $selected_subject) ? 'selected' : '' }}>Finance</option>
                                    <option value="marketing" {{ in_array( 'marketing', $selected_subject) ? 'selected' : '' }}>Marketing</option>
                                    <option value="management" {{ in_array( 'management', $selected_subject) ? 'selected' : '' }}>Management</option>
                                    <option value="economics" {{ in_array( 'economics', $selected_subject) ? 'selected' : '' }}>Economics</option>
                                    <option value="statistics" {{ in_array( 'statistics', $selected_subject) ? 'selected' : '' }}>Statistics</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-status">Status </label>
                            <div class="col-sm-10">
                                <select class="form-control" id="basic-default-status" name="status" required>
                                    <option value="1" @if (isset($department) && $department->status == 1) selected @endif>Active</option>
                                    <option value="0" @if (isset($department) && $department->status == 0) selected @endif>Inactive</option>
                                </select>
                            </div>
                        </div>


                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                <a href="{{ route('department.index') }}" class="btn btn-dark btn-sm">Back to List</a>
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
