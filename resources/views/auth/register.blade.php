<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>UnivSearch BD | Register</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('FrontendPanelAsset') }}/img/favicon.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('AdminPanelAsset/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('AdminPanelAsset/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('AdminPanelAsset/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('AdminPanelAsset/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('AdminPanelAsset/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('AdminPanelAsset/vendor/css/pages/page-auth.css') }}" />
    <!-- Helpers -->
    <script src="{{ asset('AdminPanelAsset/vendor/js/helpers.js') }}"></script>


    <script src="{{ asset('AdminPanelAsset/js/config.js') }}"></script>
</head>

<body>
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body ">

                        <h4 class="mb-2 text-center">Account Registration</h4>
                        <p class="mb-4 text-center">Please sign-up for your account</p>

                        <form id="formAuthentication" class="mb-3" action="{{ route('account_registration') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @if (\Session::has('success'))
                                <div id="CredentialCheck">
                                    <div class="alert alert-warning">
                                        <span style="color:black;">
                                            {!! \Session::get('success') !!}
                                        </span>
                                    </div>
                                </div>
                            @endif

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter your name" autofocus required />
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" autofocus required />
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="Enter your phone" autofocus required />
                            </div>

                            <div class="mb-3">
                                <label for="dob" class="form-label">DOB</label>
                                <input type="date" class="form-control" id="dob" name="dob"
                                    placeholder="Enter your dob" autofocus required />
                            </div>


                            <div class="mb-3">
                                <label for="basic-default-image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="basic-default-image" name="file[]" multiple  required/>
                            </div>


                            <div class="mb-3">
                                <label for="role" class="form-label">Account Type</label>
                                    <select name="role" id="role" class="form-control" required>
                                        <option value="" selected disabled>--Select Account Type--</option>
                                        <option value="student">Student</option>
                                        <option value="teacher">Teacher</option>
                                        <option value="user">General-user</option>
                                    </select>
                            </div>

                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        aria-describedby="password" required />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-success d-grid w-100" type="submit">Sign up</button>
                            </div>

                            <hr>

                            <div class="mb-3">
                                <a href="{{url('/login')}}" class="btn btn-primary d-grid w-100">
                                    Sign in
                                </a>
                            </div>



                        </form>


                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('AdminPanelAsset/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('AdminPanelAsset/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('AdminPanelAsset/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('AdminPanelAsset/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('AdminPanelAsset/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('AdminPanelAsset/js/main.js') }}"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script>
         $('#CredentialCheck').delay(5000).fadeOut('slow');
    </script>
</body>

</html>
