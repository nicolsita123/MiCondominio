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
    <h4>Nuevo reserva</h4>
    <div class="row">
    <div class="col-md-6">
            <form action="{{route('reserva.store')}}" method="post">
                @csrf
                
                <div class="form-group">
                    <label for="FEC_RESERVA">FEC_RESERVA</label>
                    <input type="date" class="form-control" name="FEC_RESERVA" required maxlength="70">
                </div>
                <div class="form-group">
                    <label for="HORA_INICIO">HORA_INICIO</label>
                    <input type="time" name="HORA_INICIO" value="{{ old('HORA_INICIO') }}">

                </div>

                <div class="form-group">
                    <label for="HORA_TERMINO">HORA_TERMINO</label>
                    <input type="time" name="HORA_TERMINO" value="{{ old('HORA_TERMINO') }}">

                </div>
                
<!-- ID RESIDENTE PERO PARA QUE SE MUESTRE EL NOMBREE JIJI -->

               <div class="form-group">
                <label for="ID_RESIDENTE">Nombre residente</label>
                <select class="form-control" name="ID_RESIDENTE" required>

                    <?php

                    use App\Models\Residente;
                    $registros = Residente::all();

                    foreach ($registros as $registro) {
                    $id = $registro->ID_RESIDENTE;
                    $nombre = $registro->NOM_RESIDENTE;
                    $apellido = $registro->APELLIDO_PA;
                    $nombreCompleto = $nombre . ' ' . $apellido;
                    echo "<option value=\"$id\">$nombreCompleto</option>";
                    }
                    ?>
                    </select>
                </div>
                </div>
                
                <div class="col-md-6">

<!-- ID SERVICIOOOO -->


<div class="form-group">
    <label for="ID_SERVICIO">Nombre servicio</label>
    <select class="form-control" name="ID_SERVICIO" id="ID_SERVICIO" required onchange="calcularTotal()">
        <?php
        use App\Models\Servicio;
        $registros = Servicio::all();

        foreach ($registros as $registro) {
            $id = $registro->ID_SERVICIO;
            $nombre = $registro->DESCRIPCION;
            $monto = $registro->MONTO_SERVICIO; // Obtener el monto del servicio
            echo "<option value=\"$id\" data-monto=\"$monto\">$nombre</option>";
        }
        ?>
    </select>
</div>

<div class="form-group">
    <label for="monto_servicio">Monto del servicio</label>
    <input type="text" class="form-control" id="monto_servicio" name="monto_servicio" readonly>
</div>

<div class="form-group">
    <label for="ID_ESPACIO">Nombre espacio comun</label>
    <select class="form-control" name="ID_ESPACIO" id="ID_ESPACIO" required onchange="calcularTotal()">
        <?php
        use App\Models\Espacio_comun;

        $registros = Espacio_comun::all();

        foreach ($registros as $registro) {
            $id = $registro->ID_ESPACIO;
            $nombre = $registro->DESCRIPCION;
            $montoarriendo = $registro->MONTO_ARRIENDO;
            echo "<option value=\"$id\" data-montoarriendo=\"$montoarriendo\">$nombre</option>";
        }
        ?>
    </select>
</div>

<div class="form-group">
    <label for="monto_arriendo">Monto del arriendo</label>
    <input type="text" class="form-control" id="monto_arriendo" name="monto_arriendo" readonly>
</div>



<!-- ID CONSERJE -->
<!-- Conserje -->
<div class="form-group">
    <label for="ID_CONSERJE">Conserje</label>
    <select class="form-control" name="ID_CONSERJE">
        <option value="">Seleccionar</option>
        <option value="1" @if(isset($registro) && $registro->ID_CONSERJE == 1) selected @endif>Tawnya Adrien</option>
        <option value="2" @if(isset($registro) && $registro->ID_CONSERJE == 2) selected @endif>Fields Illing</option>
        <option value="3" @if(isset($registro) && $registro->ID_CONSERJE == 3) selected @endif>Carina Smy</option>
        <option value="4" @if(isset($registro) && $registro->ID_CONSERJE == 4) selected @endif>Gillie Kores</option>
        <option value="5" @if(isset($registro) && $registro->ID_CONSERJE == 5) selected @endif>Lauryn Jewell</option>
    </select>
</div>

<!-- Administrador -->
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
    <label for="total">Total</label>
    <input type="text" class="form-control" id="total" name="total" readonly>
</div>

<script>
    // Función para actualizar los montos y el total
    function calcularTotal() {
        // Obtener los valores seleccionados de los menús desplegables
        const selectServicio = document.getElementById('ID_SERVICIO');
        const montoServicio = parseFloat(selectServicio.options[selectServicio.selectedIndex].getAttribute('data-monto')) || 0;

        const selectEspacio = document.getElementById('ID_ESPACIO');
        const montoArriendo = parseFloat(selectEspacio.options[selectEspacio.selectedIndex].getAttribute('data-montoarriendo')) || 0;

        // Actualizar los campos individuales
        document.getElementById('monto_servicio').value = montoServicio.toFixed(2);
        document.getElementById('monto_arriendo').value = montoArriendo.toFixed(2);

        // Calcular y actualizar el total
        const total = montoServicio + montoArriendo;
        document.getElementById('total').value = total.toFixed(2);
    }

    // Inicializar los valores al cargar la página
    document.addEventListener('DOMContentLoaded', () => {
        calcularTotal();
    });
</script>



                </div>


            

            <div class="form-group">
                    <input type="submit" class="btn-btn-primary" value="Guardar">
                    <input type="reset" class="btn-btn-default" value="Cancelar">
                    <a href="{{ route('reserva.vista') }}">Volver</a>
                </div>
                </form>

</div>
</div>
</div>
</body>