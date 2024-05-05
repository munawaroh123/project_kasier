@push('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('gentelella-alela') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('gentelella-alela') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('gentelella-alela') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush

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
                        data-nama_karyawan="{{ $p->nama_karyawan}}"
                        data-tanggal_masuk="{{ $p->tanggal_masuk}}"
                        data-tanggal_masuk="{{ $p->waktu_masuk}}"
                        data-tanggal_masuk="{{ $p->status}}"
                        data-tanggal_masuk="{{ $p->waktu_kerja}}">
                        <i class='fa fa-edit'></i>edit
                    </button>
                    <form action="{{ route('absensi.destroy', $p->id) }}" method="POST" class="d-inline form-delete"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')   
                            <button type="submit" class="btn btn-danger delete-data" data-id="{{ $p->id}}" data-nama_karyawan="{{ $p->nama_karyawan}}"  data-tanggal_masuk="{{ $p->tanggal_masuk}}" data-waktu_masuk="{{ $p->waktu_masuk}}" data-status="{{ $p->status}}" data-waktu_kerja="{{ $p->waktu_kerja}}" >
                            <i class='fa fa-trash'></i>Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@push('script')
@endpush
@push('script')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('gentelella-alela') }}/plugins/jquery/jquery.min.js"></script>
    <script src="{{ asset('gentelella-alela') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('gentelella-alela') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('gentelella-alela') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('gentelella-alela') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('gentelella-alela') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('gentelella-alela') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('gentelella-alela') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('gentelella-alela')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('gentelella-alela') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('gentelella-alela') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script>
        $(function() {
            $("#data-absensi").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#data-absensi .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush