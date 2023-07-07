<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">     
        <title>Login</title>
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    </head>
    <body>
        <div class="login-box">
            <img class="logo" src="{{ asset('images/logoBLANCO.jpg') }}">
            <h1>Iniciar sesión</h1>
            <form action ="{{route('login-user')}}" method="POST">

            @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
            @csrf
                <!---Usuario va aqui-->
                <label for="username">Usuario</label>
                <input type="text" name="correo_residente" value="{{old('correo_residente')}}" placeholder="Ingresar correo">
                <span class="text-sm ml-2">@error('correo_residente') {{$message}} @enderror</span>

                <label for="contrasena">Contraseña</label>
                <input type="password" name="contrasena_residente" value="{{old('contrasena_residente')}}" placeholder="Ingresar contraseña">
                <span class="text-sm ml-2">@error('contrasena_residente') {{$message}} @enderror</span>

                <div class="contenedor-boton">
                <a href="{{ route('residente') }}">
                <button type="button">Iniciar sesión</button>
                </a>

                </div>       
                <br>
                <br>
                <a href="#">Olvidé mi contraseña</a>
               
            </form>
        </div>

    </body>

</html>