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

@if(Auth::user()->role_id == 4)
<section class="container my-4">
    <div class="card" style="border:none">
      <h5 class="card-header">Permit Requests</h5>
      <div class="card-body">
        <x-permits />
      </div>
    </div>
  </section>

    <section class="container my-4">
      <div class="card" style="border:none">
        <h5 class="card-header">Transfer Requests</h5>
        <div class="card-body">
          <x-transfer-requests />
        </div>
      </div>
    </section>

    <section class="container my-4">
      <div class="card" style="border:none">
        <h5 class="card-header">Transfer History</h5>
        <div class="card-body">
          <x-transfer-history />
        </div>
      </div>
    </section>

    <section class="container my-4">
      <div class="card" style="border: none">
          <h5 class="card-header" style="background: #fff">Operator Dash <a href="/chat/room" style="float:right" class="btn btn-outline-info">Chat</a></h5>
          <div class="card-body">
              <x-admin-user-table />
              <!-- Requests Table -->

          </div>
        </div>
     </section>

@endif


<!-- Police Dashboard Views -->
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



     <div style ="position: fixed; bottom: 30px;right:30px;background:rgb(180, 117, 0);padding:10px;border-radius:100%;">
      <a style="background:none;border:none;font-weight: 900;" class="btn btn-info" href="#">+</a>

  </div>
@endif

@if(Auth::user()->role_id == 1)


<!-- Farmer Dashboard Views -->
<section class="container my-4">
  <div class="card" style="border: none">
      <h5 class="card-header" style="background: #fff">{{Auth::user()->name}} | Dashboard  <a href="/chat/room" style="float:right" class="btn btn-outline-info">Chat</a></h5>
      <div class="card-body">

         
          @if(Auth::user()->keeper)

          @if(Auth::user()->location)
          @if(Auth::user()->brand)  @else <x-brand-form-modal />@endif
          <a href="/permits" class="btn btn-secondary my-3">Permits</a> 
          <div class="my-2"><x-edit-location-form /> <br><a class="btn btn-info" id="brand-btn" onclick="show()">View Brand</a></div>
          @else
          <x-location-form />
          @endif
            @else

            <x-keeper-apply-modal />

          @endif

      </div>
    </div>
 </section>

 
@if(Auth::user()->brand)
<section class="container my-4" id="brand" style="display:none">
  <div class="card" style="border: none">
      <h5 class="card-header" style="background: #fff">Brand</h5>
      <div class="card-body">

        <p><strong>Brand:</strong> {{Auth::user()->brand->brand}}</p>
        <p><strong>Shape:</strong> {{Auth::user()->brand->shape}}</p>
     
      </div>
  </div>
</section>

@if(Auth::user()->transferrequests->count() > 0 )
<section class="container my-4">
    <div class="card" style="border: none">
        <h5 class="card-header" style="background: #fff">Transfer Requests</h5>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#EID</th>
                    <th scope="col">Progress</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach(Auth::user()->transferrequests as $request)
                
                    <tr>
                      <th scope="row">{{$request->eid}}</th>
                      @if(!$request->status)
                      <td>Under review <div class="progress">
                         <div class="progress-bar bg-warning" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                        </div> </td>
                      @else
                      <td>Complete<div class="progress">
                          <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                        </div> </td>
                      @endif
                    
                    </tr>
             
        
                    @endforeach
        
            
         
                </tbody>
              </table>
     
       
       
        </div>
    </div>
  </section>
@else

@endif

<section class="container my-4">
    <div class="card" style="border: none">
        <h5 class="card-header" style="background: #fff">My Animals</h5>
        <div class="card-body">
          <a href="/animal/create" class="btn btn-info">Add Animals</a>
            <x-user-animals-table />
        </div>
    </div>
  </section>


@endif
@endif


@if(Auth::user()->role_id == 3)
<section class="container my-4">
  <a href="/dashboard/create-user" class="btn btn-info">Create New User</a>
 </section>

<section class="container my-4">
  <x-admin-user-table />
 </section>
@endif

<script>
  var bool = true
  var brandbtn = document.getElementById("brand-btn");
  var brand = document.getElementById("brand");

  function show(){
    if(bool){
      brand.style.display = "block";
 
      bool = false
    }else{
      brand.style.display = "none";
      bool = true
    }
    
  }
</script>
@endsection