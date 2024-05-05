<?php
require_once("../config/conexion.php");

// Verificamos si el formulario se ha enviado y si se han establecido todos los campos obligatorios
if (isset($_POST["foto"]) &&
    isset($_POST["jerarquia"]) &&
    isset($_POST["nombres"]) &&
    isset($_POST["cedula"]) &&
    isset($_POST["fnacimiento"]) &&
    isset($_POST["ddomicilio"]) &&
    isset($_POST["demergencia"]) &&
    isset($_POST["nro1"]) &&
    isset($_POST["nro2"]) &&
    isset($_POST["agraduacion"]) &&
    isset($_POST["cargotual"]) &&
    isset($_POST["edositua"]) &&
    isset($_POST["npromo"]) &&
    isset($_POST["nrocuenta"]) &&
    isset($_POST["cvotacion"]) &&
    isset($_POST["celectronico"])) {

    // **Limpiamos la entrada del usuario (importante para la seguridad):**
    // Este paso es crucial para prevenir vulnerabilidades de inyección SQL. Puede usar mysqli_real_escape_string() para escapar caracteres especiales en los datos de entrada.
    $foto = mysqli_real_escape_string($mysqli, $_POST["foto"]);
    $jerarquia = mysqli_real_escape_string($mysqli, $_POST["jerarquia"]);
    $nombres = mysqli_real_escape_string($mysqli, $_POST["nombres"]);
    $cedula = mysqli_real_escape_string($mysqli, $_POST["cedula"]);
    $fnacimiento = mysqli_real_escape_string($mysqli, $_POST["fnacimiento"]);
    $ddomicilio = mysqli_real_escape_string($mysqli, $_POST["ddomicilio"]);
    $demergencia = mysqli_real_escape_string($mysqli, $_POST["demergencia"]);
    $nro1 = mysqli_real_escape_string($mysqli, $_POST["nro1"]);
    $nro2 = mysqli_real_escape_string($mysqli, $_POST["nro2"]);
    $agraduacion = mysqli_real_escape_string($mysqli, $_POST["agraduacion"]);
    $cargotual = mysqli_real_escape_string($mysqli, $_POST["cargotual"]);
    $edositua = mysqli_real_escape_string($mysqli, $_POST["edositua"]);
    $npromo = mysqli_real_escape_string($mysqli, $_POST["npromo"]);
    $nrocuenta = mysqli_real_escape_string($mysqli, $_POST["nrocuenta"]);
    $cvotacion = mysqli_real_escape_string($mysqli, $_POST["cvotacion"]);
    $celectronico = mysqli_real_escape_string($mysqli, $_POST["celectronico"]);

    // **Insertamos en la tabla datospersonales:**
    $consulta = "INSERT INTO datospersonales (
                    foto, jerarquia, nombres, cedula, fnacimiento, ddomicilio, demergencia, nro1, nro2, agraduacion, cargotual, edositua, npromo, nrocuenta, cvotacion, celectronico)
                  VALUES ($foto, $jerarquia, $nombres, $cedula, $fnacimiento, $ddomicilio, $demergencia, $nro1, $nro2, $agraduacion, $cargotual, $edositua, $npromo,$nrocuenta, $cvotacion, $celectronico)";

    $resultado = $mysqli->query($consulta);

    // **Verificamos si la inserción fue exitosa y obtenemos el último ID insertado:**
    if ($resultado) {
        $ultimo_id = $mysqli->insert_id;
    } else {
        echo "Error al insertar datos en la tabla datospersonales: " . $mysqli->error;
        exit; // Terminamos la ejecución del script en caso de error
    }
    }
?>
