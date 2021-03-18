<div>
   <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Edit Location
      </button>
      
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Location</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="/location/edit/{{$location->id}}">
                        {{ method_field('PATCH') }}
                        @csrf
                        <div class="row">
                
                            <div class="col-sm-12 col-md-6">
                            <div class="mb-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">District</label>
                                        <select name="district" class="form-control" id="exampleFormControlSelect1">
                                                <option value="" disabled>Select District</option>
                                                <?php $arr = ['Chobe','Ngamiland', 'Central', 'North East', 'Ghanzi', 'Kweneng', 'Kgatleng', 'South East', 'Southern', 'Kgalagadi']; ?>
                                                @foreach($arr as $item)
                                                   <option value="{{ $item }}" @if($location->district === $item) selected='selected' @endif> {{ $item }}</option>
                                                @endforeach
                                        </select>
                                        @if ($errors->has('district'))
                                        <span class="help-block">
                                            <strong style="color:red">{{ $errors->first('district') }}</strong>
                                        </span>
                                    @endif
                                        </div>
                                    </div>
                            </div>    
                
                
                            <div class="col-sm-12 col-md-6">
                                    <div class="mb-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Zone</label>
                                                <select name="zone" class="form-control" id="exampleFormControlSelect1">
                                                       <option value="" disabled selected>Select Zone</option>
                                                       <option value="I11">I11</option>
                                                </select>
                                                @if ($errors->has('zone'))
                                                <span class="help-block">
                                                    <strong style="color:red">{{ $errors->first('zone') }}</strong>
                                                </span>
                                            @endif
                                              </div>
                                          </div>
                            </div>
                        </div>
                
                
                       <div class="row">
                           <div class="col-sm-12 col-md-6">
                                <div class="mb-3">
                                        <label for="name" class="form-label">Extension Area</label>
                                        <input type="text" name="extension_area" class="form-control" value="{{$location->extension_area}}" id="name"
                                            aria-describedby="emailHelp">
                                        @if ($errors->has('extension_area'))
                                        <span class="help-block">
                                            <strong style="color:red">{{ $errors->first('extension_area') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                           </div>
            
                           <div class="col-sm-12 col-md-6">
                           <div class="mb-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Holding Type</label>
                                                <select name="holding_type" class="form-control" id="exampleFormControlSelect1">
                                                       <option value="" disabled>Select</option>
                                                       <?php $arr = ['Fenced Farm','Feed Lot','Dairy Farm', 'Slaughter Facility', 'Artificial Insemination Centre', 'Border Post', 'Communal', 'Establishment', 'Taxidermy']; ?>
                                                       @foreach($arr as $item)
                                                          <option value="{{ $item }}" @if($location->holding_type === $item) selected='selected' @endif> {{ $item }}</option>
                                                       @endforeach
                                                       
            
                                                </select>
                                                @if ($errors->has('holding_type'))
                                                <span class="help-block">
                                                    <strong style="color:red">{{ $errors->first('holding_type') }}</strong>
                                                </span>
                                            @endif
                                              </div>
                                          </div>
                           </div>
                       </div>
                
                        <div class="mb-3">
                            <label for="surname" class="form-label">Crush</label>
                            <input type="text" name="crush" class="form-control" value="{{$location->crush}}" id="surname">
                            @if ($errors->has('crush'))
                            <span class="help-block">
                                <strong style="color:red">{{ $errors->first('crush') }}</strong>
                            </span>
                            @endif
                        </div>

                         <button type="submit" class="btn btn-info">Save</button>
                
                    </form>
            </div>

          </div>
        </div>
      </div>
</div>