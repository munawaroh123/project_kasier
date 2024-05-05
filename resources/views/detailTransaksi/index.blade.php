@extends('templates.layout')

@push('style')

@endpush

@section('content')
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3></h3>
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
                    <h2>Histori Transaksi</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <div class="table-responsive">
                  <table id="data-jenis" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <td>No</td>
                          <td>ID Transaksi</td>
                          <td>Menu</td>
                          <td>Jumlah</td>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($transaksi as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->id}}</td>
                            <td>
                                @foreach($p->detailTransaksi as $detail)
                                    <p>nama: {{$detail->menu->nama_menu}}</p>
                                    <p>QTY: {{$detail->jumlah}}</p>
                                    <p>Subtotal: {{$detail->subtotal}}</p>
                                @endforeach
                                
                            </td>
                            <td>Total Harga {{$p->total_harga}}</td>
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
</div>


@endsection
<!-- 
<table id="data-jenis" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <td>No</td>
                          <td>ID Transaksi</td>
                          <td>Menu</td>
                          <td>Aksi</td>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($transaksi as $p)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->id}}</td>
                            <td>
                                @foreach($p->detailTransaksi as $detail)
                                    <p>nama: {{$detail->menu->nama_menu}}</p>
                                    <p>QTY: {{$detail->jumlah}}</p>
                                    <p>Subtotal: {{$detail->subtotal}}</p>
                                @endforeach
                            </td>
                            <td>Total Harga {{$p->total_harga}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> -->