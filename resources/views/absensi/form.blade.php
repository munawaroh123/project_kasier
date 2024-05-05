<div class="modal fade" id="formAbsensiModal" tabindex="-1" role="dialog" aria-labelledby="formAbsensiModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form absensi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="absensi">
        @csrf
        <div id="method" class="method"></div>
        <div class="form-group row">
        <label for="nama_karyawan" class="col-sm-4 col-form-label">Nama karyawan</label>
            <div class="col-sm-8">
            <input type="text"  class="form-control" id="nama_karyawan" value="" name="nama_karyawan" 
           placeholder="Nama karyawan">
          </div>
          <label for="tanggal_masuk" class="col-sm-4 col-form-label">Tanggal masuk</label>
            <div class="col-sm-8">
            <input type="date"  class="form-control" id="tanggal_masuk" value="" name="tanggal_masuk" 
           placeholder="Tanggal masuk">
          </div>
          <label for="waktu_masuk" class="col-sm-4 col-form-label">Waktu masuk</label>
            <div class="col-sm-8">
            <input type="time"  class="form-control" id="waktu_masuk" value="" name="waktu_masuk" 
           placeholder="Waktu masuk">
          </div>
          <label for="status" class="col-sm-4 col-form-label">Status</label>
            <div class="form-group 8">
            <select class="form-control col-sm-8" name="status" id="status"
            placeholder="Status">
              <option value="masuk">masuk</option>
              <option value="sakit">sakit</option>
              <option value="cuti">cuti</option>
            </select> 
          </div>
          <label for="waktu_kerja" class="col-sm-4 col-form-label">Waktu kerja</label>
            <div class="col-sm-8">
            <input type="text"  class="form-control" id="waktu_kerja" value="" name="waktu_kerja" 
           placeholder="Waktu kerja">
          </div>
        </div>      
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>