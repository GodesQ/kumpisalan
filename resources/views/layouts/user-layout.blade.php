<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ URL::asset('user-assets/fonts/jost/stylesheet.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('user-assets/libs/line-awesome/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('user-assets/libs/fontawesome-pro/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('user-assets/libs/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('user-assets/libs/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('user-assets/libs/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('user-assets/libs/quilljs/css/quill.bubble.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('user-assets/libs/quilljs/css/quill.core.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('user-assets/libs/quilljs/css/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('user-assets/libs/chosen/chosen.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('user-assets/libs/datetimepicker/jquery.datetimepicker.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('user-assets/libs/venobox/venobox.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('user-assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('user-assets/css/responsive.css') }}" />

    <link rel="stylesheet" href="{{ URL::asset('admin-assets/css/icons/tabler-icons/tabler-icons.css') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
</head>

<body>
    <div id="wrapper">
        <header id="header" class="site-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-5">
                        <div class="site">
                            <div class="site__menu">
                                <a title="Menu Icon" href="#" class="site__menu__icon">
                                    <i class="las la-bars la-24-black"></i>
                                </a>
                                <div class="popup-background"></div>
                                <div class="popup popup--left">
                                    <a title="Close" href="#" class="popup__close">
                                        <i class="las la-times la-24-black"></i>
                                    </a><!-- .popup__close -->
                                    <div class="popup__content">
                                        <div class="popup__user popup__box open-form">
                                            @if (auth()->check())

                                            @else
                                                <a title="Login" href="#" class="open-login">Login</a>
                                                <a title="Sign Up" href="#" class="open-signup">Sign Up</a>
                                            @endif
                                        </div><!-- .popup__user -->
                                        <div class="popup__destinations popup__box">
                                            <ul class="menu-arrow">
                                                <li>
                                                    <a title="Destinations" href="#">Destinations</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="city-details-1.html" title="Tokyo">Tokyo</a></li>
                                                        <li><a href="city-details-1.html" title="New York">New York</a>
                                                        </li>
                                                        <li><a href="city-details-1.html"
                                                                title="Barcelona">Barcelona</a></li>
                                                        <li><a href="city-details-1.html"
                                                                title="Amsterdam">Amsterdam</a></li>
                                                        <li><a href="city-details-1.html" title="Los Angeles">Los
                                                                Angeles</a></li>
                                                        <li><a href="city-details-1.html" title="London">London</a></li>
                                                        <li><a href="city-details-1.html" title="Bangkok">Bangkok</a>
                                                        </li>
                                                        <li><a href="city-details-1.html" title="Paris">Paris</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="popup__menu popup__box">
                                            <ul class="menu-arrow">
                                                <li>
                                                    <a href="#" title="Demos">Demos</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="home-restaurant.html"
                                                                title="Restaurant Listing">Restaurant Listing</a></li>
                                                        <li><a href="home-business.html"
                                                                title="Business Listing">Business Listing</a></li>
                                                        <li><a href="home-countryguide.html"
                                                                title="Country Travel Guide">Country Travel Guide</a>
                                                        </li>
                                                        <li><a href="home-cityguide.html" title="City Travel Guide">City
                                                                Travel Guide</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="#" title="Listings">Listings</a>
                                                    <ul class="sub-menu">
                                                        <li>
                                                            <a href="#" title="Search Layout">Search Layout</a>
                                                            <ul class="sub-menu">
                                                                <li><a href="ex-half-map-1.html"
                                                                        title="Half Map – Left Filter">Half Map – Left
                                                                        Filter</a></li>
                                                                <li><a href="ex-half-map-2.html"
                                                                        title="Half Map – Top Filter">Half Map – Top
                                                                        Filter</a></li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="City Layout">City Layout</a>
                                                            <ul class="sub-menu">
                                                                <li><a href="city-details-1.html"
                                                                        title="Half Map – Left Filter">Half Map – Left
                                                                        Filter</a></li>
                                                                <li><a href="city-details-2.html"
                                                                        title="Half Map – Top Filter">Half Map – Top
                                                                        Filter</a></li>
                                                                <li><a href="city-details-3.html"
                                                                        title="Without Map">Without Map</a></li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Listing Detail">Single Layout</a>
                                                            <ul class="sub-menu">
                                                                <li><a href="single-1.html" title="Carousel">Default -
                                                                        Carousel</a></li>
                                                                <li><a href="single-2.html" title="Image">Default -
                                                                        Image</a></li>
                                                                <li><a href="single-3.html"
                                                                        title="Restaurant">Restaurant Type</a></li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Booking Type">Booking Type</a>
                                                            <ul class="sub-menu">
                                                                <li><a href="bk-booking-form.html"
                                                                        title="Appointment Booking">Appointment
                                                                        Booking</a></li>
                                                                <li><a href="bk-enquiry-form.html"
                                                                        title="Enquiry Form">Enquiry Form</a></li>
                                                                <li><a href="bk-affiliate-link.html"
                                                                        title="Affiliate Link">Affiliate Link</a></li>
                                                                <li><a href="bk-banner-ads.html"
                                                                        title="Affiliate Banner">Affiliate Banner</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a title="Page" href="#">Page</a>
                                                    <ul class="sub-menu">
                                                        <li><a title="About" href="about-us.html">About Us</a></li>
                                                        <li><a title="FAQ's" href="faqs.html">FAQ's</a></li>
                                                        <li><a title="App Landing" href="app-landing.html">App
                                                                Landing</a></li>
                                                        <li><a title="Contacts" href="contact-us.html">Contacts</a>
                                                        </li>
                                                        <li><a title="Add Listing" href="add-place.html">Add
                                                                Listing</a></li>
                                                        <li><a title="Pricing" href="">Pricing</a>
                                                            <ul class="sub-menu">
                                                                <li><a title="Pricing Plan"
                                                                        href="pricing-plan.html">Pricing Plan</a></li>
                                                                <li><a title="Pricing Plan Checkout"
                                                                        href="pricing-checkout.html">Pricing
                                                                        Checkout</a></li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <a title="Page" href="#">Shop</a>
                                                            <ul class="sub-menu">
                                                                <li><a title="Products" href="shop.html">Products</a>
                                                                </li>
                                                                <li><a title="Product Detail"
                                                                        href="shop-detail.html">Product Detail</a></li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <a title="Page" href="#">Blog</a>
                                                            <ul class="sub-menu">
                                                                <li><a title="Fullwidth"
                                                                        href="blog-fullwidth.html">Fullwidth</a></li>
                                                                <li><a title="Right Sidebar"
                                                                        href="blog-right-sidebar.html">Right
                                                                        Sidebar</a></li>
                                                                <li><a title="Blog Detail"
                                                                        href="blog-detail.html">Blog Detail</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a title="Owner Dashboard"
                                                                href="owner-dashboard.html">Owner Dashboard</a></li>
                                                        <li><a title="Owner Single" href="owner-page.html">Owner
                                                                Single</a></li>
                                                        <li><a title="Construction"
                                                                href="construction.html">Construction</a></li>
                                                        <li><a title="Coming Soon" href="coming-soon.html">Coming Soon
                                                            </a></li>
                                                        <li><a title="404" href="404.html">404 Page</a></li>
                                                    </ul>
                                                </li>

                                            </ul>
                                        </div><!-- .popup__menu -->
                                    </div><!-- .popup__content -->
                                    <div class="popup__button popup__box">
                                        <a title="Add place" href="add-place.html" class="btn">
                                            <i class="la la-plus"></i>
                                            <span>Add place</span>
                                        </a>
                                    </div><!-- .popup__button -->
                                </div><!-- .popup -->
                            </div><!-- .site__menu -->
                            <div class="site__brand">
                                <a title="Logo" href="/" class="site__brand__logo">
                                    <img src="{{ asset('user-assets/images/assets/kumpisalan-logo.png') }}" alt="Kumpisalan">
                                </a>
                            </div><!-- .site__brand -->

                        </div><!-- .site -->
                    </div><!-- .col-md-6 -->
                    <div class="col-xl-6 col-7">
                        <div class="right-header align-right">
                            <nav class="main-menu">
                                <ul>
                                    <li>
                                        <a href="#" title="Demos">Demos</a>
                                        <ul class="sub-menu">
                                            <li><a href="/" title="Restaurant Listing">Restaurant Listing</a>
                                            </li>
                                            <li><a href="home-business.html" title="Business Listing">Business
                                                    Listing</a></li>
                                            <li><a href="home-countryguide.html" title="Country Travel Guide">Country
                                                    Travel Guide</a></li>
                                            <li><a href="home-cityguide.html" title="City Travel Guide">City Travel
                                                    Guide</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" title="Listings">Listings</a>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="#" title="Search Layout">Search Layout</a>
                                                <ul class="sub-menu">
                                                    <li><a href="ex-half-map-1.html"
                                                            title="Half Map – Left Filter">Half Map – Left Filter</a>
                                                    </li>
                                                    <li><a href="ex-half-map-2.html"
                                                            title="Half Map – Top Filter">Half Map – Top Filter</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#" title="City Layout">City Layout</a>
                                                <ul class="sub-menu">
                                                    <li><a href="city-details-1.html"
                                                            title="Half Map – Left Filter">Half Map – Left Filter</a>
                                                    </li>
                                                    <li><a href="city-details-2.html"
                                                            title="Half Map – Top Filter">Half Map – Top Filter</a>
                                                    </li>
                                                    <li><a href="city-details-3.html" title="Without Map">Without
                                                            Map</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#" title="Listing Detail">Single Layout</a>
                                                <ul class="sub-menu">
                                                    <li><a href="single-1.html" title="Carousel">Default -
                                                            Carousel</a></li>
                                                    <li><a href="single-2.html" title="Image">Default - Image</a>
                                                    </li>
                                                    <li><a href="single-3.html" title="Restaurant">Restaurant Type</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#" title="Booking Type">Booking Type</a>
                                                <ul class="sub-menu">
                                                    <li><a href="bk-booking-form.html"
                                                            title="Appointment Booking">Appointment Booking</a></li>
                                                    <li><a href="bk-enquiry-form.html" title="Enquiry Form">Enquiry
                                                            Form</a></li>
                                                    <li><a href="bk-affiliate-link.html"
                                                            title="Affiliate Link">Affiliate Link</a></li>
                                                    <li><a href="bk-banner-ads.html"
                                                            title="Affiliate Banner">Affiliate Banner</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a title="Page" href="#">Page</a>
                                        <ul class="sub-menu">
                                            <li><a title="About" href="about-us.html">About Us</a></li>
                                            <li><a title="FAQ's" href="faqs.html">FAQ's</a></li>
                                            <li><a title="App Landing" href="app-landing.html">App Landing</a></li>
                                            <li><a title="Contacts" href="contact-us.html">Contacts</a></li>
                                            <li><a title="Add Listing" href="add-place.html">Add Listing</a></li>
                                            <li><a title="Pricing" href="">Pricing</a>
                                                <ul class="sub-menu">
                                                    <li><a title="Pricing Plan" href="pricing-plan.html">Pricing
                                                            Plan</a></li>
                                                    <li><a title="Pricing Plan Checkout"
                                                            href="pricing-checkout.html">Pricing Checkout</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a title="Page" href="#">Shop</a>
                                                <ul class="sub-menu">
                                                    <li><a title="Products" href="shop.html">Products</a></li>
                                                    <li><a title="Product Detail" href="shop-detail.html">Product
                                                            Detail</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a title="Page" href="#">Blog</a>
                                                <ul class="sub-menu">
                                                    <li><a title="Fullwidth" href="blog-fullwidth.html">Fullwidth</a>
                                                    </li>
                                                    <li><a title="Right Sidebar" href="blog-right-sidebar.html">Right
                                                            Sidebar</a></li>
                                                    <li><a title="Blog Detail" href="blog-detail.html">Blog Detail</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a title="Owner Dashboard" href="owner-dashboard.html">Owner
                                                    Dashboard</a></li>
                                            <li><a title="Owner Single" href="owner-page.html">Owner Single</a></li>
                                            <li><a title="Construction" href="construction.html">Construction</a></li>
                                            <li><a title="Coming Soon" href="coming-soon.html">Coming Soon </a></li>
                                            <li><a title="404" href="404.html">404 Page</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>

                            @if (!auth()->check())
                                <div class="right-header__login">
                                    <a title="Login" class="open-login" href="#">Login</a>
                                </div>
                            @endif

                            <div class="popup popup-form">
                                <a title="Close" href="#" class="popup__close">
                                    <i class="las la-times la-24-black"></i>
                                </a><!-- .popup__close -->
                                <ul class="choose-form">
                                    <li class="nav-signup"><a title="Sign Up" href="#signup">Sign Up</a></li>
                                    <li class="nav-login"><a title="Log In" href="#login">Log In</a></li>
                                </ul>
                                <p class="choose-more">Continue with
                                    <a title="Facebook" class="fb" href="#">Facebook</a> or
                                    <a title="Google" class="gg" href="#">Google</a>
                                </p>
                                <p class="choose-or"><span>Or</span></p>
                                <div class="popup-content">
                                    <form action="{{ route('register.user') }}" class="form-sign form-content" method="POST" id="signup">
                                        @csrf
                                        <div class="field-inline">
                                            <div class="field-input">
                                                <input type="text" placeholder="First Name" value="" name="firstname">
                                                <span class="text-danger danger">@error('firstname'){{ $message }}@enderror</span>
                                            </div>
                                            <div class="field-input">
                                                <input type="text" placeholder="Last Name" value="" name="lastname">
                                                <span class="text-danger danger">@error('lastname'){{ $message }}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="field-input">
                                            <input type="email" placeholder="Email" value="" name="email">
                                            <span class="text-danger danger">@error('email'){{ $message }}@enderror</span>
                                        </div>
                                        <div class="field-input">
                                            <input type="password" placeholder="Password" value="" name="password">
                                            <span class="text-danger danger">@error('password'){{ $message }}@enderror</span>
                                        </div>
                                        <div class="field-check">
                                            <label for="accept">
                                                <input type="checkbox" id="accept" value="1" name="accept_terms_condition">
                                                Accept the <a title="Terms" href="#">Terms</a> and <a title="Privacy Policy" href="#">Privacy Policy</a>
                                                <span class="checkmark">
                                                    <i class="la la-check"></i>
                                                </span>
                                            </label>
                                        </div>
                                        <input type="submit" name="submit" value="Sign Up">
                                    </form>
                                    <form action="{{ route('login.user') }}" class="form-log form-content" id="login" method="POST">
                                        @csrf
                                        <div class="field-input">
                                            <input type="text" placeholder="Username or Email" value="" name="email">
                                            <span class="text-danger danger">@error('email'){{ $message }}@enderror</span>
                                        </div>
                                        <div class="field-input">
                                            <input type="password" placeholder="Password" value="" name="password">
                                            <span class="text-danger danger">@error('password'){{ $message }}@enderror</span>
                                        </div>
                                        <a title="Forgot password" class="forgot_pass" href="#">Forgot Password</a>
                                        <input type="submit" name="submit" value="Login">
                                    </form>
                                </div>
                            </div><!-- .popup-form -->
                            <div class="right-header__search">
                                <a title="Search" href="#" class="search-open">
                                    <i class="las la-search la-24-black"></i>
                                </a>
                                <div class="site__search">
                                    <a title="Close" href="#" class="search__close">
                                        <i class="la la-times"></i>
                                    </a><!-- .search__close -->
                                    <form action="#" class="site__search__form" method="GET">
                                        <div class="site__search__field">
                                            <span class="site__search__icon">
                                                <i class="las la-search la-24-black"></i>
                                            </span><!-- .site__search__icon -->
                                            <input class="site__search__input" type="text" name="s"
                                                placeholder="Search places, cities">
                                        </div><!-- .search__input -->
                                    </form><!-- .search__form -->
                                </div><!-- .site__search -->
                            </div>
                            @auth
                                <div class="dropdown">
                                    <img src="{{ asset('admin-assets/images/profile/' . 'user-1.jpg') }}" onclick="handleUserDropdown()" alt="" width="35" height="35" class="rounded-circle user-drop-btn">
                                    <div id="myDropdown" class="dropdown-content">
                                        <a href="#about"> <i class="ti ti-dashboard text-primary mr-3"></i> Dashboard</a>
                                        <a href="#home"> <i class="ti ti-user text-primary mr-3"></i> My Profile</a>
                                        <a>
                                            <form action="{{ route('user.logout') }}" method="post">
                                                @csrf
                                                <button type="submit" class="w-100" style="text-align: left !important; background: none !important; border: none;">
                                                    <i class="ti ti-logout text-primary mr-3"></i>  Logout
                                                </button>
                                            </form>
                                        </a>
                                    </div>
                                </div>
                            @endauth
                        </div><!-- .right-header -->
                    </div><!-- .col-md-6 -->
                </div><!-- .row -->
            </div><!-- .container-fluid -->
        </header><!-- .site-header -->
        @yield('content')
        <footer id="footer" class="footer">
            <div class="container">
                <div class="footer__top">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="footer__top__info">
                                <a title="Logo" href="01_index_1.html" class="footer__top__info__logo"><img
                                        src="{{ asset('user-assets/images/assets/kumpisalan-logo.png') }}" alt="Golo"></a>
                                <p class="footer__top__info__desc">Discover amazing things to do everywhere you go.</p>
                                <div class="footer__top__info__app">
                                    <a title="App Store" href="#" class="banner-apps__download__iphone"><img
                                            src="{{ asset('user-assets/images/assets/app-store.png') }}" alt="App Store"></a>
                                    <a title="Google Play" href="#" class="banner-apps__download__android"><img
                                            src="{{ asset('user-assets/images/assets/google-play.png') }}" alt="Google Play"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <aside class="footer__top__nav">
                                <h3>Company</h3>
                                <ul>
                                    <li><a title="About Us" href="06_about-us.html">About Us</a></li>
                                    <li><a title="Blog" href="07_blog-right-sidebar.html">Blog</a></li>
                                    <li><a title="Faqs" href="15_faqs.html">Faqs</a></li>
                                    <li><a title="Contact" href="09_contact-us.html">Contact</a></li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-lg-2">
                            <aside class="footer__top__nav">
                                <h3>Support</h3>
                                <ul>
                                    <li><a title="Get in Touch" href="#">Get in Touch</a></li>
                                    <li><a title="Help Center" href="#">Help Center</a></li>
                                    <li><a title="Live chat" href="#">Live chat</a></li>
                                    <li><a title="How it works" href="#">How it works</a></li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-lg-3">
                            <aside class="footer__top__nav footer__top__nav--contact">
                                <h3>Contact Us</h3>
                                <p>Email: support@domain.com</p>
                                <p>Phone: 1 (00) 832 2342</p>
                                <ul>
                                    <li class="facebook">
                                        <a title="Facebook" href="#">
                                            <i class="la la-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li class="twitter">
                                        <a title="Twitter" href="#">
                                            <i class="la la-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="youtube">
                                        <a title="Youtube" href="#">
                                            <i class="la la-youtube"></i>
                                        </a>
                                    </li>
                                    <li class="instagram">
                                        <a title="Instagram" href="#">
                                            <i class="la la-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </aside>
                        </div>
                    </div>
                </div><!-- .top-footer -->
                <div class="footer__bottom">
                    <p class="footer__bottom__copyright">2020 &copy; <a title="Uxper Team"
                            href="#">uxper.co</a>. All rights reserved.</p>
                </div><!-- .top-footer -->
            </div><!-- .container -->
        </footer><!-- site-footer -->
    </div><!-- #wrapper -->

    <script src="{{ asset('user-assets/js/jquery-1.12.4.js') }}"></script>
    <script src="{{ asset('user-assets/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('user-assets/libs/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('user-assets/libs/slick/slick.min.js') }}"></script>
    <script src="{{ asset('user-assets/libs/slick/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('user-assets/libs/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('user-assets/libs/quilljs/js/quill.core.js') }}"></script>
    <script src="{{ asset('user-assets/libs/quilljs/js/quill.js') }}"></script>
    <script src="{{ asset('user-assets/libs/chosen/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('user-assets/libs/datetimepicker/jquery.datetimepicker.full.min.js') }}"></script>
    <script src="{{ asset('user-assets/libs/venobox/venobox.min.js') }}"></script>
    <script src="{{ asset('user-assets/libs/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('user-assets/js/main.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @stack('scripts')

    @if(Session::get('fail'))
        <script>
            toastr.error("{{ Session::get('fail') }}", 'Fail');
        </script>
    @endif

    @if(Session::get('success'))
        <script>
            toastr.success("{{ Session::get('success') }}", 'Success');
        </script>
    @endif

</body>
</html>
