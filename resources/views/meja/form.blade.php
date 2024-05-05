<div class="modal fade" id="formMejaModal" tabindex="-1" role="dialog" aria-labelledby="formMejaModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form meja</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="meja">
        @csrf
        <div id="method" class="method"></div>
        <div class="form-group row">
        <label for="nomor" class="col-sm-4 col-form-label">Nomor</label>
            <div class="col-sm-8">
            <input type="text"  class="form-control" id="nomor" value="" name="nomor" 
           placeholder="Nomor">
          </div>
          <label for="kapasitas" class="col-sm-4 col-form-label">Kapasitas</label>
            <div class="col-sm-8">
            <input type="text"  class="form-control" id="kapasitas" value="" name="kapasitas" 
           placeholder="Kapasitas">
          </div>
          <label for="status" class="col-sm-4 col-form-label">Status</label>
            <div class="col-sm-8">
            <input type="text"  class="form-control" id="status" value="" name="status" 
           placeholder="Status">
          </div>
        </div>      
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>