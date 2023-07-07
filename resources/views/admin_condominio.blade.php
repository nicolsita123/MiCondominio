<!DOCTYPE html>
<html>
<head>
    <title>Tabla</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Rut</th>
                <th>Dv</th>
                <th>Nombre</th>
                <th>SegNOMBRE</th>
                <th>apellido</th>
                <th>apellidom</th>
                <th>fecha</th>
                <th>correo</th>
                <th>contra</th>
                <th>direccion</th>
               
                <!-- Agrega más columnas según tu estructura de tabla -->
            </tr>
        </thead>
        <tbody>
            @foreach ($registros as $registro)
                <tr>
                    <td>{{ $registro->ID_ADMIN }}</td>
                    <td>{{ $registro->NUM_RUT }}</td>
                    <td>{{ $registro->DV_RUT }}</td>
                    <td>{{ $registro->NOM_ADMINISTRADOR }}</td>
                    <td>{{ $registro->SEG_NOMBRE_NOM_ADMINISTRADOR }}</td>
                    <td>{{ $registro->APELLIDO_PA }}</td>
                    <td>{{ $registro->APELLIDO_MA }}</td>
                    <td>{{ $registro->FECHA_NACIMIENTO }}</td>
                    <td>{{ $registro->CORREO_ADMIN }}</td>
                    <td>{{ $registro->CONTRASENA_ADMIN }}</td>
                    <td>{{ $registro->DIRECCION }}</td>
                    <!-- Muestra los campos adicionales según tu estructura de tabla -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
