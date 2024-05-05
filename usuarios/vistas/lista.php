<?php
require_once("../config/conexion.php");

// Consulta SQL para obtener datos de las tablas `datospersonales` y `atributos`
$consulta = $mysqli->query("SELECT datospersonales.*, atributos.*
                          FROM datospersonales
                          LEFT JOIN atributos ON datospersonales.cedula = atributos.id_cedula ");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Personales</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>


<body>
  <div class= "container">
    <h1>Datos Personales</h1>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insert">
  NUEVO PERSONAL
</button>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class= "table table-dark">
                <tr>
                    <th scope="col">ID Cédula</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Jerarquía</th>
                    <th scope="col">Nombres y Apellidos</th>
                    <th scope="col">Cédula</th>
                    <th scope="col">Fecha Nacimiento</th>
                    <th scope="col">Dirección Domicilio</th>
                    <th scope="col">Dirección Emergencia</th>
                    <th scope="col">Número Teléfono 1</th>
                    <th scope="col">Número Teléfono 2</th>
                    <th scope="col">Año Graduación</th>
                    <th scope="col">Cargo Actual</th>
                    <th scope="col">Estado Situacional</th>
                    <th scope="col">Nombre Promoción</th>
                    <th scope="col">Número Cuenta</th>
                    <th scope="col">Centro Votación</th>
                    <th scope="col">Correo Electrónico</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
</div>
            <tbody>
                <?php
                while ($resultado = $consulta->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $resultado["id_cedula"] . "</td>";
                    echo "<td>" . $resultado["foto"] . "</td>"; // Assuming a Foto column exists
                    echo "<td>" . $resultado["jerarquia"] . "</td>"; // Assuming a jerarquia column exists
                    echo "<td>" . $resultado["nombres"] . " </td>";
                    echo "<td>" . $resultado["cedula"] . "</td>"; // Potential duplicate, clarify column name
                    echo "<td>" . $resultado["fnacimiento"] . "</td>"; // Assuming a fnacimiento column exists
                    echo "<td>" . $resultado["ddomicilio"] . "</td>"; // Assuming a ddomicilio column exists
                    echo "<td>" . $resultado["demergencia"] . "</td>"; // Assuming a demergencia column exists
                    echo "<td>" . $resultado["nro1"] . "</td>"; // Assuming a nro1 column exists
                    echo "<td>" . $resultado["nro2"] . "</td>"; // Assuming a nro2 column exists
                    echo "<td>" . $resultado["agraduacion"] . "</td>"; // Assuming a agraduacion column exists
                    echo "<td>" . $resultado["cargotual"] . "</td>";
                    echo "<td>" . $resultado["edositua"] . "</td>"; // Assuming a cargotual column exists
                    echo "<td>" . $resultado["npromo"] . "</td>"; // Assuming a npromo column exists
                    echo "<td>" . $resultado["nrocuenta"] . "</td>"; // Assuming a nrocuenta column exists
                    echo "<td>" . $resultado["cvotacion"] . "</td>"; // Assuming a cvotacion column exists
                    echo "<td>" . $resultado["celectronico"] . "</td>"; // Assuming a celectronico column exist
                    
                    echo "<td>
                        <a href='form_edit.php?iddatospersonales=" . $resultado["id"] . "&idatributos=" . $resultado["id_cedula"] . "'>Editar</a>
                        <a href='delete.php?iddatospersonales=" . $resultado["cedula"] . "&idatributos=" . $resultado["id_cedula"] . "'>Eliminar</a>
                    </td>";
                    echo "</tr>";
                }
                ?>
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            </tbody>
            </html>