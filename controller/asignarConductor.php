<?php
session_start();
include('../models/MySQL.php');
$conexion = new MySQL();
$pdo = $conexion->conectar();
if (isset($_POST['idPedido']) && !empty($_POST['idPedido'])) {

    try {

        $id = $_POST["idPedido"];
        $estado = "2";
        $idUsuario = $_POST["idUsuario"];
        $editarPedido = "UPDATE pedidos SET estado = :estadoPedido, Usuario_idUsuario = :idUsuario where idPedidos= :id";
        $stmt = $pdo->prepare($editarPedido);
        $stmt->bindParam(":id", $id, PDO::PARAM_STR);
        $stmt->bindParam(":estadoPedido", $estado, PDO::PARAM_STR);
        $stmt->bindParam(":idUsuario", $idUsuario, PDO::PARAM_STR);
        $stmt->execute();
        //echo "$idUsuario";
        //echo "$id";
        //echo "$estado";
        header("Location: ../vista/pages/logistica/asignarConductores.php");
        //echo "SIRVIO";
    } catch (\Throwable $th) {
        echo $th->getMessage();
        // header("Location: ../vista/pages/logistica/AceptarPedidos.php");
    }
} else {
    $_SESSION["error"] = "error al confirmar";
    $_SESSION["error2"] = "error";
    //echo "se daña";
}
