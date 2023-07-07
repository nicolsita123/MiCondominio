<!DOCTYPE html>
<html lang="en" data-theme="cmyk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/pagar.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- component -->
    <title>Document</title>
</head>
<body>
    
       <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
   
     
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{route('residente')}}">Residente</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('reserva.vista')}}">Reserva</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('libro.vista')}}">Libro</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('anuncio_administrador.vista')}}">Anuncio</a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    
</nav>
    <div class="container">
        <div class="row m-0">
            <div class="col-md-7 col-12">
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="row box-right">
                            <div class="col-md-8 ps-0">
                                
                                <p class="ps-3 text-muted fw-bold h6 mb-0">DEUDA</p>
                                @foreach ($registros as $registro)
                                    <p class="h1 fw-bold d-flex">
                                        {{$registro->TOTAL_PAGO}}
                                        <span class="text-muted"></span>
                                    </p>
                                    <p class="ms-3 px-2 bg-red">Mes atrasado: 1</p>
                                    <button type="submit"></button>
                                @endforeach
                            </div>
                            <div class="col-md-4">
                                <p class="p-org">
                                    <span class="fas fa-circle pe-2"></span>
                                </p>
                                <p class="fw-bold"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 px-0 mb-4">
                        <!-- Otras secciones de la vista -->
                    </div>
                    <div class="">
                        <p class="h7 fw-bold mb-1">Detalles deudor</p>
                        <p></p>
                        <div class="form">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card border-0">
                                        @foreach ($registros as $registro)
                                            <p>{{$registro->NOM_RESIDENTE}}</p>
                                            <a href="{{ $url_to_pay }}" class="btn btn-primary d-block h8">
    Pagar {{ $registros->first()->TOTAL_PAGO }} <span class="fas fa-dollar-sign ms-2"></span><span class="ms-3 fas fa-arrow-right"></span>
</a>

                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
