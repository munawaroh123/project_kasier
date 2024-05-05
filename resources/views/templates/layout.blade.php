<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>cafe cat</title>

    <!-- Bootstrap -->
    <link href="{{ asset('gentelella-alela') }}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('gentelella-alela') }}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('gentelella-alela') }}/vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('gentelella-alela') }}/build/css/custom.min.css" rel="stylesheet">
    <link href="{{ asset('css') }}/style.css" rel="stylesheet">
    <link href="{{ asset('css') }}/sweet-alert4-bootstrap4.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Cafe cat</span></a>
            </div>
            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{ asset ('gentelella-alela') }}/production/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <h2></h2>
                <span></span>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            @if(Auth::user()->getOriginal('role')=='admin')
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Cashier cafe</h3>
                <ul class="nav side-menu">
                  <li class="nav-item d-none d-sm-block"><a href="{{  url('/')  }}"><i class="fa fa-home"></i>Home</a>
                  <li class="nav-item d-none d-sm-block"><a href="{{  url('/grafik')  }}"><i class="fa fa-bar-chart"></i>Grafik</a>
                  <li class="nav-item d-none d-sm-block"><a href="{{  url('/jenis')  }}"><i class="fa fa-bars"></i>Jenis</a>
                  <li class="nav-item d-none d-sm-block"><a href="{{  url('/menu')  }}"><i class="fa fa-book"></i>Menu</a>
                  <li class="nav-item d-none d-sm-block"><a href="{{  url('/meja')  }}"><i class="fa fa-table"></i>Meja</a>
                  <li class="nav-item d-none d-sm-block"><a href="{{  url('/pelanggan')  }}"><i class="fa fa-group"></i>Pelanggan</a>
                  <li class="nav-item d-none d-sm-block"><a href="{{  url('/kategori')  }}"><i class="fa fa-file"></i>Kategori</a>
                  <li class="nav-item d-none d-sm-block"><a href="{{  url('/user')  }}"><i class="fa fa-user"></i>User</a>
                  <li class="nav-item d-none d-sm-block"><a href="{{  url('/hub ')  }}"><i class="fa fa-phone"></i>Contact us</a>
                </ul>
              </div>
            @endif
            
            @if(Auth::user()->getOriginal('role')=='kasir')
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Cashier cafe</h3>
                <ul class="nav side-menu">
                  <li class="nav-item d-none d-sm-block"><a href="{{  url('/transaksi')  }}"><i class="fa fa-dollar"></i>Transaksi</a>
                  <li class="nav-item d-none d-sm-block"><a href="{{  url('/detail')  }}"><i class="fa fa-money"></i>History transaksi</a>
                </ul>
              </div>
            @endif
              <div class="menu_section">
                  </li>                  
                 </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="fa fa-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="fa fa-arrows-alt" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="fa fa-eye-slash" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="LogAout" href="{{ route('logout')}}">
                <span class="fa fa-power-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                  <ul class=" navbar-right">
                    <li class="nav-item dropdown open" style="padding-left: 15px;">
                      <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      </a>
                      <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item"  href="javascript:;"> Profile</a>
                        <a class="dropdown-item"  href="javascript:;">
                          <span class="badge bg-red pull-right">50%</span>
                          <span>Settings</span>
                        </a>
                        <a class="dropdown-item"  href="javascript:;">Help</a>
                        <a class="dropdown-item"  href="{{ route('logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                      </div>
                    </li>
                  </ul>
                </nav>
            </div>
          </div>
        <!-- /top navigation -->

        <!-- page content -->
        @yield('content')
        <!-- /page content -->

        @include('templates.footer')
      </div>
    </div>
  </body>
</html>
