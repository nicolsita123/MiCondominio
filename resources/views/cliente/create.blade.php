<!DOCTYPE html>
<html>
<head>
    <link href="https://unpkg.com/tailwindcss@1.2.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    
    <title> Ola</title>
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
    <h4>Nuevo residente</h4>
    <div class="row">
        <div class="col-md-6">
            <form action="{{route('residente.store')}}" method="post">
                @csrf
              
                <div class="form-group">
                <label for="NUM_RUT">Rut</label>
                <input type="text" class="form-control" name="NUM_RUT" pattern="[0-9]+" title="Solo se permiten números" required maxlength="8">
                </div>


                <div class="form-group">
                    <label for="DV_RUT">Digito verificador</label>
                    <input type="text" class="form-control" name="DV_RUT" required maxlength="1">
                </div>

                <div class="form-group">
                <label for="NOM_RESIDENTE">Primer nombre</label>
                <input type="text" class="form-control" name="NOM_RESIDENTE" pattern="[A-Za-z]+" title="Solo se permiten letras" required maxlength="70">
                </div>


                <div class="form-group">
                    <label for="SEG_NOMBRE_RESIDENTE">Segundo nombre</label>
                    <input type="text" class="form-control" name="SEG_NOMBRE_RESIDENTE" pattern="[A-Za-z]+" required maxlength="70">
                </div>

                <div class="form-group">
                    <label for="APELLIDO_PA">Apellido paterno</label>
                    <input type="text" class="form-control" name="APELLIDO_PA" pattern="[A-Za-z]+" required maxlength="70">
                </div>

                <div class="form-group">
                    <label for="APELLIDO_MA">Apellido materno</label>
                    <input type="text" class="form-control" name="APELLIDO_MA"  pattern="[A-Za-z]+"required maxlength="70">
                </div>
                </div> <!-- Cierre de la primera columna -->

            <div class="col-md-6">
                
                <div class="form-group">
                    <label for="FECHA_NACIMIENTO">Fecha nacimiento</label>
                    <input type="date" class="form-control" name="FECHA_NACIMIENTO" required maxlength="70">
                </div>
                <div class="form-group">
                    <label for="CORREO_RESIDENTE">Correo electronico</label>
                    <input type="email" class="form-control" name="CORREO_RESIDENTE" required maxlength="70">
                </div>

                <div class="form-group">
                    <label for="CONTRASENA_RESIDENTE">Contraseña</label>
                    <input type="text" class="form-control" name="CONTRASENA_RESIDENTE" required maxlength="70">
                </div>

                <div class="form-group">
                    <label for="DIRECCION">Dirección</label>
                    <input type="text" class="form-control" name="DIRECCION" required maxlength="70">
                </div>

                <div class="form-group">
    <label for="ID_CONDOMINIO">Condominio</label>
    <select class="form-control" name="ID_CONDOMINIO" required>
        <option value="">Seleccionar</option>
        <option value="1" @if(isset($registro) && $registro->ID_CONDOMINIO == 1) selected @endif>Pelluco</option>
        <option value="2" @if(isset($registro) && $registro->ID_CONDOMINIO == 2) selected @endif>Mirasol</option>
        <option value="3" @if(isset($registro) && $registro->ID_CONDOMINIO == 3) selected @endif>Cardonal</option>
        <option value="4" @if(isset($registro) && $registro->ID_CONDOMINIO == 4) selected @endif>Libertad</option>
        <option value="5" @if(isset($registro) && $registro->ID_CONDOMINIO == 5) selected @endif>Chamiza</option>
    </select>
    </div>
    
    <div class="form-group">
    <label for="ID_CUENTA">Cuenta</label>
    <select class="form-control" name="ID_CUENTA" required>
        <option value="4" @if(isset($registro) && $registro->ID_CUENTA == 4) selected @endif>Residente</option>
        
    </select>
    </div>

               
                <div class="form-group">
                    
                    <input type="submit" class="btn-btn-primary" value="Guardar">
                    <input type="reset" class="btn-btn-default" value="Cancelar">
                    <a href="{{ route('residente') }}">Volver</a>
                </div>

            </form>

</div>
</div>
</div>
</body>