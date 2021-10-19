@extends('layouts.amino')
@section('content')
    <!--Page Banner Start-->
    <div class="section page-banner-wrapper bg-cover" style="background-image: url({{ asset('amino_assets') }}/images/page-banner.jpg);">
        <div class="container">
            <div class="page-banner">
                <ul class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="shop-grid-left-sidebar.html">Shop</a></li>
                    <li class="breadcrumb-item active">Shop Single</li>
                </ul>
            </div>
        </div>
    </div>
    <!--Page Banner Start-->

    <!--Shop Single Start-->
    <div class="section section-padding mt-n10">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <!-- Shop Single image Start -->

                    <div class="shop-single-image">
                        <div class="gallery-top">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @forelse ($thumbail as $single_product_thumbnail_photo)
                                    
                                    <div class="swiper-slide">
                                        <div class="single-img zoom">
                                            
                                            <img src="{{ asset('uploads/product_thumbnail_photos') }}/{{ $single_product_thumbnail_photo->product_thumbnail_photo_name }}" alt="Product Image">
                                            <div class="inner-stuff">
                                                <div class="gallery-item" data-src="{{ asset('uploads/product_thumbnail_photos') }}/{{ $single_product_thumbnail_photo->product_thumbnail_photo_name }}">
                                                    <a href="javascript:void(0)">
                                                        <i class="lastudioicon-full-screen"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="swiper-slide">
                                        <div class="single-img zoom">
                                            
                                            <img src="{{ asset('uploads/product_photo') }}/{{ $product_info->product_photo }}" alt="Product Image">
                                            <div class="inner-stuff">
                                                <div class="gallery-item" data-src="{{ asset('uploads/product_photo') }}/{{ $product_info->product_photo }}">
                                                    <a href="javascript:void(0)">
                                                        <i class="lastudioicon-full-screen"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                            <a href="shop-single.html#gallery-1" class="btn-gallery"><i class="ion-arrow-expand"></i></a>
                        </div>
                        <div class="product-thumbnail gallery-thumbs">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach ($thumbail as $single_product_thumbnail_photo)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('uploads/product_thumbnail_photos') }}/{{ $single_product_thumbnail_photo->product_thumbnail_photo_name }}" alt="Product Thumbnail">
                                    </div>
                                    @endforeach
                                
                                </div>
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                        <div class="product-flag">
                            <span class="new">New</span>
                        </div>

                        <div id="gallery-1" class="gallery-hidden">
                            <a href="{{ asset('amino_assets') }}/images/shop-single/shop-single-01.jpg">Image 1</a>
                            <a href="{{ asset('amino_assets') }}/images/shop-single/shop-single-02.jpg">Image 2</a>
                            <a href="{{ asset('amino_assets') }}/images/shop-single/shop-single-03.jpg">Image 3</a>
                            <a href="{{ asset('amino_assets') }}/images/shop-single/shop-single-04.jpg">Image 4</a>
                            <a href="{{ asset('amino_assets') }}/images/shop-single/shop-single-05.jpg">Image 5</a>
                        </div>
                    </div>
                    <!-- Shop Single image End -->
                </div>
                <div class="col-lg-6">
                    <!-- Shop Single Content Start -->
                    <div class="shop-single-content">
                        @if ( session('cart-success') )
                        <div class="alert alert-success">
                            {{ session('cart-success') }}
                        </div>
                        @endif
                        <h3 class="product-name">{{ $product_info->product_name }}</h3>
                        <h6 class=" text-success">Available stock: {{ $product_info->product_quantity }}</h6>
                        <ul class="shop-rating-content">
                            <li>
                                <div class="review-star">
                                    <div class="star" style="width: 80%;"></div>
                                </div>
                            </li>
                            <li><a href="shop-single.html#"><i class="fal fa-comment-dots"></i> Read reviews <span>(3)</span></a></li>
                            <li><a href="shop-single.html#"><i class="fal fa-edit"></i> Write a review</a></li>
                        </ul>
                        <div class="product-prices">
                            <span class="old-price">${{ $product_info->product_price }}</span>
                            <span class="sale-price">$28.72</span>
                            <span class="discount-percentage">Save 20%</span>
                        </div>
                        <div class="product-description">
                            <ul>
                                <li>{{ $product_info->product_description }}</li>
                                
                            </ul>
                        </div>
                        <div class="product-variants">
                            <div class="product-variant-item">
                                <span class="label">Size</span>
                                <div class="size-select">
                                    <select>
                                        <option value="0">S</option>
                                        <option value="0">M</option>
                                        <option value="0">L</option>
                                        <option value="0">XL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="product-variant-item">
                                <span class="label">Color</span>
                                <div class="color-select">
                                    <div class="color-label">
                                        <input id="color1" name="color" type="radio">
                                        <label for="color1"><span data-color="#fff"></span></label>
                                    </div>
                                    <div class="color-label">
                                        <input id="color2" name="color" type="radio">
                                        <label for="color2"><span data-color="#555"></span></label>
                                    </div>
                                    <div class="color-label">
                                        <input id="color3" name="color" type="radio">
                                        <label for="color3"><span data-color="#C19A6B"></span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-quantity-cart">
                            @if ( $product_info->product_quantity >0 )
                            <form action="{{ url('add/to/cart') }}" method="POST">
                                @csrf
                            <div class="product-quantity-cart-wrapper d-flex">
                                
                                    <div class="product-quantity d-inline-flex">
                                        <button type="button" class="sub"><i class="ion-ios-arrow-down"></i></button>
                                        <input type="hidden" name="product_id" value="{{ $product_info->id }}">
                                        <input name="cart_amount" type="text" value="1" />
                                        <button type="button" class="add"><i class="ion-ios-arrow-up"></i></button>
                                    </div>
                                    <div class="product-cart">
                                        <button type="submit" class="btn btn-primary btn-hover-dark">Add to Cart</button>
                                    </div>
                                
                            </div>
                        </form>
                            @else
                            <div class="alert alert-danger">Out Of Stock</div>
                            @endif
                            
                        </div>
                        <nav class=" mt-5" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <strong>Categories: &nbsp; &nbsp;</strong>
                              <li class="breadcrumb-item "><a class=" text-danger" href="#">{{ $category->category_name }}</a></li>
                              <li class="breadcrumb-item " aria-current="page"><a class=" text-danger" href="">{{ $subcategory->subcategory_name }}</a></li>
                            </ol>
                          </nav>
                        <div class="product-additional-info">
                            <p class="panel-product-actions"><a href="shop-single.html#" class="action-btn wishlist"><i class="ion-android-favorite-outline"></i> Add to wishlist </a></p>
                            <p class="panel-product-actions"><button class="action-btn wishlist"><i class="ion-ios-shuffle-strong"></i> Add to compare</button></p>
                        </div>
                        <div class="product-sharing">
                            <span class="label">Share</span>
                            <ul class="social-sharing">
                                <li><a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u={{url()->full()}}"><i class="ion-social-facebook"></i></a></li>
                                <li><a target="_blank" href="http://www.twitter.com/sharer/sharer.php?u={{url()->full()}}"><i class="ion-social-twitter"></i></a></li>
                                <li><a target="_blank" href="http://www.linkedin.com/sharer/sharer.php?u={{url()->full()}}"><i class="ion-social-linkedin"></i></a></li>
                                

                            </ul>
                        </div>
                        <div class="product-reassurance">
                            <ul>
                                <li>
                                    <div class="reassurance-item">
                                        <img src="{{ asset('amino_assets') }}/images/icon/icon1.png" alt="">
                                        <p> Security policy (edit with Customer reassurance module)</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="reassurance-item">
                                        <img src="{{ asset('amino_assets') }}/images/icon/icon2.png" alt="">
                                        <p>Delivery policy (edit with Customer reassurance module)</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="reassurance-item">
                                        <img src="{{ asset('amino_assets') }}/images/icon/icon3.png" alt="">
                                        <p>Return policy (edit with Customer reassurance module)</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Shop Single Content End -->
                </div>
            </div>

            <div class="shop-tabs">
                <!-- Shop Single Tabs Menu Start -->
                <ul class="nav justify-content-center">
                    <li><a class="active" data-bs-toggle="tab" href="shop-single.html#tab1">Description</a></li>
                    <li><a data-bs-toggle="tab" href="shop-single.html#tab2">Product Details</a></li>
                    <li><a data-bs-toggle="tab" href="shop-single.html#tab3">Reviews</a></li>
                </ul>
                <!-- Shop Single Tabs Menu End -->

                <!-- Shop Single Tab Content Start -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab1">
                        <!-- product Description Start  -->
                        <div class="product-description">
                            <ul>
                                <li>Calvin Klein® Jeans hoodie with reflective logo detailing at the sleeves.</li>
                                <li>Sweatshirt crafted in a soft-knit fabric for superior comfort.</li>
                                <li>Drawstring hood.</li>
                                <li>Long sleeves.</li>
                                <li>Full-zip front.</li>
                                <li>Side pockets.</li>
                                <li>Ribbed finishes at the cuffs and hem.</li>
                                <li>Straight hemline.</li>
                                <li>72% cotton, 28% polyester.</li>
                                <li>Machine wash cold, tumble dry.</li>
                                <li>Imported.</li>
                                <li>Product measurements were taken using size MD. Please note that measurements may vary by size.</li>
                            </ul>
                        </div>
                        <!-- product Description End  -->
                    </div>
                    <div class="tab-pane fade" id="tab2">
                        <!-- product details Start  -->
                        <div class="product-details">
                            <div class="product-manufacturer">
                                <a href="shop-single.html#"><img src="assets/images/manufacturer.jpg" alt=""></a>
                            </div>
                            <div class="product-reference">
                                <p>Reference <span>demo_3</span></p>
                            </div>
                            <div class="product-stock">
                                <p>In stock <span>1200 Items</span></p>
                            </div>
                            <div class="product-features">
                                <p class="date">Data sheet</p>
                                <dl class="data-sheet">
                                    <dt class="name">Compositions</dt>
                                    <dd class="value">Elastane</dd>
                                    <dt class="name">Paper Type</dt>
                                    <dd class="value">Plain</dd>
                                    <dt class="name">Color</dt>
                                    <dd class="value">White</dd>
                                    <dt class="name">Size</dt>
                                    <dd class="value">M</dd>
                                    <dt class="name">Frame Size</dt>
                                    <dd class="value">60x90cm</dd>
                                </dl>
                            </div>
                        </div>
                        <!-- product details End -->
                    </div>
                    <div class="tab-pane fade" id="tab3">
                        <!-- product reviews Start  -->
                        <div class="product-reviews mt-n6">
                            <div class="reviews-comment">
                                <!-- Single Comment Start  -->
                                <div class="single-comment">
                                    <div class="comment-author">
                                        <img src="assets/images/author/author-1.png" alt="">
                                    </div>
                                    <div class="comment-content">
                                        <div class="author-name-rating">
                                            <h6 class="name">Rosie Silva</h6>
                                            <div class="review-star">
                                                <div class="star" style="width: 80%;"></div>
                                            </div>
                                        </div>
                                        <span class="date">11/20/2021</span>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse deleniti itaque velit explicabo at eum incidunt vel reprehenderit maxime eos facere ut pariatur voluptas aut, porro quia molestias sequi cupiditate!</p>
                                    </div>
                                </div>
                                <!-- Single Comment Start  -->
                                <!-- Single Comment Start  -->
                                <div class="single-comment">
                                    <div class="comment-author">
                                        <img src="assets/images/author/author-2.png" alt="">
                                    </div>
                                    <div class="comment-content">
                                        <div class="author-name-rating">
                                            <h6 class="name">Rosie Silva</h6>
                                            <div class="review-star">
                                                <div class="star" style="width: 80%;"></div>
                                            </div>
                                        </div>
                                        <span class="date">11/20/2021</span>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse deleniti itaque velit explicabo at eum incidunt vel reprehenderit maxime eos facere ut pariatur voluptas aut, porro quia molestias sequi cupiditate!</p>
                                    </div>
                                </div>
                                <!-- Single Comment Start  -->
                                <!-- Single Comment Start  -->
                                <div class="single-comment">
                                    <div class="comment-author">
                                        <img src="assets/images/author/author-3.png" alt="">
                                    </div>
                                    <div class="comment-content">
                                        <div class="author-name-rating">
                                            <h6 class="name">Rosie Silva</h6>
                                            <div class="review-star">
                                                <div class="star" style="width: 80%;"></div>
                                            </div>
                                        </div>
                                        <span class="date">11/20/2021</span>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse deleniti itaque velit explicabo at eum incidunt vel reprehenderit maxime eos facere ut pariatur voluptas aut, porro quia molestias sequi cupiditate!</p>
                                    </div>
                                </div>
                                <!-- Single Comment Start  -->
                            </div>
                            <div class="review-form">
                                <h2 class="form-title">Add a review </h2>

                                <form action="shop-single.html#">
                                    <div class="review-rating">
                                        <h5 class="title">Review:</h5>

                                        <ul id='stars'>
                                            <li class='star' title='Poor' data-value='1'>
                                                <i class='icon-star'></i>
                                            </li>
                                            <li class='star' title='Fair' data-value='2'>
                                                <i class='icon-star'></i>
                                            </li>
                                            <li class='star' title='Good' data-value='3'>
                                                <i class='icon-star'></i>
                                            </li>
                                            <li class='star' title='Excellent' data-value='4'>
                                                <i class='icon-star'></i>
                                            </li>
                                            <li class='star' title='WOW!!!' data-value='5'>
                                                <i class='icon-star'></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="single-form">
                                                <input type="text" class="form-control" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form">
                                                <input type="email" class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="single-form">
                                                <textarea class="form-control" placeholder="Comment"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="review-btn mt-6">
                                                <button class="btn btn-primary btn-hover-dark">Post Comment</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="reviewCheck">
                                        <label class="form-check-label" for="reviewCheck">NOTIFY ME OF NEW POSTS BY EMAIL.</label>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- product reviews End -->
                    </div>
                </div>
                <!-- Shop Single Tab Content End -->
            </div>
        </div>
    </div>
    <!--Shop Single End-->
        </div>
    </div>
    <!--Shop Single End-->

    <!--New Arrivals Start-->
    <div class="section section-padding-02 mt-n2">
        <div class="container">
            <!-- Section Title Start -->
            <div class="section-title text-center">
                <span class="sub-title">12 related products in the same category: </span>
                <h2 class="title">Related Products</h2>
            </div>
            <!-- Section Title End -->
            <div class="product-3-active">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @forelse ($related_products as $related_product)
                        <div class="swiper-slide">
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <div class="product-image">
                                    <a class="product-thumbnail" href="{{ url('product/details') }}/{{ $related_product->id }}">
                                        <img src="{{ asset('uploads/product_photo') }}/{{ $related_product->product_photo }}" alt="product">
                                        <img class="image-hover" src="{{ asset('uploads/product_photo') }}/{{ $related_product->product_photo }}" alt="product">
                                    </a>
                                    <div class="product-action">
                                        <a href="shop-single.html#" class="action"><i class="lar la-heart"></i></a>
                                        <a href="shop-single.html#" class="action"><i class="las la-sync"></i></a>
                                        <a href="shop-single.html#" class="action" data-bs-toggle="modal" data-bs-target="#quick-view"><i class="las la-search"></i></a>
                                        <a href="shop-single.html#" class="action"><i class="ion-bag"></i></a>
                                    </div>
                                    <div class="product-flag">
                                        <span class="discount">-25%</span>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4 class="product-title"><a href="{{ url('product/details') }}/{{ $related_product->id }}">{{ $related_product->product_name }}</a></h4>
                                    <div class="manufacturer"><a href="{{ url('product/details') }}/{{ $related_product->id }}">{{App\Models\Category::find($related_product->category_id)->category_name}}</a></div>
                                    <div class="product-price">
                                        <span class="regular-price">$23.90</span>
                                        <span class="sele-price">${{ $related_product->product_price }}</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Product End -->
                        </div>
                        @empty
                        <div class="col-lg-12">
                            <div class="alert alert-warning">
                                No Related Products Found
                            </div>
                        </div>
                        @endforelse
                       
                    </div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-button-next"><i class="ion-ios-arrow-right"></i></div>
                <div class="swiper-button-prev"><i class="ion-ios-arrow-left"></i></div>
            </div>
        </div>
    </div>
    <!--New Arrivals End-->
@endsection