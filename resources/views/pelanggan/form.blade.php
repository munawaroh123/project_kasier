<div class="modal fade" id="formPelangganModal" tabindex="-1" role="dialog" aria-labelledby="fromPelangganModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form pelanggan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="pelanggan">
        @csrf
        <div id="method" class="method"></div>
        <div class="form-group row">
        <label for="nama" class="col-sm-4 col-form-label">Nama</label>
            <div class="col-sm-8">
            <input type="text"  class="form-control" id="nama" value="" name="nama" 
           placeholder="Nama">
          </div>
        </div>      
        <div class="form-group row">
        <label for="email" class="col-sm-4 col-form-label">Email</label>
            <div class="col-sm-8">
            <input type="text"  class="form-control" id="email" value="" name="email" 
           placeholder="email">
          </div>
        </div>      
        <div class="form-group row">
        <label for="no_telp" class="col-sm-4 col-form-label">No_telp</label>
            <div class="col-sm-8">
            <input type="text"  class="form-control" id="no_telp" value="" name="no_telp" 
           placeholder="no_telp">
          </div>
        </div>      
        <div class="form-group row">
        <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
            <div class="col-sm-8">
            <input type="text"  class="form-control" id="alamat" value="" name="alamat" 
           placeholder="alamat">
          </div>
          
        </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>