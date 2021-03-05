<div>
    <div class="card" style="border: none">
        <div class="card-body">
          <h5 class="card-title">Edit Account Credentials</h5>
          <hr>
           <div style="max-width:70%;margin:auto">
            <form method="post" action="/dashboard/account/update-password">
                {{ method_field('PATCH') }}
                 @csrf
                <div class="mb-3">
        
                  <input type="email" class="form-control" value="{{Auth::user()->email}}" id="exampleInputEmail1" aria-describedby="emailHelp" disabled>
             
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
</div>