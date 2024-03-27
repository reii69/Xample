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
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg bg-danger"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto"  method="GET" action="{{ route('search') }}">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Cari Siswa / NISN ..." aria-label="Search" name="search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
           
          </div>
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
          @if(Auth::user()->role == 'admin')
          <ul class="sidebar-menu">
            <li class="menu-header">DAFTAR SISWA TSM</li>
            <li><a class="nav-link" href="/dashboard"><i class="fas fa-info"></i> <span>DASHBOARD</span></a></li>
            <li><a class="nav-link" href="admin.daftar_pekerja"><i class="fas fa-users"></i> <span>DAFTAR PEKERJA</span></a></li>
            <li><a class="nav-link" href="admin.log_pembayaran"><i class="fas fa-history"></i> <span>LOG PEMBAYARAN</span></a></li>
            <li class="dropdown active">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>DAFTAR SISWA</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="admin.daftar_rpl"> <i class="fas fa-laptop-code"></i> <span>RPL</span></a></li>
                <li><a class="nav-link" href="admin.daftar_dpib"><i class="fas fa-pencil-ruler"></i> <span>DPIB</span></a></li>
                <li class="active"><a class="nav-link" href="admin.daftar_tsm"><i class="fas fa-motorcycle"></i> <span>TSM</span></a></li>
                <li><a class="nav-link" href="admin.daftar_tav"> <i class="fas fa-video"></i> <span>TAV</span></a></li>
                <li><a class="nav-link" href="admin.daftar_tkr"><i class="fas fa-car"></i> <span>TKR</span></a></li>
              </ul>
            </li>
            <li ><a class="nav-link" href="calender"><i class="fas fa-calendar-alt"></i> <span>KALENDER</span></a></li>
          </ul>
          @elseif(Auth::user()->role == 'petugas')
              <!-- Sidebar untuk petugas -->
          @elseif(Auth::user()->role == 'siswa')
              <!-- Sidebar untuk siswa -->
          @endif
      @endauth

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a href="auth.login" class="btn btn-danger btn-lg btn-block btn-icon-split">
          <i class="fas fa-arrow-left d-inline-block align-middle"></i>Kembali
      </a>
  </div>      </aside>
</div>


<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
    <h1>DAFTAR SISWA TSM</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="dashboard">Dashboard</a></div>
      <div class="breadcrumb-item">Daftar Siswa</div>
      <div class="breadcrumb-item"><a href="admin.daftar_dpib">TSM</a></div>
    </div>
    
      </div>
    
      <div class="section-body">
       
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
        
            <div class="card-body p-0">
                <div class="table-responsive-xl">
                  <div class="container">
                    <br>
                  
                  <form action="{{ route('users.deleteSelected5') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    @if (!$users->isEmpty())
                        <button type="submit" class="btn btn-outline-danger mr-2"><i class="fas fa-trash"></i> Delete Selected</button>
                        <br><br>
                    @endif
                    <table class="table table-striped table-dark w-100" id="sortable-table">
                        <thead>
                            <tr>
                                <th class="text-light"></th> <!-- Checkbox column -->
                                <th class="text-light">NISN</th>
                                <th class="text-light">USERNAME</th>
                                <th class="text-light">EMAIL</th>
                                <th class="text-light">KELAS</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @if ($users->isEmpty())
                                <tr>
                                    <td colspan="6">Tidak ada data user.</td>
                                </tr>
                            @else
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="selected_users[]" value="{{ $user->id }}">
                                        </td>
                                        <td>{{ $user->nisn }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td><span class="badge badge-primary">{{ $user->kelas }}</span></td>
                                       
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </form>
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
      </div>
    </div>
    </section>
   


         
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
</body>
</html>