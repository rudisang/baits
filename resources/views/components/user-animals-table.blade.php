<div>
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
                    <td>{{$animal->age}}</td>
                    <td>{{$animal->brand->brand}}</td>
                    <td><a href="/animal/edit/{{$animal->id}}" class="btn btn-warning">Edit</a></td>
                  </tr>
             @endif
         
  
              @endforeach
  
      
   
          </tbody>
        </table>
  </div>