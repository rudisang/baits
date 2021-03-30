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
<section class="container my-4">
  <x-flash-messages />
</section>
<!-- Operator Dashboard Views -->
@if(Auth::user()->role_id == 2)
    <section class="container my-4">

    </section>

    <section class="container my-4">
      <div class="card" style="border: none">
          <h5 class="card-header" style="background: #fff">Pending Approval</h5>
          <div class="card-body">
              <h3 class="text-center" style="color:grey">N/A</h3>
           <!-- <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a> -->
          </div>
        </div>
     </section>

    <section class="container my-4">
      <div class="card" style="border: none">
          <h5 class="card-header" style="background: #fff">Dasboard</h5>
          <div class="card-body">
              <h3 class="text-center" style="color:grey">N/A</h3>
           <!-- <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a> -->
          </div>
        </div>
     </section>

     <section class="container my-4">
      <div class="card" style="border: none">
          <h5 class="card-header" style="background: #fff">Bid History</h5>
          <div class="card-body">
              <h3 class="text-center" style="color:grey">N/A</h3>
           <!-- <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a> -->
          </div>
        </div>
     </section>

     <div style ="position: fixed; bottom: 30px;right:30px;background:rgb(180, 117, 0);padding:10px;border-radius:100%;">
      <a style="background:none;border:none;font-weight: 900;" class="btn btn-info" href="#">+</a>

  </div>
@endif

@if(Auth::user()->role_id == 1)
<!-- Farmer Dashboard Views -->
<section class="container my-4">
  <div class="card" style="border: none">
      <h5 class="card-header" style="background: #fff">{{Auth::user()->name}} | Dashboard</h5>
      <div class="card-body">


          @if(Auth::user()->keeper)

          @if(Auth::user()->location)
          @if(Auth::user()->brand)  @else <x-brand-form-modal />@endif
          <div class="my-4"><x-edit-location-form /></div>
          @else
          <x-location-form />
          @endif
            @else

            <x-keeper-apply-modal />

          @endif

      </div>
    </div>
 </section>
@endif

@if(Auth::user()->brand)
<section class="container my-4">
  <div class="card" style="border: none">
      <h5 class="card-header" style="background: #fff">Brand</h5>
      <div class="card-body">
        <p><strong>Brand:</strong> {{Auth::user()->brand->brand}}</p>
        <p><strong>Shape:</strong> {{Auth::user()->brand->shape}}</p>
        <a href="" class="btn btn-outline-warning">edit</a>
      </div>
  </div>
</section>
@endif

@if(Auth::user()->role_id == 3)
<section class="container my-4">
  <a href="/dashboard/create-user" class="btn btn-info">Create New User</a>
 </section>

<section class="container my-4">
  <x-admin-user-table />
 </section>
@endif


@endsection