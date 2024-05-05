@push('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('gentelella-alela') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('gentelella-alela') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('gentelella-alela') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush

<table id="data-menu" class="table table-bordered table-striped">
    <thead>
        <tr>
            <td>No</td>
            <td>Nama Menu</td>
            <td>jenis_id</td>
            <td>harga</td>
            <td>image</td>
            <td>deskripsi</td>
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
                <td>{{ $p->image}}</td>
                <td>{{ $p->deskripsi}}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#formMenuModal" data-mode="edit" data-id="{{ $p->id }}"
                        data-nama_menu="{{ $p->nama_menu}}"
                        data-jenis_id="{{ $p->jenis_id->nama_jenis}}"
                        data-harga="{{ $p->harga}}"
                        data-image="{{ $p->image}}"
                        data-deskripsi="{{ $p->deskripsi}}">Ubah
                        <i class='fa fa-edit'></i>
                    </button>
                    <form action="{{ route('menu.destroy', $p->id) }}" method="POST" class="d-inline form-delete"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-data"
                        >Hapus
                            <i class='fa fa-trash'></i>
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
            $("#data-menu").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#data-menu .col-md-6:eq(0)');
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