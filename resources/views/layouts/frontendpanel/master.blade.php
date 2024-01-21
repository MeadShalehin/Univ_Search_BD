<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>UnivSearch BD</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('FrontendPanelAsset') }}/img/favicon.png">

    <!-- CSS
 ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('FrontendPanelAsset') }}//css/bootstrap.min.css">

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ asset('FrontendPanelAsset') }}/css/icons.min.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('FrontendPanelAsset') }}/css/plugins.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('FrontendPanelAsset') }}/css/style.css">

    <!-- Multiple select CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- Modernizer JS -->
    <script src="{{ asset('FrontendPanelAsset') }}/js/vendor/modernizr-3.11.7.min.js"></script>

    @yield('links')
</head>

<body>

    @include('layouts.frontendpanel.header')

    @yield('content')

    @include('layouts.frontendpanel.footer')













    <!-- JS
============================================ -->

    <!-- jQuery JS -->
    <script src="{{ asset('FrontendPanelAsset') }}/js/vendor/jquery-v2.2.4.min.js"></script>
    <!-- Popper JS -->
    <script src="{{ asset('FrontendPanelAsset') }}/js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('FrontendPanelAsset') }}/js/bootstrap.min.js"></script>
    <!-- Plugins JS -->
    <script src="{{ asset('FrontendPanelAsset') }}/js/plugins.js"></script>
    <!-- Ajax Mail -->
    <script src="{{ asset('FrontendPanelAsset') }}/js/ajax-mail.js"></script>
    <!-- Main JS -->
    <script src="{{ asset('FrontendPanelAsset') }}/js/main.js"></script>

    {{--  <script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>  --}}

    <!-- Multiple select JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
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
    <script>
        $(document).ready(function() {
            $('.department').select2({
                placeholder: 'Select Your Favourite Departments',
                allowClear: true, // Include this line if you want a clear option
                width: '100%', // Set the width of the dropdown
                tags: true, // Allow entering custom values as tags
                tokenSeparators: [',', ' '], // Define token separators for tags
            });
        });
    </script>

    @yield('footer_js')
</body>


<!-- Mirrored from htmldemo.net/glaxdu/glaxdu/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 06 Aug 2023 09:24:50 GMT -->

</html>
