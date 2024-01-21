<footer class="footer-area">
    <div class="footer-top bg-img default-overlay pt-130 pb-80"
        style="background-image:url({{ asset('FrontendPanelAsset') }}/img/bg/bg-4.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget mb-40">
                        <div class="footer-title">
                            <h4>ABOUT US</h4>
                        </div>
                        <div class="footer-about">
                            <p>{{ $aboutUs->title }}</p>
                            <div class="f-contact-info">
                                {{--  <div class="single-f-contact-info">
                                    <i class="fa fa-home"></i>
                                    <span>Uttara, Dhaka, Bangladesh</span>
                                </div>  --}}
                                <div class="single-f-contact-info">
                                    <i class="fa fa-envelope-o"></i>
                                    <span><a href="#">{{ $aboutUs->email }}</a></span>
                                </div>
                                <div class="single-f-contact-info">
                                    <i class="fa fa-phone"></i>
                                    <span>+880 {{ $aboutUs->phone }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer-widget mb-40">
                        <div class="footer-title">
                            <h4>QUICK LINK</h4>
                        </div>
                        <div class="footer-list">
                            <ul>
                                <li><a href="{{ route('frontend_dashboard') }}"> Home </a></li>
                                <li><a href="{{ url('/#aboutUs') }}"> About Us</a></li>
                                <li><a href="{{ route('frontend_university') }}"> University </a></li>
                                <li><a href="{{ route('frontend_blog') }}"> Blog </a></li>
                                <li><a href="{{ route('frontend_news') }}"> News </a></li>
                                <li><a href="{{ route('frontend_contact') }}"> Contact </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget mb-40">
                        <div class="footer-title">
                            <h4>Subscription</h4>
                        </div>
                        <div class="subscribe-style">
                            <p>Subscribe for our latest news</p>
                            <div id="mc_embed_signup" class="subscribe-form">
                              
                                <form id="mc-embedded-subscribe-form1" class="validate1" 
                                    name="mc-embedded-subscribe-form1" method="POST"
                                    action="{{ route('subscribe_news') }}">

                                    @csrf
                                    
                                    <div id="mc_embed_signup_scroll" class="mc-form">
                                        <input class="email" type="email" 
                                            placeholder="Your E-mail Address" name="email" required>
                                       
                                        <div class="clear">
                                            <input id="mc-embedded-subscribe" class="button" type="submit"
                                                name="subscribe" value="SUBMIT">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom pt-15 pb-15">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-12">
                    <div class="copyright">
                        <p>
                            Copyright ©
                            <a href="#">UnivSearch BD</a>
                            All Right Reserved.
                        </p>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="footer-menu-social">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="#">Privecy & Policy</a></li>
                                <li><a href="#">Terms & Conditions of Use</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
