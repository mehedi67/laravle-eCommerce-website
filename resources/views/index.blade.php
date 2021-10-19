@extends('layouts.amino')
@section('content')
    

        <!--Slider Start-->
        <div class="section">
            <div class="swiper-container slider-03 slider-active">
                <div class="swiper-wrapper">
                    <div class="swiper-slide animation-style-01">
                        <!-- Single Slider Start  -->
                        <div class="single-slider-03 bg-cover" style="background-image: url({{ asset('amino_assets') }}/images/slider/slider-05.jpg);">
                            <div class="container">
                                <!-- Slider Content Start  -->
                                <div class="slider-content-02 px-0">
                                    <h6 class="sub-title">freshly prepared smoothie</h6>
                                    <h1 class="main-title"><span>Fresh natural </span> <br>strawberries</h1>
                                    <a href="shop-single.html" class="btn btn-whites btn-hover-primary">Shop Now</a>
                                </div>
                                <!-- Slider Content End  -->
                            </div>
                        </div>
                        <!-- Single Slider End  -->
                    </div>
                    <div class="swiper-slide animation-style-01">
                        <!-- Single Slider Start  -->
                        <div class="single-slider-03 bg-cover" style="background-image: url({{ asset('amino_assets') }}/images/slider/slider-06.jpg);">
                            <div class="container">
                                <!-- Slider Content Start  -->
                                <div class="slider-content-02 px-0">
                                    <h6 class="sub-title">100% jugo naranja premium</h6>
                                    <h1 class="main-title"><span>orange juice </span> <br> Simple & Good</h1>
                                    <a href="shop-single.html" class="btn btn-whites btn-hover-primary">Shop Now</a>
                                </div>
                                <!-- Slider Content End  -->
                            </div>
                        </div>
                        <!-- Single Slider End  -->
                    </div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <!--Slider End-->

        <!--Category Start-->
        <div class="section section-padding">
            <div class="container">
                <!-- Section Title Start -->
                <div class="section-title text-center">
                    <span class="sub-title">Shop By Categories</span>
                    <h2 class="title">Featured Categories</h2>
                </div>
                <!-- Section Title End -->

                <!-- Category Active Start -->
                <div class="category-active swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($categories as $category)
                        <div class="swiper-slide">
                            <!-- Single Category Start -->
                            <div class="single-category">
                                <div class="category-thumb">
                                    <a href="blog-grid-left-sidebar.html"><img src="{{ asset('uploads/category') }}/{{ $category->category_photo }}" alt="Category"></a>
                                </div>
                                <div class="category-desc">
                                    <a href="{{ url('shop/category') }}/{{ $category->id }}">{{ $category->category_name }}</a>
                                </div>
                            </div>
                            <!-- Single Category End -->
                        </div>
                        @endforeach
                        

                    </div>
                </div>
                <!-- Category Active End -->
            </div>
        </div>
        <!--Category End-->

        <!--Banner Start-->
        <div class="section section-padding mt-n6">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Single banner Start -->
                        <div class="single-banner mt-6">
                            <a href="shop-grid-left-sidebar.html">
                                <img src="{{ asset('amino_assets') }}/images/banner-01.jpg" alt="Banner">
                            </a>
                        </div>
                        <!-- Single banner End -->
                    </div>
                    <div class="col-md-4">
                        <!-- Single banner Start -->
                        <div class="single-banner mt-6">
                            <a href="shop-grid-left-sidebar.html">
                                <img src="{{ asset('amino_assets') }}/images/banner-02.jpg" alt="Banner">
                            </a>
                        </div>
                        <!-- Single banner End -->
                    </div>
                    <div class="col-md-4">
                        <!-- Single banner Start -->
                        <div class="single-banner mt-6">
                            <a href="shop-grid-left-sidebar.html">
                                <img src="{{ asset('amino_assets') }}/images/banner-03.jpg" alt="Banner">
                            </a>
                        </div>
                        <!-- Single banner End -->
                    </div>
                </div>
            </div>
        </div>
        <!--Banner End-->

        <!--New Arrivals End-->
        <div class="section section-padding-02">
            <div class="container-fluid custom-container">
                <!-- Section Title Start -->
                <div class="section-title text-center">
                    <span class="sub-title">See Our Latest</span>
                    <h2 class="title">New Arrivals </h2>
                </div>
                <!-- Section Title End -->
                <div class="product-4-active">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach ($products as $product)
                            <div class="swiper-slide">
                                <!-- Single Product Start -->
                                @include('part/product_list',['product'=>$product])
                                <!-- Single Product End -->
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-button-next"><i class="ion-ios-arrow-right"></i></div>
                    <div class="swiper-button-prev"><i class="ion-ios-arrow-left"></i></div>
                </div>
            </div>
        </div>
        <!--New Arrivals End-->

        <!-- Discount Countdown Start-->
        <div class="section discount-countdown bg-cover" style="background-image: url({{ asset('amino_assets') }}/images/countdown-bg-2.jpg);">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-md-6 col-sm-7">
                        <!-- Discount Countdown Content Start -->
                        <div class="discount-countdown-content">
                            <span class="sub-title">Natural Product</span>
                            <h2 class="title">Save 40% Off</h2>
                            <p>Broccoli roses, alway fresh and delicious.100% Organic</p>

                            <div class="countdown-wrapper">
                                <div class="countdown" data-countdown="2024/11/20" data-format="short">
                                    <div class="single-countdown">
                                        <span class="number countdown__time daysLeft"></span>
                                        <span class="period countdown__text daysText"></span>
                                    </div>
                                    <div class="single-countdown">
                                        <span class="number countdown__time hoursLeft"></span>
                                        <span class="period countdown__text hoursText"></span>
                                    </div>
                                    <div class="single-countdown">
                                        <span class="number countdown__time minsLeft"></span>
                                        <span class="period countdown__text minsText"></span>
                                    </div>
                                    <div class="single-countdown">
                                        <span class="number countdown__time secsLeft"></span>
                                        <span class="period countdown__text secsText"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="countdown-btn">
                                <a href="shop-single.html" class="btn btn-whites btn-hover-dark">Shop Now</a>
                            </div>
                        </div>
                        <!-- Discount Countdown Content end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Discount Countdown End-->

        <!-- Testimonial Start-->
        <div class="section testimonial-section section-padding-02" style="background-image: url({{ asset('amino_assets') }}/images/bg-testimonial.jpg);">
            <div class="container">
                <!-- Section Title Start -->
                <div class="section-title text-center">
                    <span class="sub-title">What they say </span>
                    <h2 class="title">Client Testimonials</h2>
                </div>
                <!-- Section Title End -->

                <!-- Testimonial Active Start -->
                <div class="swiper-container testimonial-active">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <!-- Single Testimonial Start -->
                            <div class="single-testimonial">
                                <h4 class="name">orando BLoom</h4>
                                <p>All Perfect !! I have three sites with magento , this theme is the best !! Excellent support , advice theme installation package , sorry for English, are Italian but I had no problem !! Thank you !</p>
                                <span class="test-email">info@hasthemes.com</span>
                            </div>
                            <!-- Single Testimonial End -->
                        </div>
                        <div class="swiper-slide">
                            <!-- Single Testimonial Start -->
                            <div class="single-testimonial">
                                <h4 class="name">orando BLoom</h4>
                                <p>All Perfect !! I have three sites with magento , this theme is the best !! Excellent support , advice theme installation package , sorry for English, are Italian but I had no problem !! Thank you !</p>
                                <span class="test-email">info@hasthemes.com</span>
                            </div>
                            <!-- Single Testimonial End -->
                        </div>
                        <div class="swiper-slide">
                            <!-- Single Testimonial Start -->
                            <div class="single-testimonial">
                                <h4 class="name">orando BLoom</h4>
                                <p>All Perfect !! I have three sites with magento , this theme is the best !! Excellent support , advice theme installation package , sorry for English, are Italian but I had no problem !! Thank you !</p>
                                <span class="test-email">info@hasthemes.com</span>
                            </div>
                            <!-- Single Testimonial End -->
                        </div>
                    </div>
                </div>
                <!-- Testimonial Active End -->
            </div>
        </div>
        <!-- Testimonial End-->

        <!-- Our Product Start-->
        <div class="section section-padding-02 product-bg">
            <div class="container">
                <!-- Section Title Start -->
                <div class="section-title text-center">
                    <span class="sub-title">See Our Latest</span>
                    <h2 class="title">Our products </h2>
                </div>
                <!-- Section Title End -->

                <!-- Product Tab Menu Start -->
                <ul class="nav product-nav justify-content-center">

                    <li><a class="active" data-bs-toggle="tab" href="#All">All</a></li>
                   @foreach ($categories as $category)
                   <li><a data-bs-toggle="tab" href="#category_{{ $category->id }}">{{ $category->category_name }}</a></li>
                   @endforeach
                    
                </ul>
                <!-- Product Tab Menu End -->

                <!-- Product Tab Content Start -->
                <div class="tab-content product-tab-content">
                    <div class="tab-pane fade show active" id="All">
                        <!-- Product 2 Start -->
                        <div class="product-2-active">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach ($products as $product)
                                    <div class="swiper-slide">
                                        <!-- Single Product Start -->
                                        @include('part/product_list',['product'=>$product])
                                        <!-- Single Product End -->
                                    </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-button-next"><i class="ion-ios-arrow-right"></i></div>
                            <div class="swiper-button-prev"><i class="ion-ios-arrow-left"></i></div>
                        </div>
                        <!-- Product 2 End -->
                    </div>
                    @foreach ($categories as $category)
                    <div class="tab-pane fade" id="category_{{ $category->id }}">
                        <!-- Product 2 Start -->
                        <div class="product-2-active">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <!-- Single Product Start -->
                                       @foreach (App\Models\Product::where('category_id',$category->id)->get() as $product)
                                       @include('part/product_list',['product'=>$product])
                                       @endforeach
                                       
                                        <!-- Single Product End -->
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-button-next"><i class="ion-ios-arrow-right"></i></div>
                            <div class="swiper-button-prev"><i class="ion-ios-arrow-left"></i></div>
                        </div>
                        <!-- Product 2 End -->
                    </div>
                    @endforeach
                </div>
                <!-- Product Tab Content End -->
            </div>
        </div>
        <!-- Our Product End-->

        <!-- Blog Start-->
        <div class="section section-padding">
            <div class="container">
                <!-- Section Title Start -->
                <div class="section-title text-center">
                    <span class="sub-title">Read Our Blog</span>
                    <h2 class="title">Latest News</h2>
                </div>
                <!-- Section Title End -->

                <!-- Blog Start -->
                <div class="blog-active swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <!-- Single Blog Start -->
                            <div class="single-blog">
                                <div class="blog-images">
                                    <a href="blog-details-left-sidebar.html"><img src="{{ asset('amino_assets') }}/images/blog/blog-01.jpg" alt=""></a>
                                    <div class="meta-category">
                                        <a href="index-3.html#">Fashion</a>
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <h4 class="blog-title"><a href="blog-details-left-sidebar.html">This is Third Post For XipBlog</a></h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys ...</p>
                                    <div class="post-meta ">
                                        <span class="meta-date">Sep 12TH, 2020</span>
                                        <span class="meta-author">Posted by <span>Demo hasthemes</span></span>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Blog end -->
                        </div>
                        <div class="swiper-slide">
                            <!-- Single Blog Start -->
                            <div class="single-blog">
                                <div class="blog-images">
                                    <a href="blog-details-left-sidebar.html"><img src="{{ asset('amino_assets') }}/images/blog/blog-02.jpg" alt=""></a>
                                    <div class="meta-category">
                                        <a href="index-3.html#">Fashion</a>
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <h4 class="blog-title"><a href="blog-details-left-sidebar.html">This is Big sale this summer</a></h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys ...</p>
                                    <div class="post-meta ">
                                        <span class="meta-date">Sep 12TH, 2020</span>
                                        <span class="meta-author">Posted by <span>Demo hasthemes</span></span>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Blog end -->
                        </div>
                        <div class="swiper-slide">
                            <!-- Single Blog Start -->
                            <div class="single-blog">
                                <div class="blog-images">
                                    <a href="blog-details-left-sidebar.html"><img src="{{ asset('amino_assets') }}/images/blog/blog-03.jpg" alt=""></a>
                                    <div class="meta-category">
                                        <a href="index-3.html#">Fashion</a>
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <h4 class="blog-title"><a href="blog-details-left-sidebar.html">This is Nicholas K Spring 2021 Runway</a></h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys ...</p>
                                    <div class="post-meta ">
                                        <span class="meta-date">Sep 12TH, 2020</span>
                                        <span class="meta-author">Posted by <span>Demo hasthemes</span></span>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Blog end -->
                        </div>
                        <div class="swiper-slide">
                            <!-- Single Blog Start -->
                            <div class="single-blog">
                                <div class="blog-images">
                                    <a href="blog-details-left-sidebar.html"><img src="{{ asset('amino_assets') }}/images/blog/blog-04.jpg" alt=""></a>
                                    <div class="meta-category">
                                        <a href="index-3.html#">Fashion</a>
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <h4 class="blog-title"><a href="blog-details-left-sidebar.html">London Food Week 2021</a></h4>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys ...</p>
                                    <div class="post-meta ">
                                        <span class="meta-date">Sep 12TH, 2020</span>
                                        <span class="meta-author">Posted by <span>Demo hasthemes</span></span>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Blog end -->
                        </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-button-next"><i class="ion-ios-arrow-right"></i></div>
                    <div class="swiper-button-prev"><i class="ion-ios-arrow-left"></i></div>
                </div>
                <!-- Blog End -->
            </div>
        </div>
        <!-- Blog End-->

        <!--Features Start-->
        <div class="section section-padding">
            <div class="container">
                <!-- Features Wrapper start -->
                <div class="features-wrapper">
                    <!-- Single Features Start -->
                    <div class="single-feature">
                        <div class="feature-icon">
                            <img src="{{ asset('amino_assets') }}/images/features-icon/icon-1.png" alt="">
                        </div>
                        <div class="feature-content">
                            <h5 class="title">Free Shipping</h5>
                            <p>On all orders over $75.00</p>
                        </div>
                    </div>
                    <!-- Single Features End -->
                    <!-- Single Features Start -->
                    <div class="single-feature">
                        <div class="feature-icon">
                            <img src="{{ asset('amino_assets') }}/images/features-icon/icon-2.png" alt="">
                        </div>
                        <div class="feature-content">
                            <h5 class="title">Free Returns</h5>
                            <p>Returns are free within 9 days</p>
                        </div>
                    </div>
                    <!-- Single Features End -->
                    <!-- Single Features Start -->
                    <div class="single-feature">
                        <div class="feature-icon">
                            <img src="{{ asset('amino_assets') }}/images/features-icon/icon-3.png" alt="">
                        </div>
                        <div class="feature-content">
                            <h5 class="title">100% Secure Payment</h5>
                            <p>Your payment are safe with us.</p>
                        </div>
                    </div>
                    <!-- Single Features End -->
                    <!-- Single Features Start -->
                    <div class="single-feature">
                        <div class="feature-icon">
                            <img src="{{ asset('amino_assets') }}/images/features-icon/icon-4.png" alt="">
                        </div>
                        <div class="feature-content">
                            <h5 class="title">Support 24/7</h5>
                            <p>Contact us 24hrs a day</p>
                        </div>
                    </div>
                    <!-- Single Features End -->
                </div>
                <!-- Features Wrapper End -->
            </div>
        </div>
        <!--Features End-->

        <!--Features Product Start-->
        <div class="section section-padding-02 mt-n10">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Features Product Start -->
                        <div class="features-product-wrapper mt-9">
                            <h4 class="title">Featured products </h4>

                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- Single banner Start -->
                                    <div class="single-banner mt-6">
                                        <a href="shop-grid-left-sidebar.html">
                                            <img src="{{ asset('amino_assets') }}/images/banner-04.jpg" alt="Banner">
                                        </a>
                                    </div>
                                    <!-- Single banner End -->
                                </div>
                                <div class="col-sm-6">
                                    <!-- Features Product Items Start -->
                                    <div class="features-product-items">
                                        <!-- Features Product Item Start -->
                                        <div class="features-product-item">
                                            <div class="product-image">
                                                <a class="product-thumbnail" href="shop-single.html">
                                                    <img src="{{ asset('amino_assets') }}/images/product/product-01.jpg" alt="product">
                                                    <img class="image-hover" src="{{ asset('amino_assets') }}/images/product/product-02.jpg" alt="product">
                                                </a>
                                                <div class="product-flag">
                                                    <span class="new">New</span>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h4 class="product-title"><a href="shop-single.html">Madden by Steve Madden Cale 6</a></h4>
                                                <div class="manufacturer"><a href="index-3.html#">Studio Design</a></div>
                                                <div class="product-price">
                                                    <span class="sele-price">$11.12</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Features Product Item End -->
                                        <!-- Features Product Item Start -->
                                        <div class="features-product-item">
                                            <div class="product-image">
                                                <a class="product-thumbnail" href="shop-single.html">
                                                    <img src="{{ asset('amino_assets') }}/images/product/product-12.jpg" alt="product">
                                                    <img class="image-hover" src="{{ asset('amino_assets') }}/images/product/product-01.jpg" alt="product">
                                                </a>
                                                <div class="product-flag">
                                                    <span class="discount">-25%</span>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h4 class="product-title"><a href="shop-single.html">Calvin Klein Jeans Reflective Logo Full Zip</a></h4>
                                                <div class="manufacturer"><a href="index-3.html#">Studio Design</a></div>
                                                <div class="product-price">
                                                    <span class="regular-price">$20.90</span>
                                                    <span class="sele-price">$16.12</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Features Product Item End -->
                                        <!-- Features Product Item Start -->
                                        <div class="features-product-item">
                                            <div class="product-image">
                                                <a class="product-thumbnail" href="shop-single.html">
                                                    <img src="{{ asset('amino_assets') }}/images/product/product-11.jpg" alt="product">
                                                    <img class="image-hover" src="{{ asset('amino_assets') }}/images/product/product-15.jpg" alt="product">
                                                </a>
                                                <div class="product-flag">
                                                    <span class="new">New</span>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h4 class="product-title"><a href="shop-single.html">Fila Locker Room Varsity Jacket</a></h4>
                                                <div class="manufacturer"><a href="index-3.html#">Studio Design</a></div>
                                                <div class="product-price">
                                                    <span class="sele-price">$9.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Features Product Item End -->
                                    </div>
                                    <!-- Features Product Items End -->
                                </div>
                            </div>
                        </div>
                        <!-- Features Product End -->
                    </div>
                    <div class="col-lg-6">
                        <!-- Features Product Start -->
                        <div class="features-product-wrapper mt-9">
                            <h4 class="title">on-sale Products</h4>

                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- Single banner Start -->
                                    <div class="single-banner mt-6">
                                        <a href="shop-grid-left-sidebar.html">
                                            <img src="{{ asset('amino_assets') }}/images/banner-05.jpg" alt="Banner">
                                        </a>
                                    </div>
                                    <!-- Single banner End -->
                                </div>
                                <div class="col-sm-6">
                                    <!-- Features Product Items Start -->
                                    <div class="features-product-items">
                                        <!-- Features Product Item Start -->
                                        <div class="features-product-item">
                                            <div class="product-image">
                                                <a class="product-thumbnail" href="shop-single.html">
                                                    <img src="{{ asset('amino_assets') }}/images/product/product-06.jpg" alt="product">
                                                    <img class="image-hover" src="{{ asset('amino_assets') }}/images/product/product-07.jpg" alt="product">
                                                </a>
                                                <div class="product-flag">
                                                    <span class="new">New</span>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h4 class="product-title"><a href="shop-single.html">Brixton Patrol All Terrain Anorak Jacket</a></h4>
                                                <div class="manufacturer"><a href="index-3.html#">Studio Design</a></div>
                                                <div class="product-price">
                                                    <span class="sele-price">$11.12</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Features Product Item End -->
                                        <!-- Features Product Item Start -->
                                        <div class="features-product-item">
                                            <div class="product-image">
                                                <a class="product-thumbnail" href="shop-single.html">
                                                    <img src="{{ asset('amino_assets') }}/images/product/product-13.jpg" alt="product">
                                                    <img class="image-hover" src="{{ asset('amino_assets') }}/images/product/product-14.jpg" alt="product">
                                                </a>
                                                <div class="product-flag">
                                                    <span class="discount">-25%</span>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h4 class="product-title"><a href="shop-single.html">Originals Kaval Windbreaker Winter Jacket</a></h4>
                                                <div class="manufacturer"><a href="index-3.html#">Studio Design</a></div>
                                                <div class="product-price">
                                                    <span class="regular-price">$20.90</span>
                                                    <span class="sele-price">$16.12</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Features Product Item End -->
                                        <!-- Features Product Item Start -->
                                        <div class="features-product-item">
                                            <div class="product-image">
                                                <a class="product-thumbnail" href="shop-single.html">
                                                    <img src="{{ asset('amino_assets') }}/images/product/product-14.jpg" alt="product">
                                                    <img class="image-hover" src="{{ asset('amino_assets') }}/images/product/product-06.jpg" alt="product">
                                                </a>
                                                <div class="product-flag">
                                                    <span class="new">New</span>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h4 class="product-title"><a href="shop-single.html">Juicy Couture Juicy Quilted Terry Track Jacket</a></h4>
                                                <div class="manufacturer"><a href="index-3.html#">Studio Design</a></div>
                                                <div class="product-price">
                                                    <span class="sele-price">$9.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Features Product Item End -->
                                    </div>
                                    <!-- Features Product Items End -->
                                </div>
                            </div>
                        </div>
                        <!-- Features Product End -->
                    </div>
                </div>
            </div>
        </div>
        <!--Features Product End-->

    <!-- Quick View Start -->
    <div class="modal fade" id="quick-view">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Quick View image Start -->
                            <div class="quick-view-image">
                                <div class="quick-view-top">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <img src="{{ asset('amino_assets') }}/images/shop-single/shop-single-01.jpg" alt="Product Image">
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="{{ asset('amino_assets') }}/images/shop-single/shop-single-02.jpg" alt="Product Image">
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="{{ asset('amino_assets') }}/images/shop-single/shop-single-03.jpg" alt="Product Image">
                                            </div>
                                            <div class="swiper-slide ">
                                                <img src="{{ asset('amino_assets') }}/images/shop-single/shop-single-04.jpg" alt="Product Image">
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="{{ asset('amino_assets') }}/images/shop-single/shop-single-05.jpg" alt="Product Image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-thumbnail quick-view-thumbs">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <img src="{{ asset('amino_assets') }}/images/shop-single/shop-single-01.jpg" alt="Product Thumbnail">
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="{{ asset('amino_assets') }}/images/shop-single/shop-single-02.jpg" alt="Product Thumbnail">
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="{{ asset('amino_assets') }}/images/shop-single/shop-single-03.jpg" alt="Product Thumbnail">
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="{{ asset('amino_assets') }}/images/shop-single/shop-single-04.jpg" alt="Product Thumbnail">
                                            </div>
                                            <div class="swiper-slide">
                                                <img src="{{ asset('amino_assets') }}/images/shop-single/shop-single-05.jpg" alt="Product Thumbnail">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Add Arrows -->
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <div class="product-flag">
                                    <span class="new">New</span>
                                </div>
                            </div>
                            <!-- Quick View image End -->
                        </div>
                        <div class="col-lg-6">
                            <!-- Quick View Content Start -->
                            <div class="quick-view-content">
                                <h3 class="product-name">Juicy Couture Juicy Quilted Terry Track Jacket</h3>
                                <p class="reference">Reference: <span>Demo</span></p>
                                <ul class="shop-rating-content">
                                    <li>
                                        <div class="review-star">
                                            <div class="star" style="width: 80%;"></div>
                                        </div>
                                    </li>
                                    <li><a href="index-3.html#"><i class="fal fa-comment-dots"></i> Read reviews <span>(3)</span></a></li>
                                    <li><a href="index-3.html#"><i class="fal fa-edit"></i> Write a review</a></li>
                                </ul>
                                <div class="product-prices">
                                    <span class="old-price">$35.90</span>
                                    <span class="sale-price">$28.72</span>
                                    <span class="discount-percentage">Save 20%</span>
                                </div>
                                <div class="product-description">
                                    <ul>
                                        <li>Block out the haters with the fresh adidas® Originals Kaval Windbreaker Jacket.</li>
                                        <li>Part of the Kaval Collection.</li>
                                        <li>Regular fit is eased, but not sloppy, and perfect for any activity.</li>
                                        <li>Plain-woven jacket specifically constructed for freedom of movement.</li>
                                    </ul>
                                </div>
                                <div class="product-quantity-cart">
                                    <div class="product-quantity-cart-wrapper d-flex">
                                        <div class="product-quantity d-inline-flex">
                                            <button type="button" class="sub"><i class="ion-ios-arrow-down"></i></button>
                                            <input type="text" value="1" />
                                            <button type="button" class="add"><i class="ion-ios-arrow-up"></i></button>
                                        </div>
                                        <div class="product-cart">
                                            <button class="btn btn-primary btn-hover-dark">Add to Cart</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-additional-info">
                                    <p class="panel-product-actions"><a href="index-3.html#" class="action-btn wishlist"><i class="ion-android-favorite-outline"></i> Add to wishlist </a></p>
                                    <p class="panel-product-actions"><button class="action-btn wishlist"><i class="ion-ios-shuffle-strong"></i> Add to compare</button></p>
                                </div>
                                <div class="product-sharing">
                                    <span class="label">Share</span>
                                    <ul class="social-sharing">
                                        <li><a href="index-3.html#"><i class="ion-social-facebook"></i></a></li>
                                        <li><a href="index-3.html#"><i class="ion-social-twitter"></i></a></li>
                                        <li><a href="index-3.html#"><i class="ion-social-pinterest"></i></a></li>
                                        <li><a href="index-3.html#"><i class="ion-social-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Quick View Content End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick View End -->
@endsection