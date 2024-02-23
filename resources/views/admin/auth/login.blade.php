
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
    <link rel="stylesheet" href="vendor/light/css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="vendor/light/css/feather.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="vendor/light/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="vendor/light/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="vendor/light/css/app-dark.css" id="darkTheme" disabled>
    <style>
        body {
          background-image: url('{{ asset('vendor/publish/blur.jpg') }}');
                    
        }

        .login-box-msg {
        color: white;
    }
    .rounded-image {
        border-radius: 50%;
   
        padding: 0px; /* Sesuaikan dengan kebutuhan Anda */
    }

    </style>
  </head>
  <body class="light ">
    <div class="wrapper vh-100">
      <div class="row align-items-center h-100">
        <form action="/login/do" method="post" class="col-lg-3 col-md-4 col-10 mx-auto text-center">
          @csrf
          <a class="navbar-brand mx-auto mt-2 flex-fill text-center">
          <img src="{{ asset('vendor/publish/logos.jpg') }}" class="rounded-image" width="auto" height="auto" alt="Yumewak Image">
          </a>

          <p class="login-box-msg">Sign in to start your session</p>
             @if (session()->has('loginError'))
               <div class="alert alert-danger">{{session('loginError')}}</div>
             @endif

          <div class="form-group">
            <label for="inputEmail" class="sr-only">Email</label>
            <input type="email" class="form-control form-control-lg @error ('email') is-invalid @enderror" placeholder="Email" name="email">
            @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
          @enderror
          </div>

          <div class="form-group">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" class="form-control form-control-lg @error ('password') is-invalid @enderror" placeholder="Password" name="password">
            @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
          @enderror
          </div>

          <button class="btn btn-lg btn-primary btn-block" type="submit">Let me in</button>
          <p class="mt-3" style="color: white;">Belum punya akun? <a href="/register" style="color: white;">Daftar</a></p>
          <p class="mt-3"><a href="/forgot-password" style="color: white;">Lupa Password?</a></p>
<p class="mt-5 mb-3 text-muted">&copy; 2022 Yacob Antonies | <a href="https://github.com/YacobAntony" target="_blank" style="color: white;">GitHub</a></p>

        </form>
      </div>
    </div>
    <script src="vendor/light/js/jquery.min.js"></script>
    <script src="vendor/light/js/popper.min.js"></script>
    <script src="vendor/light/js/moment.min.js"></script>
    <script src="vendor/light/js/bootstrap.min.js"></script>
    <script src="vendor/light/js/simplebar.min.js"></script>
    <script src='vendor/light/js/daterangepicker.js'></script>
    <script src='vendor/light/js/jquery.stickOnScroll.js'></script>
    <script src="vendor/light/js/tinycolor-min.js"></script>
    <script src="vendor/light/js/config.js"></script>
    <script src="vendor/light/js/apps.js"></script>
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