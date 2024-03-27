<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>SMKN7BE</title>
  <link rel="icon" type="image/png" href="/assets/img/smkn7.webp"/>
  

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/jquery-selectric/selectric.css">

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
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="assets/img/smkn7.webp" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-danger">
              <div class="card-header"><h4>Register</h4></div>

              <x-validation-errors class="mb-4" />

          
          <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="row">
                <div class="form-group col-6">
                  <label for="frist_name">Name</label>
                  <input id="frist_name" type="text" class="form-control" name="name" autofocus required>
                </div>
                <div class="form-group col-6">
                  <label for="last_name">Email</label>
                  <input id="last_name" type="text" class="form-control" name="email" required>
                </div>
              </div>

              <div class="form-group">
                <label for="email">Password</label>
                <input id="email" type="password" class="form-control" name="password" required>
                <div class="invalid-feedback">
                </div>
              </div>

             
                <div class="form-group ">
                  <label for="password" class="d-block">Confirm Password</label>
                  <input required id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password_confirmation">
                  <div id="pwindicator" class="pwindicator">
                    <div class="bar"></div>
                    <div class="label"></div>
                  </div>
              
                  
               
              </div>
             
              <div class="form-group">
                <label>Kelas</label>
                <select class="custom-select" id="kelas" class="form-control" name="kelas" required>
                  <option selected>Choose your class</option>
                  <option value="X">X</option>
                  <option value="XI">XI</option>
                  <option value="XII">XII</option>
                </select>
              </div>

              
              <div class="custom-switches-stacked mt-2 form-group">
                <label>Field of Study</label>
                <label class="custom-switch">
                    <input type="radio" name="jurusan" value="rpl" class="custom-switch-input" checked>
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description">Rekayasa Perangkat Lunak (RPL)</span>
                </label>
                <label class="custom-switch">
                    <input type="radio" name="jurusan" value="dpib" class="custom-switch-input">
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description">Desain Pemodelan dan Informasi Bangunan (DPIB)</span>
                </label>
                <label class="custom-switch">
                    <input type="radio" name="jurusan" value="tsm" class="custom-switch-input">
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description">Teknik Sepeda Motor (TSM)</span>
                </label>
                <label class="custom-switch">
                    <input type="radio" name="jurusan" value="tav" class="custom-switch-input">
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description">Teknik Audio Video (TAV)</span>
                </label>
                <label class="custom-switch">
                    <input type="radio" name="jurusan" value="tkr" class="custom-switch-input">
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description">Teknik Kendaraan Ringan (TKR)</span>
                </label>
            </div>
            
         

              <div class="form-group">
                <button type="submit" class="btn btn-danger btn-lg btn-block">
                  Register
                </button>
              </div>
              <hr>
              <center>
              <div class="form-group">
                <a  class="text-danger" href="{{ route('login') }}">Already register ?</a>
              </div>
              </center>

              
            </form>
          </div>
              
            </div>
            <div class="simple-footer">
              Copyright &copy; SMKN7 Baleendah | ReiivanTheOnlyOne .
            </div>
          </div>
        </div>
      </div>
    </section>
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
  <script src="assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="assets/modules/jquery-selectric/jquery.selectric.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="assets/js/page/auth-register.js"></script>
  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>


