<!DOCTYPE html>
<html lang="tr">

<head>
    <!---og tags starts--->
    <meta property="og:locale" content="tr_TR"/>
    @section('og_tags')
    <!---og tags ends--->
    <meta charset="UTF-8"/>
    <meta name="description" content="Deniz İnşaat & Yapı ile hayalinizdeki gayrimenkul'e ulaşın! Deniz gayrimenkul."/>
    <meta name="keywords" content="deniz inşaat yapı, deniz gayrimenkul, deniz inşaat"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>@yield('page_title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900&display=swap"
          rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="/frontend/css/bootstrap.min.css?v=2" type="text/css"/>
    <link rel="stylesheet" href="/frontend/css/font-awesome.min.css?v=2" type="text/css"/>
    <link rel="stylesheet" href="/frontend/css/elegant-icons.css?v=2" type="text/css"/>
    <link rel="stylesheet" href="/frontend/css/jquery-ui.min.css?v=2" type="text/css"/>
    <link rel="stylesheet" href="/frontend/css/nice-select.css?v=2" type="text/css"/>
    <link rel="stylesheet" href="/frontend/css/owl.carousel.min.css?v=2" type="text/css"/>
    <link rel="stylesheet" href="/frontend/css/magnific-popup.css?v=2" type="text/css"/>
    <link rel="stylesheet" href="/frontend/css/slicknav.min.css?v=2" type="text/css"/>
    <link rel="stylesheet" href="/frontend/css/style.css?v=2" type="text/css"/>
    @yield('css')
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu Wrapper Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="canvas-close">
        <span class="icon_close"></span>
    </div>
    <div class="logo">
        <a href="./index.html">
            <img src="/frontend//frontend/img/logo.png" alt=""/>
        </a>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="om-widget">
        <ul>
            <li><i class="icon_mail_alt"></i> {{$page_header['mail_address']}}</li>
            <li><i class="fa fa-mobile-phone"></i> {{$page_header['phone_number']}}</li>
        </ul>
        <a href="#" class="hw-btn">{{$page_header['call_us_button']}}</a>
    </div>
    <div class="om-social">
        @if($social_media_icons['facebook_url'])
            <a href="{{$social_media_icons['facebook_url']}}"><i class="fa fa-facebook"></i></a>
        @endif
        @if($social_media_icons['twitter_url'])
            <a href="{{$social_media_icons['twitter_url']}}"><i class="fa fa-twitter"></i></a>
        @endif
        @if($social_media_icons['youtube_url'])
            <a href="{{$social_media_icons['youtube_url']}}"><i class="fa fa-youtube-play"></i></a>
        @endif
        @if($social_media_icons['instagram_url'])
            <a href="{{$social_media_icons['instagram_url']}}"><i class="fa fa-instagram"></i></a>
        @endif
        @if($social_media_icons['linkedin_url'])
            <a href="{{$social_media_icons['linkedin_url']}}"><i class="fa fa-linkedin"></i></a>
        @endif
    </div>
</div>
<!-- Offcanvas Menu Wrapper End -->

<!-- Header Section Begin -->
<header class="header-section">
    <div class="hs-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo">
                        <a href="./index.html"><img src="/frontend/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="ht-widget">
                        <ul>
                            <li><i class="icon_mail_alt"></i> {{$page_header['mail_address']}}</li>
                            <li><i class="fa fa-mobile-phone"></i> {{$page_header['phone_number']}}</li>
                        </ul>
                        <a href="#" class="hw-btn">{{$page_header['call_us_button']}}</a>
                    </div>
                </div>
            </div>
            <div class="canvas-open">
                <span class="icon_menu"></span>
            </div>
        </div>
    </div>
    <div class="hs-nav">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <nav class="nav-menu">
                        <ul>
                            <li class="active"><a href="./index.html">Home</a></li>
                            <li><a href="#">Properties</a>
                                <ul class="dropdown">
                                    <li><a href="./property.html">Property Grid</a></li>
                                    <li><a href="./profile.html">Property List</a></li>
                                    <li><a href="./property-details.html">Property Detail</a></li>
                                    <li><a href="./property-comparison.html">Property Comperison</a></li>
                                    <li><a href="./property-submit.html">Property Submit</a></li>
                                </ul>
                            </li>
                            <li><a href="./agents.html">Agents</a></li>
                            <li><a href="./about.html">About</a></li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="hn-social">
                        @if($social_media_icons['facebook_url'])
                            <a href="{{$social_media_icons['facebook_url']}}"><i class="fa fa-facebook"></i></a>
                        @endif
                        @if($social_media_icons['twitter_url'])
                            <a href="{{$social_media_icons['twitter_url']}}"><i class="fa fa-twitter"></i></a>
                        @endif
                        @if($social_media_icons['youtube_url'])
                            <a href="{{$social_media_icons['youtube_url']}}"><i class="fa fa-youtube-play"></i></a>
                        @endif
                        @if($social_media_icons['instagram_url'])
                            <a href="{{$social_media_icons['instagram_url']}}"><i class="fa fa-instagram"></i></a>
                        @endif
                        @if($social_media_icons['linkedin_url'])
                            <a href="{{$social_media_icons['linkedin_url']}}"><i class="fa fa-linkedin"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->

@yield('content')

<!-- Footer Section Begin -->
<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="fs-about">
                    <div class="fs-logo">
                        <a href="#">
                            <img src="/frontend/img/f-logo.png" alt="">
                        </a>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua ut aliquip ex ea</p>
                    <div class="fs-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="fs-widget">
                    <h5>Help</h5>
                    <ul>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Contact Support</a></li>
                        <li><a href="#">Knowledgebase</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">FAQs</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="fs-widget">
                    <h5>Links</h5>
                    <ul>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Create Property</a></li>
                        <li><a href="#">My Properties</a></li>
                        <li><a href="#">Register</a></li>
                        <li><a href="#">Login</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="fs-widget">
                    <h5>Newsletter</h5>
                    <p>Deserunt mollit anim id est laborum.</p>
                    <form action="#" class="subscribe-form">
                        <input type="text" placeholder="Email">
                        <button type="submit" class="site-btn">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="copyright-text">
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a
                    href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="/frontend/js/jquery-3.3.1.min.js?v=2"></script>
<script src="/frontend/js/bootstrap.min.js?v=2"></script>
<script src="/frontend/js/jquery.magnific-popup.min.js?v=2"></script>
<script src="/frontend/js/mixitup.min.js?v=2"></script>
<script src="/frontend/js/jquery-ui.min.js?v=2"></script>
<script src="/frontend/js/jquery.nice-select.min.js?v=2"></script>
<script src="/frontend/js/jquery.slicknav.js?v=2"></script>
<script src="/frontend/js/owl.carousel.min.js?v=2"></script>
<script src="/frontend/js/jquery.richtext.min.js?v=2"></script>
<script src="/frontend/js/image-uploader.min.js?v=2"></script>
<script src="/frontend/js/main.js?v=2"></script>
@yield('js')
</body>

</html>
