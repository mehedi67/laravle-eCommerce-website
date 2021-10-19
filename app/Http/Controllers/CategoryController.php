<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $categories = Category::latest()->get();
        return view('category.index', compact('categories'));
    }
    public function create(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories,category_name'
        ]);
        $category_photo = $request->file('category_photo');
        $category_photo_name = Str::random(10).time().".".$category_photo->getClientOriginalExtension();

        Image::make($category_photo)->save(base_path('public/uploads/category/').$category_photo_name);

        Category::insert($request->except('_token','category_photo') + [
            'category_photo' =>$category_photo_name,
            'added_by'      => Auth::id(),
            'created_at'     =>Carbon::now()
        ]);
        // Category::insert([
        //     'category_name' => $request->category_name,
        //     'added_by'      => Auth::id(),
        //     'created_at'    => Carbon::now()
        // ]);
        
        return back()->with('success',' Category '.$request->category_name.' Added Successfully!');
    }

    public function delete($cat_id){
        Category::find($cat_id)->delete();
        Subcategory::where([ 'category_id' =>$cat_id ])->delete();
        Product::where([ 'category_id' =>$cat_id ])->delete();
        return back();
    }
}
