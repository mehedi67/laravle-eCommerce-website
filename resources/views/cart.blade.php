@extends('layouts.amino')
@section('content')
<!--Page Banner Start-->
<div class="section page-banner-wrapper bg-cover" style="background-image: url({{ asset('amino_assets') }}/images/page-banner.jpg);">
    <div class="container">
        <div class="page-banner">
            <ul class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Shopping Cart</li>
            </ul>
        </div>
    </div>
</div>
<!--Page Banner Start-->

<!-- Shopping Cart Section Start -->
<div class="section section-padding-02">
    <div class="container">
        <div class="cart-wrapper">
            @if (session('coupon_error'))
            <div class="alert alert-danger">{{ session('coupon_error') }}</div>
            @endif
            
            <!-- Cart Wrapper Start -->
            <div class="cart-table table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="Product-thumb">Image</th>
                            <th class="Product-info">Product Information</th>
                            <th class="Product-quantity">Price</th>
                            <th class="Product-quantity">Quantity</th>
                            <th class="Product-total-price">Total Price</th>
                            <th class="Product-action">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="{{ url('update/cart') }}" method="POST">
                            @csrf
                        @php
                            $sub_total = 0;
                            $checkout_btn_status = true;
                        @endphp
                        @forelse ($cart_items as $cart_item)
                        <tr>
                            <td class="Product-thumb">
                                <img src="{{ asset('uploads/product_photo') }}/{{ App\Models\Product::find($cart_item->product_id)->product_photo }}" alt="">
                            </td>
                            <td class="Product-info">
                                <h6 class="name"><a target="_blank" href="{{ url('product/details') }}/{{ $cart_item->product_id }}">
                                    {{ App\Models\Product::find($cart_item->product_id)->product_name }}
                                    @if ($cart_item->cart_amount > App\Models\Product::find($cart_item->product_id)->product_quantity)
                                    <span class="badge bg-danger">Stock Out</span>  
                                    <span class="badge bg-success">Available: {{ App\Models\Product::find($cart_item->product_id)->product_quantity }}</span> 
                                    {{ $checkout_btn_status = false; }} 
                                    @endif
                                    
                                </a></h6>
                                
                            </td>
                            <td class="Product-price">
                                <span class="price">${{ App\Models\Product::find($cart_item->product_id)->product_price  }}</span>
                            </td>
                            <td class="quantity">
                                <div class="product-quantity d-inline-flex">
                                    <button type="button" class="sub"><i class="ion-ios-arrow-down"></i></button>
                                    <input name="cart_amount[{{ $cart_item->id }}]" type="text" value="{{ $cart_item->cart_amount }}" />
                                    <button type="button" class="add"><i class="ion-ios-arrow-up"></i></button>
                                </div>
                            </td>
                            <td class="Product-total-price">
                                <span class="price">${{ App\Models\Product::find($cart_item->product_id)->product_price * $cart_item->cart_amount }}</span>
                            </td>
                            <td class="Product-action">
                                <a href="{{ url('cart/delete') }}/{{ $cart_item->id }}"><button class="remove"><i class="lar la-trash-alt"></i></button></a>
                            </td>
                        </tr>
                         @php
                             $sub_total += (App\Models\Product::find($cart_item->product_id)->product_price * $cart_item->cart_amount)
                         @endphp 
                         @empty
                         <tr class="text-danger text-center">
                            <td colspan="6">No Product Found</td>
                         </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Cart Wrapper End -->
            <!-- Cart btn Start -->
            <div class="cart-btn d-flex flex-wrap justify-content-between">
                <div class="left-btn">
                    <a href="{{ url('shop') }}" class="btn btn-dark btn-hover-primary">Continue Shopping</a>
                </div>
                <div class="right-btn">
                    
                    <button type="submit" class="btn btn-outline-dark">Update Cart</button>
                </form>
                </div>
            </div>
            <!-- Cart btn Start -->
        </div>
        <div class="row">
            <div class="col-lg-4">
                <!-- Cart Shipping Start -->
                <div class="cart-shipping">
                    <div class="cart-title">
                        <h4 class="title">Coupon Code</h4>
                        <p>Enter your coupon code if you have one.</p>
                    </div>
                    <div class="cart-form">
                        {{-- <form action="cart.html#"> --}}
                            <div class="single-form">
                                <input id="coupon_text" class="form-control" type="text" placeholder="Enter your coupon code..">
                            </div>
                            <div class="single-form">
                                <button id="coupon_btn" class="btn btn-dark btn-hover-primary">Apply Coupon</button>
                            </div>
                        {{-- </form> --}}
                    </div>
                </div>
                <!-- Cart Shipping End -->
            </div>
            <div class="col-lg-4">
                <!-- Cart Totals Start -->
                <div class="cart-totals">
                    <div class="cart-title">
                        <h4 class="title">Cart totals</h4>
                    </div>
                    <div class="cart-total-table">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <p class="value">Subtotal</p>
                                    </td>
                                    <td> <p class="price">{{ $sub_total }}</p></td>
                                </tr>
                                <tr>
                                    <td><p class="value">Discount({{$discount }}%)</p></td>
                                    <td> <p class="price">-{{ $discount /100 * $sub_total }}</p> </td>
                                </tr>
                                <tr>
                                    <td> <p class="value">Total</p> </td>
                                    <td>
                                        <p class="price">{{ $sub_total - $discount /100 * $sub_total }}</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @php
                            session([
                                'cart_form_subtotal' => $sub_total,
                                'cart_form_discount' => $discount /100 * $sub_total,
                            ]);
                        @endphp
                    </div>
                    <div class="cart-total-btn mt-20">
                        @if ( $checkout_btn_status)
                        <a href="{{ url('checkout') }}" class="btn btn-dark btn-hover-primary btn-block">Proceed To Checkout</a>
                        @else
                        <a href="{{ url('shop') }}" class="btn btn-danger btn-hover-danger btn-block">Check Stockout Products</a>
                        @endif
                        
                    </div>
                </div>
                <!-- Cart Totals End -->
            </div>
        </div>
    </div>
</div>
<!-- Shopping Cart Section End -->
@endsection
@section('footer_script')
    <script>
        $(document).ready(function(){
        $('#coupon_btn').click(function(){
            var current_link = '{{ url('cart') }}';
            var link_go_to = current_link + '/'+ $('#coupon_text').val();
            window.location.href = link_go_to;
        })
    })
    </script>
@endsection