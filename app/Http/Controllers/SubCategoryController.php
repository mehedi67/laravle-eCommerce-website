<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Models\SubCategory;
use Carbon\Carbon;

class SubCategoryController extends Controller
{
    public function index(){
        return view('subcategory.index',[
            'categories' => Category::latest()->get(),
            'subcategories' => SubCategory::latest()->get(),
        ]);
    }
    public function add(Request $request){
        // print_r($request->all());
        $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required|unique:sub_categories,subcategory_name',
        ]);
        SubCategory::insert([
            'category_id'   => $request->category_id,
            'subcategory_name'   => $request->subcategory_name,
            'created_at'        => Carbon::now()
        ]);
        return back()->with('success', ' Sub Category '.$request->subcategory_name.' Added Successfully!');
    }



    public function edit($subcategory_id){
        return view('subcategory.edit',[
            'categories' => Category::latest()->get(),
            'subcategory_info' => SubCategory::find($subcategory_id)
        ]);
    }
    public function delete($subcategory_id){
        SubCategory::find($subcategory_id)->delete();
        return back();
    }

    public function update(Request $request){
        // print_r($request->all());
        $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required|unique:sub_categories,subcategory_name',
        ]);

        SubCategory::find($request->subcategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name
        ]);
        return redirect('subcategory');
    }
}
