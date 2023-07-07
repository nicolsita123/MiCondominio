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
<!-- Navbar -->
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-5">
            <form action="{{route('nuevoresidente')}}">
                <div class="form-row">
                    <div class="col-sm-9 my-1">
                        <div class="input-group">
                            <input type="text" class="form-control" name="texto" value="{{$texto}}">
                            <div class="input-group-append">
                                <input type="submit" class="btn btn-primary" value="Buscar">
                            </div>
                        </div>
                    </div>
                    <div class="col-auto my-1">
                        <a href="{{route('create')}}" class="btn btn-success">Nuevo</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="container-fluid">
    <h4>Residentes</h4>
    <div class="row">
        <div class="col-xl-12">
            <div class="table-responsive" style="text-align: left; overflow-x: auto;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Opciones</th>
                            <th>Id</th>
                            <th>Rut</th>
                            <th>Dv</th>
                            <th>Nombre</th>
                            <th>SegNombre</th>
                            <th>Apellido</th>
                            <th>Seg Apellido</th>
                            <th>Fecha</th>
                            <th>Correo</th>
                            <th>Contrasena</th>
                            <th>Direccion</th>
                            <th>Condominio</th>
                            <th>Cuenta</th>
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
                                <a href="{{ route('edit', $registro->ID_RESIDENTE) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('destroy', $registro->ID_RESIDENTE) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger btn-sm" value="Eliminar">
                                </form>
                                <form action="{{ route('pagar') }}" method="GET" class="d-inline">
                                    <input type="hidden" name="ID_RESIDENTE" value="{{ $registro->ID_RESIDENTE }}">
                                    <button type="submit" class="btn btn-primary d-block h8">Ir a pagar</button>
                                </form>
                            </td>
                            <td>{{$registro->ID_RESIDENTE}}</td>
                            <td>{{$registro->NUM_RUT}}</td>
                            <td>{{$registro->DV_RUT}}</td>
                            <td>{{$registro->NOM_RESIDENTE}}</td>
                            <td>{{$registro->SEG_NOMBRE_RESIDENTE}}</td>
                            <td>{{$registro->APELLIDO_PA}}</td>
                            <td>{{$registro->APELLIDO_MA}}</td>
                            <td>{{$registro->FECHA_NACIMIENTO}}</td>
                            <td>{{$registro->CORREO_RESIDENTE}}</td>
                            <td>{{$registro->CONTRASENA_RESIDENTE}}</td>
                            <td>{{$registro->DIRECCION}}</td>
                            <td>{{$registro->ID_CONDOMINIO}}</td>
                            <td>{{$registro->ID_CUENTA}}</td>
                        </tr>
                    @endforeach
                    @endif
                    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        
@endif

        
    </div>




                    </tbody>
                </table>
                {{$registros->links()}}
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</html>
