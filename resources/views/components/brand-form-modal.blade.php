<div>
               <!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#brand-add">
  Add Brand
</button>

<!-- Modal -->
<div class="modal fade" id="brand-add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Brand Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="/brand/register">
      <div class="modal-body">
     
              @csrf
              <div class="form-group">
                <label for="exampleFormControlSelect1">Shape</label>
                <select name="shape" class="form-control" id="exampleFormControlSelect1" required>
                <option selected disabled>Select Brand Shape</option>
                <option value="Individual">Square</option>
                <option value="Triangle">Triangle</option>
                <option value="Inverted-Triangle">Inverted-Triangle</option>
                <option value="Inline">Inline</option>
                <option value="Vertical">Vertical</option> 
                
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Brand/Tshipi</label>
               <input class="form-control" type="text" name="brand" id="" required>
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