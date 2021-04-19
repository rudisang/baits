@extends('layouts.dashboard')
@section('breadcrumb')
<nav aria-label="breadcrumb" >
    <div class="container">
    <ol class="breadcrumb mt-4" style="background:#fff;max-width:400px;">
      <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item" aria-current="page">{{Auth::user()->role->role}} Account</li>
      <li class="breadcrumb-item active" aria-current="page">Permits</li>
     
    </ol>
  </div>
  </nav>
@endsection

@section('content')
<section class="container my-4">
    <x-flash-messages />
</section>

<section class="container my-4" id="form" style="display: none">
   <div class="card">
       <div class="card-body">
          @if ($errors->has('omang'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ $errors->first('omang') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
          
          @if ($errors->has('affidavit'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ $errors->first('affidavit') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif

          @if ($errors->has('other_docs'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ $errors->first('other_docs') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif


          <form action="/permit/apply" method="POST" enctype="multipart/form-data">
            @csrf
           
            <div class="row">
                <div class="col col-sm-12 col-md-6">
                   <div class="form-group">
                     <label for="">From (KeeperID)</label>
                       <select name="from" id="" class="form-control" required>
                           <option value=""disabled selected>From Keeper ID</option>
                           @foreach ($keepers as $item)
                       <option value="{{$item->id}}">000{{$item->id}}</option>
                           @endforeach
                       </select>
                   </div>
                </div>

                <div class="col col-sm-12 col-md-6">
                   <div class="form-group">
                     <label for="">To (KeeperID)</label>
                       <select name="to" id="" class="form-control" required>
                           <option value=""disabled selected>To Keeper ID</option>
                           @foreach ($keepers as $item)
                       <option value="{{$item->id}}">000{{$item->id}}</option>
                           @endforeach
                       </select>
                   </div>
                </div>

                <div class="col col-sm-12 col-md-6">
                   <select name="animal[]" class="custom-select" multiple required>
                       <option selected disabled>Select Animals By Analogue</option>
                     @foreach(Auth::user()->brand->animals as $animal)
                   <option value="{{$animal->analogue_id}}">{{$animal->analogue_id}}</option>
                     @endforeach
                   
                     </select>
                </div>

                <div class="col col-sm-12 col-md-6">
                   <div class="form-check">
                       <input class="form-check-input" type="radio" name="is_interzonal" id="exampleRadios1" value="1" checked>
                       <label class="form-check-label" for="exampleRadios1">
                         Interzonal Permit
                       </label>
                     </div>
                     <div class="form-check">
                       <input class="form-check-input" type="radio" name="is_interzonal" id="exampleRadios2" value="0">
                       <label class="form-check-label" for="exampleRadios2">
                         Non Interzonal Permit
                       </label>
                     </div>
                </div>
<br><br>
                
            </div>
            <div class="form-group">
                <label>Certified Omang</label>
                <input type="file" name="omang" class="form-control" required>
              </div>

              <div class="form-group">
                <label>Affidavit</label>
                <input type="file" name="affidavit" class="form-control" required>
              </div>

              <div class="form-group">
                <label>Other Docs</label>
                <input type="file" name="other_docs" class="form-control">
              </div>
<br>
            <button type="submit" class="btn btn-info">Apply</button>
       </form>
       </div>
   </div>
</section>

<section class="container my-4">
    <div class="card">
        <h5 class="card-header">My Permits <a onclick="show()" id="apply-btn" class="btn btn-info" style="float:right">Permit Form</a></h5>
        <div class="card-body">
           @foreach(Auth::user()->permits as $permit)
            @if($permit->status == 0)
            <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                <div class="card-header">Pending Approval</div>
                <div class="card-body">
                  <h5 class="card-title">Animals To Be Transferred</h5>
                  @php $arr = json_decode($permit->animal); @endphp
                  @foreach($arr as $animal)
                  <p class="card-text">Analogue ID: {{$animal}}</p>
                  @endforeach
                </div>
              </div>
            @elseif($permit->status == 1)
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">Approved</div>
                <div class="card-body">
                  <h5 class="card-title">Animals To Be Transferred</h5>
                  @php $arr = json_decode($permit->animal); @endphp
                  @foreach($arr as $animal)
                  <p class="card-text">Analogue ID: {{$animal}}</p>
                  @endforeach
                </div>

                <a href="" class="btn btn-info" download>Download Permit</a>
              </div>

              @else
              <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                  <div class="card-header">Rejected</div>
                  <div class="card-body">
                    <h5 class="card-title">Primary card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  </div>
                </div>
            @endif
           @endforeach
        </div>
    </div>
 </section>

 <script>
    var bool = true
    var brandbtn = document.getElementById("apply-btn");
    var brand = document.getElementById("form");
  
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