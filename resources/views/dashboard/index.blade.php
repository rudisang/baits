@extends('layouts.dashboard')
@section('breadcrumb')
   
        <nav aria-label="breadcrumb" >
            <div class="container">
            <ol class="breadcrumb mt-4" style="background:#fff;max-width:400px;">
              <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{Auth::user()->role->role}} Account</li>
            </ol>
        </div>
          </nav>
  
@endsection
@section('content')
<!-- Seller Dashboard Views -->
@if(Auth::user()->role_id == 2)
    <h2>I am a {{Auth::user()->role->role}}</h2>
@endif

<!-- Bidder Dashboard Views -->
   <section class="container my-4">
    <div class="card" style="border: none">
        <h5 class="card-header" style="background: #fff">My Bids</h5>
        <div class="card-body">
            <h2 class="text-center">Nothing Yet</h2>
         <!-- <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a> -->
        </div>
      </div>
   </section>


@endsection