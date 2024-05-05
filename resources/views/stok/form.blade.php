<div class="modal fade" id="formStokModal" tabindex="-1" role="dialog" aria-labelledby="formStokModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form stok</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="stok">
        @csrf
        <div id="method" class="method"></div>
        <div class="form-group row">
        <label for="nama" class="col-sm-4 col-form-label">Jumlah</label>
            <div class="col-sm-8">
            <input type="text"  class="form-control" id="jumlah" value="" name="jumlah" 
           placeholder="Jumlah">
          </div>
          <label for="nama" class="col-sm-4 col-form-label">Menu id</label>
            <div class="col-sm-8">
            <input type="text"  class="form-control" id="menu_id" value="" name="menu_id" 
           placeholder="Menu_id">
          </div>
        </div>      
        <div class="form-group row">
        </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>