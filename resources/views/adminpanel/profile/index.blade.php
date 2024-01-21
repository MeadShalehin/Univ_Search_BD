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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Profile / </span> {{ Auth::user()->name }}</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-md-12 col-lg-6">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Profile</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" placeholder="John Doe"
                                value="{{ $user->name }}" name="name" disabled />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-phone">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-phone" placeholder="017*******"
                                value="{{ $user->phone }}" name="phone" disabled />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input type="email" id="basic-default-email" class="form-control"
                                    placeholder="admin@gmail.com" aria-label="john.doe"
                                    aria-describedby="basic-default-email2" value="{{ $user->email }}" name="email"
                                    disabled />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-phone">Gender</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="exampleFormControlSelect1"
                                aria-label="Default select example" disabled>
                                <option selected>Open this select menu</option>
                                <option value="male" @if ($user->gender == 'male') selected @endif>Male</option>
                                <option value="female" @if ($user->gender == 'female') selected @endif>Female</option>
                                <option value="others" @if ($user->gender == 'others') selected @endif>others</option>
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <a href="{{ route('profile_edit') }}">
                                <button class="btn btn-success btn-sm">Make Changes</button>
                            </a>
                        </div>
                    </div>
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
