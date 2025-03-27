<!DOCTYPE html>
<html lang="en">


<!-- index-2 06:41:43 GMT -->
<head>
    <meta charset="UTF-8">
    <title>Yewo Car Hire</title>

    <!-- responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- master stylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive stylesheet -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="images/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="images/favicon/favicon-16x16.png" sizes="16x16">

    <!-- Fixing Internet Explorer-->
    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="js/html5shiv.js"></script>
    <![endif]-->
     <style>
        .user-info {
    display: flex;
    align-items: center;
}
.user-name {
    margin-right: 10px;
}
/* General responsive adjustments */
@media screen and (max-width: 767px) {
    /* Header container adjustments */
    .main-header .inner-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 15px;
        flex-wrap: nowrap;
    }

    /* Logo adjustments */
    .logo-box-style2 {
        width: 120px;
        flex-shrink: 0;
        margin-right: 10px;
    }

    /* Main menu container */
    .main-menu-box {
        flex-grow: 1;
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }

    /* Preserve original navbar toggle behavior */
    .navbar-toggle {
        display: block;
        margin: 0 10px;
        padding: 9px 10px;
        order: 1;
    }

    .navbar-toggle .icon-bar {
        display: block;
        width: 22px;
        height: 2px;
        background: #333;
        margin: 4px 0;
    }

    /* Right menu section adjustments */
    .mainmenu-right.style2 {
        display: flex;
        align-items: center;
        margin-left: auto;
        padding: 0;
        order: 2;
    }

    /* Search box */
    .outer-search-box {
        margin: 0 8px;
    }

    .seach-toggle {
        font-size: 14px;
    }

    /* Login button and user info */
    .mainmenu-right.style2 .button {
        margin: 0;
    }

    .mainmenu-right.style2 .btn-one {
        padding: 4px 10px;
        font-size: 13px;
        min-height: 26px;
        line-height: 18px;
    }

    /* User info when logged in */
    .user-info {
        display: flex;
        align-items: center;
        margin: 0;
    }

    .user-name {
        font-size: 13px;
        margin: 0 8px;
        max-width: 80px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    /* Cart box */
    .cart-box {
        margin: 0 8px;
    }

    /* Preserve original navbar collapse behavior */
    .navbar-collapse {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: #fff;
        max-height: 80vh;
        overflow-y: auto;
        border-top: 1px solid #eee;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .navbar-collapse.collapse {
        display: none !important;
    }

    .navbar-collapse.collapse.in {
        display: block !important;
    }

    /* Navigation links */
    .navigation {
        width: 100%;
        margin: 0;
        padding: 0;
    }

    .navigation li {
        display: block;
        width: 100%;
        margin: 0;
        border-bottom: 1px solid #eee;
    }

    .navigation li a {
        padding: 10px 15px;
        width: 100%;
        display: block;
        font-size: 13px;
    }
}

/* Extra small devices */
@media screen and (max-width: 480px) {
    .logo-box-style2 {
        width: 100px;
    }

    .mainmenu-right.style2 .btn-one {
        padding: 3px 8px;
        font-size: 12px;
    }

    .user-name {
        max-width: 60px;
    }
}

