
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hospital Isidro Ayora</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css?v=3.2.0">
    <script type="text/javascript"
        src="https://me.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=oCgBeneJD18mtb47NceHatW1qS0qnN6DdbYYuoX5sZnkckr_PyEy7_LoMw0-EGahg8z9NKLhYEdRSOTEMJyryK39pWzlxp4nyHpcc1BEFWc"
        charset="UTF-8"></script>
</head>

<body class="hold-transition login-page"
    style="background-image: url('{{ url('assets/img/hero-bg.jpg') }}');
background-repeat:no-repeat;
background-size: 100vw 100vh;
background-attachment: fixed">
    <div class="login-box">

        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{url('login')}}" class="h1"><b>Hospital Isidro Ayora</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg"><b>Registro de usuario</b></p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row">
                        <label for="name" class="col-form-label text-md-end ">Nombres</label>

                        <div class="col-md-12">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <label for="email" class="col-form-label text-md-end">Correo Electrónico</label>

                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <label for="password" class="col-form-label text-md-end">Contraseña</label>

                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <label for="password-confirm" class="col-form-label text-md-end">Confirme Contraseña</label>

                        <div class="col-md-12">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                Registrarse
                            </button>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>


    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/adminlte.min.js?v=3.2.0"></script>
</body>

</html>

