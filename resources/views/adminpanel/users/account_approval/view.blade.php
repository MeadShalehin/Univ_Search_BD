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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User / </span> View</h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">User Information</h5>
                </div>
                <div class="card-body">
                   
                        <div class="row mb-3">

                            <div class="col-md-2">
                                <div class="row">
                                    <label class="col-sm-4 col-form-label" for="basic-default-image">Image </label>
                                    
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <img src="{{ Storage::url($user->image->url ?? '')  }}" alt="User Image" style="max-width:250px;">
                                    </div>
                                </div>
                            </div>
                        
                        </div>   
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Name </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name" placeholder="Enter Name"
                                    name="name" value="{{ $user->name ?? '' }}" disabled />
                            </div>
                        </div>
                       
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-email">Email </label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="basic-default-email" placeholder="Enter Email"
                                    name="email" value="{{ $user->email ?? '' }}" disabled />
                            </div>
                        </div>
                        
                       
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-phone">Phone </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-phone" placeholder="Enter Phone"
                                    name="phone" value="{{ $user->phone  ?? ''}}" disabled/>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-DOB">DOB </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-DOB" placeholder="Enter DOB"
                                    name="DOB" value="{{ $user->dob  ?? ''}}" disabled/>
                            </div>
                        </div>

                       
                       

                        
                        

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-editor">Role</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-role" placeholder="Enter Role"
                                    name="role" value="{{ $user->getRoleNames()[0] ?? 'user'}}" disabled/>
                            </div>
                        </div>
                      

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                @if ($user->status == 0)
                                <a href="{{ route('account_verify', $user->id) }}" class="btn btn-success btn-sm">Approve Account</a>
                                @endif
                                <a href="{{ route('user_account_approval') }}" class="btn btn-dark btn-sm">Back to List</a>
                            </div>
                        </div>
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