@extends('templates.layout')

@push('style')

@endpush

@section('content')
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Absensi</h3>
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
                  <div class="x_content">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formAbsensiModal">
                    + Absensi
                  </button>
                  <a href="{{route('export-absensi')}}" class="btn btn-success">
              <i class="fa fa-file-excel"></i> Export
              </a>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#formModal">
              <i class="fa fa-file-excel"></i>Import
            </button>
            
              <a href="{{route('absensi-pdf')}}" class="btn btn-danger btn-icon-split mr-3">
              <span class="icon text-white-50">
              <i class="fa fa-file-pdf"> </i>
              </span>
              <span class="text">Pdf</span>
       
            </a>
                    <table id="data-absensi" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                        <td>No</td>
                        <td>Nama Karyawan</td>
                        <td>Tanggal Masuk</td>
                        <td>Waktu Masuk</td>
                        <td>Status</td>
                        <td>Waktu Kerja</td>
                        <td>Aksi</td>
        
                        </tr>
                      </thead>
                      <tbody>
        @foreach ($absensi as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->nama_karyawan}}</td>
                <td>{{ $p->tanggal_masuk}}</td>
                <td>{{ $p->waktu_masuk}}</td>
                <td>{{ $p->status}}</td>
                <td>{{ $p->waktu_kerja}}</td>
                
                <td>
                <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#formAbsensiModal" data-mode="edit" data-id="{{ $p->id }}"
                        data-id="{{ $p->id}}"
                        data-nama_karyawan="{{ $p->nama_karyawan}}"
                        data-tanggal_masuk="{{ $p->tanggal_masuk}}"
                        data-waktu_masuk="{{ $p->waktu_masuk}}"
                        data-status="{{ $p->status}}"
                        data-waktu_kerja="{{ $p->waktu_kerja}}"> Ubah
                        <i class='fa fa-edit'></i>
                    </button>
                    <form action="{{ route('absensi.destroy', $p->id) }}" method="POST" class="d-inline form-delete"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-data"
                        data-id="{{ $p->id}}"
                        data-nama_karyawan="{{ $p->nama_karyawan}}"
                        data-tanggal_masuk="{{ $p->tanggal_masuk}}"
                        data-tanggal_masuk="{{ $p->waktu_masuk}}"
                        data-tanggal_masuk="{{ $p->status}}"
                        data-tanggal_masuk="{{ $p->waktu_kerja}}">Hapus
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

        @include('absensi.form')
        @include('absensi.import')
@endsection


@push('script')
    <script>
      console.log('halaman absensi')
      // $('#data-absensi').DataTable()

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
      
      $('#formAbsensiModal').on('show.bs.modal', function(e){
        console.log('modal absensi')
        const btn = $(e.relatedTarget)
        // console.log(btn.data('mode'))
        const mode =btn.data('mode')
        const nama_karyawan =btn.data('nama_karyawan')
        const tanggal_masuk =btn.data('tanggal_masuk')
        const waktu_masuk =btn.data('waktu_masuk')
        const status =btn.data('status')
        const waktu_kerja =btn.data('waktu_kerja')
        const id= btn.data('id')
        const modal =$(this)
      if(mode === 'edit'){
        modal.find('.modal-title').text('Edit Data absensi')
        modal.find('#nama_karyawan').val(nama_karyawan)
        modal.find('#tanggal_masuk').val(tanggal_masuk)
        modal.find('#waktu_masuk').val(waktu_masuk)
        modal.find('#status').val(status)
        modal.find('#waktu_kerja').val(waktu_kerja)
        modal.find('.modal-body form').attr('action', '{{ url("absensi") }}/'+id)
        modal.find('#method').html('@method("PATCH")')
      }else{
        modal.find('.modal-title').text('Input Data absensi')
        modal.find('#nama_karyawan').val('')
        modal.find('#tanggal_masuk').val('')
        modal.find('#waktu_masuk').val('')
        modal.find('#status').val('')
        modal.find('#waktu_kerja').val('')
        modal.find('#method').html('')
        modal.find('.modal-body form').attr('action', '{{ url("absensi") }}')
        
      }
      })
    </script>
@endpush