<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Cookie;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function cart(){
         
        return view('cart',[
            'cart_items' => Cart::where('generated_cart_id',Cookie::get('generated_cart_id'))->get()
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
