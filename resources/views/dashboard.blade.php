<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>SMKN7BE</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">
  <link rel="icon" type="image/png" href="/assets/img/smkn7.webp"/>
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="assets/modules/weather-icon/css/weather-icons.min.css">
  <link rel="stylesheet" href="assets/modules/weather-icon/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">
 
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>

<link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

<!-- CSS Libraries -->
<link rel="stylesheet" href="assets/modules/fullcalendar/fullcalendar.min.css">

<!-- Template CSS -->
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/components.css">
<link rel="icon" type="image/png" href="/assets/img/smkn7.webp"/>
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-94034622-3');
</script>
<style>
  .marquee {
    width: 100%;
    overflow: hidden;
    white-space: nowrap;
    box-sizing: border-box;
    animation: marquee 10s linear infinite;
  }

  @keyframes marquee {
    0% { transform: translateX(100%); }
    100% { transform: translateX(-100%); }
  }
</style>



<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg bg-danger"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto"  method="GET" action="{{ route('search') }}">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            @if(auth()->check() && (auth()->user()->role == 'admin' || auth()->user()->role == 'petugas'))
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
            @endif
          </ul>
          @if(auth()->check() && (auth()->user()->role == 'admin' || auth()->user()->role == 'petugas'))
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Cari Siswa / NISN ..." aria-label="Search" name="search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
          </div>
          @endif
          @if(auth()->check() && (auth()->user()->role == 'siswa'))
          <div class="search-element">
            <div class="announcement">
                <marquee behavior="scroll" direction="left" scrollamount="3" style="color:white; margin-top: 5px;">Selamat Datang di SMKN7 Baleendah, {{ Auth::user()->name }} !</marquee>
            </div>
        </div>
        @endif
        </form>
        <ul class="navbar-nav navbar-right">
        
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ Auth::user()->profile_photo_url }}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }} /</div>
            @if(Auth::user()->role === 'siswa')
                @if(Auth::user()->jurusan)
                    <span class="badge badge-secondary" style="padding:10px;">{{ Auth::user()->jurusan }}</span>
                @else
                    <span class="badge badge-secondary">Belum memilih jurusan</span>
                @endif
            @elseif(Auth::user()->role === 'admin')
                <span class="badge badge-success text-dark">Admin</span>
            @elseif(Auth::user()->role === 'petugas')
                <span class="badge badge-primary text-dark">Petugas</span>
            @endif
            
          </a>
            <div class="dropdown-menu dropdown-menu-right">
           
              <a href="profile.show" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
            </a>
            <div class="dropdown-divider"></div>
            <form id="logout-form" method="POST" action="{{ route('logout') }}" x-data>
                @csrf
                <button type="submit" class="dropdown-item has-icon text-danger" style="border: none; background-color: white; display: flex; align-items: center;">
                  <a @click.prevent="$refs['logout-form'].submit()" style="text-decoration: none; color: inherit;">
                      <i class="fas fa-sign-out-alt" style="margin-top: 6px;"></i> 
                      <span style="margin-left: 2px;">Logout</span>
                  </a>
              </button>
              
                
            </form>
            
            

             
              
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">SMKN7 BALEENDAH</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <img src="assets/img/smkn7.webp" style="width: 30px;">
          </div>

          @auth
    @if(Auth::user()->role === 'admin')
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class=" active"><a class="nav-link" href="/dashboard"><i class="fas fa-info"></i> <span>DASHBOARD</span></a></li>
      <li><a class="nav-link" href="admin.daftar_pekerja"><i class="fas fa-users"></i> <span>DAFTAR PEKERJA</span></a></li>
      <li><a class="nav-link" href="admin.log_pembayaran"><i class="fas fa-history"></i> <span>LOG PEMBAYARAN</span></a></li>
      <li class="dropdown ">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>DAFTAR SISWA</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="admin.daftar_rpl"> <i class="fas fa-laptop-code"></i> <span>RPL</span></a></li>
          <li><a class="nav-link" href="admin.daftar_dpib"><i class="fas fa-pencil-ruler"></i> <span>DPIB</span></a></li>
          <li><a class="nav-link" href="admin.daftar_tsm"><i class="fas fa-motorcycle"></i> <span>TSM</span></a></li>
          <li><a class="nav-link" href="admin.daftar_tav"> <i class="fas fa-video"></i> <span>TAV</span></a></li>
          <li><a class="nav-link" href="admin.daftar_tkr"><i class="fas fa-car"></i> <span>TKR</span></a></li>
        </ul>
      </li>
      <li ><a class="nav-link" href="calender"><i class="fas fa-calendar-alt"></i> <span>KALENDER</span></a></li>
    </ul>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a href="auth.login" class="btn btn-danger btn-lg btn-block btn-icon-split">
          <i class="fas fa-arrow-left d-inline-block align-middle"></i>Kembali
      </a>
  </div>   </aside>
