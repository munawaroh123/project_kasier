@extends('templates.layout')

@push('stytle')
@endpush

@section('content')

     <!-- /page content -->
     <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            <div class="col-md-4 col-sm-4  tile_stats_count">
              <span class="count_top"><i class=" fa fa-money"></i> Jumlah transaksi</span>
              <div class="count">{{$count_transaksi}}</div>
              <span class="count_bottom"><i class="green"> </i> Transaksi </span>
            </div>
            <div class="col-md-4 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Jumlah pendapatan</span>
              <div class="count green">{{$total_transaksi}}</div>
              <span class="count_bottom"></span>
            </div>
            <div class="col-md-4 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i>Jumlah menu</span>
              <div class="count">{{$count_menu}}</div>
              <span class="count_bottom"></span>
            </div>
            <div class="col-md-4 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i>Jumlah stok</span>
              <div class="count">{{$count_stok}}</div>
              <span class="count_bottom"></span>
            </div>
          
          </div>
        </div>

</body>

<div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="dashboard_graph"> <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Grafik Pendapatan</h3>
                  </div>
                  <div class="col-md-6">
                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                    </div>
                  </div>
                </div>

                <div class="col-md-9 col-sm-9 ">
                  <div id="chart_plot_01" class="demo-placeholder"></div>
                </div>
                <div class="col-md-4 col-sm-12 ">
                <div>
                <div class="x_panel">
                  <div class="x_title">
                          <h2>Stok terendah</h2>
                          <ul class="nav navbar-riht panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <ul class="list-unstyled top_profiles scroll-view">
                        @foreach ($menu  as $p)
                        <li class="media event">
                        <a>
                            </a>
                            <div class="media-body">
                              <a class="title" style="font-size: 18px;">Menu : {{ $p->nama_menu}}</a>
                              <p style="font-size: 14px;"><strong>Harga : {{ $p->jumlah }}</strong></p>
                              <p style="font-size: 14px;"><strong>Stok : {{ $p->stok }}</strong></p>
                            </div>
                          </li>
                          @endforeach
                        </ul>
                  </div>
                </div>
              </div>
            <div class="col-md-4">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Transaksi Terbaru <small></small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <article class="media event">
                            <ul class="list-unstyled top_profiles scroll-view">
                                @foreach ($latest_transaksi as $p)
                                <li class="media event">
                                    
                                    <div class="media-body">
                                        <a class="title">{{ $p->id }}</a>
                                        <p><strong>{{ $p->total_harga }}</strong></p>
                                        <p> <small>{{ $p->tanggal }}</small>
                                        </p>
                                    </div>
                                </li>
                                @endforeach
                                
                            </ul>
                        </article>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>TOP 5 PENJUALAN <small></small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <article class="media event">
                            <ul class="list-unstyled top_profiles scroll-view">
                                @foreach ($detail_transaksi as $p)
                                <li class="media event">
                                    <a>
                                        <img width="50px"  src="{{asset('images')}}/{{$p->menu->image }}" alt="" style="margin-right: 10px;">
                                    </a>
                                    <div class="media-body">
                                        <a class="title">{{ $p->menu->nama_menu }}</a>
                                        <p><strong>{{ $p->menu->harga }}</strong></p>
                                        <p> <small>{{ $p->menu->deskripsi }}</small></p>
                                    </div>
                                </li>
                                @endforeach
                                
                            </ul>
                        </article>
                    </div>
                </div>
            </div>
                  </div>

                </div>
                
@endsection

