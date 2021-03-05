@extends('layouts.dashboard')
@section('breadcrumb')
<nav class="navbar navbar-expand-lg navbar-light bg-light" aria-label="breadcrumb">
    <div class="container">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item" aria-current="page">{{Auth::user()->role->role}} Account</li>
      <li class="breadcrumb-item active" aria-current="page">Edit</li>

    </ol>
</div>
  </nav>
@endsection

@section('content')

  <section class="container my-5">
    <div class="card" style="border: none">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
           <div style="max-width:70%;margin:auto">
            <form>
                 @csrf
                 <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}" id="name" aria-describedby="emailHelp">
                  </div>

                  <div class="mb-3">
                    <label for="surname" class="form-label">Surname</label>
                    <input type="text" class="form-control" value="{{Auth::user()->surname}}" id="surname">
                  </div>


                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="email" class="form-control" value="{{Auth::user()->email}}" id="exampleInputEmail1" aria-describedby="emailHelp" disabled>
             
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" value="{{Hash::make(Auth::user()->password)}}" class="form-control" id="exampleInputPassword1">
                </div>
   
                <button type="submit" class="btn btn-primary">Edit</button>
              </form>
           </div>
        </div>
      </div>
  </section>
@endsection