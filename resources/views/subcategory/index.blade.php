@extends('layouts.dashboard')
@section('title')
    Sub Category
@endsection
@section('subcategory')
    active
@endsection
@section('content')
@include('layouts.nav')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>
      <a class="breadcrumb-item" href="{{ url('category') }}">Category</a>
      <span class="breadcrumb-item active">Sub Category</span>
    </nav>

    <div class="sl-pagebody">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="card ">
                        <div class="card-header bg-success">Category List </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th>ID</th>
                                    <th>Category Name</th>
                                    <th>Sub Category Name</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                @forelse ($subcategories as $subcategory)
                                    <tr>
                                        <td>{{ $subcategory->id }}</td>
                                        <td>{{ App\Models\Category::find($subcategory->category_id)->category_name }}</td>
                                        <td>{{ $subcategory->subcategory_name }}</td>
                                        <td>{{ $subcategory->created_at->format('m/d/H : h:i:s A') }}</td>
                                        <td>
                                            <a class=" btn btn-warning" href="{{ url('subcategory/edit') }}/{{ $subcategory->id }}">Edit</a>
                                            <a class=" btn btn-danger" href="{{ url('subcategory/delete') }}/{{ $subcategory->id }}">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class=" text-danger text-center">
                                        <td colspan="4">No Data Found</td>
                                    </tr>
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header bg-success">Sub Create Category</div>
                        <div class="card-body">
                            <form action="{{ route('add') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="catname" class=" form-label"> Category Name</label>
                                    <select class=" form-control" name="category_id" id="catname">
                                        <option value="">-Select-</option>
                                        @foreach ($categories as $category)
                                            <option {{ old('category_id')== $category->id?"selected":"" }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
    
                                    @error('category_id')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="scatname" class=" form-label">Sub Category Name</label>
                                    <input type="text" class=" form-control" name="subcategory_name" id="scatname" placeholder="Enter subcategory name" value=" {{ old('subcategory_name') }}">
    
                                    @error('subcategory_name')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button class="btn btn-info mb-3" type=" submit" >Add Subcategory</button>
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