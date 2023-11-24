<?php 
session_start();
//llamo la conexion a la BD
require_once '../models/MySQL.php';

try {
    // Intenta crear una instancia de la clase MySQL y establecer la conexión
    $conexion = new Mysql();
    $pdo = $conexion->conectar();

    // Verifica si la conexión se estableció correctamente
    if ($pdo) {
        // MENSAJE EXITOSO 
        $_SESSION["mensajeExitoso"] = "Conexion Exitosa a la Base de Datos";
        header("Location:../vista/pages/ventas/local1.php");
    } else {
        // MENSAJE EXITOSO 
        $_SESSION["mensajeError"] = "Error en la Conexion a la Base de Datos";
        header("Location:../vista/pages/ventas/local1.php");
    }

} catch (PDOException $e) {
    // MENSAJE EXITOSO 
    $_SESSION["mensajeError"] = "Error Interno".$e->getMessage();
    header("Location:../vista/pages/ventas/local1.php");
}



?>