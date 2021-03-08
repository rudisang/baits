<div>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Account</th>
            <th scope="col"><form method="GET" action="/dashboard"><input class="form-control" placeholder="search" type="search" name="search" id=""></form></th>
          </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            @if($user->id !== Auth::user()->id)
            <tr>
              <th scope="row">{{$user->id}}</th>
              <td>{{$user->name}} {{$user->surname}}</td>
              <td>{{$user->role->role}}</td>
              <td><a href="/dashboard/account/user/{{$user->id}}" class="btn btn-warning">Edit</a></td>
            </tr>
            @endif

            @endforeach

    
 
        </tbody>
      </table>
</div>