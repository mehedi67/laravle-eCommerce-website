<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index(){
        return view('coupon.index',[
            'coupons' => Coupon::all()
        ]);
    }
    public function insert(Request $request){
        $request->validate([
            'coupon_name' => 'unique:coupons,coupon_name',
            'coupon_discount_amount' => 'integer|max:99|min:1',
        ]);
        // print_r($request->all());
        Coupon::insert($request->except('_token') + [
            'created_at' => Carbon::now()
        ]);
        return back()->with('status','Coupon Created Successfully!');

    }
}
