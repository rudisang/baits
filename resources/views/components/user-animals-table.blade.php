<div>
    @if ($errors->has('keeper_id'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ $errors->first('keeper_id') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
@endif

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
        <table class="table my-3">
          <thead class="thead-dark">
            <tr>
              <th scope="col">EID</th>
              <th scope="col">AID</th>
              <th scope="col">Sex</th>
              <th scope="col">Colour</th>
              <th scope="col">Species</th>
              <th scope="col">Breed</th>
              <th scope="col">Age</th>
              <th scope="col">Brand</th>
              <th scope="col"><form method="GET" action="/dashboard"><input class="form-control" placeholder="search animal" type="search" name="search-animal" id=""></form></th>
            </tr>
          </thead>
          <tbody>
              @foreach($animals as $animal)
   
             @if(Auth::user()->brand->id == $animal->brand->id)
             <tr>
                    <th scope="row">{{$animal->eid}}</th>
                    <td>{{$animal->analogue_id}}</td>
                    <td>{{$animal->sex}}</td>
                    <td>{{$animal->colour}}</td>
                    <td>{{$animal->species}}</td>
                    <td>{{$animal->breed}}</td>
                    <td>@if(intval($animal->age/12) > 0) @if(intval($animal->age/12) > 1){{intval($animal->age/12)}}years @else{{intval($animal->age/12)}}year @endif @else @endif @if($animal->age%12 > 0) @if($animal->age%12 > 1){{$animal->age%12}}months @else{{$animal->age%12}}month @endif @else @endif</td>
                    <td>{{$animal->brand->brand}}</td>
                    <td> <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#t{{$animal->id}}">
                      Transfer
                    </button> <a href="/animal/edit/{{$animal->id}}" class="btn btn-warning">Edit</a></td>
                  </tr>
             @endif
             <!-- Button trigger modal -->
     

            <!-- Modal -->
            <div class="modal fade" id="t{{$animal->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$animal->eid}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <form action="/transfer/request/" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="">Recipient Keeper ID</label>
                      <input type="text" placeholder="" name="keeper_id" class="form-control" required>
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
            
                    <input type="hidden" name="eid" value="{{$animal->eid}}">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Request Transfer</button>
                  </div>
                </form>
                </div>
              </div>
            </div>
         
  
              @endforeach
  
      
   
          </tbody>
        </table>
  </div>