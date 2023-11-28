<?php
session_start();
include('../models/MySQL.php');
$conexion = new MySQL();
$pdo = $conexion->conectar();



if (isset($_POST['idPedidos']) && !empty($_POST['idPedidos'])) {

    try {


      
        $editarPedido = "UPDATE pedidos SET estado = :estadoPedido, idUsuario = :idUsuario where idPedidos= :id";

        $id = $_POST["idPedidos"];
        $estado = "2";
        $idUsuario = $_POST["idUsuario"];

    


        $stmt = $pdo->prepare($editarPedido);
        $stmt->bindParam(":id", $id, PDO::PARAM_STR);
        $stmt->bindParam(":estadoPedido", $estado, PDO::PARAM_STR);
        $stmt->bindParam(":idUsuario", $idUsuario, PDO::PARAM_STR);

        $stmt->execute();
        
        header("Location: ../vista/pages/logistica/asignarConductores.php");
        $_SESSION['mensajeErr2'] = "Se ha Confirmado corretamente";
        $_SESSION['mensajeErr'] = "Felicidades";
    } catch (\Throwable $th) {
        echo $th->getMessage();
        // header("Location: ../vista/pages/logistica/AceptarPedidos.php");
    }
} else {
    $_SESSION["error"] = "error al confirmar";
    $_SESSION["error2"] = "error";
    echo "se daña";
}
