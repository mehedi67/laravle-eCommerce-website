@extends('layouts.dashboard')
@section('title')
    Category
@endsection
@section('category')
    active
@endsection
@section('content')
@include('layouts.nav')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>
      <span class="breadcrumb-item active">Category</span>
    </nav>

    <div class="sl-pagebody">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="card ">
                        <div class="card-header bg-dark text-white">Category List</div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th>ID</th>
                                    <th>Category Name</th>
                                    <th>Added By</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->category_name }}</td>
                                        <td>{{ App\Models\User::find($category->added_by)->name }}</td>
                                        <td>{{ $category->created_at }}</td>
                                        <td>
                                            <a class=" btn btn-warning" href="{{'category/edit'}}/{{ $category->id }}">Edit</a>
                                            <a class=" btn btn-danger" href="{{'category/delete'}}/{{ $category->id }}">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header bg-dark text-white">Create Category</div>
                        <div class="card-body">
                            <form action="{{ route('create') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="catname" class=" form-label"> Category Name</label>
                                    <input type="text" class=" form-control" name="category_name" id="catname" placeholder="Enter category name">
    
                                    @error('category_name')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="catphoto" class=" form-label"> Category Photo</label>
                                    <input type="file" class=" form-control" name="category_photo" id="catphoto" >
    
                                    @error('category_photo')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button class="btn btn-info mb-3" type=" submit" >Add Now</button>
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