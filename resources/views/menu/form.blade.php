<div class="modal fade" id="formMenuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <input type="hidden" name="old_image" id="old_image">

                    <div class="form-group row">
                        <label for="jenis_id" class="col-sm-4 col-form-label">Jenis</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="jenis_id" id="jenis_id" required>
                                <option value="">Pilih Jenis</option>
                                @foreach ($jenis as $p)
                                <option value="{{ $p->id }}">{{ $p->nama_jenis }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- <div class="form-group row">
                        <label for="jenis_id" class="col-sm-4 col-form-label">Jenis<span class="req">*</span></label>
                        <select class="form-control col-sm-8" name="jenis_id" id="jenis_id">
                            @foreach ($menu as $p)
                            <option value="{{ $p->id }}">{{ $p->nama_jenis  }}
                            <option value="">Pilih Jenis</option>
                            </option>
                            @endforeach
                        </select>
                    </div> -->

                    <div class="form-group row">
                        <label for="nama_menu" class="col-sm-4 col-form-label">Nama menu</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama_menu" id="nama_menu">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="harga" class="col-sm-4 col-form-label">Harga</label>
                        <div class="col-sm-8">
                            <input type="double" class="form-control" name="harga" value="" id="harga">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="stok" class="col-sm-4 col-form-label">Stok</label>
                        <div class="col-sm-8">
                            <input type="double" class="form-control" name="stok" id="stok">
                        </div>
                    </div>


                    <img class="img-preview img-fluid" style="max-height: 200px">
                    <div class="input-group input-group-outline my-3">
                        <input type="file" name="image" id="image" class="form-control" onchange="previewImage()">
                    </div>

                    <!-- <div class="btn-group">
                        <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                        <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" name="image" id="image">
                    </div> -->

                    <div class="form-group row">
                        <label for="deskripsi" class="col-sm-4 col-form-label"> Deskripsi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="deskripsi" value="" name="deskripsi">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
    </div>