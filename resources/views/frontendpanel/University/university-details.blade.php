@extends('layouts.frontendpanel.master')

@section('content')
    <div class="breadcrumb-area">
        {{-- <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-2 pt-100 pb-95"
        style="background-image:url({{ asset('FrontendPanelAsset') }}/img/bg/breadcrumb-bg-2.jpg);"> --}}
        <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-2 pt-100 pb-95"
            style="background-image:url({{ asset($university->banner) }});height:280px">

            <div class="container">
                <h2>{{ $university->name }}</h2>
                <p>{{ $university->short_description }}
                </p>
            </div>
        </div>
        <div class="breadcrumb-bottom">
            <div class="container">
                <ul>
                    <li><a href="{{ route('frontend_dashboard') }}">Home</a> <span><span><i
                                    class="fa fa-angle-double-right"></i><a
                                    href="{{ route('frontend_university') }}">Universities</a></span> /
                            {{ $university->name }}</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="event-details-area pt-80">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="event-left-wrap mr-40">

                        <div class="event-description">
                            <div class="description-date-social mb-45">
                                <div class="description-date-time">
                                    <div class="description-date">
                                        <img src="{{ asset($university->logo) }}" style="height: 100px; width:100px"
                                            alt="University Logo">
                                    </div>
                                    <div class="description-meta-wrap">
                                        <div class="description-meta">
                                            <i class="fa fa-location-arrow"></i>
                                            <span>{{ $university->address }}</span>
                                        </div>
                                        {{--  <div class="description-meta">
                                            <i class="fa fa-map-marker"></i>
                                            <span></span>
                                        </div>  --}}
                                        <div class="description-meta">
                                            <i class="fa fa-envelope"></i>
                                            <span>{{ $university->email }} </span>
                                        </div>
                                        <div class="description-meta">
                                            <i class="fa fa-phone"></i>
                                            <span>{{ $university->contact }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="description-social-wrap">
                                    <div class="description-social">
                                        <ul>
                                            @if ($university->facebook != null)
                                                <li><a class="facebook" href="{{ $university->facebook }}" target="_blank"><i
                                                            class="fa fa-facebook"></i></a></li>
                                            @endif
                                            @if ($university->linkedin != null)
                                                <li><a class="linkedin" href="{{ $university->linkedin }}" target="_blank"><i
                                                            class="fa fa-linkedin"></i></a></li>
                                            @endif
                                            @if ($university->website != null)
                                                <li><a class="linkedin" href="{{ $university->website }}" target="_blank"><i
                                                            class="fa fa-globe"></i></a></li>
                                            @endif
                                            {{--  <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>  --}}
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <img src="{{ asset($university->banner) }}" alt="" style="height: 300px">
                            <h3>{{ $university->name }}</h3>
                        </div>

                        <div class="course-tab-list nav pt-40 pb-25 mb-35">
                            <a class="active" href="#overview" data-bs-toggle="tab">
                                <h4>Over View</h4>
                            </a>
                            <a href="#scholarship_waiver" data-bs-toggle="tab">
                                <h4>Scholarship & Waiver</h4>
                            </a>
                        </div>

                        <div class="tab-content jump">
                            <div class="tab-pane active" id="overview">
                                <div class="event-description">
                                    <p>{!! $university->description !!}</p>
                                    <div class="event-gallery text-center mt-40">
                                        <div class="event-gallery-active nav-style-3 owl-carousel">
                                            {{--  {{ dd($university) }}  --}}
                                            @foreach ($university->images as $image)
                                                <img src="{{ asset($image->url) }}" style="height: 300px" alt="">
                                            @endforeach

                                        </div>
                                    </div>
                                    {{--  <div class="location-area mt-80">
                                        <div id="location"></div>
                                    </div>  --}}
                                </div>
                            </div>
                            <div class="tab-pane" id="scholarship_waiver">
                                <div class="event-description">
                                    <h3>Scholarship</h3>
                                    <p>{!! $university->scholarship !!}</p>
                                    <h3>Waiver</h3>
                                    <p>{!! $university->waiver !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="sidebar-style">
                        <div class="sidebar-tag-wrap">
                            <div class="sidebar-title mb-40">
                                <h4>Departments</h4>
                            </div>
                            <div class="sidebar-tag">
                                <ul>
                                    @foreach ($departments as $department)
                                        <li><a href="#">{{ $department->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="achievement-area pt-115 pb-115">
        <div class="container">
            <div class="section-title mb-75">
                <h2>Our <span>Achievement</span></h2>
                {{--  <p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim <br>veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip </p>  --}}
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="single-count mb-30 count-one">
                        <div class="count-img">
                            <img src="{{ asset('FrontendPanelAsset') }}/img/icon-img/achieve-1.png" alt="">
                        </div>
                        <div class="count-content">
                            <h2 class="count">{{ $university->students }}</h2>
                            <span>STUDENTS</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="single-count mb-30 count-two">
                        <div class="count-img">
                            <img src="{{ asset('FrontendPanelAsset') }}/img/icon-img/achieve-2.png" alt="">
                        </div>
                        <div class="count-content">
                            <h2 class="count">{{ $university->graduate }}</h2>
                            <span>GRADUATE</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-3 col-md-6 col-sm-6">
                    <div class="single-count mb-30 count-three">
                        <div class="count-img">
                            <img src="{{ asset('FrontendPanelAsset') }}/img/icon-img/achieve-3.png" alt="">
                        </div>
                        <div class="count-content">
                            <h2 class="count">{{ $university->award }}</h2>
                            <span>AWARD WINNING</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6">
                    <div class="single-count mb-30 count-four">
                        <div class="count-img">
                            <img src="{{ asset('FrontendPanelAsset') }}/img/icon-img/achieve-4.png" alt="">
                        </div>
                        <div class="count-content">
                            <h2 class="count">{{ $university->faculties }}</h2>
                            <span>FACULTIES</span>
                        </div>
                    </div>
                </div>
            </div>
            {{--  <div class="testimonial-slider-wrap mt-45">
                <div class="testimonial-text-slider">
                    <div class="testi-content-wrap">
                        <div class="testi-big-img">
                            <img alt="" src="{{ asset('FrontendPanelAsset') }}">
                        </div>
                        <div class="row g-0">
                            <div class="ms-auto col-lg-6 col-md-12">
                                <div class="testi-content bg-img default-overlay"
                                    style="background-image:url({{ asset('FrontendPanelAsset') }}/img/bg/testi.png);">
                                    <div class="quote-style quote-left">
                                        <i class="fa fa-quote-left"></i>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, conse ctetur adipi sicing elit, sed do eiusm od
                                        tempor
                                        incidi dunt ut labore et dolore magna aliqua. Ut enim fugiat nulla pariatur.
                                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                        deserunt
                                        mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit
                                    </p>
                                    <div class="testi-info">
                                        <h5>AYESHA HOQUE</h5>
                                        <span>Students Of AMMT Department</span>
                                    </div>
                                    <div class="quote-style quote-right">
                                        <i class="fa fa-quote-right"></i>
                                    </div>
                                    <div class="testi-arrow">
                                        <img alt=""
                                            src="{{ asset('FrontendPanelAsset') }}/img/icon-img/testi-icon.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-image-slider">
                    <div class="sin-testi-image">
                        <img src="{{ asset('FrontendPanelAsset') }}/img/testimonial/testi-s2.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="testimonial-text-img">
                <img alt="" src="{{ asset('FrontendPanelAsset') }}/img/icon-img/testi-text.png">
            </div>  --}}
            <div class="testimonial-slider-wrap mt-45">
                <div class="testimonial-text-slider">
                    @foreach ($university->testimonials as $testimonial)
                        <div class="testi-content-wrap">
                            <div class="testi-big-img">
                                {{--  <img alt="" src="{{ asset('FrontendPanelAsset') }}/img/testimonial/testi-b2.jpg">  --}}
                                <img alt="" src="{{ asset($testimonial->faculty_image) }}">
                            </div>
                            <div class="row g-0">
                                <div class="ms-auto col-lg-6 col-md-12">
                                    <div class="testi-content bg-img default-overlay"
                                        style="background-image:url({{ asset('FrontendPanelAsset') }}/img/bg/testi.png);">
                                        <div class="quote-style quote-left">
                                            <i class="fa fa-quote-left"></i>
                                        </div>
                                        <p>{{ $testimonial->content }}</p>
                                        <div class="testi-info">
                                            <h5>{{ $testimonial->faculty_name }}</h5>
                                            <span>{{ $testimonial->faculty_designation }}</span>
                                        </div>
                                        <div class="quote-style quote-right">
                                            <i class="fa fa-quote-right"></i>
                                        </div>
                                        <div class="testi-arrow">
                                            <img alt=""
                                                src="{{ asset('FrontendPanelAsset') }}/img/icon-img/testi-icon.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="testimonial-image-slider">
                    @foreach ($university->testimonials as $testimonial)
                        <div class="sin-testi-image">
                            {{--  <img src="{{ asset('FrontendPanelAsset') }}/img/testimonial/testi-s2.jpg" alt="">  --}}
                            <img alt="" src="{{ asset($testimonial->faculty_image) }}" style="height: 102px">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="testimonial-text-img">
                <img alt="" src="{{ asset('FrontendPanelAsset') }}/img/icon-img/testi-text.png">
            </div>

        </div>
    </div>
    @if ($university->gps != null)
    <div class="pb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-map">
                        <div id="map" style="width: 100%; height: 400px; /* Adjust the height as needed */">
                            {!! $university->gps !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif




    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzcEM8z2_imGO8TMRmJEpDEahvZ7KYY_U"></script>
    <script>
        function init() {
            var mapOptions = {
                zoom: 11,
                scrollwheel: false,
                center: new google.maps.LatLng(40.709896, -73.995481),
                styles: [{
                    "featureType": "all",
                    "elementType": "geometry.fill",
                    "stylers": [{
                        "weight": "2.00"
                    }]
                }, {
                    "featureType": "all",
                    "elementType": "geometry.stroke",
                    "stylers": [{
                        "color": "#9c9c9c"
                    }]
                }, {
                    "featureType": "all",
                    "elementType": "labels.text",
                    "stylers": [{
                        "visibility": "on"
                    }]
                }, {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [{
                        "color": "#f2f2f2"
                    }]
                }, {
                    "featureType": "landscape",
                    "elementType": "geometry.fill",
                    "stylers": [{
                        "color": "#ffffff"
                    }]
                }, {
                    "featureType": "landscape.man_made",
                    "elementType": "geometry.fill",
                    "stylers": [{
                        "color": "#ffffff"
                    }]
                }, {
                    "featureType": "poi",
                    "elementType": "all",
                    "stylers": [{
                        "visibility": "off"
                    }]
                }, {
                    "featureType": "road",
                    "elementType": "all",
                    "stylers": [{
                        "saturation": -100
                    }, {
                        "lightness": 45
                    }]
                }, {
                    "featureType": "road",
                    "elementType": "geometry.fill",
                    "stylers": [{
                        "color": "#eeeeee"
                    }]
                }, {
                    "featureType": "road",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#7b7b7b"
                    }]
                }, {
                    "featureType": "road",
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                        "color": "#ffffff"
                    }]
                }, {
                    "featureType": "road.highway",
                    "elementType": "all",
                    "stylers": [{
                        "visibility": "simplified"
                    }]
                }, {
                    "featureType": "road.arterial",
                    "elementType": "labels.icon",
                    "stylers": [{
                        "visibility": "off"
                    }]
                }, {
                    "featureType": "transit",
                    "elementType": "all",
                    "stylers": [{
                        "visibility": "off"
                    }]
                }, {
                    "featureType": "water",
                    "elementType": "all",
                    "stylers": [{
                        "color": "#46bcec"
                    }, {
                        "visibility": "on"
                    }]
                }, {
                    "featureType": "water",
                    "elementType": "geometry.fill",
                    "stylers": [{
                        "color": "#c8d7d4"
                    }]
                }, {
                    "featureType": "water",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#070707"
                    }]
                }, {
                    "featureType": "water",
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                        "color": "#ffffff"
                    }]
                }]
            };
            var mapElement = document.getElementById('location');
            var map = new google.maps.Map(mapElement, mapOptions);
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(40.709896, -73.995481),
                map: map,
                icon: 'assets/img/icon-img/2.png',
                animation: google.maps.Animation.BOUNCE,
                title: 'Snazzy!'
            });
        }
        google.maps.event.addDomListener(window, 'load', init);
    </script>
@endsection
