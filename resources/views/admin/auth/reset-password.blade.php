<!doctype html>
<html lang="en">

<head>
<title>Antonies - Cashier</title>
<link rel="stylesheet" href="{{asset ('vendor/light/css/app-light.css')}}" id="lightTheme">
</head>

<body class="light">
    <div class="wrapper vh-100">
        <div class="row align-items-center h-100">
                        @if (session()->has('status'))
                            <div class="alert alert-success">
                                {{ session()->get('status') }}
                            </div>
                        @endif
                        <form action="{{ route('password.update') }}" method="post" class="col-lg-3 col-md-4 col-10 mx-auto text-center">
                            @csrf
                            <div class="mx-auto text-center my-4">
              
                    <h2 class="my-3">Reset Password</h2>
                </div>
                            <input type="hidden" name="token" value="{{ request()->token }}">
                            <input type="hidden" name="email" value="{{ request()->email }}">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Password Confirmation</label>
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Update Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function () {
        @if ($errors->has('password'))
            iziToast.error({
                title: 'Error',
                message: '{{ $errors->first('password') }}',
                position: 'topRight',
            });
        @endif

        @if ($errors->has('password_confirmation'))
            iziToast.error({
                title: 'Error',
                message: '{{ $errors->first('password_confirmation') }}',
                position: 'topRight',
            });
        @endif

        @if ($errors->has('token'))
            iziToast.error({
                title: 'Error',
                message: '{{ $errors->first('token') }}',
                position: 'topRight',
            });
        @endif

        @if ($errors->has('email'))
            iziToast.error({
                title: 'Error',
                message: '{{ $errors->first('email') }}',
                position: 'topRight',
            });
        @endif

        @if (session()->has('status'))
            iziToast.success({
                title: 'Success',
                message: '{{ session()->get('status') }}',
                position: 'topRight',
            });
        @endif
    });
</script>

</body>
</html>