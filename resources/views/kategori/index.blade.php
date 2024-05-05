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
                    <h2>KATEGORI</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-kategori" aria-labelledby="dropdownKategoriButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                  <div class="x_content">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formKategoriModal">
                     +kategori
                  </button>
                  <a href="{{route('export-kategori')}}" class="btn btn-success">
              <i class="fa fa-file-excel"></i> Export
              </a>
              <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#formModal">
              <i class="fa fa-file-excel"></i>Import
            </button>
            </a>
                    <table id="data-kategori" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <td>No</td>
                          <td>Nama Kategori</td>
                          <td>Aksi</td>
        
                        </tr>
                      </thead>
                      <tbody>
        @foreach ($kategori as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->nama_kategori}}</td>
                <td>
                <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#formKategoriModal" data-mode="edit" data-id="{{ $p->id }}"
                        data-id="{{ $p->id}}"
                        data-nama_kategori="{{ $p->nama_kategori}}"> Ubah
                        <i class='fa fa-edit'></i>
                    </button>
                    <form action="{{ route('kategori.destroy', $p->id) }}" method="POST" class="d-inline form-delete"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-data"
                        data-id="{{ $p->id}}"
                        data-nama_kategori="{{ $p->nama_kategori}}">Hapus
                            <i class='fa fa-trash'></i>
                        </button>
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

        @include('kategori.form')
        @include('kategori.import')
@endsection


@push('script')
    <script>
      console.log('halaman kategori')
      // $('#data-kategori').DataTable()

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
      
      $('#formKategoriModal').on('show.bs.modal', function(e){
        console.log('modal kategori')
        const btn = $(e.relatedTarget)
        // console.log(btn.data('mode'))
        const mode =btn.data('mode')
        const nama_kategori =btn.data('nama_kategori')
        const id= btn.data('id')
        const modal =$(this)
      if(mode === 'edit'){
        modal.find('.modal-title').text('Edit Data kategori')
        modal.find('#nama_kategori').val(nama_kategori)
        modal.find('.modal-body form').attr('action', '{{ url("kategori") }}/'+id)
        modal.find('#method').html('@method("PATCH")')
      }else{
        modal.find('.modal-title').text('Input Data kategori')
        modal.find('#nama_kategori').val('')
        modal.find('#method').html('')
        modal.find('.modal-body form').attr('action', '{{ url("kategori") }}')
        
      }
      })
    </script>
@endpush