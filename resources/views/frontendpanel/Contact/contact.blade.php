@extends('layouts.frontendpanel.master')

@section('content')
<div class="breadcrumb-area">
    <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-5 pt-100 pb-95" style="background-image:url({{ asset('FrontendPanelAsset') }}/img/bg/breadcrumb-bg-6.jpg);">
        <div class="container">
            <h2>Contact Us</h2>
            {{--  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore .</p>  --}}
        </div>
    </div>
    <div class="breadcrumb-bottom">
        <div class="container">
            <ul>
                <li><a href="#">Home</a> <span><i class="fa fa-angle-double-right"></i>Contact Us</span></li>
            </ul>
        </div>
    </div>
</div>
<div class="contact-area pt-130 pb-130">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="contact-map mr-70">
                    <div id="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2224905.8379164026!2d-63.27089988050263!3d-2.8569688249815943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91e8605342744385%3A0x3d3c6dc1394a7fc7!2sAmazon%20Rainforest!5e0!3m2!1sen!2sbd!4v1635401091721!5m2!1sen!2sbd" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="contact-form">
                    <div class="contact-title mb-65">
                        <h2>Contact <span>Us</span></h2>
                        {{--  <p>Lorem ipsum dolor sit amet, consectetur adipis do eiusmod tempor indunt ut labore et dolore magna aliqua.</p>  --}}
                    </div>
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
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ $error }}</strong>
                            </div>
                        @endforeach
                    @endif
                    <form id="contact-form11" action="{{ route('contact_submit') }}" method="POST">
                        @csrf
                        <input name="name" placeholder="Name*" type="text" required>
                        <input name="email" placeholder="Email*" type="email" required>
                        <input name="subject" placeholder="Subject*" type="text" required>
                        <textarea name="message" placeholder="Message" required></textarea>
                        <button class="submit btn-style btn" type="submit">SEND MESSAGE</button>
                    </form>
                    <p class="form-messege"></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="contact-info-area bg-img pt-180 pb-140 mb-100 default-overlay" style="background-image:url({{ asset('FrontendPanelAsset') }}/img/bg/contact-info.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="single-contact-info mb-30 text-center">
                    <div class="contact-info-icon">
                        <span><i class="fa fa-phone"></i></span>
                    </div>
                    <div class="contact-info-phn">
                        <div class="info-phn-title">
                            <span>Phone : </span>
                        </div>
                        <div class="info-phn-number">
                            <p>+880 {{ $aboutUs->phone }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="single-contact-info mb-30 text-center">
                    <div class="contact-info-icon">
                        <span><i class="fa fa-envelope-o"></i></span>
                    </div>
                    <a href="#">{{ $aboutUs->email }}</a>
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