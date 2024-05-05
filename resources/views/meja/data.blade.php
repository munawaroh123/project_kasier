@push('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('gentelella-alela') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('gentelella-alela') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('gentelella-alela') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush

<table id="data-meja" class="table table-bordered table-striped">
    <thead>
        <tr>
            <td>No</td>
            <td>Nomor</td>
            <td>kapasitas</td>
            <td>Status</td>
            <td>Aksi</td>
        
        </tr>
    </thead>
    <tbody>
        @foreach ($meja as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->nomor}}</td>
                <td>{{ $p->kapasitas}}</td>
                <td>{{ $p->status}}</td>
                <td>
                <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#formMejaModal" data-mode="edit" data-id="{{ $p->id }}"
                        data-nomor="{{ $p->nomor}}"
                        data-kapasitas="{{ $p->kapasitas}}"
                        data-status="{{ $p->status}}">
                        <i class='fa fa-edit'></i>edit
                    </button>
                    <form action="{{ route('meja.destroy', $p->id) }}" method="POST" class="d-inline form-delete"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')   
                            <button type="submit" class="btn btn-danger delete-data" data-id="{{ $p->id}}" data-nomor="{{ $p->nomor}}" data-kapasitas="{{ $p->kapasitas}}" data-status="{{ $p->status}}">
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
            $("#data-meja").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#data-meja .col-md-6:eq(0)');
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