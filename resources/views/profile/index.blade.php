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
                @if (session('success'))
                <div class="alert alert-success col-md-12">{{ session('success') }}</div>
                @endif
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">Change Name</div>
                        <div class="card-body">
                            <form action="{{ route('change') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="pname" class=" form-label">  Name</label>
                                    <input type="text" class=" form-control" name="name" id="pname" placeholder="Enter name" value="{{ Auth::user()->name }}">
    
                                    @error('category_name')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button class="btn btn-success mb-3" type=" submit" >Change Name</button>
                                
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">Change Password</div>
                        <div class="card-body">
                            <form action="{{ url('profile/password/change') }}" method="POST">
                                @csrf
                                @if (session('error'))
                                <div class="alert alert-danger col-md-12">{{ session('error') }}</div>
                                @endif
                                <div class="mb-3">
                                    <label for="old_password" class=" form-label">Old  Password</label>
                                    <input type="password" class=" form-control" name="old_password" id="old_password" placeholder="Enter old password">
    
                                    @error('old_password')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class=" form-label"> Password</label>
                                    <input type="password" class=" form-control" name="password" id="password" placeholder="Enter New password">
    
                                    @error('password')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class=" form-label"> Confirm Password</label>
                                    <input type="password" class=" form-control" name="password_confirmation" id="password_confirmation" placeholder="Enter name">
    
                                    @error('password_confirmation')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button class="btn btn-warning mb-3" type=" submit" >Password Change</button>
                                
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card">
                        <div class="card-header">Change Profile Photo</div>
                        <div class="card-body">
                            <form action="{{ url('profile/photo/change') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if (session('error'))
                                <div class="alert alert-danger col-md-12">{{ session('error') }}</div>
                                @endif
                                <div class="mb-3 text-center ">
                                    <label for="old_password" class=" form-label">Current profile Photo</label><br>
                                    <img src="{{ asset('uploads/profile_photo') }}/{{ Auth::user()->profile_photo }}" class="w-50 img-fluid" alt="">
                                </div>
                                <div class="mb-3">
                                    <label for="profile_photo" class=" form-label">New Profile Photo</label>
                                    <input type="file" class=" form-control-file" name="new_profile_photo" id="profile_photo" >
    
                                    @error('new_profile_photo')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                
                                <button class="btn btn-secondary mb-3" type=" submit" > Change Photo</button>
                                
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