</div>


<!-- Main Content -->
<div class="main-content">
<section class="section">
<div class="section-header">
<h1>Dashboard</h1>
</div>
<div class="row">
  
  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1 bg-dark">
    <div class="card-icon bg-danger">
      <i class="fas fa-laptop-code"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4 class="text-light">Total Siswa RPL</h4>
      </div>
      <div class="card-body text-light">
        {{ $totalRPL }}
      </div>
    </div>
  </div>
</div>
<div class="col-lg-4 col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1 bg-dark">
    <div class="card-icon bg-danger">
      <i class="fas fa-pencil-ruler"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4 class="text-light">Total Siswa DPIB</h4>
      </div>
      <div class="card-body text-light">
        {{ $totalDPIB }}
      </div>
    </div>
  </div>
</div>
<div class="col-lg-4 col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1 bg-dark">
    <div class="card-icon bg-danger">
      <i class="fas fa-motorcycle"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4 class="text-light">Total Siswa TSM</h4>
      </div>
      <div class="card-body text-light">
        {{ $totalTSM }}
      </div>
    </div>
  </div>
</div>

  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1 bg-dark">
    <div class="card-icon bg-danger">
      <i class="fas fa-video"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4 class="text-light">Total Siswa TAV</h4>
      </div>
      <div class="card-body text-light">
        {{ $totalTAV }}
      </div>
    </div>
  </div>
</div>

<div class="col-lg-4 col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1 bg-dark">
    <div class="card-icon bg-danger">
      <i class="fas fa-car"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4 class="text-light">Total Siswa TKR</h4>
      </div>
      <div class="card-body text-light">
        {{ $totalTKR }}
      </div>
    </div>
  </div>
</div>  
<div class="col-lg-4 col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1 bg-dark">
    <div class="card-icon" style="background-color: white">
      <i class="fas fa-user-graduate text-danger"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4 class="text-light">Total Semua Siswa</h4>
      </div>
      <div class="card-body text-light">
        {{ $totalSiswas }}
      </div>
    </div>
  </div>
</div>
<div class="col-lg-4 col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1 bg-dark">
    <div class="card-icon" style="background-color: white">
      <i class="fas fa-user-tie text-danger"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4 class="text-light">Total Petugas</h4>
      </div>
      <div class="card-body text-light">
        {{ $totalPETUGAS }}
      </div>
    </div>
  </div>
</div>
<div class="col-lg-4 col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1 bg-dark">
    <div class="card-icon" style="background-color: white">
      <i class="fas fa-user-secret text-danger"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4 class="text-light">Total Admin</h4>
      </div>
      <div class="card-body text-light">
        {{ $totalADMIN }}
      </div>
    </div>
  </div>
</div> 
<div class="col">
  <div class="card card-statistic-1 bg-dark">
    <div class="card-icon bg-success">
      <i class="fas fa-money-bill"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4 class="text-light">Total Pendapatan</h4>
      </div>
      <div class="card-body text-light">
        Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
    </div>
    
    </div>
  </div>
</div> 
</div>
</section>
</div>
    @elseif(Auth::user()->role === 'petugas')
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class=" active"><a class="nav-link" href="/dashboard"><i class="fas fa-info"></i> <span>DASHBOARD</span></a></li>
      <li><a class="nav-link" href="petugas.log_pembayaran"><i class="fas fa-history"></i> <span>LOG PEMBAYARAN</span></a></li>
      <li class="dropdown ">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>DAFTAR SISWA</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="petugas.daftar_rpl"> <i class="fas fa-laptop-code"></i> <span>RPL</span></a></li>
          <li><a class="nav-link" href="petugas.daftar_dpib"><i class="fas fa-pencil-ruler"></i> <span>DPIB</span></a></li>
          <li><a class="nav-link" href="petugas.daftar_tsm"><i class="fas fa-motorcycle"></i> <span>TSM</span></a></li>
          <li><a class="nav-link" href="petugas.daftar_tav"> <i class="fas fa-video"></i> <span>TAV</span></a></li>
          <li><a class="nav-link" href="petugas.daftar_tkr"><i class="fas fa-car"></i> <span>TKR</span></a></li>
        </ul>
      </li>
      <li ><a class="nav-link" href="calender"><i class="fas fa-calendar-alt"></i> <span>KALENDER</span></a></li>
    </ul>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a href="auth.login" class="btn btn-danger btn-lg btn-block btn-icon-split">
          <i class="fas fa-arrow-left d-inline-block align-middle"></i>Kembali
      </a>
  </div>     </aside>
