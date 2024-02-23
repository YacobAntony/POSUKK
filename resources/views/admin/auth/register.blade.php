
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Antonies - Cashier</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="/vendor/light/css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="/vendor/light/css/feather.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="/vendor/light/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="/vendor/light/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="/vendor/light/css/app-dark.css" id="darkTheme" disabled>

    <style>
        body {
          background-image: url('{{ asset('vendor/publish/RBG.png') }}');
          background-repeat: no-repeat;
          background-position: right bottom;             
        }

        .login-box-msg {
        color: white;
    }

    </style>

  </head>
  <body class="light ">
    <div class="wrapper vh-100">



      <div class="row align-items-center h-100">





      <form action="{{ route('register') }}" method="post" class="col-lg-6 col-md-8 col-10 mx-auto">
      @csrf

                  <div class="mx-auto text-center my-4">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
            <img src="{{ asset('vendor/publish/logo.png') }}" class="rounded-image" width="auto" height="auto" alt="Yumewak Image">

            </a>
            <h2 class="my-3">Register</h2>
          </div>
          <div class="form-group">
            <label for="inputEmail4">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror "  name="email" placeholder="Masukkan Email" value = "{{ isset($user) ? $user->email : '' }}">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="nama">Nama</label>
              <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" placeholder="Nama" value = "{{ isset($user) ? $user->name : '' }}">
            </div>
         


          </div>
          <hr class="my-4">
          <div class="row mb-4">
            <div class="col-md-6">
              <div class="form-group">
                <label for="inputPassword5">Password</label>
                <input type="password" class="form-control  @error('password') is-invalid @enderror " name="password" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="inputPassword6">Confirm Password</label>
                <input type="password" class="form-control  @error('re_password') is-invalid @enderror" name="re_password" placeholder="Password">
              </div>
            </div>

            <div class="col-md-6">
    <p class="mb-2">Persyaratan Kata Sandi</p>
    <p class="small text-muted mb-2">Untuk membuat kata sandi baru, Anda harus memenuhi semua persyaratan berikut:</p>
    <ul class="small text-muted pl-4 mb-0">
        <li>Minimum 8 karakter</li>
        <li>Setidaknya satu karakter khusus</li>
        <li>Setidaknya satu angka</li>
        <li>Tidak boleh sama dengan kata sandi sebelumnya</li>
    
        </ul>
</div>
</div>

          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
          <p class="mt-3">Sudah punya akun? <a href="/login">Login</a></p>
          <p class="mt-5 mb-3 text-muted">&copy; 2022 Yacob Antonies | <a href="https://github.com/YacobAntony" target="_blank">GitHub</a></p>
        </form>

      </div>
    </div>
    <script src="/vendor/light/js/jquery.min.js"></script>
    <script src="/vendor/light/js/popper.min.js"></script>
    <script src="/vendor/light/js/moment.min.js"></script>
    <script src="/vendor/light/js/bootstrap.min.js"></script>
    <script src="/vendor/light/js/simplebar.min.js"></script>
    <script src='/vendor/light/js/daterangepicker.js'></script>
    <script src='/vendor/light/js/jquery.stickOnScroll.js'></script>
    <script src="/vendor/light/js/tinycolor-min.js"></script>
    <script src="/vendor/light/js/config.js"></script>
    <script src="/vendor/light/js/apps.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>
  </body>
</html>
</body>
</html>