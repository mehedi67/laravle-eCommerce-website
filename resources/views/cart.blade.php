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
                        @foreach ($cart_items as $cart_item)
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
                        @endforeach
                        

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
                    <a href="cart.html#" class="btn btn-outline-dark">Clear Cart</a>
                    <button type="submit" class="btn btn-outline-dark">Update Cart</button>
                </form>
                </div>
            </div>
            <!-- Cart btn Start -->
        </div>
        <div class="row">
            {{-- <div class="col-lg-4">
                <!-- Cart Shipping Start -->
                <div class="cart-shipping">
                    <div class="cart-title">
                        <h4 class="title">Calculate Shipping</h4>
                        <p>Estimate your shipping fee *</p>
                    </div>
                    <div class="cart-form">
                        <p>Calculate shipping</p>
                        <form action="cart.html#">
                            <div class="single-select2">
                                <div class="form-select2">
                                    <select class="select2">
                                        <option value="0">Select a country…</option>
                                        <option value="1">Bangladesh</option>
                                        <option value="2">Canada</option>
                                        <option value="3">Colombia</option>
                                        <option value="4">Indonesia</option>
                                        <option value="5">Italy</option>
                                        <option value="6">Pakistan</option>
                                        <option value="7">Turkey</option>
                                    </select>
                                </div>
                            </div>
                            <div class="single-select2">
                                <div class="form-select2">
                                    <select class="select2">
                                        <option value="">Select an option…</option>
                                        <option value="BAG">Bagerhat</option>
                                        <option value="BAN">Bandarban</option>
                                        <option value="BAR">Barguna</option>
                                        <option value="BARI">Barisal</option>
                                        <option value="BHO">Bhola</option>
                                        <option value="BOG">Bogra</option>
                                        <option value="BRA">Brahmanbaria</option>
                                        <option value="CHA">Chandpur</option>
                                        <option value="CHI">Chittagong</option>
                                        <option value="CHU">Chuadanga</option>
                                        <option value="COM">Comilla</option>
                                        <option value="COX">Cox's Bazar</option>
                                        <option value="DHA">Dhaka</option>
                                        <option value="DIN">Dinajpur</option>
                                        <option value="FAR">Faridpur </option>
                                        <option value="FEN">Feni</option>
                                        <option value="GAI">Gaibandha</option>
                                        <option value="GAZI">Gazipur</option>
                                        <option value="GOP">Gopalganj</option>
                                        <option value="HAB">Habiganj</option>
                                        <option value="JAM">Jamalpur</option>
                                        <option value="JES">Jessore</option>
                                        <option value="JHA">Jhalokati</option>
                                        <option value="JHE">Jhenaidah</option>
                                        <option value="JOY">Joypurhat</option>
                                        <option value="KHA">Khagrachhari</option>
                                        <option value="KHU">Khulna</option>
                                        <option value="KIS">Kishoreganj</option>
                                        <option value="KUR">Kurigram</option>
                                        <option value="KUS">Kushtia</option>
                                        <option value="LAK">Lakshmipur</option>
                                        <option value="LAL">Lalmonirhat</option>
                                        <option value="MAD">Madaripur</option>
                                        <option value="MAG">Magura</option>
                                        <option value="MAN">Manikganj </option>
                                        <option value="MEH">Meherpur</option>
                                        <option value="MOU">Moulvibazar</option>
                                        <option value="MUN">Munshiganj</option>
                                        <option value="MYM">Mymensingh</option>
                                        <option value="NAO">Naogaon</option>
                                        <option value="NAR">Narail</option>
                                        <option value="NARG">Narayanganj</option>
                                        <option value="NARD">Narsingdi</option>
                                        <option value="NAT">Natore</option>
                                        <option value="NAW">Nawabganj</option>
                                        <option value="NET">Netrakona</option>
                                        <option value="NIL">Nilphamari</option>
                                        <option value="NOA">Noakhali</option>
                                        <option value="PAB">Pabna</option>
                                        <option value="PAN">Panchagarh</option>
                                        <option value="PAT">Patuakhali</option>
                                        <option value="PIR">Pirojpur</option>
                                        <option value="RAJB">Rajbari</option>
                                        <option value="RAJ">Rajshahi</option>
                                        <option value="RAN">Rangamati</option>
                                        <option value="RANP">Rangpur</option>
                                        <option value="SAT">Satkhira</option>
                                        <option value="SHA">Shariatpur</option>
                                        <option value="SHE">Sherpur</option>
                                        <option value="SIR">Sirajganj</option>
                                        <option value="SUN">Sunamganj</option>
                                        <option value="SYL">Sylhet</option>
                                        <option value="TAN">Tangail</option>
                                        <option value="THA">Thakurgaon</option>
                                    </select>
                                </div>
                            </div>
                            <div class="single-form">
                                <input class="form-control" type="text" placeholder="Postcode/ziip">
                            </div>
                            <div class="single-form">
                                <button class="btn btn-dark btn-hover-primary">Update totals</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Cart Shipping End -->
            </div> --}}
            <div class="col-lg-4">
                <!-- Cart Shipping Start -->
                <div class="cart-shipping">
                    <div class="cart-title">
                        <h4 class="title">Coupon Code</h4>
                        <p>Enter your coupon code if you have one.</p>
                    </div>
                    <div class="cart-form">
                        <form action="cart.html#">
                            <div class="single-form">
                                <input class="form-control" type="text" placeholder="Enter your coupon code..">
                            </div>
                            <div class="single-form">
                                <button class="btn btn-dark btn-hover-primary">Apply Coupon</button>
                            </div>
                        </form>
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
                                    <td>
                                        
                                        <p class="price">{{ $sub_total }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="value">Discount</p>
                                    </td>
                                    <td>
                                        <p class="price">0</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="value">Total</p>
                                    </td>
                                    <td>
                                        <p class="price">590.00</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-total-btn mt-20">
                        @if ( $checkout_btn_status)
                        <a href="cart.html#" class="btn btn-dark btn-hover-primary btn-block">Proceed To Checkout</a>
                        @else
                        <a href="cart.html#" class="btn btn-danger btn-hover-danger btn-block">Check Checkout Products</a>
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