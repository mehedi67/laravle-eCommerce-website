@extends('layouts.amino')
@section('content')
@auth
@if (Auth::user()->role ==1)
<!-- Checkout Section Start -->
<div class="section section-padding-02 mt-n6">
    <div class="container">
        <form action="{{ url('checkout/post') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-7">
                    <!-- Checkout Form Start -->
                    <div class="checkout-form">
                        <div class="checkout-title">
                            <h4 class="title">Billing details</h4>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="single-form">
                                    <label class="form-label">Name  *</label>
                                    <input name="name" type="text" class="form-control" value="{{ Auth::user()->name }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="single-form">
                                    <label class="form-label">Email address *</label>
                                    <input name="email_address" type="text" class="form-control" value="{{ Auth::user()->email }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="single-form">
                                    <label class="form-label">Phone *</label>
                                    <input name="phone_number" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="single-select2">
                                    <label class="form-label">Country *</label>

                                    <div class="form-select2">
                                        <select name="country_id" class="select2" id="country_select">
                                            <option value="0">Select a country</option>
                                            <@foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="single-select2">
                                    <label class="form-label">City *</label>

                                    <div class="form-select2">
                                        <select name="city_id" class="select2" id="select_city"> 

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="single-form">
                                    <label class="form-label">Street address *</label>
                                    <input name="address" type="text" class="form-control" placeholder="House number and street name">
                                
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="single-form">
                                    <label class="form-label">House/ Flat</label>
                                    <input name="house_flat" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="single-form">
                                    <label class="form-label">Postcode / ZIP</label>
                                    <input name="postcode" type="text" class="form-control">
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="single-form checkout-note">
                            <label class="form-label">Order notes</label>
                            <textarea name="note" class="form-control" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                        </div>
                    </div>
                    <!-- Checkout Form End -->
                </div>
                <div class="col-lg-5">
                    <div class="checkout-order">
                        <div class="checkout-title">
                            <h4 class="title">Your Order</h4>
                        </div>

                        <div class="checkout-order-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="Product-name">Product</th>
                                        <th class="Product-price">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (App\Models\Cart::where('generated_cart_id',Cookie::get('generated_cart_id') )->get() as $cartitem)
                                    <tr>
                                        <td class="Product-name">
                                            <p>{{ App\Models\Product::find($cartitem->product_id)->product_name }} × {{ $cartitem->cart_amount }}</p>
                                        </td>
                                        <td class="Product-price">
                                            <p>{{ App\Models\Product::find($cartitem->product_id)->product_price * $cartitem->cart_amount }}</p>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="Product-name">
                                            <p>Subtotal</p>
                                        </td>
                                        <td class="Product-price">
                                            <p>{{ session('cart_form_subtotal') }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="Product-name">
                                            <p>Discount</p>
                                        </td>
                                        <td class="Product-price">
                                            <ul class="shipping-list">
                                                <li >
                                                    <p>{{ session('cart_form_discount') }}</p>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="Product-name">
                                            <p>Total</p>
                                        </td>
                                        <td class="total-price">
                                            <p>{{ session('cart_form_subtotal')-session('cart_form_discount') }}</p>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="checkout-payment">
                            <ul>
                                <li>
                                    <div class="single-payment">
                                        <div class="payment-radio radio">
                                            <input type="radio" name="payment_status" id="cash" checked="checked" value="1">
                                            <label for="cash"><span></span> Cash on Delivery</label>

                                            <div class="payment-details">
                                                <p>Pay with cash upon delivery.</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="single-payment">
                                        <div class="payment-radio radio">
                                            <input type="radio" name="payment_status" id="online"  value="2">
                                            <label for="online"><span></span> Online Transtion</label>

                                        </div>
                                    </div>
                                </li>
                                
                            </ul>

                            <div class="checkout-btn">
                                <button class="btn btn-primary btn-hover-dark d-block" type="submit">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
@else
        <div class=" mt-30">
            <p class="info-header"> <i class="fa fa-exclamation-circle"></i> You are not customer <a  href="{{ route('login') }}">Go Login</a></p>
        </div>
@endif
@else
        <div class="checkout-info mt-30">
            <p class="info-header"> <i class="fa fa-exclamation-circle"></i> Returning customer? <a  href="{{ route('login') }}">Click here to login</a></p>
        </div>
    </div>
</div>
@endauth

<!-- Checkout Section End -->
@endsection
@section('footer_script')
    
<script>
    $(document).ready(function() {
    $('#country_select').select2();
    $('#country_select').change(function(){
        var country_id = $('#country_select').val();

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            $.ajax({
                type  : 'POST',
                url   : '/getCityList',
                data  :{country_id: country_id},
                success : function(data){
                    // alert(data);
                    $('#select_city').html(data);
                }
            });

        });
    
    });
</script>

@endsection