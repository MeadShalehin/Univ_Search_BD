@extends('layouts.adminpanel.master')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Profile / </span> {{ Auth::user()->name }}</h4>    
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-md-12 col-lg-6">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">User Profile</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile_update') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name"
                                    placeholder="John Doe" value="{{ $user->name }}" name="name" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-phone">Phone</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-phone"
                                    placeholder="017*******" value="{{ $user->phone }}" name="phone" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="email" id="basic-default-email" class="form-control"
                                        placeholder="admin@gmail.com" aria-label="john.doe"
                                        aria-describedby="basic-default-email2" value="{{ $user->email }}" name="email" required />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-phone">Gender</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="gender" required>
                                    <option selected>-- Choose option --</option>
                                    <option value="male" @if ($user->gender == 'male') selected @endif>Male</option>
                                    <option value="female" @if ($user->gender == 'female') selected @endif>Female</option>
                                    <option value="others" @if ($user->gender == 'others') selected @endif>others</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-password">Password</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="text" id="basic-default-password" class="form-control"
                                    placeholder="Input to change password" aria-label="john.doe" name="password" />                                    
                                </div>
                                <span style="color: red;font-weight:400;">(optional)</span>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit"  class="btn btn-success btn-sm">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       
    </div>

</div>

@endsection
