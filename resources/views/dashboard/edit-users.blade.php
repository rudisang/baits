@extends('layouts.dashboard')
@section('breadcrumb')
<nav aria-label="breadcrumb" >
    <div class="container">
    <ol class="breadcrumb mt-4" style="background:#fff;max-width:400px;">
      <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item" aria-current="page">{{Auth::user()->role->role}} Account</li>
      <li class="breadcrumb-item active" aria-current="page">Edit</li>
      <li class="breadcrumb-item active" aria-current="page">{{$user->id}}</li>
    </ol>
  </div>
  </nav>
@endsection

@section('content')
<section class="container my-4">
    <x-flash-messages />
</section>

<section class="container my-4">
    <div>
        <div class="card" style="border: none">
            <div class="card-body">
              <h5 class="card-title">Edit Details </h5>
              <hr>
               <div style="max-width:70%;margin:auto">
                <form method="POST" action="/dashboard/account/update-details/{{$user->id}}">
                    {{ method_field('PATCH') }}
                    @csrf
                     <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$user->name}}" id="name" aria-describedby="emailHelp">
                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong style="color:red">{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                      </div>
    
                      <div class="mb-3">
                        <label for="surname" class="form-label">Surname</label>
                        <input type="text" name="surname" class="form-control" value="{{$user->surname}}" id="surname">
                        @if ($errors->has('surname'))
                        <span class="help-block">
                            <strong style="color:red">{{ $errors->first('surname') }}</strong>
                        </span>
                    @endif
                      </div>
    
                      <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile Number</label>
                        <input type="number" name="mobile" class="form-control" value="{{$user->mobile}}" id="mobile">
                        @if ($errors->has('mobile'))
                        <span class="help-block">
                            <strong style="color:red">{{ $errors->first('mobile') }}</strong>
                        </span>
                    @endif
                      </div>
    
                      <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="date" name="age" class="form-control" value="{{$user->age}}" id="age">
                        @if ($errors->has('age'))
                        <span class="help-block">
                            <strong style="color:red">{{ $errors->first('age') }}</strong>
                        </span>
                    @endif
                      </div>
    
                      <div class="mb-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Gender</label>
                            <select name="gender" class="form-control" id="exampleFormControlSelect1">
                                <?php $arr = ['Male','Female']; ?>
                                @foreach($arr as $item)
                                   <option value="{{ $item }}" @if($user->gender=== $item) selected='selected' @endif> {{ $item }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('gender'))
                            <span class="help-block">
                                <strong style="color:red">{{ $errors->first('gender') }}</strong>
                            </span>
                        @endif
                          </div>
                      </div>
          
                      @if($user->role->id == 2)
                      <input type="hidden" value="2" name="role_id">
                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Sellers are not allowed to change their account types.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      @elseif($user->role->id == 3)
                      <input type="hidden" value="3" name="role_id">

                      @else
                      <div class="mb-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Account Type</label>
                            <select name="role_id" class="form-control" id="exampleFormControlSelect1">
    
                                   <option value="1" selected='selected'>Bidder</option>
                                   <option value="2">Seller</option>
                            </select>
                            @if ($errors->has('role_id'))
                            <span class="help-block">
                                <strong style="color:red">{{ $errors->first('role_id') }}</strong>
                            </span>
                        @endif
                          </div>
                      </div>
                      @endif
       
                    <button type="submit" class="btn btn-primary">Save</button>
                  </form>
               </div>
            </div>
          </div>
    </div>
  </section>

  <section class="container my-4">
    <div class="card" style="border: none">
        <div class="card-body">
          <h5 class="card-title">Edit Account Credentials</h5>
          <hr>
           <div style="max-width:70%;margin:auto">
            <form method="post" action="/dashboard/account/update-password/{{$user->id}}">
                {{ method_field('PATCH') }}
                 @csrf
                <div class="mb-3">
        
                  <input type="email" class="form-control" value="{{$user->email}}" id="exampleInputEmail1" aria-describedby="emailHelp" disabled>
             
                </div>
                <div class="mb-3">
                  <label for="oldpass" class="form-label">Old Password</label>
                  <input type="password" name="old_pass" value="" class="form-control" id="oldpass">
                  @if ($errors->has('old_pass'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('old_pass') }}</strong>
                                    </span>
                                @endif
                </div>

                <div class="mb-3">
                    <label for="newpass" class="form-label">New Password</label>
                    <input type="password" name="new_pass" value="" class="form-control" id="newpass">
                    @if ($errors->has('new_pass'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('new_pass') }}</strong>
                                    </span>
                                @endif
                </div>

                <div class="mb-3">
                    <label for="confirmpass" class="form-label">Confirm Password</label>
                    <input type="password" name="conf_pass" value="" class="form-control" id="confirmpass">
                    @if ($errors->has('conf_pass'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('conf_pass') }}</strong>
                                    </span>
                                @endif
                </div>
   
                <button type="submit" class="btn btn-primary">Save</button>
              </form>
           </div>
        </div>
      </div>
  </section>

  <section class="container my-4 mb-5" >

    <!-- Button trigger modal -->
<button style="margin-bottom:20px;float:right"  type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletewarning">
    Delete Account
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="deletewarning" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">⚠️Warning</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete this account? This action can not be reversed.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <form method="POST" action="/dashboard/account/user/{{$user->id}}">
            {{method_field('DELETE')}}
            @csrf
            <button type="submit" class="btn btn-danger">Delete Account</button>

          </form>
        </div>
      </div>
    </div>
  </div>
  </section>
@endsection