/* Ensure consistent button styles */
.btn-one {
    white-space: nowrap;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

/* Force display of important elements */
.mainmenu-right.style2 .button,
.mainmenu-right.style2 .btn-one,
.logo-box-style2 {
    display: flex !important;
    visibility: visible !important;
    opacity: 1 !important;
}

/* Ensure proper z-index for navbar */
.main-header {
    position: relative;
    z-index: 999;
}

     </style>
</head>

<body>

        </section>
        <!-- End Top Bar style2 -->

        <!--Start Main Header-->
        <header class="main-header header-style2 stricky">
            <div class="inner-container clearfix">
                <div class="logo-box-style2 float-left">
                    <a href="{{ url('index') }}">
                        <img src="images/yewoLogo.png" alt="Awesome Logo">
                    </a>
                </div>
                <div class="main-menu-box float-right">
                    <nav class="main-menu style2 clearfix">
                        <div class="navbar-header clearfix">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation clearfix">
                                <li><a href="{{ url('index') }}">Home</a></li>
                                <li><a href="{{ url('about') }}">About Us</a></li>
                                <li><a href="{{ url('car') }}">Our Cars</a></li>
                                <li><a href="{{ url('services') }}">Services</a></li>
                                <li><a href="{{ url('contact') }}">Contact</a></li>
                            </ul>
                        </div>
                    </nav>
                    <div class="mainmenu-right style2">
                        <div class="outer-search-box">
                            <div class="seach-toggle"><i class="fa fa-search"></i></div>
                            <ul class="search-box">
                                <li>
                                    <form method="post" action="#">
                                        <div class="form-group">
                                            <input type="search" name="search" placeholder="Search Here" required>
                                            <button type="submit"><i class="fa fa-search"></i></button>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div>

                        @if (Auth::check())
                            <!-- Display logged-in user name and logout button -->
                            <div class="user-info">
                                <div class="cart-box">
                                    <a href="{{ url('/cart') }}">
                                        <span class="icon-bag">
                                        </span>
                                    </a>
                                </div>
                                <span class="user-name">{{ Auth::user()->name }}</span>
                                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn-one">LOGOUT<span class="flaticon-next"></span></button>
                                </form>
                            </div>

                        @else
                            <!-- Display login button -->
                            <div class="button">
                                <a class="btn-one" href="{{ url('login') }}">LOGIN<span class="flaticon-next"></span></a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </header>

    <!-- END nav -->
    @yield('content')
    <footer class="footer-area style4">
      <div class="container">
          <div class="row">
              <!--Start single footer widget-->
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                  <div class="single-footer-widget marbtm50-s4">
                      <div class="our-info-box">
                        <div class="title-style2">
                            <h3>Yewo Car Hire</h3>
                        </div>
                          <div class="text">
                              <p>You choose YEWO, you choose a stress free transaction ..</p>
                          </div>
                          <div class="follow-us-social-links clearfix">
                              <span>Follw Us On:</span>
                              <ul>
                                  <li><a href="#">Facebook</a></li>
                                  <li><a href="#">Twitter</a></li>
                                  <li><a href="#">Instagram</a></li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
              <!--End single footer widget-->
              <!--Start single footer widget-->
              <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                  <div class="single-footer-widget s4">
                      <div class="title-style2">
                          <h3>Usefull Links</h3>
                      </div>
                      <div class="usefull-links">
                          <ul class="float-left">
                              <li><a href="{{ url('about') }}">Company</a></li>
                              <li><a href="{{ url('services') }}">Services</a></li>
                              <li><a href="{{ url('car') }}">Our Cars</a></li>
                              <li><a href="{{ url('contact') }}">Contact</a></li>

                          </ul>

                      </div>
                  </div>
              </div>
              <!--End single footer widget-->
              <!--Start single footer widget-->
              <div class="col-xl-4 col-lg-3 col-md-12 col-sm-12">
                  <div class="single-footer-widget pdtop50-s4">
                      <div class="title-style2">
                          <h3>Give Us Some FeedBack</h3>
                      </div>
                      <div class="subscribe-box">
                          <form class="subscribe-form" action="#">
                              <input type="email" name="email" placeholder="Your Email">
                              <button class="btn-one" type="submit">Send<span class="flaticon-next"></span></button>
                          </form>
                          <div class="text">
                              <p><span>*</span>what did you think we can improve</p>
                          </div>
                      </div>
                  </div>
              </div>
              <!--End single footer widget-->
          </div>
      </div>
  </footer>
  <!--End footer area style4-->

  <!--Start Footer Contact Info Area-->
  <section class="footer-contact-info-area">
      <div class="container">
          <div class="row">
              <div class="col-xl-12">
                  <ul class="footer-contact-info clearfix">
                      <li>
                          <div class="single-footer-contact-info">
                              <div class="inner">
                                  <div class="icon">
                                      <span class="icon-global"></span>
                                  </div>
                                  <div class="text">
                                      <p>Along M1 Road<br>Opposite Rafiki Foundation, Mzuzu.</p>
                                  </div>
                              </div>
                          </div>
                      </li>
                      <li>
                          <div class="single-footer-contact-info">
                              <div class="inner">
                                  <div class="icon">
                                      <span class="icon-support1"></span>
                                  </div>
                                  <div class="text">
                                      <p>+265 884 63 04 821<br> <span>Everyday</span> 24/7</p>
                                  </div>
                              </div>
                          </div>
                      </li>
                      <li>
                          <div class="single-footer-contact-info">
                              <div class="inner">
                                  <div class="icon">
                                      <span class="icon-shipping-and-delivery"></span>
                                  </div>
                                  <div class="text">
                                      <p>support@yewocarhire.com</p>
                                  </div>
                              </div>
                          </div>
                      </li>

                  </ul>
              </div>
          </div>
      </div>
  </section>
  <!--End Footer Contact Info Area-->

  <!--Start footer bottom area-->
  <section class="footer-bottom-area style3">
      <div class="container">
          <div class="row">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <div class="copyright-text text-center">
                      <p><a href="https://www.templateshub.net" target="_blank">created by Girey $ Jiver</a></p>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!--End footer bottom area-->

</div>


<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>



<script src="js/jquery.js"></script>
<script src="js/appear.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/isotope.js"></script>
<script src="js/jquery.bootstrap-touchspin.js"></script>
<script src="js/jquery.countTo.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/jquery.enllax.min.js"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/jquery.mixitup.min.js"></script>
<script src="js/jquery.paroller.min.js"></script>
<script src="js/owl.js"></script>
<script src="js/validation.js"></script>
<script src="js/wow.js"></script>

<!---
<script src="js/gmaps.js"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyB2uu6KHbLc_y7fyAVA4dpqSVM4w9ZnnUw"></script>
<script src="js/mapapi.js"></script>
--->
<script src="js/map-helper.js"></script>
<script>
// Add this to your existing JavaScript file
$(document).ready(function() {
    // Toggle menu
    $('.navbar-toggle').on('click', function(e) {
        e.preventDefault();
        $('.navbar-collapse').toggleClass('collapse in');
        $('body').toggleClass('menu-open');
    });

    // Close menu when clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.navbar-collapse').length &&
            !$(e.target).closest('.navbar-toggle').length) {
            $('.navbar-collapse').removeClass('in');
            $('body').removeClass('menu-open');
        }
    });

    // Close menu when clicking the close button
    $('.navbar-collapse').on('click', function(e) {
        if ($(e.target).is('.navbar-collapse:after')) {
            $('.navbar-collapse').removeClass('in');
            $('body').removeClass('menu-open');
        }
    });

    // Prevent clicks inside menu from closing it
    $('.navbar-collapse').on('click', function(e) {
        e.stopPropagation();
    });
});
</script>

<script src="assets/language-switcher/jquery.polyglot.language.switcher.js"></script>
<script src="assets/timepicker/timePicker.js"></script>
<script src="assets/html5lightbox/html5lightbox.js"></script>

<!--Revolution Slider-->
<script src="plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script src="js/main-slider-script.js"></script>

<!-- thm custom script -->
<script src="js/custom.js"></script>



</body>


<!-- index-2 06:43:55 GMT -->
</html>
