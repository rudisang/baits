<div>
        <form method="POST" action="/location/register">
            @csrf
            <div class="row">
    
                <div class="col-sm-12 col-md-6">
                <div class="mb-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">District</label>
                            <select name="district" class="form-control" id="exampleFormControlSelect1">
                                    <option value="" disabled selected>Select District</option>
                                    <option value="Chobe">Chobe</option>
                                    <option value="Ngamiland">Ngamiland</option>
                                    <option value="Central">Central</option>
                                    <option value="North East">North East</option>
                                    <option value="Ghanzi">Ghanzi</option>
                                    <option value="Kweneng">Kweneng</option>
                                    <option value="Kgatleng">Kgatleng</option>
                                    <option value="South East">South East</option>
                                    <option value="Southern">Southern</option>
                                    <option value="Kgalagadi">Kgalagadi</option>
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
                            <input type="text" name="extension_area" class="form-control" value="{{old('extension_area')}}" id="name"
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
                                           <option value="" disabled selected>Select</option>
                                           <option value="Fenced Farm">Fenced Farm</option>
                                           <option value="Feed Lot">Feed Lot</option>
                                           <option value="Dairy Farm">Dairy Farm</option>
                                           <option value="Slaughter Facility">Slaughter Facility</option>
                                           <option value="Artificial Insemination Centre">Artificial Insemination Centre</option>
                                           <option value="Border Post">Border Post</option>
                                           <option value="Communal">Communal</option>
                                           <option value="Establishment">Establishment</option>
                                           <option value="Taxidermy">Taxidermy</option>
                                           

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
                <input type="text" name="crush" class="form-control" value="{{old('crush')}}" id="surname">
                @if ($errors->has('crush'))
                <span class="help-block">
                    <strong style="color:red">{{ $errors->first('crush') }}</strong>
                </span>
                @endif
            </div>
    <button type="submit" class="btn btn-info">Save</button>
    
        </form>
    </div>