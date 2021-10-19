@extends('layouts.dashboard')
@section('title')
    Product
@endsection
@section('product')
    active
@endsection
@section('content')
@include('layouts.nav')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>
      <span class="breadcrumb-item active">Product</span>
    </nav>

    <div class="sl-pagebody">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="card ">
                        <div class="card-header bg-warning">Product List </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th>Serial No</th>
                                    <th>Product Name</th>
                                    <th>Category Name</th>
                                    <th>Product Description</th>
                                    <th>Product Price</th>
                                    <th>Product Quantity</th>
                                    <th>Product Photo</th>
                                </tr>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $loop->index +1 }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ App\Models\Category::find($product->category_id)->category_name }}</td>
                                        <td>{{ $product->product_description }}</td>
                                        <td>{{ $product->product_price }}</td>
                                        <td>{{ $product->product_quantity }}</td>
                                        <td><img class=" w-50 img-fluid" src="{{ asset('uploads/product_photo') }}/{{ $product->product_photo }}" alt=""></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No Product Found</td>
                                    </tr>
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header bg-warning">Add New Product</div>
                        <div class="card-body">
                            <form action="{{ url('product/insert') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="catname" class=" form-label"> Category Name</label>
                                    <select name="category_id" id="catname" class=" form-control">
                                        <option value="">-Select One-</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
    
                                    @error('category_name')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="subcatname" class=" form-label">Sub Category Name</label>
                                    <select name="sub_category_id" id="subcatname" class=" form-control">
                                        <option value="">-Select one-</option>
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}">{{ App\Models\Category::find($subcategory->category_id)->category_name }} - {{ $subcategory->subcategory_name }}</option>
                                        @endforeach
                                    </select>
    
                                    @error('sub_category_name')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="pname" class=" form-label">Product Name</label>
                                   <input type="text" class=" form-control" name="product_name" id="pname">
                                    @error('product_name')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="pdes" class=" form-label">Product Description</label>
                                   <input type="text" class=" form-control" name="product_description" id="pdes">
                                    @error('product_description')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="pprice" class=" form-label">Product Price</label>
                                   <input type="text" class=" form-control" name="product_price" id="pprice">
                                    @error('product_price')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="pqty" class=" form-label">Product Quantity</label>
                                   <input type="text" class=" form-control" name="product_quantity" id="pqty">
                                    @error('product_quantity')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="pphoto" class=" form-label">Product Photo</label>
                                   <input type="file" class=" form-control" name="product_photo" id="pphoto">
                                    @error('product_photo')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="ptphoto" class=" form-label">Product Thumbnail Photos</label>
                                   <input type="file" class=" form-control" name="product_thumbnail_photos[]" id="pphoto" multiple>
                                    @error('product_thumbnail_photos')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button class="btn btn-success mb-3" type=" submit" >Add Product</button>
                                @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- sl-pagebody -->
  </div><!-- sl-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->

@endsection