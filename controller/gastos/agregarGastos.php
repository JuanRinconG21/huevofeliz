<?php
session_start();
include("../../models/MySQL.php");
$conexion = new MySQL();
$pdo = $conexion->conectar();
if (isset($_POST['precio']) && !empty($_POST['precio'])) {
    $idCompras = $_POST['idProd'];
    $cantidad = trim($_POST['cantidad']);
    if (!empty($cantidad)) {
        $sql = "SELECT * FROM compras WHERE idCompras = :idCompras";
        $stmt2 = $pdo->prepare($sql);
        $stmt2->bindParam(":idCompras", $idCompras, PDO::PARAM_STR);
        $stmt2->execute();
        $fila = $stmt2->fetch(PDO::FETCH_ASSOC);
        $cantidadEnStock = $fila['cantidad'];
        if ($cantidad > $cantidadEnStock) {
            $_SESSION['mensajeError'] = "No hay tanta cantidad en stock de este producto";
            header("Location: ../../vista/pages/produccion/gastos.php");
        } else {
            $sql2 = "INSERT INTO gastos (Compras_idCompras,cantidad) VALUES (:Compras_idCompras,:cantidad)";
            $stmt3 = $pdo->prepare($sql2);
            $stmt3->bindParam(":Compras_idCompras", $idCompras, PDO::PARAM_STR);
            $stmt3->bindParam(":cantidad", $cantidad, PDO::PARAM_STR);
            $stmt3->execute();
            //
            $cantidadFinal = $cantidadEnStock - $cantidad;
            $sql2 = "UPDATE compras SET cantidad=:cantidad WHERE idCompras=:idCompras";
            $stmt3 = $pdo->prepare($sql2);
            $stmt3->bindParam(":idCompras", $idCompras, PDO::PARAM_STR);
            $stmt3->bindParam(":cantidad", $cantidadFinal, PDO::PARAM_STR);
            $stmt3->execute();
            $_SESSION['mensaje'] = "Gasto Registrado Correctamente";
            header("Location: ../../vista/pages/produccion/gastos.php");
        }
    }
} else {
    $_SESSION['mensajeError'] = "Llene todos los campos";
    header("Location: ../../vista/pages/produccion/gastos.php");
}
