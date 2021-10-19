@extends('layouts.dashboard')
@section('title')
    Coupon
@endsection
@section('coupon')
    active
@endsection
@section('content')
@include('layouts.nav')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ url('home') }}">Dashboard</a>
      <span class="breadcrumb-item active">Coupon</span>
    </nav>

    <div class="sl-pagebody">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="card ">
                        <div class="card-header bg-dark text-white">Coupon List</div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th>ID</th>
                                    <th>Coupon Name</th>
                                    <th>Coupon Discount Amount</th>
                                    <th>Coupon Validity Till</th>
                                    
                                </tr>
                                @forelse ($coupons as $coupon)
                                    <tr>
                                        <td>{{ $coupon->id }}</td>
                                        <td>{{ $coupon->coupon_name }}</td>
                                        <td>{{ $coupon->coupon_discount_amount }}</td>
                                        <td>{{ \Carbon\Carbon::parse($coupon->coupon_validity_till)->diffForHumans() }}</td>
                                        
                                        
                                    </tr>
                                @empty
                                    
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header bg-dark text-white">Add  Coupon</div>
                        <div class="card-body">
                            @if (session('status'))
                            <div class="alert alert-success">{{ session('status') }}</div>
                            @endif
                            <form action="{{ route('insert') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="coupon_name" class=" form-label"> Coupon Name</label>
                                    <input type="text" class=" form-control" name="coupon_name" id="coupon_name" placeholder="Enter coupon name">
    
                                    @error('coupon_name')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="coupon_discount_amount" class=" form-label"> Coupon Discount Amount (%)</label>
                                    <input type="text" class=" form-control" name="coupon_discount_amount" id="coupon_discount_amount" placeholder="Enter discount amount">
    
                                    @error('coupon_discount_amount')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="coupon_validity_till" class=" form-label"> Coupon Validity Till</label>
                                    <input type="date" class=" form-control" name="coupon_validity_till" id="coupon_validity_till" placeholder="Enter discount amount">
    
                                    @error('coupon_validity_till')
                                        <span class=" text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <button class="btn btn-success mb-3" type=" submit" >Add Coupon</button>
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