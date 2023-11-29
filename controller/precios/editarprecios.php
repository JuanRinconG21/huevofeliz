<?php
session_start();
include("../../models/MySQL.php");
$conexion = new MySQL();
$pdo = $conexion->conectar();
if (isset($_POST['precio']) && !empty($_POST['precio'])) {
    try {
        $idPrecio = $_POST['idPrecio'];
        $precio = trim($_POST['precio']);
        if (!empty($precio)) {
            //
            $sql2 = "UPDATE precios SET precio=:precio WHERE idPrecios=:idPrecio";
            $stmt3 = $pdo->prepare($sql2);
            $stmt3->bindParam(":idPrecio", $idPrecio, PDO::PARAM_STR);
            $stmt3->bindParam(":precio", $precio, PDO::PARAM_STR);
            $stmt3->execute();
            $_SESSION['mensaje'] = "Precio Actualizado Correctamente";
            header("Location: ../../vista/pages/produccion/precios.php");
        } else {
            $_SESSION['mensajeError'] = "Llene todos los campos";
            header("Location: ../../vista/pages/produccion/precios.php");
        }
    } catch (\Throwable $th) {
        $_SESSION['mensajeError'] = "Ha Ocurrido Un Error";
        header("Location: ../../vista/pages/produccion/precios.php");
    }
} else {
    $_SESSION['mensajeError'] = "Llene todos los campos";
    header("Location: ../../vista/pages/produccion/precios.php");
}
