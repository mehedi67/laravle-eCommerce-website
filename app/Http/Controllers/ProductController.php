<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_thumbnail_photo;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('Admin');
    }
    public function index(){
        return view('product.index',[
            'products' => Product::all(),
            'categories' => Category::all(),
            'subcategories' => SubCategory::all(),
        ]);
    }
    public function insert(Request $request){
        // print_r($request->all());

        $product_id = Product::insertGetId([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'product_price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            'created_at' => Carbon::now()
        ]);
        // echo $product_id;
        $new_product_photo = $request->file('product_photo');
        $new_product_photo_name = Str::random(5).time(). $product_id.".". $new_product_photo->getClientOriginalExtension();

        Image::make($new_product_photo)->save(base_path('public/uploads/product_photo/').$new_product_photo_name );

        // database update
        Product::find($product_id)->update([
            'product_photo' =>$new_product_photo_name,
            'created_at' => Carbon::now()
        ]);

        // Thumbnail photo start
        $start = 1;
        foreach ($request->file('product_thumbnail_photos') as $single_product_thumbnail_photo) {

            // echo $single_product_thumbnail_photos;
            // echo "<br>";
            $single_product_thumbnail_photo_name = Str::random(5).time(). $product_id."-".$start.".". $single_product_thumbnail_photo->getClientOriginalExtension();

            Image::make($single_product_thumbnail_photo)->save(base_path('public/uploads/product_thumbnail_photos/').$single_product_thumbnail_photo_name );
            $start++;
            Product_thumbnail_photo::insert([
                'product_id' => $product_id,
                'product_thumbnail_photo_name' => $single_product_thumbnail_photo_name,
                'created_at' => Carbon::now()
            ]);
        
            
        }
        //Thumbnail photo end


        return back();
        
    }
    // public function insert(Request $request){

    //     $new_product_photo = $request->file('product_photo');
    //     $new_product_photo_name = Str::random(10).time().".". $new_product_photo->getClientOriginalExtension();

    //     Image::make($new_product_photo)->save(base_path('public/uploads/product_photo/').$new_product_photo_name );

    //     //Database update start
    //     $product_id = Product::insertGetId($request->except('_token','product_photo')+[
    //         'product_photo' =>$new_product_photo_name,
    //         'created_at' =>Carbon::now()
    //     ]);
    //     // Database update end
    //     //Thumbnail photo start
    //     $start = 1;
    //     foreach ($request->file('product_thumbnail_photos') as $single_product_thumbnail_photo) {

    //         // echo $single_product_thumbnail_photos;
    //         // echo "<br>";
    //         $single_product_thumbnail_photo_name = $product_id."-".$start.".". $single_product_thumbnail_photo->getClientOriginalExtension();

    //         Image::make($single_product_thumbnail_photo)->save(base_path('public/uploads/product_thumbnail_photos/').$single_product_thumbnail_photo_name );
    //         $start++;
    //         Product_thumbnail_photo::insert([
    //             'product_id' => $product_id,
    //             'product_thumbnail_photo_name' => $single_product_thumbnail_photo_name,
    //             'created_at' => Carbon::now()
    //         ]);
    //         // echo $thumbnail_product_photo_name = Str::random(10).time().".". $single_product_thumbnail_photos->getClientOriginalExtension();
            
    //     }
    //     //Thumbnail photo end

    //     return back();
        
    // }
}
