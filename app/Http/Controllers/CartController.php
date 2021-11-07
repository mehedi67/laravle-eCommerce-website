<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Cookie;
use Illuminate\Support\Str;

class CartController extends Controller
{
  

    public function cart($coupon_name =''){

        if($coupon_name ==''){
            $discount = 0;
        }else{
            if(Coupon::where('coupon_name',$coupon_name)->exists()){
             
                if(Carbon::now()->format('Y-m-d') > Coupon::where('coupon_name',$coupon_name)->first()->coupon_validity_till){
                    echo " date shes";
                    return back()->with('coupon_error','This coupon date is expired!');
                }else{
                    $discount = Coupon::where('coupon_name',$coupon_name)->first()->coupon_discount_amount;
                   
                }
            }else{
                return back()->with('coupon_error','There is no coupon that you enter');
            }
            // $discount = 100;
        }

        // die();

            $cart_item=  Cart::where('generated_cart_id',Cookie::get('generated_cart_id'))->get();
            // if ($cart_item->count() < 1) {
            //     return redirect()->back()->with('status','Your cart is empty. please add some product in your cart.');
            // }
                    return view('cart',[
                        'discount' =>$discount,
                        'cart_items' =>$cart_item
                    ]);
    }

    public function addtocart(Request $request){
        if(Cookie::get('generated_cart_id')){
            $randomly_generated_cart_id = Cookie::get('generated_cart_id');
        }else{
            $randomly_generated_cart_id = Str::random(5).time();
            Cookie::queue(Cookie::make('generated_cart_id', $randomly_generated_cart_id, 7200)); //five days
        }
        if(Cart::where('generated_cart_id', $randomly_generated_cart_id)->where('product_id',$request->product_id)->exists()){

            Cart::where('generated_cart_id', $randomly_generated_cart_id)->where('product_id',$request->product_id)->increment('cart_amount',$request->cart_amount);
        }else{
            Cart::insert([
                'generated_cart_id' =>$randomly_generated_cart_id,
                'product_id' => $request->product_id,
                'cart_amount' => $request->cart_amount,
                'created_at' => Carbon::now()
    
            ]);
        }
        return back()->with('cart-success','Your product added to cart successfully');
        

    }

    public function cartdelete($cart_id){
        // echo $cart_id;
        Cart::find($cart_id)->delete();
        return back();
    }

    public function updatecart(Request $request){
        // print_r($request->all());
        foreach ($request->cart_amount as $cart_id => $cart_amount) {
            
            Cart::find($cart_id)->update([
                'cart_amount' => $cart_amount
            ]);
        }
        return back();
    }



}
