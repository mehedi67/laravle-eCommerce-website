@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 m-auto">
                <div class="card">
                    <div class="card-header bg-success">Sub Create Category</div>
                    <div class="card-body">
                        <form action="{{ route('update') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="catname" class=" form-label"> Category Name</label>
                                <select class=" form-control" name="category_id" id="catname">
                                    <option value="">-Select-</option>
                                    @foreach ($categories as $category)
                                        <option {{ $subcategory_info->category_id == $category->id?"selected":"" }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>

                                @error('category_id')
                                    <span class=" text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="scatname" class=" form-label">Sub Category Name</label>
                                <input type="hidden" name="subcategory_id" id="" value="{{ $subcategory_info->id }}">
                                <input type="text" class=" form-control" name="subcategory_name" id="scatname" placeholder="Enter subcategory name" value="{{ $subcategory_info->subcategory_name }}">

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
@endsection