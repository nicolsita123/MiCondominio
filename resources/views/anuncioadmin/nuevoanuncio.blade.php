<!DOCTYPE html>
<html>
<head>
    <link href="https://unpkg.com/tailwindcss@1.2.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    
    <title> Anuncio</title>
    <!-- component -->
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
    <h4>Nuevo anuncio</h4>
    <div class="row">
        <div class="col-xl-12">
            <form action="{{route('anuncio_administrador.store')}}" method="post">
                @csrf
               
                <div class="form-group">
                    <label for="DESCRIPCION">DESCRIPCION</label>
                    <input type="text" class="form-control" name="DESCRIPCION" required maxlength="70">
                </div>
                
                <div class="form-group">
    <label for="ID_ADMIN">Administrador</label>
    <select class="form-control" name="ID_ADMIN">
        <option value="">Seleccionar</option>
        <option value="1" @if(isset($registro) && $registro->ID_ADMIN == 1) selected @endif>Felix Sobczak</option>
        <option value="2" @if(isset($registro) && $registro->ID_ADMIN == 2) selected @endif>Bryan Sear</option>
        <option value="3" @if(isset($registro) && $registro->ID_ADMIN == 3) selected @endif>Clark Blandamere</option>
        <option value="4" @if(isset($registro) && $registro->ID_ADMIN == 4) selected @endif>Hyacinth Groundwater</option>
        <option value="5" @if(isset($registro) && $registro->ID_ADMIN == 5) selected @endif>Salim Dikles</option>
    </select>
</div>
                
               
                <div class="form-group">
                    <input type="submit" class="btn-btn-primary" value="Guardar">
                    <input type="reset" class="btn-btn-default" value="Cancelar">
                    <a href="{{ route('anuncio_administrador.vista') }}">Volver</a>
                </div>

            </form>

</div>
</div>
</div>
</body>