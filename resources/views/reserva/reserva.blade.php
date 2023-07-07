<!DOCTYPE html>
<html>
<head>
    <link href="https://unpkg.com/tailwindcss@1.2.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
<div class="container2">
        <div class="row2">
            <div class="col-xl-12">
                <form action="{{route('reserva.vista')}}">
                    <div class="form-row">
                        <div class="col-sm-4 my-1">
                        <input type="text" class="form-control" name="texto" value={{$texto}}>
                        </div>
                        <div class="col-auto my-1">
                            <input type="submit" class="btn btn-primary" value="Buscar">
                        </div>
                        <a href="{{route('reserva.nuevareserva')}}" class="btn btn-success">Nuevo</a>
                    </div>
                </form>
            </div>

        </div>


    </div>
    <div class="container">
        <h4>Reserva</h4>
        <div class="row">
            <div class="col-lx-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Opciones</th>
                                <th>ID_RESERVA</th>
                                <th>FEC_RESERVA</th>
                                <th>HORA_INICIO</th>
                                <th>HORA_TERMINO</th>
                                <th>ID_RESIDENTE</th>
                                <th>ID_SERVICIO</th>
                                <th>ID_ESPACIO</th>
                                <th>ID_CONSERJE</th>
                                <th>ID_ADMIN</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(count($registros)<=0)
                        <tr> 
                            <td colspan=9>No hay resultados</td>
                        </tr>
                        @else
                         @foreach ($registros as $registro)
                            <tr>
                                <td>
                                    
                                    <form action="{{ route('reserva.destroy', $registro->ID_RESERVA) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger btn-sm" value="Eliminar">
                                    </form>
                                   
                                </td>
                                <td>{{$registro->ID_RESERVA}}</td>
                                <td>{{$registro->FEC_RESERVA}}</td>
                                <td>{{$registro->HORA_INICIO}}</td>
                                <td>{{$registro->HORA_TERMINO}}</td>                              
                                <td>{{$registro->ID_RESIDENTE}}</td>
                                <td>{{$registro->ID_SERVICIO}}</td>
                                <td>{{$registro->ID_ESPACIO}}</td>
                                <td>{{$registro->ID_CONSERJE}}</td>
                                <td>{{$registro->ID_ADMIN}}</td>

                            </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                    {{$registros->links()}}
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.
