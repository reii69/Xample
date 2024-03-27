<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>SMKN7BE</title>
        <link rel="icon" type="image/png" href="/assets/img/smkn7.webp"/>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
       

        <!-- Styles -->
        @livewireStyles

        <link rel="stylesheet" href="/assets/modules/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/modules/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="/assets/modules/jqvmap/dist/jqvmap.min.css">
        <link rel="stylesheet" href="/assets/modules/weather-icon/css/weather-icons.min.css">
        <link rel="stylesheet" href="/assets/modules/weather-icon/css/weather-icons-wind.min.css">
        <link rel="stylesheet" href="/assets/modules/summernote/summernote-bs4.css">
        <link rel="stylesheet" href="/assets/css/style.css">
        <link rel="stylesheet" href="/assets/css/components.css">
      <!-- Start GA -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
      
        gtag('config', 'UA-94034622-3');
      </script>
    </head>

    <body>
        <div id="app">
          <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg bg-danger"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
              <form class="form-inline mr-auto"  method="GET" action="{{ route('search') }}">
                <ul class="navbar-nav mr-3">
                  <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                  
                </ul>
                
              </form>
              <ul class="navbar-nav navbar-right">
              
                <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                
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
                 
                    <a href="/profile.show" class="dropdown-item has-icon">
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
                  <div style="display: flex; justify-content: center; align-items: center; margin-top: 13px;">
                    <img src="/assets/img/smkn7.webp" style="width: 30px;">
                </div>
                
                </div>

                @auth
    @if(Auth::user()->role == 'admin')
    <ul class="sidebar-menu">
      <li class="menu-header">PROFILE</li>
      <li><a class="nav-link" href="/dashboard"><i class="fas fa-info"></i> <span>DASHBOARD</span></a></li>
      <li><a class="nav-link" href="/admin.daftar_pekerja"><i class="fas fa-users"></i> <span>DAFTAR PEKERJA</span></a></li>
      <li><a class="nav-link" href="/admin.log_pembayaran"><i class="fas fa-history"></i> <span>LOG PEMBAYARAN</span></a></li>
      <li class="dropdown ">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>DAFTAR SISWA</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="/admin.daftar_rpl"> <i class="fas fa-laptop-code"></i> <span>RPL</span></a></li>
          <li><a class="nav-link" href="/admin.daftar_dpib"><i class="fas fa-pencil-ruler"></i> <span>DPIB</span></a></li>
          <li><a class="nav-link" href="/admin.daftar_tsm"><i class="fas fa-motorcycle"></i> <span>TSM</span></a></li>
          <li><a class="nav-link" href="/admin.daftar_tav"> <i class="fas fa-video"></i> <span>TAV</span></a></li>
          <li><a class="nav-link" href="/admin.daftar_tkr"><i class="fas fa-car"></i> <span>TKR</span></a></li>
        </ul>
      </li>
      <li ><a class="nav-link" href="/calender"><i class="fas fa-calendar-alt"></i> <span>KALENDER</span></a></li>
    </ul>
    @elseif(Auth::user()->role == 'petugas')
    <ul class="sidebar-menu">
      <li class="menu-header">PROFILE</li>
      <li><a class="nav-link" href="/dashboard"><i class="fas fa-info"></i> <span>DASHBOARD</span></a></li>
      <li><a class="nav-link" href="/petugas.log_pembayaran"><i class="fas fa-history"></i> <span>LOG PEMBAYARAN</span></a></li>
      <li class="dropdown ">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>DAFTAR SISWA</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="/petugas.daftar_rpl"> <i class="fas fa-laptop-code"></i> <span>RPL</span></a></li>
          <li><a class="nav-link" href="/petugas.daftar_dpib"><i class="fas fa-pencil-ruler"></i> <span>DPIB</span></a></li>
          <li><a class="nav-link" href="/petugas.daftar_tsm"><i class="fas fa-motorcycle"></i> <span>TSM</span></a></li>
          <li><a class="nav-link" href="/petugas.daftar_tav"> <i class="fas fa-video"></i> <span>TAV</span></a></li>
          <li><a class="nav-link" href="/petugas.daftar_tkr"><i class="fas fa-car"></i> <span>TKR</span></a></li>
        </ul>
      </li>
      <li ><a class="nav-link" href="/calender"><i class="fas fa-calendar-alt"></i> <span>KALENDER</span></a></li>
    </ul>
    @elseif(Auth::user()->role == 'siswa')
    <ul class="sidebar-menu">
      <li class="menu-header">PROFILE</li>
      <li ><a class="nav-link" href="/dashboard"><i class="fas fa-info"></i> <span>DASHBOARD</span></a></li>
      <li ><a class="nav-link" href="/siswa.log_pembayaran"><i class="fas fa-history"></i> <span>LOG PEMBAYARAN</span></a></li>
      <li ><a class="nav-link" href="/calender"><i class="fas fa-calendar-alt"></i> <span>KALENDER</span></a></li>
    </ul>
    @endif
@endauth

                
      
                <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                  <a href="/auth.login" class="btn btn-danger btn-lg btn-block btn-icon-split">
                      <i class="fas fa-arrow-left d-inline-block align-middle"></i>Kembali
                  </a>
              </div>       </aside>
            </div>
      
           
       <!-- Main Content -->
       <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>PROFILE</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="/profile.show">Profile</a></div>
             
            </div>
          </div>
          <main>
            {{ $slot }}
            
    


        </main>
   

    @stack('modals')

    @livewireScripts
         
                 
        </section>
      </div>
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
     <script src="/assets/modules/jquery.min.js"></script>
     <script src="/assets/modules/popper.js"></script>
     <script src="/assets/modules/tooltip.js"></script>
     <script src="/assets/modules/bootstrap/js/bootstrap.min.js"></script>
     <script src="/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
     <script src="/assets/modules/moment.min.js'"></script>
     <script src="/assets/js/stisla.js"></script>
     
     <!-- JS Libraies -->
     <script src="/assets/modules/simple-weather/jquery.simpleWeather.min.js"></script>
     <script src="/assets/modules/chart.min.js"></script>
     <script src="/assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
     <script src="/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
     <script src="/assets/modules/summernote/summernote-bs4.js"></script>
     <script src="/assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
     
     <!-- Page Specific JS File -->
     <script src="/assets/js/page/index-0.js"></script>
     
     <!-- Template JS File -->
     <script src="/assets/js/scripts.js"></script>
     <script src="/assets/js/custom.js"></script>
   
      </body>
      
   
            <!-- Page Heading -->
          

            <!-- Page Content -->
          
   