</div>


<!-- Main Content -->
<div class="main-content">
<section class="section">
<div class="section-header">
<h1>Dashboard</h1>
</div>
<div class="row">
<div class="col-lg-2.4 col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1 bg-dark">
    <div class="card-icon bg-danger">
      <i class="fas fa-laptop-code"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4 class="text-light">Total Siswa RPL</h4>
      </div>
      <div class="card-body text-light">
        {{ $totalRPL }}
      </div>
    </div>
  </div>
</div>
<div class="col-lg-2.4 col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1 bg-dark">
    <div class="card-icon bg-danger">
      <i class="fas fa-pencil-ruler"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4 class="text-light">Total Siswa DPIB</h4>
      </div>
      <div class="card-body text-light">
        {{ $totalDPIB }}
      </div>
    </div>
  </div>
</div>
<div class="col-lg-2.4 col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1 bg-dark">
    <div class="card-icon bg-danger">
      <i class="fas fa-motorcycle"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4 class="text-light">Total Siswa TSM</h4>
      </div>
      <div class="card-body text-light">
        {{ $totalTSM }}
      </div>
    </div>
  </div>
</div>
<div class="col-lg-2.4 col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1 bg-dark">
    <div class="card-icon bg-danger">
      <i class="fas fa-video"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4 class="text-light">Total Siswa TAV</h4>
      </div>
      <div class="card-body text-light">
        {{ $totalTAV }}
      </div>
    </div>
  </div>
</div>
<div class="col-lg-2.4 col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1 bg-dark">
    <div class="card-icon bg-danger">
      <i class="fas fa-car"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4 class="text-light">Total Siswa TKR</h4>
      </div>
      <div class="text-light card-body">
        {{ $totalTKR }}
      </div>
    </div>
  </div>
</div>  
<div class="col-lg-2.4 col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1 bg-dark">
    <div class="card-icon" style="background-color: white">
      <i class="fas fa-user-graduate text-danger"></i>
    </div>
    <div class="card-wrap">
      <div class="card-header">
        <h4 class="text-light">Total Semua Siswa</h4>
      </div>
      <div class="card-body text-light">
        {{ $totalSiswas }}
      </div>
    </div>
  </div>
</div>
</div>
</section>
</div>
    @elseif(Auth::user()->role === 'siswa')
    <ul class="sidebar-menu">
      <li class="menu-header">DASHBOARD</li>
      <li class="active"><a class="nav-link" href="/dashboard"><i class="fas fa-info"></i> <span>DASHBOARD</span></a></li>
      <li ><a class="nav-link" href="siswa.log_pembayaran"><i class="fas fa-history"></i> <span>LOG PEMBAYARAN</span></a></li>
      <li ><a class="nav-link" href="calender"><i class="fas fa-calendar-alt"></i> <span>KALENDER</span></a></li>
    </ul>
    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a href="auth.login" class="btn btn-danger btn-lg btn-block btn-icon-split">
          <i class="fas fa-arrow-left d-inline-block align-middle"></i>Kembali
      </a>
  </div>       </aside>
</div>


