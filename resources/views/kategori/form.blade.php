<div class="modal fade" id="formKategoriModal" tabindex="-1" role="dialog" aria-labelledby="formKategoriModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="kategori">
        @csrf
        <div id="method" class="method"></div>
        <div class="form-group row">
        <label for="nama_kategori" class="col-sm-4 col-form-label">Nama Kategori</label>
            <div class="col-sm-8">
            <input type="text"  class="form-control" id="nama_kategori" value="" name="nama_kategori" 
           placeholder="Nama kategori">
          </div>
        </div>      
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>