@extends('layouts.app')
@section('content')


<!--Start services style1 area-->
<section class="services-style1-area" style="background-color:black;">
    <div class="container">
        <div class="sec-title with-text max-width text-center wow fadeInDown" data-wow-delay="100ms" data-wow-duration="1200ms">
            <p>What We Do</p>
            <div class="title">Some Special <span>Services</span></div>
            <p class="bottom-text">We are Yewo Car Hire, Who believe in excellence, quality and honesty, You choose YEWO, you choose a stress free transaction .</p>
        </div>
      <!--Start Working style2 Area-->
<section class="working-style2-area" style="background-image: url('images/bg_2.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="working-style2-content clearfix">
                    <!--Start Single Working Box Style2-->
                    <div class="single-working-box-style2">
                        <div class="img-holder">
                            <img src="images/bg_4.jpg" alt="Awesome Image">
                            <div class="static-content">
                                <div class="box">
                                    <div class="inner">
                                        <div class="text-holder">
                                            <div class="title">
                                                <h3>Secured Payment Guarantee</h3>
                                                <div class="count">01</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="overlay-content">
                                <div class="box">
                                    <div class="inner">
                                        <div class="text-holder">
                                            <div class="title">
                                                <h3>Secured Payment Guarantee</h3>
                                                <div class="count">01</div>
                                            </div>
                                            <div class="text">
                                                <p>We ensure all transactions are processed securely, giving you peace of mind with your payments.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="read-more">
                            <a href="#"><span class="icon-next"></span></a>
                        </div>
                    </div>
                    <!--End Single Working Box Style2-->

                    <!--Start Single Working Box Style2-->
                    <div class="single-working-box-style2">
                        <div class="img-holder">
                            <img src="images/bg_5.jpg" alt="Awesome Image">
                            <div class="static-content">
                                <div class="box">
                                    <div class="inner">
                                        <div class="text-holder">
                                            <div class="title">
                                                <h3>Online Booking for Cars</h3>
                                                <div class="count">02</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="overlay-content">
                                <div class="box">
                                    <div class="inner">
                                        <div class="text-holder">
                                            <div class="title">
                                                <h3>Online Booking for Cars</h3>
                                                <div class="count">02</div>
                                            </div>
                                            <div class="text">
                                                <p>Book your preferred vehicle online with ease and convenience, anytime, anywhere.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="read-more">
                            <a href="#"><span class="icon-next"></span></a>
                        </div>
                    </div>
                    <!--End Single Working Box Style2-->

                    <!--Start Single Working Box Style2-->
                    <div class="single-working-box-style2">
                        <div class="img-holder">
                            <img src="images/bg_4.jpg" alt="Awesome Image">
                            <div class="static-content">
                                <div class="box">
                                    <div class="inner">
                                        <div class="text-holder">
                                            <div class="title">
                                                <h3>Wedding Occasions</h3>
                                                <div class="count">03</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="overlay-content">
                                <div class="box">
                                    <div class="inner">
                                        <div class="text-holder">
                                            <div class="title">
                                                <h3>Wedding Occasions</h3>
                                                <div class="count">03</div>
                                            </div>
                                            <div class="text">
                                                <p>Make your wedding day extra special with our premium car services designed for memorable moments.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="read-more">
                            <a href="#"><span class="icon-next"></span></a>
                        </div>
                    </div>
                    <!--End Single Working Box Style2-->

                    <!--Start Single Working Box Style2-->
                    <div class="single-working-box-style2">
                        <div class="img-holder">
                            <img src="images/bg_5.jpg" alt="Awesome Image">
                            <div class="static-content">
                                <div class="box">
                                    <div class="inner">
                                        <div class="text-holder">
                                            <div class="title">
                                                <h3>Corporate Transport Solutions</h3>
                                                <div class="count">04</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="overlay-content">
                                <div class="box">
                                    <div class="inner">
                                        <div class="text-holder">
                                            <div class="title">
                                                <h3>Corporate Transport Solutions</h3>
                                                <div class="count">04</div>
                                            </div>
                                            <div class="text">
                                                <p>Professional and timely transport services tailored for corporate needs and business events.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="read-more">
                            <a href="#"><span class="icon-next"></span></a>
                        </div>
                    </div>
                    <!--End Single Working Box Style2-->
                </div>
                <div class="working-style-bottom text-center">
                    <p>Wanna Work With Our Experienced Professional Team? Make an Appointment.</p>
                    <div class="button">
                        <a class="btn-one" href="{{ url('contact') }}">Contact Us<span class="flaticon-next"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Working style2 Area-->

@endsection
