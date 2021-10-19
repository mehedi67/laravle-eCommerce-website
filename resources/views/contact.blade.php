@extends('layouts.amino')

@section('content')
    <!--Page Banner Start-->
    <div class="section page-banner-wrapper bg-cover" style="background-image: url(assets/images/page-banner.jpg);">
        <div class="container">
            <div class="page-banner">
                <ul class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Contact</li>
                </ul>
            </div>
        </div>
    </div>
    <!--Page Banner Start-->

    <!--Contact Map Start-->
    <div class="contact-map">
        <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=Mission%20District%2C%20San%20Francisco%2C%20CA%2C%20USA&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
    </div>
    <!--Contact Map End-->

    <!-- Contact Section Start -->
    <div class="section section-padding-02 mt-n10">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <!-- Contact Wrapper Start -->
                    <div class="contact-wrapper mt-9">
                        <h4 class="contact-title">Get in touch</h4>
                        <p>Top rated construction packages we pleasure rationally encounter <br> consequences interesting who loves or pursue or desires </p>

                        <div class="contact-form">
                            <form id="contact-form" action="https://htmlmail.hasthemes.com/humayun/amino-contact.php" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="single-form">
                                            <input type="text" class="form-control" name="name" placeholder="Your Name*">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form">
                                            <input type="email" class="form-control" name="email" placeholder="Your Email*">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-form">
                                            <textarea name="message" class="form-control" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <p class="form-message"></p>
                                    <div class="col-md-12">
                                        <div class="single-form">
                                            <button class="btn btn-primary btn-hover-dark rounded-pill">Send Message</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Contact Wrapper End -->
                </div>
                <div class="col-lg-6">
                    <!-- Contact Wrapper Start -->
                    <div class="contact-information mt-10">
                        <div class="single-information">
                            <h5 class="title">Office Address</h5>
                            <p>245 Southern Street, Apartment no. 174 Central Twon, New Yourk, USa</p>
                        </div>
                        <div class="single-information">
                            <h5 class="title">Phone Number</h5>
                            <p><a href="contact.html#">+12345 678 987</a></p>
                            <p><a href="contact.html#">+98745 612 321</a></p>
                        </div>
                        <div class="single-information">
                            <h5 class="title">Web Address</h5>
                            <p><a href="contact.html#">info@example.com</a></p>
                            <p><a href="contact.html#">www.example.com</a></p>
                        </div>
                    </div>
                    <!-- Contact Wrapper End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Section End -->
@endsection