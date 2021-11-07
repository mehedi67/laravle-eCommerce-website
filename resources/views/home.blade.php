@extends('layouts.dashboard')
@section('title')
    Dashboard
@endsection
@section('dashboard')
    active
@endsection
@section('content')
@include('layouts.nav')

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <span class="breadcrumb-item active">Dashboard</span>
    </nav>

    <div class="sl-pagebody">
        <div class="container">
            @if (Auth::user()->role == 1)
            @include('part.customerdashboard')
            @elseif(Auth::user()->role == 2)
            @include('part.admindashboard')
            @elseif(Auth::user()->role == 3)
            @include('part.shopkeeperdashboard')
            @endif
            
        </div>
    </div><!-- sl-pagebody -->
  </div><!-- sl-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->


@endsection
