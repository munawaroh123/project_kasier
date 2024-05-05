<div class="modal fade" id="formUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="exampleModalLabel">Tambah Barang</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div id="method"></div>



                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jk" class="col-sm-4 col-form-label">Jk</label>
                        <div class="col-sm-8">
                            <select class="form-control col-sm-8" name="jk" id="jk">
                            <option value="">Pilih jenis kelamin</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tgl_lahir" class="col-sm-4 col-form-label">tgl_lahir</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir">
                        </div>
                    </div>

                    
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">email</label>
                        <div class="col-sm-8">
                            <input type="double" class="form-control" name="email" id="email">
                        </div>
                    </div>

                        
                    <div class="form-group row">
                        <label for="password" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nomor_telepon" class="col-sm-4 col-form-label">nomor_telepon</label>
                        <div class="col-sm-8">
                            <input type="double" class="form-control" name="nomor_telepon" id="nomor_telepon">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat" class="col-sm-4 col-form-label">alamat</label>
                        <div class="col-sm-8">
                            <input type="textarea" class="form-control" name="alamat" id="alamat">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="role" class="col-sm-4 col-form-label">role</label>
                        <div class="col-sm-8">
                            <input type="double" class="form-control" name="role" id="role">
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
    </div>