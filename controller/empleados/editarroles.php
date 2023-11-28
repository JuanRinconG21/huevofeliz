<?php
session_start();
include("../../models/MySQL.php");
$conexion = new MySQL();
$pdo = $conexion->conectar();
if (isset($_POST['checkCargo']) && !empty($_POST['checkCargo'])) {
    $cedula = $_POST['cedula'];
    try {
        $checkCargo = $_POST['checkCargo'];
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
    } catch (\Throwable $th) {
        $_SESSION['mensajeError'] = "Ha ocurrido un Error";
        header("Location: ../../vista/pages/empleados/agregarempleados.php");
    }
} else {
    $_SESSION['mensajeError'] = "No deje Campos Vacios";
    header("Location: ../../vista/pages/empleados/agregarempleados.php");
}
