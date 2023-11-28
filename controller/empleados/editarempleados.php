<?php
session_start();
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
    try {
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

        // Convertir ambas fechas a timestamps para compararlas
        $timestampFechaIngresada = strtotime($fechaNac);
        $timestampFechaActual = strtotime($fechaIngreso);


        if ($timestampFechaIngresada > $timestampFechaActual) {
            $_SESSION['mensajeError'] = "La Fecha Ingresada no puede ser Mayor";
            header("Location: ../../vista/pages/empleados/agregarempleados.php");
        } else {
            if (
                empty($cedula) || empty($nombreCompleto) || empty($fechaNac) || empty($direccion) || empty($telefono)
                || empty($correo) || empty($numeroCuenta) || empty($numeroEmergencia) || empty($nivelEducacion) || empty($experienciaLaboral)
                || empty($evaluacionDesempeño) || empty($salario) || empty($pass)
            ) {
                $_SESSION['mensajeError'] = "No deje Campos Vacios";
                header("Location: ../../vista/pages/empleados/agregarempleados.php");
            } else {
                include("../../models/MySQL.php");
                $conexion = new MySQL();
                $pdo = $conexion->conectar();
                $sql2 =  "UPDATE usuario SET
                    nombreCompleto = :nombreCompleto,
                    fechaNacimiento = :fechaNacimiento, 
                    direccionResidencia = :direccionResidencia, 
                    numeroTelefono = :numeroTelefono,
                    correo = :correo,
                    numCuenta = :numCuenta,
                    datosEmergencia = :datosEmergencia,
                    nivelEducacion = :nivelEducacion,
                    experenciaLaboral = :experenciaLaboral ,
                    evalucacion = :evalucacion,
                    salario = :salario,
                    estado = :estado,
                    pass = :pass WHERE idUsuario = :idUsuario";
                $stmt2 = $pdo->prepare($sql2);
                $stmt2->bindParam(":idUsuario", $cedula, PDO::PARAM_INT);
                $stmt2->bindParam(":nombreCompleto", $nombreCompleto, PDO::PARAM_STR);
                $stmt2->bindParam(":fechaNacimiento", $fechaNac, PDO::PARAM_STR);
                $stmt2->bindParam(":direccionResidencia", $direccion, PDO::PARAM_STR);
                $stmt2->bindParam(":numeroTelefono", $telefono, PDO::PARAM_STR);
                $stmt2->bindParam(":correo", $correo, PDO::PARAM_STR);
                $stmt2->bindParam(":numCuenta", $numeroCuenta, PDO::PARAM_STR);
                $stmt2->bindParam(":datosEmergencia", $numeroEmergencia, PDO::PARAM_STR);
                $stmt2->bindParam(":nivelEducacion", $nivelEducacion, PDO::PARAM_STR);
                $stmt2->bindParam(":experenciaLaboral", $experienciaLaboral, PDO::PARAM_STR);
                $stmt2->bindParam(":evalucacion", $evaluacionDesempeño, PDO::PARAM_STR);
                $stmt2->bindParam(":salario", $salario, PDO::PARAM_STR);
                $stmt2->bindParam(":estado", $estado, PDO::PARAM_INT);
                $stmt2->bindParam(":pass", $pass, PDO::PARAM_STR);
                $stmt2->execute();

                $sql3 =  "DELETE FROM usuario_has_roles WHERE Usuario_idUsuario=:Usuario_idUsuario";
                $stmt3 = $pdo->prepare($sql3);
                $stmt3->bindParam(":Usuario_idUsuario", $cedula, PDO::PARAM_INT);
                $stmt3->execute();
                foreach ($checkCargo as $key) {
                    $sql3 =  "INSERT INTO usuario_has_roles (Usuario_idUsuario,Roles_idRoles) 
                    VALUES (:Usuario_idUsuario,:Roles_idRoles)";
                    $stmt3 = $pdo->prepare($sql3);
                    $stmt3->bindParam(":Usuario_idUsuario", $cedula, PDO::PARAM_INT);
                    $stmt3->bindParam(":Roles_idRoles", $key, PDO::PARAM_INT);
                    $stmt3->execute();
                }
                $_SESSION['mensaje'] = "Actualizado Correctamente";
                header("Location: ../../vista/pages/empleados/agregarempleados.php");
            }
        }
    } catch (\Throwable $th) {
        $_SESSION['mensajeError'] = "Ha Ocurrido un Error Interno";
        echo $th;
    }
}
