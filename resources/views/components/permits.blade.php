
        @if ($errors->has('validity'))
        <span class="help-block">
            <strong style="color:red">{{ $errors->first('validity') }}</strong>
        </span>
    @endif

    @if ($errors->has('action'))
    <span class="help-block">
        <strong style="color:red">{{ $errors->first('action') }}</strong>
    </span>
@endif
       <table class="table my-3">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col">Origin</th>
                    <th scope="col">Destination</th>
                    <th scope="col">Animals</th>
                    <th scope="col">Status</th>
                    <th scope="col">Is Interzonal</th>
                    <th scope="col">Files</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($permits as $permit)
         
            
              <tr>
                <th scope="row">{{$permit->from}}</th>
                <td>{{$permit->to}}</td>
                <td>{{$permit->location_origin}}</td>
                <td>{{$permit->location_destination}}</td>
                @php $arr = json_decode($permit->animal); @endphp
                <td class="card-text">
                  @foreach($arr as $animal)
                  {{$animal}}, 
                  @endforeach
                </td>
            <td>@if($permit->status == 0) <a class="btn btn-warning">Pending </a> @elseif($permit->status == 1)<a class="btn btn-primary">Approved @else <a class="btn btn-danger">Rejected </a>@endif </a></td>
                <td>@if($permit->is_interzonal) <a class="btn btn-success">Yes</a> @else<a class="btn btn-warning">No </a> @endif</td>
                <td><a href="" class="btn btn-info" data-toggle="modal" data-target="#viewfiles{{$permit->id}}">view</a></td>
            <td><a href="" class="btn btn-outline-info" data-toggle="modal" data-target="#action{{$permit->id}}">Action</a></td>
              
              </tr>
            
              <div class="modal fade" id="viewfiles{{$permit->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Files</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                          <div class="carousel-item active">
                                            <img class="d-block w-100" src="{{asset('documents/'.$permit->omang)}}" alt="First slide">
                                          </div>
                                          <div class="carousel-item">
                                            <img class="d-block w-100" src="{{asset('documents/'.$permit->affidavit)}}" alt="Second slide">
                                          </div>
                                          <div class="carousel-item">
                                            <img class="d-block w-100" src="{{asset('documents/'.$permit->other_docs)}}" alt="Third slide">
                                          </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                          <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                          <span class="sr-only">Next</span>
                                        </a>
                                      </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div> 
      
                  <div class="modal fade" id="action{{$permit->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Take Action</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="/permit/action/{{$permit->id}}" method="post">
                                {{ method_field('PATCH') }}
                            @csrf

                            <div class="form-group">
                                <select class="form-control" name="action" id="">
                                    <option value="" selected disabled>Select Action</option>
                                    <option value="1">Approve</option>
                                    <option value="2">Reject</option>
                                </select>
                            </div>

                            <div class="form-group"><input type="date" name="validity" class="form-control"></div>
                           
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-info">Save</button>
                            </div>
                        </form>
                          </div>
                        </div>
                      </div>
        
                    @endforeach
        
            
         
                </tbody>
              </table>
        </div>