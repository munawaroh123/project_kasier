@extends('templates.layout')

@push('style')

@endpush

@section('content')
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Produk</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-produk" aria-labelledby="dropdownProdukButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formProdukModal">
                    Tambah produk
                  </button>
                    <table id="data-produk" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                        <td>No</td>
                       <td>Nama Produk</td>
                       <td>Nama Supplier</td>
                      <td>harga beli</td>
                      <td>harga jual</td>
                      <td>stok</td>
                      <td>Aksi</td>
        
                        </tr>
                      </thead>
                      <tbody>
        @foreach ($produk as $p)
            <tr>
            <td>{{ $loop->iteration }}</td>
                <td>{{ $p->nama_produk}}</td>
                <td>{{ $p->nama_supplier}}</td>
                <td>{{ $p->harga_beli}}</td>
                <td>{{ $p->harga_jual}}</td>
                <td>{{ $p->stok}}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#formProdukModal" data-mode="edit" data-id="{{ $p->id }}"
                        data-id="{{ $p->id}}"
                        data-nama_produk="{{ $p->nama_produk}}"
                        data-nama_supplier="{{ $p->nama_supplier}}"
                        data-harga_beli="{{ $p->harga_beli}}"
                        data-harga_jual="{{ $p->harga_jual}}"
                        data-stok="{{ $p->stok}}"> Ubah
                        <i class='fa fa-edit'></i>
                    </button>
                    </button>
                    <form action="produk/{{ $p->id }}" method="POST" class="d-inline form-delete"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                     <button type="submit" class="btn btn-danger delete-data"
                        data-id="{{ $p->id}}">Hapus</button>
                    </form>

                  </td>
               </tr>
        @endforeach
    </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        @include('produk.form')
@endsection


@push('script')
    <script>
      console.log('halaman produk')
      // $('#data-produk').DataTable()

        $('.alert-success').fadeTo(2000, 500).slideUp(500, function(){
            $('.alert-success').slideUp(500)
        })

      $('.delete-data').on('click', function(e){
        // preventDefault()
        let data = $(this).closest('tr').find('td:eq(1)').text()
        Swal.fire({
          html: `Apakah data <span style="color:red">${data}</span> akan dihapus??`,
          title: "Hapus data",
          icon: 'error',
          showDenyButton: true,
          confirmButton: 'Ya',
          denyButtonText: 'Tidak' ,
          focusConfirm: false         
        }).then((result)=>{
          if(result.isConfirmed)
            $(e.target).closest('form').submit()
          else swal.close()
        })

      })
      
      $('#formProdukModal').on('show.bs.modal', function(e){
        console.log('modal produk')
        const btn = $(e.relatedTarget)
        // console.log(btn.data('mode'))
        const mode =btn.data('mode')
        const nama_produk =btn.data('nama_produk')
        const nama_supplier =btn.data('nama_supplier')
        const harga_beli =btn.data('harga_beli')
        const harga_jual =btn.data('harga_jual')
        const stok =btn.data('stok')
        const id= btn.data('id')
        const modal =$(this)
      if(mode === 'edit'){
        modal.find('.modal-title').text('Edit Data produk')
        modal.find('#nama_produk').val(nama_produk)
        modal.find('#nama_supplier').val(nama_supplier)
        modal.find('#harga_beli').val(harga_beli)
        modal.find('#harga_jual').val(harga_jual)
        modal.find('#stok').val(stok)
        modal.find('.modal-body form').attr('action', '{{ url("produk") }}/'+id)
        modal.find('#method').html('@method("PATCH")')
      }else{
        modal.find('.modal-title').text('Input Data produk')
        modal.find('#nama_produk').val('')
        modal.find('#nama_supplier').val('')
        modal.find('#harga_beli').val('')
        modal.find('#harga_jual').val('')
        modal.find('#stok').val('')
        modal.find('#method').html('')
        modal.find('.modal-body form').attr('action', '{{ url("produk") }}')
        
      }
      })
    </script>
@endpush