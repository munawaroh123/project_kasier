@push('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('gentelella-alela') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('gentelella-alela') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('gentelella-alela') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush

<table id="data-user" class="table table-bordered table-striped">
    <thead>
        <tr> 
                  <td>no</td>
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
                <td>{{ $loop->iteration }}</td>
                  <td>{{ $p->nama}}</td>
                  <td>{{$p->jk}}</td>
                  <td>{{ $p->tgl_lahir}}</td>
                  <td>{{ $p->email}}</td>
                  <td>{{ $p->nomor_telepon}}</td>
                  <td>{{ $p->alamat}}</td>
                  <td>{{ $p->role}}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#formMenuModal" data-mode="edit" data-id="{{ $p->id }}"
                        data-nama="{{ $p->namka}}"
                        data-jk="{{ $p->j}}"
                        data-tgl_lahir="{{ $p->tgl_lahir}}"
                        data-email="{{ $p->email}}"
                        data-nomor_telepon="{{ $p->nomor_telepon}}"
                        data-alamat="{{ $p->alamat}}"
                        data-role="{{ $p->role}}">Ubah
                        <i class='fa fa-edit'></i>
                    </button>
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
            $("#data-user").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#data-user .col-md-6:eq(0)');
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