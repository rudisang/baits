
        <table class="table my-3">
          <thead class="thead-dark">
            <tr>
              <th scope="col">EID</th>
              <th scope="col">From</th>
              <th scope="col">To</th>
              <th scope="col">Old Brand</th>
              <th scope="col">Old Brand Shape</th>
              <th scope="col">Affidavit</th>
              <th scope="col">Omang</th>
              <th scope="col">Other</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
              @foreach($requests as $request)
   
   @if(!$request->status)
   <tr>
    <th scope="row">{{$request->eid}}</th>
    <td>{{$request->user->name}} {{$request->user->surname}}</td>
    <td>{{$request->to_id}}</td>
    <td>{{$request->old_brand}}</td>
    <td>{{$request->old_brand_shape}}</td>
    <td><a href="" class="btn btn-info" data-toggle="modal" data-target="#viewaffidavit">view</a></td>
    <td><a href="" class="btn btn-info" data-toggle="modal" data-target="#viewomang">view</a></td>
    <td><a href="" class="btn btn-info" data-toggle="modal" data-target="#viewother">view</a></td>
    <td><a href="" class="btn btn-warning" data-toggle="modal" data-target="#takeaction">Action</a></td>
  </tr>
   @endif
             <!-- Button trigger modal -->
             <div class="modal fade bd-example-modal-lg" id="viewaffidavit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Affidavit</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <img src="{{asset('documents/'.$request->affidavit)}}" alt="">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="viewomang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Omang</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <img src="{{asset('documents/'.$request->omang)}}" alt="">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="viewother" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Other</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <img src="" alt="">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="takeaction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Transfer Action</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <form action="/request/action/{{$request->id}}" method="post">
                        {{ method_field('PATCH') }}
                        @csrf
                         <div class="form-group">
                            <select name="action" id="" class="form-control">
                                <option value=""disabled selected>Select Action</option>
                                <option value="1">Approve</option>
                            </select>
                         </div>
                     
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-info" >Save</button>
                    </div>
                </form>
                  </div>
                </div>
              </div>
  
              @endforeach
  
      
   
          </tbody>
        </table>
  </div>