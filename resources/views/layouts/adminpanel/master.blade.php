<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>UinvSearch BD | AdminPanel</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon"
        href="data:image/png;base64,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" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('AdminPanelAsset') }}/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('AdminPanelAsset') }}/vendor/css/core.css"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('AdminPanelAsset') }}/vendor/css/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('AdminPanelAsset') }}/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('AdminPanelAsset') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="{{ asset('AdminPanelAsset') }}/vendor/libs/apex-charts/apex-charts.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous">
    <!-- Page CSS -->

    <!-- Multiple select CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- Bootstrap Tagsinput CSS -->
    {{--  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css">  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-tagsinput@0.8.0/dist/bootstrap-tagsinput.css">

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    {{--  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/js/bootstrap.bundle.min.js"></script>  --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-tagsinput@0.8.0/dist/bootstrap-tagsinput.min.js"></script>



    <!-- Helpers -->
    <script src="{{ asset('AdminPanelAsset') }}/vendor/js/helpers.js"></script>
    <script src="{{ asset('AdminPanelAsset') }}/js/config.js"></script>

    @yield('header_css')
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="{{ route('admin_dashboard') }}" class="app-brand-link">
                        <img src="data:image/png;base64,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"
                            style="max-width:50px;" alt="">
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">Admin</span>
                    </a>

                    <a href="{{ route('admin_dashboard') }}"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item {{ Request::routeIs('admin_dashboard') ? 'active' : '' }}">
                        <a href="{{ route('admin_dashboard') }}" class="menu-link ">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>

                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Activities</span>
                    </li>

                    <li class="menu-item {{ Request::routeIs('role_management') ? 'active' : '' }}">
                        <a href="{{ route('role_management') }}" class="menu-link">
                            <i class="menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                                </svg>
                            </i>
                            <div data-i18n="Analytics">Role Management</div>
                        </a>
                    </li>

                    <li class="menu-item {{ Request::routeIs('users.*') ? 'active' : '' }}">
                        <a href="{{ route('users.index') }}" class="menu-link">
                            <i class="menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                                </svg>
                            </i>
                            <div data-i18n="Analytics">Users</div>
                        </a>
                    </li>

                    <li class="menu-item {{ Request::routeIs('aboutUs.*') ? 'active' : '' }}">
                        <a href="{{ route('aboutUs.index') }}" class="menu-link">
                            <i class="menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                </svg>

                            </i>
                            <div data-i18n="aboutUs">About Us</div>
                        </a>
                    </li>

                    <li class="menu-item {{ Request::routeIs('category.*') ? 'active' : '' }}">
                        <a href="{{ route('category.index') }}" class="menu-link">
                            <i class="menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                                </svg>
                            </i>
                            <div data-i18n="Blogs">Blog Categories</div>
                        </a>
                    </li>

                    <li class="menu-item {{ Request::routeIs('blog.*') ? 'active' : '' }}">
                        <a href="{{ route('blog.index') }}" class="menu-link">
                            <i class="menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M5.25 14.25h13.5m-13.5 0a3 3 0 01-3-3m3 3a3 3 0 100 6h13.5a3 3 0 100-6m-16.5-3a3 3 0 013-3h13.5a3 3 0 013 3m-19.5 0a4.5 4.5 0 01.9-2.7L5.737 5.1a3.375 3.375 0 012.7-1.35h7.126c1.062 0 2.062.5 2.7 1.35l2.587 3.45a4.5 4.5 0 01.9 2.7m0 0a3 3 0 01-3 3m0 3h.008v.008h-.008v-.008zm0-6h.008v.008h-.008v-.008zm-3 6h.008v.008h-.008v-.008zm0-6h.008v.008h-.008v-.008z" />
                                </svg>
                            </i>
                            <div data-i18n="Blogs">Blogs</div>
                        </a>
                    </li>

                    <li class="menu-item {{ Request::routeIs('news.*') ? 'active' : '' }}">
                        <a href="{{ route('news.index') }}" class="menu-link">
                            <i class="menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                                </svg>
                            </i>
                            <div data-i18n="news">News</div>
                        </a>
                    </li>

                    <li class="menu-item {{ Request::routeIs('department.*') ? 'active' : '' }}">
                        <a href="{{ route('department.index') }}" class="menu-link">
                            <i class="menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M5.25 14.25h13.5m-13.5 0a3 3 0 01-3-3m3 3a3 3 0 100 6h13.5a3 3 0 100-6m-16.5-3a3 3 0 013-3h13.5a3 3 0 013 3m-19.5 0a4.5 4.5 0 01.9-2.7L5.737 5.1a3.375 3.375 0 012.7-1.35h7.126c1.062 0 2.062.5 2.7 1.35l2.587 3.45a4.5 4.5 0 01.9 2.7m0 0a3 3 0 01-3 3m0 3h.008v.008h-.008v-.008zm0-6h.008v.008h-.008v-.008zm-3 6h.008v.008h-.008v-.008zm0-6h.008v.008h-.008v-.008z" />
                                </svg>

                            </i>
                            <div data-i18n="department">Uni. Departments</div>
                        </a>
                    </li>

                    <li class="menu-item {{ Request::routeIs('university.*') ? 'active' : '' }}">
                        <a href="{{ route('university.index') }}" class="menu-link">
                            <i class="menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                                </svg>
                            </i>
                            <div data-i18n="university">University</div>
                        </a>
                    </li>

                    <li class="menu-item {{ Request::routeIs('testimonial.*') ? 'active' : '' }}">
                        <a href="{{ route('testimonial.index') }}" class="menu-link">
                            <i class="menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                </svg>

                            </i>
                            <div data-i18n="testimonial">Testimonial</div>
                        </a>
                    </li>

                    <li class="menu-item {{ Request::routeIs('contact.*') ? 'active' : '' }}">
                        <a href="{{ route('contact.index') }}" class="menu-link">
                            <i class="menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                                  </svg>
                            </i>
                            <div data-i18n="Contact">Contact</div>
                        </a>
                    </li>

                    <li class="menu-item {{ Request::routeIs('frontend_dashboard.*') ? 'active' : '' }}">
                        <a href="{{ route('frontend_dashboard') }}" class="menu-link">
                            <i class="menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                                </svg>
                            </i>
                            <div data-i18n="University">Homepage</div>
                        </a>
                    </li>








                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">


                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar">
                                        <img src="{{ asset('logo') }}/user-logo.jpg" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile') }}">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar">
                                                        <img src="/logo/user-logo.jpg" alt="avatar"
                                                            class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                                                    <small
                                                        style="color:blue;">{{ Auth::user()->getRoleNames()[0] }}</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile') }}">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>


                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                            class="dropdown-item">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out </span>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    @yield('content')

                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div
                            class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                © 2023, developed with <i class="fa fa-heart" style="color: red;"></i> by <a
                                    href="#" class="footer-link fw-bolder">Team</a>
                            </div>

                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->



    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('AdminPanelAsset') }}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('AdminPanelAsset') }}/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('AdminPanelAsset') }}/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('AdminPanelAsset') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="{{ asset('AdminPanelAsset') }}/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('AdminPanelAsset') }}/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="{{ asset('AdminPanelAsset') }}/js/main.js"></script>

    <!-- Page JS -->
    <script src="{{ asset('AdminPanelAsset') }}/js/ui-modals.js"></script>

    <!-- Page JS -->
    <script src="{{ asset('AdminPanelAsset') }}/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>


    {{-- Vue 3 js --}}
    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
    <script src="https://unpkg.com/axios/dist/axios.min.js" defer></script>


    <!-- Multiple select JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Select options',
                allowClear: true, // Include this line if you want a clear option
                width: '100%', // Set the width of the dropdown
                tags: true, // Allow entering custom values as tags
                tokenSeparators: [',', ' '], // Define token separators for tags
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.subject').select2({
                placeholder: 'Select Your Favourite Subjects',
                allowClear: true, // Include this line if you want a clear option
                width: '100%', // Set the width of the dropdown
                tags: true, // Allow entering custom values as tags
                tokenSeparators: [',', ' '], // Define token separators for tags
            });
        });
    </script>

    // for toggle button
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <!-- jQuery is still required for Bootstrap Toggle -->
    {{--  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>  --}}




    @yield('footer_js')
</body>


</html>
