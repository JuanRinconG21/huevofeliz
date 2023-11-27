<?php
$cedula = $_POST['cedula'];
$nombreCompleto = $_POST['nombreCompleto'];
$fechaNac = $_POST['fechaNac'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$numeroCuenta = $_POST['numeroCuenta'];
$numeroEmergencia = $_POST['numeroEmergencia'];
$nivelEducacion = $_POST['nivelEducacion'];
$experienciaLaboral = $_POST['experienciaLaboral'];
$evaluacionDesempeño = $_POST['evaluacionDesempeño'];
$salario = $_POST['salario'];
$pass = $_POST['pass'];
$checkCargo = $_POST['checkCargo'];
if (
    isset($cedula) && !empty($cedula) && isset($nombreCompleto) && !empty($nombreCompleto) &&
    isset($fechaNac) && !empty($fechaNac) && isset($direccion) && !empty($direccion) &&
    isset($telefono) && !empty($telefono) && isset($correo) && !empty($correo) && isset($numeroCuenta) && !empty($numeroCuenta) &&
    isset($numeroEmergencia) && !empty($numeroEmergencia) && isset($nivelEducacion) && !empty($nivelEducacion) &&
    isset($experienciaLaboral) && !empty($experienciaLaboral) && isset($evaluacionDesempeño) && !empty($evaluacionDesempeño) &&
    isset($salario) && !empty($salario) && isset($pass) && !empty($pass) && isset($checkCargo) && !empty($checkCargo)
) {
    $cedula = trim($cedula);
    $nombreCompleto = trim($nombreCompleto);
    $fechaNac = trim($fechaNac);
    $direccion = trim($direccion);
    $telefono = trim($telefono);
    $correo = trim($correo);
    $numeroCuenta = trim($numeroCuenta);
    $numeroEmergencia = trim($numeroEmergencia);
    $nivelEducacion = trim($nivelEducacion);
    $experienciaLaboral = trim($experienciaLaboral);
    $evaluacionDesempeño = trim($evaluacionDesempeño);
    $salario = trim($salario);
    $pass = trim($pass);
    $fechaIngreso =  date("y-m-d");
    $estado = 0;
    $pass = base64_encode($pass);
    if (
        empty($cedula) || empty($nombreCompleto) || empty($fechaNac) || empty($direccion) || empty($telefono)
        || empty($correo) || empty($numeroCuenta) || empty($numeroEmergencia) || empty($nivelEducacion) || empty($experienciaLaboral)
        || empty($evaluacionDesempeño) || empty($salario) || empty($pass)
    ) {
        echo "ERROR ALGO VACIO";
    } else {
        include("../../models/MySQL.php");
        $conexion = new MySQL();
        $pdo = $conexion->conectar();
        $sql2 =  "INSERT INTO usuario (idUsuario,nombreCompleto,fechaNacimiento,direccionResidencia,numeroTelefono,correo,fechaIngreso,numCuenta,datosEmergencia,nivelEducacion,experenciaLaboral,evalucacion,salario,estado,pass) 
        VALUES(:idUsuario,:nombreCompleto,:fechaNacimiento,:direccionResidencia,:numeroTelefono,:correo,:fechaIngreso,:numCuenta,:datosEmergencia,:nivelEducacion,:experenciaLaboral,:evalucacion,:salario,:estado,:pass)";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->bindParam(":idUsuario", $cedula, PDO::PARAM_INT);
        $stmt2->bindParam(":nombreCompleto", $cedula, PDO::PARAM_STR);
        $stmt2->bindParam(":fechaNacimiento", $fechaNac, PDO::PARAM_STR);
        $stmt2->bindParam(":direccionResidencia", $direccion, PDO::PARAM_STR);
        $stmt2->bindParam(":numeroTelefono", $telefono, PDO::PARAM_STR);
        $stmt2->bindParam(":correo", $correo, PDO::PARAM_STR);
        $stmt2->bindParam(":fechaIngreso", $fechaIngreso, PDO::PARAM_STR);
        $stmt2->bindParam(":numCuenta", $numeroCuenta, PDO::PARAM_STR);
        $stmt2->bindParam(":datosEmergencia", $numeroEmergencia, PDO::PARAM_STR);
        $stmt2->bindParam(":nivelEducacion", $nivelEducacion, PDO::PARAM_STR);
        $stmt2->bindParam(":experenciaLaboral", $experienciaLaboral, PDO::PARAM_STR);
        $stmt2->bindParam(":evalucacion", $evaluacionDesempeño, PDO::PARAM_STR);
        $stmt2->bindParam(":salario", $salario, PDO::PARAM_STR);
        $stmt2->bindParam(":estado", $estado, PDO::PARAM_INT);
        $stmt2->bindParam(":pass", $pass, PDO::PARAM_STR);
        $stmt2->execute();

        //ROLES
        
    }
}
