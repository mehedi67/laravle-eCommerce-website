
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Amino - Organic eCommerce Website</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    {{-- <link rel="shortcut icon" type="image/x-icon" href="{{ asset('amino_{{ asset('amino_assets') }}/images/favicon.png') }}"> --}}

  
    <link rel="stylesheet" href="{{ asset('amino_assets/css/vendor/plugins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('amino_assets/css/style.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>

    <div class="main-wrapper">

        <!--Header Start-->
        <div class="section header-area-03 d-none d-lg-block">
            <!--Header Top Start-->
            <div class="header-top">
                <div class="container">
                    <!-- header Top wrapper Start -->
                    <div class="header-top-wrapper">
                        <!-- Static Nav Start -->
                        <div class="static-nav">
                            <p>Additional <span>20% Off</span> Sale Items – Please See Details</p>
                        </div>
                        <!-- Static Nav End -->

                        <!-- Header Language and Currency Start -->
                        <div class="header-language-currency-selector">
                            <div class="dropdown header-language">
                                <a href="index-3.html#" role="button" data-bs-toggle="dropdown">USD $ <i class="las la-angle-down"></i></a>

                                <ul class="dropdown-menu">
                                    <li><a href="index-3.html#">EUR €</a></li>
                                    <li><a href="index-3.html#">USD $</a></li>
                                </ul>
                            </div>
                            <div class="dropdown header-currency">
                                <a href="index-3.html#" role="button" data-bs-toggle="dropdown"> <img src="{{ asset('amino_assets') }}/images/flag/01.jpg" alt=""> English <i class="las la-angle-down"></i> </a>

                                <ul class="dropdown-menu">
                                    <li><a href="index-3.html#"><img src="{{ asset('amino_assets') }}/images/flag/01.jpg" alt=""> English</a></li>
                                    <li><a href="index-3.html#"><img src="{{ asset('amino_assets') }}/images/flag/02.jpg" alt=""> اللغة العربية </a></li>
                                    <li><a href="index-3.html#"><img src="{{ asset('amino_assets') }}/images/flag/03.jpg" alt=""> spanish </a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Header Language and Currency Start -->
                    </div>
                    <!-- header Top wrapper End -->
                </div>
            </div>
            <!--Header Top End-->

            <!--Header Bottom Start-->
            <div class="header-bottom header-sticky">
                <div class="container position-relative">
                    <div class="row">
                        <div class="col-lg-2">
                            <!-- Header Logo Start -->
                            <div class="header-logo">
                                <a href="{{ url('/') }}"><img src="{{ asset('amino_assets') }}/images/logo.jpg" alt=""></a>
                                
                            </div>
                            <!-- Header Logo End -->
                        </div>
                        <div class="col-lg-7">
                            <!-- Primary Menu Start -->
                            <div class="primary-menu primary-menu-02">
                                <nav>
                                    <ul>
                                        <li class="active">
                                            <a href="{{ url('/') }}">Home</a>
                                        
                                        </li>
                                        <li class="">
                                            <a href="{{ url('shop') }}">Shop</a>
                                        
                                        </li>
                                        <li class="">
                                            <a href="{{ url('contact') }}">Contact</a>
                                        
                                        </li>
                                        
                                    </ul>
                                </nav>
                            </div>
                            <!-- Primary Menu End -->
                        </div>
                        <div class="col-lg-3">
                            <!-- Header Action Start -->
                            <div class="header-actions justify-content-end">
                                <div class="dropdown">
                                    <a class="action" href="index-3.html#" role="button" data-bs-toggle="dropdown"><i class="lar la-user"></i></a>

                                    <ul class="dropdown-menu dropdown-profile">
                                        <li><a href="my-account.html">My Account</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="{{ url('login') }}">Sign In</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown">
                                    <a class="action" href="index-3.html#" role="button" data-bs-toggle="dropdown"> <i class="ion-ios-search-strong"></i> </a>

                                    <div class="dropdown-menu dropdown-search">
                                        <!-- Header Search Start -->
                                        <div class="header-search">
                                            <form action="index-3.html#">
                                                <input type="text" placeholder="Enter your search key ... ">
                                                <button><i class="ion-ios-search-strong"></i></button>
                                            </form>
                                        </div>
                                        <!-- Header Search End -->
                                    </div>
                                </div>
                                <a class="action" href="compare.html">
                                    <i class="ion-ios-shuffle-strong"></i>
                                    <span class="number">3</span>
                                </a>
                                <a class="action" href="wishlist.html">
                                    <i class="lar la-heart"></i>
                                    <span class="number">3</span>
                                </a>
                                <div class="dropdown">
                                    <a class="action" href="index-3.html#" role="button" data-bs-toggle="dropdown">
                                        <i class="las la-shopping-bag"></i>
                                        <span class="number">{{ App\Models\Cart::where('generated_cart_id',Cookie::get('generated_cart_id') )->count() }}</span>
                                    </a>

                                    <div class="dropdown-menu dropdown-cart">
                                        <div class="cart-content">
                                            <ul>
                                                @php
                                                    $sub_total = 0;
                                                @endphp
                                                @foreach (App\Models\Cart::where('generated_cart_id',Cookie::get('generated_cart_id') )->get() as $cartitem)
                                                <li>
                                                    <!-- Single Cart Item Start -->
                                                    <div class="single-cart-item">
                                                        <div class="cart-thumb">
                                                            <img src="{{ asset('uploads/product_photo') }}/{{ App\Models\Product::find($cartitem->product_id)->product_photo }}" alt="Cart">
                                                            <span class="product-quantity">1x</span>
                                                        </div>
                                                        <div class="cart-item-content">
                                                            <h6 class="product-name"><a href="{{ url('product/details') }}/{{ $cartitem->product_id }}">{{ App\Models\Product::find($cartitem->product_id)->product_name }}</a></h6>
                                                            <div class="attributes-content">
                                                                <span><strong>QTY:</strong> {{ $cartitem->cart_amount }} </span>
                                                            </div>
                                                            <span class="product-price">${{ App\Models\Product::find($cartitem->product_id)->product_price * $cartitem->cart_amount }}</span>
                                                            <a class="cart-remove" href="{{ url('cart/delete') }}/{{ $cartitem->id }}"><i class="las la-times"></i></a>
                                                        </div>
                                                    </div>
                                                    <!-- Single Cart Item End -->
                                                </li>
                                                @php
                                                    $sub_total += ( App\Models\Product::find($cartitem->product_id)->product_price * $cartitem->cart_amount );
                                                @endphp
                                                @endforeach
                                            </ul>
                                        </div>

                                        <div class="cart-price">
                                            <div class="cart-subtotals">
                                                <div class="price-inline">
                                                    <span class="label">Subtotal</span>
                                                    <span class="value">${{ $sub_total }}</span>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="checkout-btn">
                                            <a href="{{ url('cart') }}" class="btn btn-outline-dark btn-hover-primary d-block">Go To Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Header Action End -->
                        </div>
                    </div>
                </div>
            </div>
            <!--Header Bottom End-->
        </div>
        <!--Header End-->


        <!-- Header Mobile Start -->
        <div class="header-mobile section d-lg-none">

            <!-- Header Mobile top Start -->
            <div class="header-mobile-top header-sticky">
                <div class="container">
                    <div class="row row-cols-3 gx-2 align-items-center">
                        <div class="col">

                            <!-- Header Toggle Start -->
                            <div class="header-toggle">
                                <button class="mobile-menu-open">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                            <!-- Header Toggle End -->

                        </div>
                        <div class="col">

                            <!-- Header Logo Start -->
                            <div class="header-logo text-center">
                                <a href="index-3.html"><img src="{{ asset('amino_assets') }}/images/logo.jpg" alt="Logo"></a>
                            </div>
                            <!-- Header Logo End -->

                        </div>
                        <div class="col">

                            <!-- Header Action Start -->
                            <div class="header-actions">
                                <div class="dropdown">
                                    <a class="action" href="index-3.html#" role="button" data-bs-toggle="dropdown"><i class="lar la-user"></i></a>

                                    <ul class="dropdown-menu dropdown-profile">
                                        <li><a href="my-account.html">My Account</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="login.html">Sign In</a></li>
                                    </ul>
                                </div>
                                <a class="action" href="cart.html">
                                    <i class="las la-shopping-bag"></i>
                                    <span class="number">3</span>
                                </a>
                            </div>
                            <!-- Header Action End -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- Header Mobile top End -->

            <!-- Header Mobile Bottom End -->
            <div class="header-mobile-bootm">
                <div class="container">

                    <!-- Header Search Start -->
                    <div class="header-search">
                        <form action="index-3.html#">
                            <input type="text" placeholder="Enter your search key ... ">
                            <button><i class="ion-ios-search-strong"></i></button>
                        </form>
                    </div>
                    <!-- Header Search End -->

                </div>
            </div>
            <!-- Header Mobile Bottom End -->

        </div>
        <!-- Header Mobile End -->


        <!-- off Canvas Start -->
        <div class="off-canvas-box">

            <!-- Canvas Action Start -->
            <div class="canvas-action">
                <a class="action" href="compare.html"><i class="icon-sliders"></i> Compare <span class="action-num">(0)</span></a>
                <a class="action" href="wishlist.html"><i class="icon-heart"></i> Wishlist <span class="action-num">(0)</span></a>
            </div>
            <!-- Canvas Action end -->

            <!-- Header Language and Currency Start -->
            <div class="header-language-currency-selector">
                <div class="dropdown header-language">
                    <a href="index-3.html#" role="button" data-bs-toggle="dropdown">USD $ <i class="las la-angle-down"></i></a>

                    <ul class="dropdown-menu">
                        <li><a href="index-3.html#">EUR €</a></li>
                        <li><a href="index-3.html#">USD $</a></li>
                    </ul>
                </div>
                <div class="dropdown header-currency">
                    <a href="index-3.html#" role="button" data-bs-toggle="dropdown"> <img src="{{ asset('amino_assets') }}/images/flag/01.jpg" alt=""> English <i class="las la-angle-down"></i> </a>

                    <ul class="dropdown-menu">
                        <li><a href="index-3.html#"><img src="{{ asset('amino_assets') }}/images/flag/01.jpg" alt=""> English</a></li>
                        <li><a href="index-3.html#"><img src="{{ asset('amino_assets') }}/images/flag/02.jpg" alt=""> اللغة العربية </a></li>
                        <li><a href="index-3.html#"><img src="{{ asset('amino_assets') }}/images/flag/03.jpg" alt=""> spanish </a></li>
                    </ul>
                </div>
            </div>
            <!-- Header Language and Currency Start -->

            <!-- Canvas Close bar Start -->
            <div class="canvas-close-bar">
                <span>Menu</span>
                <a class="menu-close" href="javascript:;"><i class="las la-arrow-left"></i></a>
            </div>
            <!-- Canvas Close bar End -->

            <!-- Canvas Menu Start -->
            <div class="canvas-menu">
                <nav>
                    <ul>
                        <li class="active">
                            <a href="index-3.html#">Home</a>
                            <ul class="sub-menu">
                                <li><a href="index.html">Home 01</a></li>
                                <li><a href="index-2.html">Home 02</a></li>
                                <li><a href="index-3.html">Home 03</a></li>
                                <li><a href="index-4.html">Home 04</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="index-3.html#">Shop</a>
                            <ul class="mega-sub-menu">
                                <li>
                                    <a href="index-3.html#" class="menu-title">Shop Grid</a>

                                    <ul class="menu-item">
                                        <li><a href="shop-grid-3-column.html">Shop Grid 3 Column</a></li>
                                        <li><a href="shop-grid-4-column.html">Shop Grid 4 Column</a></li>
                                        <li><a href="shop-grid-left-sidebar.html">Shop Grid Left Sidebar</a></li>
                                        <li><a href="shop-grid-right-sidebar.html">Shop Grid Right Sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="index-3.html#" class="menu-title">Shop List</a>

                                    <ul class="menu-item">
                                        <li><a href="shop-list.html">Shop List</a></li>
                                        <li><a href="shop-list-left-sidebar.html">Shop List Left Sidebar</a></li>
                                        <li><a href="shop-list-right-sidebar.html">Shop List Right Sidebar</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="index-3.html#" class="menu-title">Shop Single</a>

                                    <ul class="menu-item">
                                        <li><a href="shop-single.html">Shop Single</a></li>
                                        <li><a href="shop-single-affiliate.html">Shop Single Affiliate</a></li>
                                        <li><a href="shop-single-gallery.html">Shop Single Gallery</a></li>
                                        <li><a href="shop-single-group.html">Shop Single Group</a></li>
                                        <li><a href="shop-single-sticky.html">Shop Single Sticky</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="index-3.html#" class="menu-title">Page</a>

                                    <ul class="menu-item">
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="my-account.html">My Account</a></li>
                                    </ul>
                                </li>

                                <li class="manu-banner">
                                    <a href="index-3.html#"><img src="{{ asset('amino_assets') }}/images/banner-menu-01.jpg" alt=""></a>
                                </li>
                                <li class="manu-banner">
                                    <a href="index-3.html#"><img src="{{ asset('amino_assets') }}/images/banner-menu-02.jpg" alt=""></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="index-3.html#">Page</a>
                            <ul class="sub-menu">
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="cart.html">Cart</a></li>
                                <li><a href="compare.html">Compare</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                                <li><a href="empty-cart.html">Empty Cart</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="my-account.html">My Account</a></li>
                                <li><a href="login.html">Login</a></li>
                                <li><a href="register.html">Register</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="index-3.html#">Blog</a>
                            <ul class="sub-menu">
                                <li><a href="index-3.html#">Blog Grid</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog-grid.html">Blog Grid</a></li>
                                        <li><a href="blog-grid-left-sidebar.html">Blog Grid Left Sidebar</a></li>
                                        <li><a href="blog-grid-right-sidebar.html">Blog Grid Right Sidebar</a></li>
                                    </ul>
                                </li>
                                <li><a href="index-3.html#">Blog List</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog-list-left-sidebar.html">Blog List Left Sidebar</a></li>
                                        <li><a href="blog-list-right-sidebar.html">Blog List Right Sidebar</a></li>
                                    </ul>
                                </li>
                                <li><a href="index-3.html#">Blog Details</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog-details-left-sidebar.html">Blog details Left Sidebar</a></li>
                                        <li><a href="blog-details-right-sidebar.html">Blog details Right Sidebar</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <!-- Canvas Menu End -->

        </div>
        <!-- off Canvas End -->

        <div class="menu-overlay"></div>
        @yield('content')

                <!-- Footer End-->
                <div class="section footer-section">
                    <!-- Footer widget Start -->
                    <div class="footer-widget-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-5">
                                    <!-- Footer widget Start -->
                                    <div class="footer-widget">
                                        <div class="footer-newsletter">
                                            <h3 class="title">LET'S KEEP IN TOUCH</h3>
                                            <p>Sign up for our e-mail to get latest news.</p>
                                            <div class="newsletter">
                                                <input type="text" placeholder="Your email address">
                                                <button>Sign up</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Footer widget End -->
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- Footer widget Start -->
                                    <div class="footer-widget">
                                        <h4 class="footer-widget-title">About us</h4>
        
                                        <div class="desc-info">
                                            <p>M-F 9am-5pm EST</p>
                                            <div class="info-items">
                                                <div class="single-info">
                                                    <i class="las la-map-marker"></i>
                                                    <p>Fox Mountain Rd, South Fork, CO 81154, USA</p>
                                                </div>
                                                <div class="single-info">
                                                    <i class="las la-phone-volume"></i>
                                                    <p><a href="tel:+01234568386">+0123.456.8386</a></p>
                                                </div>
                                                <div class="single-info">
                                                    <i class="las la-mail-bulk"></i>
                                                    <p><a href="mailto://support@example.com">support@example.com</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Footer widget End -->
                                </div>
                                <div class="col-lg-2 col-sm-3 col-6">
                                    <!-- Footer widget Start -->
                                    <div class="footer-widget">
                                        <h4 class="footer-widget-title">Information</h4>
        
                                        <ul class="widget-link">
                                            <li><a href="index-3.html#">Legal Notice</a></li>
                                            <li><a href="about.html">About us</a></li>
                                            <li><a href="contact.html">Contact us</a></li>
                                            <li><a href="index-3.html#">Sitemap</a></li>
                                            <li><a href="index-3.html#">Stores</a></li>
                                        </ul>
                                    </div>
                                    <!-- Footer widget End -->
                                </div>
                                <div class="col-lg-2 col-sm-3 col-6">
                                    <!-- Footer widget Start -->
                                    <div class="footer-widget">
                                        <h4 class="footer-widget-title">Custom Links</h4>
        
                                        <ul class="widget-link">
                                            <li><a href="index-3.html#">Prices drop</a></li>
                                            <li><a href="index-3.html#">New products</a></li>
                                            <li><a href="index-3.html#">Best sales</a></li>
                                            <li><a href="login.html">Login</a></li>
                                            <li><a href="my-account.html">My account</a></li>
                                        </ul>
                                    </div>
                                    <!-- Footer widget End -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Footer widget End -->
        
                    <!-- Footer Copyright Start -->
                    <div class="footer-copyright">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3">
                                    <!-- Footer Social Start -->
                                    <div class="footer-social">
                                        <a href="index-3.html#"><i class="lab la-facebook-f"></i></a>
                                        <a href="index-3.html#"><i class="lab la-twitter"></i></a>
                                        <a href="index-3.html#"><i class="lab la-youtube"></i></a>
                                    </div>
                                    <!-- Footer Social End -->
                                </div>
                                <div class="col-lg-9">
                                    <!-- Copyright and payment Start -->
                                    <div class="copyright-payment">
                                        <div class="payment">
                                            <img src="{{ asset('amino_assets') }}/images/payment.png" alt="Payment">
                                        </div>
                                        <div class="copyright">
                                            <p>Copyright 2021 &copy; <a href="https://hasthemes.com/">HasThemes</a> . All Rights Reserved</p>
                                        </div>
                                    </div>
                                    <!-- Copyright and payment End -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Footer Copyright End -->
                </div>
                <!-- Footer End-->
        
                <!--Back To Start-->
                <a href="index-3.html#" class="back-to-top">
                    <i class="las la-arrow-up"></i>
                </a>
                <!--Back To End-->
        
            </div>
 <!-- JS
    ============================================ -->

    <!-- Modernizer & jQuery JS -->
    <script src="{{ asset('amino_assets/js/vendor/modernizr-3.11.2.min.js') }}"></script>
    <script src="{{ asset('amino_assets/js/vendor/jquery-3.5.1.min.js') }}"></script>

 
    <script src="{{ asset('amino_assets/js/plugins.min.js') }}"></script>


    <!-- Main JS -->
    <script src="{{ asset('amino_assets/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @yield('footer_script')

</body>

</html>