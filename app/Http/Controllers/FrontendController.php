<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Product_thumbnail_photo;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('index',[
            'categories' => Category::all(),
            'products' => Product::latest()->get(),
        ]);
    }
    public function productdetails($product_id){
        $product_info = Product::where('id', $product_id)->first();
        $category = Category::where('id',$product_info->category_id)->first();
        $subcategory = SubCategory::where('category_id',$category->id )->first();
        $related_products = Product::where('category_id',$category->id)->where('id', '!=',$product_id)->get();
        $thumbail = Product_thumbnail_photo::where('product_id', $product_id)->get();
        // dd($thumbail);
        // foreach ($a as $value) {
        //     return $value->Thumbnail->id;
        // }
        // dd($a);

        // echo $product_id;
        // $category_id = Product::find($product_id)->category_id;
        // $related_products=  Product::where('category_id',$category_id)->where('id', '!=',$product_id)->get();

        // $product_info = Product::find($product_id);
        // $products = Product::all();
        return view('product.details',compact('product_info','category','subcategory','related_products','thumbail'));
    }

    public function contact(){
        return view('contact');
    }
    public function shop(){
        $all_products = Product::all();
        $categories = Category::all();
        return view('shop', compact('all_products','categories'));
    }
    public function shop_category($category_id){
        // echo $shop_category;
        return view('shopcategory',[
            'category_name' => Category::find($category_id)->category_name,
            'all_products' => Product::where('category_id',$category_id)->get()
        ]);
    }
   
}