<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
    <h1>Dashboard</h1>
   
    
      </div>
    
      <div class="section-body">
       <div class="container">  
        <div class="row">
        
          <div class="card w-100">
            @if(session('success'))
            <div class="alert alert-danger alert-has-icon">
                <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Success</div>
                    {{ session('success') }}
                </div>
            </div>
            @endif
            <div class="container">
           <br>
            <div class="row">
           
              <div class="col-md-4">
                <div class="card card-statistic-1 bg-dark">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-history"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><a href="/siswa.log_pembayaran" style="text-decoration: none; color:white">
                              LOG PEMBAYARAN
                          </a></h4>
                        </div>
                        <div class="card-body text-light">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-statistic-1 bg-dark">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><a href="/calender" style="text-decoration: none; color:white">
                             KALENDER
                          </a></h4>
                        </div>
                        <div class="card-body text-light">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-statistic-1 bg-dark">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-user-edit"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><a href="profile.show" style="text-decoration: none; color:white">PROFIL</h4>
                        </div>
                        <div class="card-body text-light">
                        </div>
                    </div>
                </div>
            </div>
            </div>
              <div class="card card-statistic-1  bg-dark">
                <div class="card-icon bg-success">
                  <i class="fas fa-money-bill"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Histori Total Pembayaran</h4>
                  </div>
                  <div class="card-bodytext-light">
                    Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                  </div>
                </div>
              </div>
          
            @php
            $now = now()->timezone('Asia/Jakarta'); // Mengubah zona waktu ke WIB
            @endphp
            <div class="card-body p-0">
                <div class="table-responsive-xl">
                  
                  @php
                  $now = now()->timezone('Asia/Jakarta'); // Mengubah zona waktu ke WIB
                  @endphp
                  <table class="table table-striped table-dark w-100" id="sortable-table">
                    <thead>
                        <tr>
                            <th class="text-light">NISN</th>
                            <th class="text-light">USERNAME</th>
                            <th class="text-light">BULAN</th>
                            <th class="text-light">NOMINAL</th>
                            <th class="text-light">STATUS</th>
                            <th class="text-light">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($users->isEmpty())
                            <tr>
                                <td colspan="6">Tidak ada data Log SPP.</td>
                            </tr>
                        @else
                            @foreach ($users as $log)
                                @php
                                    $lastDayOfMonth = $now->endOfMonth()->format('Y-m-d');
                                    $deadline = \Carbon\Carbon::createFromFormat('Y-m-d', $lastDayOfMonth)->addDay(); // Tambahkan 1 hari untuk menghitung tenggat
                  
                                    $diffInDays = $now->diffInDays($deadline);
                                @endphp
                  
                                <tr>
                               <td>{{ $log->user->nisn }}</td>
                                    <td>{{ $log->name }}</td>
                                    <td>{{ $log->bulan }}</td>
                                    <td>{{ 'Rp ' . number_format($log->nominal, 0, ',', '.') }}</td>
                                    <td>
                                      @if ($log->status === 'belum bayar')
                                          @if ($diffInDays >= 0)
                                              <span class="badge badge-warning">Belum Tenggat</span>
                                          @else
                                              <span class="badge badge-danger">Sudah Tenggat</span>
                                          @endif
                                      @else
                                          <span class="badge badge-primary">{{ $log->status }}</span>
                                      @endif
                                  </td>
                                  
                                    <td>
                                        @if ($log->status === 'Belum Bayar' && $now->lte($deadline))
                                            <form action="{{ route('bayar', $log->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-primary">Bayar</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                  </table>
                </div>
                
                </div>
            </div>
        </div>
      </div>
        <ul class="pagination justify-content-end ml-auto">
          {{-- Tombol Previous --}}
          <li class="page-item {{ $users->onFirstPage() ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $users->previousPageUrl() }}" tabindex="-1">Previous</a>
          </li>
        
          {{-- Nomor Halaman --}}
          @for ($i = 1; $i <= $users->lastPage(); $i++)
            <li class="page-item {{ $i == $users->currentPage() ? 'active' : '' }}">
              <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
            </li>
          @endfor
        
          {{-- Tombol Next --}}
          <li class="page-item {{ $users->hasMorePages() ? '' : 'disabled' }}">
            <a class="page-link" href="{{ $users->nextPageUrl() }}">Next</a>
          </li>
        </ul>
        
        </div>
        <br>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="bg-dark card-header">
        <h4 class="text-light">Calendar</h4>
      </div>
      <div class="card-body bg-secondary">
        <div class="fc-overflow">                            
          <div id="myEvent"></div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
</div>

      </div>
    </div>
    </section>
    @endif
@endauth


         
<footer class="main-footer">
  <div class="footer-left">
    Copyright &copy; SMKN7 Baleendah | ReiivanTheOnlyOne .
  </div>
  <div class="footer-right">
    
  </div>
</footer>
</div>
</div>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="assets/modules/simple-weather/jquery.simpleWeather.min.js"></script>
  <script src="assets/modules/chart.min.js"></script>
  <script src="assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="assets/modules/summernote/summernote-bs4.js"></script>
  <script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="assets/js/page/index-0.js"></script>
  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>


  
  <!-- JS Libraies -->
  <script src="assets/modules/fullcalendar/fullcalendar.min.js"></script>

  <!-- Page Specific JS File -->
	<script src="assets/js/page/modules-calendar.js"></script>
 
</body>
</html>