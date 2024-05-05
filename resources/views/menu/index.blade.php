@extends('templates.layout')

@push('style')

@endpush

@section('content')

<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Menu</h3>
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
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
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

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formMenuModal">
              +Menu
            </button>
            <a href="{{route('export-menu')}}" class="btn btn-success">
              <i class="fa fa-file-excel"></i> Export
            </a>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#formModal">
              <i class="fa fa-file-excel"></i>Import
            </button>
            </a>
            <table id="data-menu" class="table table-bordered table-striped">
              <thead>
                <tr>

                  <td>No</td>
                  <td>Nama Menu</td>
                  <td>Jenis_id</td>
                  <td>Harga</td>
                  <td>Stok</td>
                  <td>Image</td>
                  <td>Deskripsi</td>
                  <td>Aksi</td>

                </tr>
              </thead>
              <tbody>
                @foreach ($menu as $p)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $p->nama_menu}}</td>
                  <td>{{ optional($p->jenis)->nama_jenis }}</td>
                  <td>{{ $p->harga}}</td>
                  <td>{{ $p->stok}}</td>
                  <td><img class="img-fluid" style="max-width: 200px;" src="{{ asset('storage/menu-image/' .$p->image)}}" alt="tidak ada gambar"></td>
                  <td>{{ $p->deskripsi}}</td>

                  <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formMenuModal" data-mode="edit" data-id="{{ $p->id}}" data-nama_menu="{{ $p->nama_menu}}" data-jenis_id="{{ $p->jenis_id}}" data-harga="{{ $p->harga}}" data-stok="{{ $p->stok}}" data-image="{{ $p->image}}" data-deskripsi="{{ $p->deskripsi}}">Ubah
                      <i class='fa fa-edit'></i>
                    </button>
                    <form action="{{ route('menu.destroy', $p->id) }}" method="POST" class="d-inline form-delete" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger delete-data">Hapus
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
@include('menu.form')
@include('menu.import')

@endsection




@push('script')
<script>
  console.log('halaman menu')
  // $('#data-menu').DataTable();

  $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
    $('.alert-success').slideUp(500)
  })

  $('.delete-data').on('click', function(e) {
    // preventDefault()
    let data = $(this).closest('tr').find('td:eq(1)').text()
    Swal.fire({
      html: `Apakah data <span style="color:red">${data}</span> akan dihapus??`,
      title: "Hapus data",
      icon: 'error',
      showDenyButton: true,
      confirmButton: 'Ya',
      denyButtonText: 'Tidak',
      focusConfirm: false
    }).then((result) => {
      if (result.isConfirmed)
        $(e.target).closest('form').submit()
      else swal.close()
    })

  })

  $('#formMenuModal').on('show.bs.modal', function(e) {
    console.log('modal menu')
    const btn = $(e.relatedTarget)
    // console.log(btn.data('mode'))
    const mode = btn.data('mode')
    const nama_menu = btn.data('nama_menu')
    const jenis_id = btn.data('jenis_id')
    const harga = btn.data('harga')
    const stok = btn.data('stok')
    const image = btn.data('image')
    const deskripsi = btn.data('deskripsi')
    const id = btn.data('id')
    const modal = $(this)
    if (mode === 'edit') {
      modal.find('.modal-title').text('Edit Data menu')
      modal.find('#nama_menu').val(nama_menu)
      modal.find('#jenis_id').val(jenis_id)
      modal.find('#harga').val(harga)
      modal.find('#stok').val(stok)
      modal.find('#old-image').val(image)
      modal.find('#deskripsi').val(deskripsi)
      modal.find('.img-preview').attr('src', '{{asset("storage/menu-image")}}/' + image)
      modal.find('.modal-body form').attr('action', '{{ url("menu") }}/' + id)
      modal.find('#method').html('@method("PATCH")')
    } else {
      modal.find('.modal-title').text('Input Data menu')
      modal.find('#nama_menu').val('')
      modal.find('#jenis_id').val('')
      modal.find('#harga').val('')
      modal.find('#stok').val('')
      modal.find('#image').val('')
      modal.find('#deskripsi').val('')
      modal.find('.img-preview').attr('src', '')
      modal.find('#method').html('')
      modal.find('.modal-body form').attr('action', '{{ url("menu") }}')

    }
  })

  function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>


@endpush