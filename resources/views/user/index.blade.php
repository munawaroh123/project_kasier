@extends('templates.layout')
@push('style')
@endpush
@section('content')

<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>User</h3>
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
                <div class="dropdown-user" aria-labelledby="dropdownUserButton">
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

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formUserModal">
              tambah user
            </button>
            </a>
            <table id="data-user" class="table table-bordered table-striped">
              <thead>
                <tr>

                  <td>No</td>
                  <td>Name</td>
                  <td>Jk</td>
                  <td>Tgl_lahir</td>
                  <td>Email</td>
                  <td>Nomor_telepon</td>
                  <td>Alamat</td>
                  <td>role</td>
                  <td>Aksi</td>

                </tr>
              </thead>
              <tbody>
                @foreach ($user as $p)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $p->name}}</td>
                  <td>{{$p->jk}}</td>
                  <td>{{ $p->tgl_lahir}}</td>
                  <td>{{ $p->email}}</td>
                  <td>{{ $p->nomor_telepon}}</td>
                  <td>{{ $p->alamat}}</td>
                  <td>{{ $p->role}}</td>
                  <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formUserModal" data-mode="edit" data-id="{{ $p->id}}" data-name="{{ $p->name}}" data-jk="{{ $p->jk}}" data-tgl_lahir="{{ $p->tgl_lahir}}" data-email="{{ $p->email}}" data-nomor_telepon="{{ $p->nomor_telepon}}" data-alamat="{{ $p->alamat}}"  data-role="{{ $p->role}}" >Ubah
                      <i class='fa fa-edit'></i>
                    </button>
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
@include('user.form')


@endsection




@push('script')
<script>
  console.log('halaman user')
  // $('#data-user').DataTable();

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

  $('#formUserModal').on('show.bs.modal', function(e) {
    console.log('modal user')
    const btn = $(e.relatedTarget)
    // console.log(btn.data('mode'))
    const mode = btn.data('mode')
    const name = btn.data('name')
    const jk = btn.data('jk')
    const tgl_lahir = btn.data('tgl_lahir')
    const email = btn.data('email')
    const password = btn.data('password')
    const nomor_telepon = btn.data('nomor_telepon')
    const alamat = btn.data('alamat')
    const role = btn.data('role')
    const id = btn.data('id')
    const modal = $(this)
    if (mode === 'edit') {
      modal.find('.modal-title').text('Edit Data menu')
      modal.find('#name').val(name)
      modal.find('#jk').val(jk)
      modal.find('#tgl_lahir').val(tgl_lahir)
      modal.find('#email').val(email)
      modal.find('#password').val(password)
      modal.find('#nomor_telepon').val(nomor_telepon)
      modal.find('#alamat').val(alamat)
      modal.find('#role').val(role)
      modal.find('.modal-body form').attr('action', '{{ url("user") }}/' + id)
      modal.find('#method').html('@method("PATCH")')
    } else {
      modal.find('.modal-title').text('Input Data user')
      modal.find('#name').val('')
      modal.find('#jk').val('')
      modal.find('#tgl_lahir').val('')
      modal.find('#email').val('')
      modal.find('#password').val('')
      modal.find('#nomor_telepon').val('')
      modal.find('#alamat').val('')
      modal.find('#role').val('')
      modal.find('.img-preview').attr('src', '')
      modal.find('#method').html('')
      modal.find('.modal-body form').attr('action', '{{ url("user") }}')

    }
  })

</script>


@endpush