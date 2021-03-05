<div>
    <div class="card" style="border: none">
        <div class="card-body">
          <h5 class="card-title">Edit Details</h5>
          <hr>
           <div style="max-width:70%;margin:auto">
            <form method="POST" action="/dashboard/account/update-details">
                {{ method_field('PATCH') }}
                @csrf
                 <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}" id="name" aria-describedby="emailHelp">
                    @if ($errors->has('name'))
                    <span class="help-block">
                        <strong style="color:red">{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                  </div>

                  <div class="mb-3">
                    <label for="surname" class="form-label">Surname</label>
                    <input type="text" name="surname" class="form-control" value="{{Auth::user()->surname}}" id="surname">
                    @if ($errors->has('surname'))
                    <span class="help-block">
                        <strong style="color:red">{{ $errors->first('surname') }}</strong>
                    </span>
                @endif
                  </div>

                  <div class="mb-3">
                    <label for="mobile" class="form-label">Mobile Number</label>
                    <input type="number" name="mobile" class="form-control" value="{{Auth::user()->mobile}}" id="mobile">
                    @if ($errors->has('mobile'))
                    <span class="help-block">
                        <strong style="color:red">{{ $errors->first('mobile') }}</strong>
                    </span>
                @endif
                  </div>

                  <div class="mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" name="age" class="form-control" value="{{Auth::user()->age}}" id="age">
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
                               <option value="{{ $item }}" @if(Auth::user()->gender=== $item) selected='selected' @endif> {{ $item }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('gender'))
                        <span class="help-block">
                            <strong style="color:red">{{ $errors->first('gender') }}</strong>
                        </span>
                    @endif
                      </div>
                  </div>

                  <div class="mb-3">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Account Type</label>
                        <select name="role_id" class="form-control" id="exampleFormControlSelect1">
                            <?php $arr = ['Bidder','Seller']; $count = 1;?>
                            @foreach($arr as $item)
                               <option value="{{ $count }}" @if(Auth::user()->gender=== $item) selected='selected' @endif> {{ $item }}</option>
                               {{$count++}}
                            @endforeach
                        </select>
                        @if ($errors->has('role_id'))
                        <span class="help-block">
                            <strong style="color:red">{{ $errors->first('role_id') }}</strong>
                        </span>
                    @endif
                      </div>
                  </div>
   
                <button type="submit" class="btn btn-primary">Save</button>
              </form>
           </div>
        </div>
      </div>
</div>