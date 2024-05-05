@push('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('gentelella-alela') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('gentelella-alela') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('gentelella-alela') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush

<table id="data-stok" class="table table-bordered table-striped">
    <thead>
        <tr>
            <td>No</td>
            <td>Jumlah </td>
            <td>Menu Id </td>
            <td>Aksi</td>
        
        </tr>
    </thead>
    <tbody>
        @foreach ($stok as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->jumlah}}
                <td>{{ $p->menu_id}}
                <td>{{ $p->almat}}
                </td>
                <td>
                <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#formStokModal" data-mode="edit" data-id="{{ $p->id }}"
                        data-nama="{{ $p->nama}}"
                        data-email="{{ $p->email}}"
                        data-no_telp="{{ $p->no_telp}}"
                        data-alamat="{{ $p->alamat}}" >
                        <i class='fa fa-edit'></i>edit
                    </button>
                    <form action="{{ route('stok.destroy', $p->id) }}" method="POST" class="d-inline form-delete"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')   
                            <button type="submit" class="btn btn-danger delete-data" data-id="{{ $p->id}}" data-jumlah="{{ $p->jumlah}} data-menu_id="{{ $p->menu_id}}">
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
            $("#data-stok").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#data-stok .col-md-6:eq(0)');
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