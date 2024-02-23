<!doctype html>
<html lang="en">

<head>
<title>Antonies - Cashier</title>
<link rel="stylesheet" href="vendor/light/css/app-light.css" id="lightTheme">
</head>

<body class="light">
    <div class="wrapper vh-100">
        <div class="row align-items-center h-100">
            <form action="{{ route('password.email') }}" method="POST" class="col-lg-3 col-md-4 col-10 mx-auto text-center">
            @csrf
                <div class="mx-auto text-center my-4">
                    <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                        <img src="{{ asset('vendor/publish/logo.png') }}" class="rounded-image" width="auto" height="auto" alt="Yumewak Image">
                    </a>
                    <h2 class="my-3">Reset Password</h2>
                </div>
                <p class="text-muted">Enter your email address and we'll send you an email with instructions to reset your password</p>
                <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Email" name="email">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button class="btn btn-lg btn-primary btn-block" type="submit">Reset Password</button>
                
    @if (session('status'))
        <div class="alert alert-success mt-3">
            {{ session('status') }}
        </div>
    @endif
    <p class="mt-3">Sudah punya akun? <a href="/login">Login</a></p>

    <p class="mt-5 mb-3 text-muted">&copy; 2022 Yacob Antonies | <a href="https://github.com/YacobAntony" target="_blank">GitHub</a></p>
            </form>
        </div>
    </div>
    <!-- ... (script tags and other dependencies) ... -->
</body>

</html>
