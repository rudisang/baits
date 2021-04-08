<div>
               <!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#keeper-apply">
  Register Keeper ID
</button>

<!-- Modal -->
<div class="modal fade" id="keeper-apply" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Keeper Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="/keeper/register">
      <div class="modal-body">
     
              @csrf
              <div class="form-group">
                <label for="exampleFormControlSelect1">Account Type</label>
                <select name="type" class="form-control" id="exampleFormControlSelect1">
                <option selected disabled>Select Keeper Type</option>
                <option value="Individual">Individual</option>
                <option value="Organization">Organization</option>
                </select>
            </div>
              
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" href="" class="btn btn-info">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>