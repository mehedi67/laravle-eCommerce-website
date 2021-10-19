@extends('layouts.amino')
@section('content')
    <!--Page Banner Start-->
    <div class="section page-banner-wrapper bg-cover" style="background-image: url({{ asset('amino_assets') }}/images/page-banner.jpg);">
        <div class="container">
            <div class="page-banner">
                <ul class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Shop</li>
                </ul>
            </div>
        </div>
    </div>
    <!--Page Banner Start-->

    <!--Shop Start-->
    <div class="section section-padding-02 mt-n8">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <!-- Shop Top Bar Start -->
                    <div class="shop-top-bar mt-6">
                        <ul class="nav">
                            <li><a class="active" data-bs-toggle="tab" href="shop-grid-left-sidebar.html#grid"><i class="fas fa-th"></i></a></li>
                            <li><a data-bs-toggle="tab" href="shop-grid-left-sidebar.html#list"><i class="far fa-list-ul"></i></a></li>
                        </ul>

                        <div class="top-bar-select">
                            <span>Sort by:</span>
                            <select class="custom-select">
                                <option value="0">Relevance</option>
                                <option value="1">Best sellers</option>
                                <option value="2">Name, A to Z</option>
                                <option value="3">Name, Z to A</option>
                                <option value="4">Price, low to high</option>
                                <option value="5">Price, high to low</option>
                            </select>
                        </div>
                    </div>
                    <!-- Shop Top Bar End -->

                    <!-- Tab Content Start -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="grid">
                            <div class="row">
                                @foreach ($all_products as $product)
                                    
                                
                                <div class="col-xl-3 col-lg-4 col-sm-6">
                                    <!-- Single Product Start -->
                                    @include('part/product_list',['product'=>$product])
                                    <!-- Single Product End -->
                                </div>
                                @endforeach
                            </div>
                        </div>



                        <div class="tab-pane fade" id="list">
                            <!-- Single Product Start -->
                            @foreach ($all_products as $product)
                                
                           
                            <div class="single-product product-list">
                                <div class="product-image">
                                    <a class="product-thumbnail" href="{{ url('product/details') }}/{{ $product->id }}">
                                        <img src="{{ asset('uploads/product_photo') }}/{{ $product->product_photo }}" alt="product">
                                        <img class="image-hover" src="{{ asset('uploads/product_photo') }}/{{ $product->product_photo }}" alt="product">
                                    </a>
                                    <div class="product-action">
                                        <a href="shop-grid-left-sidebar.html#" class="action"><i class="lar la-heart"></i></a>
                                        <a href="shop-grid-left-sidebar.html#" class="action"><i class="las la-sync"></i></a>
                                        <a href="shop-grid-left-sidebar.html#" class="action" data-bs-toggle="modal" data-bs-target="#quick-view"><i class="las la-search"></i></a>
                                    </div>
                                    <div class="product-flag">
                                        <span class="new">New</span>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h4 class="product-title"><a href="{{ url('product/details') }}/{{ $product->id }}">{{ $product->product_name }}</a></h4>
                                    <div class="manufacturer"><a href="shop-grid-left-sidebar.html#">{{ App\Models\Category::find($product->category_id)->category_name }}</a></div>
                                    <div class="product-price">
                                        <span class="sele-price">{{ $product->product_price }}</span>
                                    </div>
                                    <div class="product-desc">
                                        <ul>
                                            <li>{{ $product->product_description }}</li>
                                        </ul>
                                    </div>
                                    <div class="availability">
                                        <p>Availability: <span>{{ $product->product_quantity }} In Stock</span></p>
                                    </div>
                                    <div class="cart-btn">
                                        <a href="shop-grid-left-sidebar.html#" class="btn btn-primary btn-hover-dark">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- Single Product End -->

                        </div>
                    </div>
                    <!-- Tab Content End -->

                    <!-- Page pagination Start -->
                    <div class="page-pagination">
                        <ul class="pagination justify-content-center">
                            <li class="page-item"><a class="page-link" href="shop-grid-left-sidebar.html#"><i class="las la-angle-left"></i></a></li>
                            <li class="page-item"><a class="page-link" href="shop-grid-left-sidebar.html#">1</a></li>
                            <li class="page-item"><a class="page-link active" href="shop-grid-left-sidebar.html#">2</a></li>
                            <li class="page-item"><a class="page-link" href="shop-grid-left-sidebar.html#">3</a></li>
                            <li class="page-item"><a class="page-link" href="shop-grid-left-sidebar.html#"><i class="las la-angle-right"></i></a></li>
                        </ul>
                    </div>
                    <!-- Page pagination End -->
                </div>
                <div class="col-lg-3">
                    <!-- Sidebar Start -->
                    <div class="sidebar">
                        <!-- Sidebar Widget Start -->
                        <div class="sidebar-widget">
                            <h3 class="widget-title">Filter By</h3>

                            <!-- Widget Item Start -->
                            {{-- <div class="widget-item">
                                <h5 class="title">Color</h5>

                                <ul class="color-list">
                                    <li>
                                        <div class="widget-checkbox checkbox-color">
                                            <input id="color1" type="checkbox">
                                            <label for="color1"><span data-color="#AAB2BD"></span> Grey (1)</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="widget-checkbox checkbox-color">
                                            <input id="color2" type="checkbox">
                                            <label for="color2"><span data-color="#fff"></span> White (4)</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="widget-checkbox checkbox-color">
                                            <input id="color3" type="checkbox">
                                            <label for="color3"><span data-color="#555"></span> Black (4)</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="widget-checkbox checkbox-color">
                                            <input id="color4" type="checkbox">
                                            <label for="color4"><span data-color="#C19A6B"></span> Camel (1)</label>
                                        </div>
                                    </li>
                                </ul>
                            </div> --}}
                            <!-- Widget Item End -->

                            <!-- Widget Item Start -->
                            <div class="widget-item">
                                <h5 class="title">Categories</h5>

                                <ul class="color-compositions">
                                    @foreach ($categories as $category)
                                    <li>
                                        <div class="widget-checkbox">
                                            <input id="compositions_{{ $category->id }}" type="checkbox">
                                            <label for="compositions_{{ $category->id }}"><span></span> {{ $category->category_name }} </label>
                                        </div>
                                    </li>
                                    @endforeach
                                   
                                    
                                </ul>
                            </div>
                            <!-- Widget Item End -->

                            <!-- Widget Item Start -->
                            <div class="widget-item">
                                <h5 class="title">Availability</h5>

                                <ul class="color-compositions">
                                    <li>
                                        <div class="widget-checkbox">
                                            <input id="availability1" type="checkbox">
                                            <label for="availability1"><span></span> In stock (13)</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="widget-checkbox">
                                            <input id="availability2" type="checkbox">
                                            <label for="availability2"><span></span> Not available (1)</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- Widget Item End -->

                            <!-- Widget Item Start -->
                            <div class="widget-item">
                                <h5 class="title">Price</h5>

                                <div class="widget-price">
                                    <input type="text" disabled id="amount">
                                    <div id="slider-range"></div>
                                </div>
                            </div>
                            <!-- Widget Item End -->


                        </div>
                        <!-- Sidebar Widget End -->

                        <!-- Sidebar Widget Start -->
                        <div class="sidebar-widget">
                            <h3 class="widget-title">tags</h3>

                            <!-- Widget Tags Start -->
                            <div class="widget-tags">
                                <a href="shop-grid-left-sidebar.html#">Run</a>
                                <a href="shop-grid-left-sidebar.html#">Sport Shoes</a>
                                <a href="shop-grid-left-sidebar.html#">Frozen</a>
                                <a href="shop-grid-left-sidebar.html#">Nike</a>
                                <a href="shop-grid-left-sidebar.html#">Organics</a>
                                <a href="shop-grid-left-sidebar.html#">Snacks</a>
                                <a href="shop-grid-left-sidebar.html#">Shoes</a>
                            </div>
                            <!-- Widget Tags End -->
                        </div>
                        <!-- Sidebar Widget End -->

                        <!-- Sidebar banner Start -->
                        <div class="sidebar-banner">
                            <!-- Single banner Start -->
                            <div class="single-banner">
                                <a href="shop-grid-left-sidebar.html#">
                                    <img src="{{ asset('amino_assets') }}/images/banner-04.jpg" alt="Banner">
                                </a>
                            </div>
                            <!-- Single banner End -->
                        </div>
                        <!-- Sidebar banner End -->
                    </div>
                    <!-- Sidebar End -->
                </div>
            </div>
        </div>
    </div>
    <!--Shop End-->
    <!--Back To Start-->
    <a href="shop-grid-left-sidebar.html#" class="back-to-top">
        <i class="las la-arrow-up"></i>
    </a>
    <!--Back To End-->

