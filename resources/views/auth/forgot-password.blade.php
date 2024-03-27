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

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <img src="assets/img/smkn7.webp" alt="logo" width="75"
                                class="shadow-light rounded-circle">
                        </div>










                        <div class="card card-danger">
                            <div class="card-header">
                                <h4>Forgot Password</h4>
                            </div>
                            <div class="container">
                                <div class="mb-4 text-sm text-gray-600">
                                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                                </div>
                            </div>
                            <x-validation-errors class="mb-4" />

                            <div class="card-body">
                                @if (session('status'))
                                    <div class="mb-4 font-medium text-sm text-green-600">
                                        {{ session('status') }}
                                    </div>
                                @endif


                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf

                                    <div class="form-group">
                                        <label for="frist_name">Email</label>
                                        <input id="frist_name"type="email" class="form-control" type="email"
                                            name="email" :value="old('email')" required autofocus
                                            autocomplete="username">
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger btn-lg btn-block">
                                            Email Password Reset Link
                                        </button>


                                    </div>
<hr>
<center>
<div class="form-group">
    <a  class="text-danger"  href="{{ route('login') }}">Already register ?</a>
   /
    <a  class="text-danger"  href="{{ route('register') }}">Dont have an account ?</a>
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
