@section('sidebar')
<div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          {{-- <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            <div class="search-result">
              <div class="search-header">
                Menu
              </div>
              <div class="search-item">
                <a href="{{ url('/dashboard') }} ">Dashboard</a>
                <a href="{{ url('/penjualan') }}" class="search-close"><i class="fas fa-times"></i></a>
              </div>
            </div>
          </div> --}}
        </form>
        <ul class="navbar-nav navbar-right">
          
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{ Session::get('name') }} </div></a>
            <div class="dropdown-menu dropdown-menu-right">
              {{-- <div class="dropdown-title">Logged in 5 min ago</div> --}}
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <?php
              if (Session::get('level') == 'admin') {?>
                <a href="{{ url('/register') }}" class="dropdown-item has-icon">
                  <i class="fas fa-user-plus"></i> Add User
                </a>
                <?php
              }
              ?>
              
              

              {{-- <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a> --}}
              <div class="dropdown-divider"></div>
              <a href="{{ url('/logout') }} " class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="https://impstudio.id/">IMP Studio</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="https://impstudio.id/"><img src="{{ asset('img/logo/favicon.ico') }} " alt="" width="30" height="30"></a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item dropdown">
                <a href="{{ url('/dashboard') }} " class="nav-link"><i class="fas fa-fw fa-home"></i><span>Dashboard</span></a>
                {{-- <ul class="dropdown-menu">
                  <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                  <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
                </ul> --}}
              </li>
              <li class="menu-header">Starter</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-fw fa-dollar-sign"></i> <span>Keuangan</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ url('/penjualan') }} ">Penjualan</a></li>
                  <li><a class="nav-link" href="{{ url('/pembelian') }} ">Pembelian</a></li>
                  <li><a class="nav-link" href="{{ url('/biaya') }} ">Biaya</a></li>
                </ul>
              </li>
              <li class="{{-- active --}}"><a class="nav-link" href="{{ url('/petty') }} "><i class="fas fa-fw fa-wallet"></i> <span>Pattycash</span></a></li>

              <li class=""><a class="nav-link" href="{{ url('/surat') }} "><i class="fas fa-fw fa-envelope"></i> <span>Surat</span></a></li>
              <li class=""><a class="nav-link" href="{{ url('/akun') }} "><i class="fas fa-fw fa-user-alt"></i> <span>Akun</span></a></li>
              <li class=""><a class="nav-link" href="{{ url('/invoice') }} "><i class="fas fa-fw fa-file-invoice"></i> <span>Invoice</span></a></li>

             <li class="menu-header">Lain-lainnya</li>
              <li class=""><a class="nav-link" href="{{ url('/pelanggan') }} "><i class="fas fa-fw fa-users"></i> <span>Pelanggan</span></a></li>
              <li class=""><a class="nav-link" href="{{ url('/labarugi') }} "><i class="fas fa-fw fa-chart-line"></i> <span>Laba/Rugi</span></a></li>
              <li class=""><a class="nav-link" href="{{ url('/rencanaaruskas') }} "><i class="fas fa-fw fa-paper-plane"></i> <span>Rencana Arus Kas</span></a></li>
              <li class=""><a class="nav-link" href="{{ url('/neraca') }} "><i class="fas fa-fw fa-balance-scale"></i> <span>Neraca</span></a></li>

            {{-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
              </a>
            </div> --}}
        </aside>
      </div>
@endsection