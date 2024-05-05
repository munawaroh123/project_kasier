<div class="modal fade" id="formProdukModal" tabindex="-1" role="dialog" aria-labelledby="formProdukModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="produk">
        @csrf
        <div id="method" class="method"></div>

        <div class="form-group row">
        <label for="nama_produk" class="col-sm-4 col-form-label">Nama produk</label>
            <div class="col-sm-8">
            <input type="text"  class="form-control" id="nama_produk" value="" name="nama_produk" 
           placeholder="nama produk">
          </div>
          <label for="nama_supplier" class="col-sm-4 col-form-label">Nama supplier</label>
            <div class="col-sm-8">
            <input type="text"  class="form-control" id="nama_supplier" value="" name="nama_supplier" 
           placeholder="nama supplier">
          </div>
          <label for="harga_beli" class="col-sm-4 col-form-label">Harga beli</label>
            <div class="col-sm-8">
            <input type="text"  class="form-control" id="harga_beli" value="" name="harga_beli" 
           placeholder="harga beli">
          </div>
          <label for="harga_jual" class="col-sm-4 col-form-label">Harga jual</label>
            <div class="col-sm-8">
            <input type="text"  class="form-control" id="harga_jual" value="" name="harga_jual" 
           placeholder="harga jual">
          </div>
          <label for="stok" class="col-sm-4 col-form-label">stok</label>
            <div class="col-sm-8">
            <input type="text"  class="form-control" id="stok" value="" name="stok" 
           placeholder="stok">
          </div>
        </div>      
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>