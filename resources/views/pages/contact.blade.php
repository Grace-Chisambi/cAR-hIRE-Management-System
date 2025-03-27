@extends('layouts.app')
@section('content')

<!--Start Contact details Area-->
<section class="contact-details-area" style="background-image: url('images/bg_3.jpg');">
    <div class="sec-title text-center">
        <p>Contact Details</p>
        <div class="title clr-white">How Can We <span>Help You?</span></div>
    </div>
    <div class="parallax-background" style="background-image:url(images/parallax-background/contact-details-bg.html);"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="contact-details-content">

                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="content-info-box" style="background-image:url(images/parallax-background/contact-info-box-bg.jpg);">
                                <div class="inner-content">
                                    <div class="inner">
                                        <div class="single-info-box wow fadeInDown" data-wow-delay="100ms" data-wow-duration="1200ms">
                                            <div class="icon">
                                                <span class="icon-global"></span>
                                            </div>
                                            <div class="text">
                                                <h3>Visit Our Office</h3>
                                                <p>Along M1 Road
                                                    Opposite Rafiki Foundation, Mzuzu</p>
                                            </div>
                                        </div>
                                        <div class="single-info-box white-bg wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1200ms">
                                            <div class="icon">
                                                <span class="icon-global"></span>
                                            </div>
                                            <div class="text">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="contact-details-form-box">
                                <div class="title-box">
                                    <h2>Request for<br> Contact Us</h2>
                                </div>
                                <div class="contact-details-box">
                                    <form class="contact-details-form">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="single-box">
                                                    <input type="text" name="form_name" value="" placeholder="Name" required="">
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="single-box">
                                                    <input type="email" name="form_email" value="" placeholder="Email" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="single-box">
                                                    <select class="selectpicker" data-width="100%">
                                                    <option selected="selected">Select Your Service</option>S
                                                    <option>wedding ocassion booking</option>
                                                    <option>corporate Car Booking</option>
                                                    <option>day booking</option>
                                                    <option>week booking</option>

                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="single-box">
                                                    <textarea name="form_request" placeholder="Special Request" required=""></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="single-box">
                                                    <button class="btn-one" type="submit">Send Request<span class="flaticon-next"></span></button>
                                                </div>
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
    </div>
</section>
<!--End Contact details Area-->


@endsection

