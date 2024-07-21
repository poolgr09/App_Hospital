<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagina principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-image: url("inicio.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;

        }
    </style>
</head>

<body>
    <div class="container">
        <div class="position-relative">
            <div class="row col-md-12">
                
                    <div > 
                            @if (Route::has('login'))
                            @auth
                                <div class="row md-auto btn btn-info">
                        
                                    <a href="{{ url('/index') }}">Home</a>
                                </div>
                            @else
                                <div class="row col-md-2 float-right">
                                    <a href="{{ route('login') }}" class="btn btn-info" style="color: beige">Ingresar al sistema</a>
                                </div>
                                    

                                @if (Route::has('register'))
                                <div>
                                    <div class="row col-md-2 float-right">
                                        <a href="{{ route('register') }}" class="btn btn-primary">Registrarse</a>
                                    </div>
                                </div>    
                                @endif
                            @endauth
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>

</html>
