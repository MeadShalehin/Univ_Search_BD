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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User / </span> Create</h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">User Information</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Name <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" placeholder="Enter Name"
                                    name="name" required />
                            </div>
                        </div>
                       
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-email">Email <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="basic-default-email" placeholder="Enter Email"
                                    name="email" required />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-phone">Phone <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-phone" placeholder="Enter Phone"
                                    name="phone" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-password">Password <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-password" placeholder="Enter password"
                                    name="password" />
                            </div>
                        </div>


                       
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-image">Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="basic-default-image" name="file[]" multiple  required/>
                            </div>
                        </div>  


                        <div class="row mb-3">
                            <label for="asd1" class="col-sm-2 form-label">Role</label>
                            <div class="col-sm-10">

                                <select class="form-select" id="asd1" name="role" required>
                                    <option selected disabled>--select role--</option>
                                    @if ($roles->isNotEmpty())
                                    @foreach ($roles as $data)
                                    <option value="{{ $data->id }}">{{$data->name}}</option>                                        
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                <a href="{{ route('users.index') }}" class="btn btn-dark btn-sm">Back to List</a>
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
        .create( document.querySelector( '#basic-default-editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
    $('#notificationAlert').delay(3000).fadeOut('slow');
</script>
@endsection