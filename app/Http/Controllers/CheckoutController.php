<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\City;
use App\Models\Country;
use App\Models\Order;
use App\Models\Order_billing_detail;
use App\Models\Order_detail;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Cookie;

class CheckoutController extends Controller
{
    
    public function index(){
        $countries = Country::select('id','name')->get();
        // $cities = City::all();
        return view('checkout',compact('countries'));
    }

    public function getCityList(Request $request){
        // echo " My name is Mehedi";
        $cities = City::where('country_id', $request->country_id)->get();
        $str_to_send = "<option value=''>Select a City</option>";
        foreach($cities as $city){
            $str_to_send .= "<option value='".$city->id."'>".$city->name."</option>";
        }
        echo $str_to_send;
    }

    public function checkoutpost(Request $request){
        if($request->payment_status ==1 || $request->payment_status ==2 ){

            $order_id = Order::insertGetId([
                'subtotal' => session('cart_form_subtotal'),
                'discount' => session('cart_form_discount'),
                'total' => session('cart_form_subtotal')-session('cart_form_discount'),
                'payment_status' => $request->payment_status,
                'created_at'    =>Carbon::now()
            ]);
            Order_billing_detail::insert([
                'order_id'  =>$order_id,
                'name'  =>$request->name,
                'email_address'  =>$request->email_address,
                'phone_number'  =>$request->phone_number,
                'country_id'  =>$request->country_id,
                'city_id'  =>$request->city_id,
                'address'  =>$request->address,
                'house_flat'  =>$request->house_flat,
                'postcode'  =>$request->postcode,
                'note'  =>$request->note,
            ]);
            $cart_items=  Cart::where('generated_cart_id',Cookie::get('generated_cart_id'))->get();
            foreach($cart_items as $cart_item){
          
                Order_detail::insert([
                    'order_id'  =>$order_id,
                    'product_name'  =>Product::find($cart_item->product_id)->product_name,
                    'product_price'  =>Product::find($cart_item->product_id)->product_price,
                    'product_quantity' =>$cart_item->cart_amount,
                    'created_at'    =>Carbon::now()
                ]);
            }
            if($request->payment_status ==1){
                $cart_items=  Cart::where('generated_cart_id',Cookie::get('generated_cart_id'))->delete();
                return redirect('cart');
            }else{
                Cart::where('generated_cart_id',Cookie::get('generated_cart_id'))->delete();
                return redirect('online/payment');
            }
            
        }else{
            echo " This payment type not available";
        }
    }
}
