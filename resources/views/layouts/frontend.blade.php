<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="admin dashboard, admin template, analytics, bootstrap, bootstrap 5, bootstrap 5 admin template, job board admin, job portal admin,
	modern, responsive admin dashboard, sales dashboard, sass, ui kit, web app, frontent">
    <meta name="author" content="DexignLab">
    <meta name="robots" content="">
    <meta name="description" content="We proudly present a job portal, a job posting, and the bootstrap 5 admin & frontend HTML template, If you are a job expert and 
	would like to build a superb and top-notch website for your business or a posting center for jobs, then job admin is the best choice.">
    <meta property="og:title" content="Jobick : Job Admin Dashboard Bootstrap 5 Template + FrontEnd">
    <meta property="og:description" content="We proudly present a job portal, a job posting, and the bootstrap 5 admin & frontend HTML template, If you are a job expert 
	and would like to build a superb and top-notch website for your business or a posting center for jobs, then job admin is the best choice.">
    <meta property="og:image" content="https://Jobick.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title -->
    <title>@yield('title')</title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="{{asset('frontend/assets/images/favicon.png')}}">
    
    <!-- Stylesheet -->
    <link href="{{asset('frontend/assets/vendor/animate/animate.css') }}" rel="stylesheet">
    <link href="{{asset('frontend/assets/vendor/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{asset('frontend/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css') }}">
    <link class="skin" rel="stylesheet" href="{{asset('frontend/assets/css/skin/skin-1.css') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    @yield('styles')
</head>

<body id="bg" data-anm=".anm">

    <!--loader start -->
    <div id="loading-area" class="loading-page-1">
        <div class="loader">
            <div class="ball one"></div>
            <div class="ball two"></div>
            <div class="ball three"></div>
            <div class="ball four"></div>
        </div>
    </div>
    <!--loader start -->
    <div class="page-wraper">
        <!--panggil --menu -->
        @include('partials.menu')

        <div class="page-content">
            @yield('content')
        </div>
    </div>
    <!-- Footer -->
    <footer class="site-footer style-1 position-relative">
        <div class="footer-top bg-light sapping">
            <div class="container">
                <div class="row p-50">
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <div class="widget wow fadeInUp text-center text-lg-start" data-wow-delay="1.4s">
                            <div class="footer-logo">
                                <a href="index.html" class="logo-dark"><img src="assets/images/logo.png" alt=""></a>
                            </div>
                            <p>Many desktop publishing packages and web page editors now.</p>
                            <div class="widget_getintuch ">
                                <ul>
                                    <li class="text-center">
                                        <i class="fa-regular fa-comments"></i>
                                        Example@job.com
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                                <div class="widget widget_links wow fadeInUp" data-wow-delay="1.6s">
                                    <h4 class="footer-title">Useful Links</h4>
                                    <ul>
                                        <li><a href="javascript:void(0);">Find a Job</a></li>
                                        <li><a href="javascript:void(0);">Compaies</a></li>
                                        <li><a href="javascript:void(0);">About Us</a></li>
                                        <li><a href="javascript:void(0);">Post a Job</a></li>
                                        <li><a href="javascript:void(0);">Testimonial</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                                <div class="widget widget_links wow fadeInUp" data-wow-delay="1.8s">
                                    <h4 class="footer-title">Category </h4>
                                    <ul>
                                        <li><a href="javascript:void(0);">UI Designer</a></li>
                                        <li><a href="javascript:void(0);">UX Designer</a></li>
                                        <li><a href="javascript:void(0);">Grapic Designer</a></li>
                                        <li><a href="javascript:void(0);">Web Developers</a></li>
                                        <li><a href="javascript:void(0);">More</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                                <div class="widget widget_links wow fadeInUp" data-wow-delay="2.0s">
                                    <h4 class="footer-title">Follow Us</h4>
                                    <ul>
                                        <li><a href="javascript:void(0);">Linked In </a></li>
                                        <li><a href="javascript:void(0);">facebook</a></li>
                                        <li><a href="javascript:void(0);">Instagram</a></li>
                                        <li><a href="javascript:void(0);">Dribbble</a></li>
                                        <li><a href="javascript:void(0);">Behance</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <div class="widget  wow fadeInUp" data-wow-delay="2.2s">
                            <h4 class="footer-title">Newsletter</h4>
                            <p>Sign up to our archi. point to recent updates & office</p>
                            <form class="dzSubscribe ft-subscribe mb-4" action="assets/script/mailchamp.php" method="post">
                                <div class="dzSubscribeMsg"></div>
                                <div class="input-group mb-0">
                                    <input name="dzEmail" required="required" type="email" class="form-control" placeholder="Your Email Address">
                                    <button name="submit" value="Submit" type="submit" class="btn btn-primary style-1 ">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-md-center text-md-center bg-light">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="footer-inner text-center ">
                            <p class="copyright-text wow fadeInUp" data-wow-delay="2.4s">Copyright 2023 by <a class="text-primary" href="https://dexignlab.com/" target="_blank">DexignLab</a>. All rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->

    <button class="scroltop icon-up" type="button"><i class="fas fa-arrow-up"></i></button>
    </div>
    
    <!-- JAVASCRIPT FILES ========================================= -->
    <script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script><!-- JQUERY.MIN JS -->
    <script src="{{asset('frontend/assets/js/anm.js')}}"></script><!-- JQUERY.MIN JS -->
    <script src="{{asset('frontend/assets/vendor/wow/wow.js')}}"></script><!-- WOW.JS -->
    <script src="{{asset('frontend/assets/vendor/swiper/swiper-bundle.min.js')}}"></script><!-- OWL silder -->
    <script src="{{asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script><!-- WOW.JS -->
    <script src="{{asset('frontend/assets/vendor/magnific-popup/magnific-popup.js')}}"></script><!-- OWL SLIDER -->
    <script src="{{asset('frontend/assets/js/dz.carousel.js')}}"></script><!-- OWL SLIDER -->
    <script src="{{asset('frontend/assets/js/dz.ajax.js')}}"></script><!-- AJAX -->
    <script src="{{asset('frontend/assets/js/custom.js')}}"></script><!-- CUSTOM JS -->
    @yield('scripts')
</body>

</html>