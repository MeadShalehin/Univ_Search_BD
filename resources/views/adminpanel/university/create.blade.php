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
    @if (\Session::has('error'))
        <div class="row">
            <div class="col-md-12">
                <div id="notificationAlert" style="display: block;">
                    <div class="alert alert-danger">
                        <span style="color: black;">
                            {!! \Session::get('error') !!}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">University / </span> Create</h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">University Information</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('university.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Name </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" placeholder="Enter name"
                                    name="name" required />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-contact">Contact </label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="basic-default-contact" placeholder="Enter contact"
                                    name="contact" required />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-email">Email </label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="basic-default-email" placeholder="Enter email"
                                    name="email" required />
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-latitude">Latitude</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-latitude" placeholder="23.01***"
                                    name="latitude" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-longitude">Longitude</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-longitude" placeholder="90.15***"
                                    name="longitude" required />
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-gps">Iframe Link</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-gps" placeholder="Enter Iframe Link"
                                    name="gps" required />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-address">Address </label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="basic-default-address" rows="3" placeholder="Enter address"
                                    name="address" required></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-website">Website </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-website" placeholder="Enter website"
                                    name="website" required />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-short_description">Short Description </label>
                            <div class="col-sm-10">
                                <textarea name="short_description" class="form-control" id="basic-default-short_description" cols="30" rows="3" placeholder="Enter short description[N.B: maximum 7 word]"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-description">Description </label>
                            <div class="col-sm-10">
                                <textarea name="description" class="form-control" id="basic-default-description" cols="30" rows="3" placeholder="Enter description"></textarea>
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-Ranking">Ranking </label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="basic-default-Ranking" placeholder="Enter ranking"
                                    name="ranking"  />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-Scholarship">Scholarship </label>
                            <div class="col-sm-10">
                                <textarea name="scholarship" class="form-control" id="basic-default-Scholarship" cols="30" rows="3" placeholder="Enter scholarship"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-waiver">Waiver </label>
                            <div class="col-sm-10">
                                <textarea name="waiver" class="form-control" id="basic-default-waiver" cols="30" rows="3" placeholder="Enter waiver"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-departments">Departments </label>
                            <div class="col-sm-10">
                                <select class="select2 form-control" data-live-search="true" name="department_id[]" id="basic-default-departments" multiple >
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-logo">Logo</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="basic-default-logo" name="logo" required />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-banner">Banner</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="basic-default-banner" name="banner" required />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-image">Images</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="basic-default-image" name="images[]" multiple required />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-facebook">Facebook </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-facebook" placeholder="Enter facebook link"
                                    name="facebook"  />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-linkedin">Linkedin </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-linkedin" placeholder="Enter linkedin link"
                                    name="linkedin"  />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-linkedin">Total Students</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="basic-default-linkedin" placeholder="Enter Total Students"
                                    name="students"  />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-award">Total Award</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="basic-default-award" placeholder="Enter Total Award"
                                    name="award"  />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-graduate">Total Graduate</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="basic-default-graduate" placeholder="Enter Total Graduate"
                                    name="graduate"  />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-faculties">Total Faculties </label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="basic-default-faculties" placeholder="Enter Total Faculties"
                                    name="faculties"  />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-ssc">Min. SSC Requirement</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="basic-default-ssc" placeholder="Enter Minimum SSC Requirement [ex:3.50]"
                                    name="ssc" step="0.01" min="0.00" max="5.00"/>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-hsc">Min. HSC Requirement</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="basic-default-hsc" placeholder="Enter Minimum HSC Requirement [ex:3.50]"
                                    name="hsc" step="0.01" min="0.00" max="5.00"/>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                <a href="{{ route('university.index') }}" class="btn btn-dark btn-sm">Back to List</a>
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
        .create( document.querySelector( '#basic-default-description' ) )
        .catch( error => {
            console.error( error );
    } );

    ClassicEditor
        .create( document.querySelector( '#basic-default-Scholarship' ) )
        .catch( error => {
            console.error( error );
    } );

    ClassicEditor
        .create( document.querySelector( '#basic-default-waiver' ) )
        .catch( error => {
            console.error( error );
    } );

</script>
<script>
    $('#notificationAlert').delay(3000).fadeOut('slow');
</script>
@endsection
