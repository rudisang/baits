@extends('layouts.dashboard')
@section('breadcrumb')
<nav aria-label="breadcrumb" >
  <div class="container">
  <ol class="breadcrumb mt-4" style="background:#fff;max-width:400px;">
    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item" aria-current="page">{{Auth::user()->role->role}} Account</li>
    <li class="breadcrumb-item active" aria-current="page">Add Animal</li>
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
                      <h5 class="card-title">Animal</h5>
                      <hr>
                       <div style="max-width:70%;margin:auto">
                        <form method="POST" action="/animal/create">
                            @csrf
                           <div class="row">
                                <div class="col col-sm-12 col-md-6">
                                        <label for="eid" class="form-label">EID</label>
                                        <input type="text" name="eid" class="form-control" id="eid" required>
                                        @if ($errors->has('eid'))
                                        <span class="help-block">
                                            <strong style="color:red">{{ $errors->first('eid') }}</strong>
                                        </span>
                                    @endif
                                      </div>
                    
                                      <div class="col col-sm-12 col-md-6">
                                        <label for="analogue_id" class="form-label">Analogue ID</label>
                                        <input type="text" name="analogue_id" class="form-control"  id="analogue_id" required>
                                        @if ($errors->has('analogue_id'))
                                        <span class="help-block">
                                            <strong style="color:red">{{ $errors->first('analogue_id') }}</strong>
                                        </span>
                                    @endif
                                      </div>
                           </div>
            
                           <div class="row">
                                <div class="col col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="breed">Breed</label>
                                            <select name="breed" class="form-control" id="breed" required>
                                                    <option value="" selected disabled></option>
                                                <?php $arr = ['Brahman','XXX', 'Simental']; ?>
                                                @foreach($arr as $item)
                                                   <option value="{{ $item }}" @if(old('breed') == $item) selected='selected' @endif> {{ $item }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('breed'))
                                            <span class="help-block">
                                                <strong style="color:red">{{ $errors->first('breed') }}</strong>
                                            </span>
                                        @endif
                                          </div>
                                      </div>

                                      <div class="col col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="colour">Colour</label>
                                                <select name="colour" class="form-control" id="colour">
                                                    <option value="" selected disabled></option>
                                                    <?php $arr = ['Blue','Black', 'Orange']; ?>
                                                    @foreach($arr as $item)
                                                       <option value="{{ $item }}" @if(old('colour') == $item) selected='selected' @endif> {{ $item }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('colour'))
                                                <span class="help-block">
                                                    <strong style="color:red">{{ $errors->first('colour') }}</strong>
                                                </span>
                                            @endif
                                              </div>
                                          </div>
                           </div>

                           <div class="row">
                                <div class="col col-sm-12 col-md-6">
                                        <label for="species" class="form-label">Species</label>
                                        <input type="text" name="species" class="form-control" value="Cattle" id="species" required>
                                        @if ($errors->has('species'))
                                        <span class="help-block">
                                            <strong style="color:red">{{ $errors->first('species') }}</strong>
                                        </span>
                                    @endif
                                      </div>
                    
                                      <div class="col col-sm-12 col-md-6">
                                        <label for="age" class="form-label">Age (months)</label>
                                        <input type="number" name="age" class="form-control" min=4  id="age" required>
                                        @if ($errors->has('age'))
                                        <span class="help-block">
                                            <strong style="color:red">{{ $errors->first('age') }}</strong>
                                        </span>
                                    @endif
                                      </div>
                           </div>

            
                              <div class="mb-3">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Sex</label>
                                    <select name="sex" class="form-control" id="exampleFormControlSelect1">
                                            <option value="" selected disabled></option>
                                        <?php $arr = ['Male','Female']; ?>
                                        @foreach($arr as $item)
                                           <option value="{{ $item }}" @if(old('sex') == $item) selected='selected' @endif> {{ $item }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('sex'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('sex') }}</strong>
                                    </span>
                                @endif
                                  </div>
                              </div>
                  
                             
               
                            <button type="submit" class="btn btn-primary" style="background-color: #374151;border:none">Save</button>
                          </form>
                       </div>
                    </div>
                  </div>
            </div>
  </section>


@endsection