</div>


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
                                            <img src="{{ asset('amino_assets') }}')/images/shop-single/shop-single-05.jpg" }}" alt="Product Image">
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
                                            <img src="{{ asset('amino_assets') }}/')images/shop-single/shop-single-05.jpg" }}" alt="Product Thumbnail">
                                            
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
                                <li><a href="shop-grid-left-sidebar.html#"><i class="fal fa-comment-dots"></i> Read reviews <span>(3)</span></a></li>
                                <li><a href="shop-grid-left-sidebar.html#"><i class="fal fa-edit"></i> Write a review</a></li>
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
                                <p class="panel-product-actions"><a href="shop-grid-left-sidebar.html#" class="action-btn wishlist"><i class="ion-android-favorite-outline"></i> Add to wishlist </a></p>
                                <p class="panel-product-actions"><button class="action-btn wishlist"><i class="ion-ios-shuffle-strong"></i> Add to compare</button></p>
                            </div>
                            <div class="product-sharing">
                                <span class="label">Share</span>
                                <ul class="social-sharing">
                                    <li><a href="shop-grid-left-sidebar.html#"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="shop-grid-left-sidebar.html#"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="shop-grid-left-sidebar.html#"><i class="ion-social-pinterest"></i></a></li>
                                    <li><a href="shop-grid-left-sidebar.html#"><i class="ion-social-linkedin"></i></a></li>
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