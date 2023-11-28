<?php
session_start();
include('../models/MySQL.php');
$conexion = new MySQL();
$pdo = $conexion->conectar();

if (isset($_POST['estadoPedido']) && !empty($_POST['estadoPedido'])) {


    try {

       
        $id = $_POST["estadoPedido"];
        $sql2 = "SELECT estado from pedidos where idPedidos=:id";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->bindParam(":id", $id, PDO::PARAM_STR);

      

        $stmt2->execute();
        $fila2 = $stmt2->fetch(PDO::FETCH_ASSOC);
        $estadoPedido2 = $fila2['estado'];


        $sql = "UPDATE pedidos SET estado = 1 WHERE idPedidos = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_STR);
        //$stmt->bindParam(":estadoPedido", $estadoPedido, PDO::PARAM_STR);
        $stmt->execute();

        // Captura los datos de la consulta, captura una sola fila
        $fila = $stmt->fetchAll(PDO::FETCH_ASSOC);
        header("Location: ../vista/pages/logistica/AceptarPedidos.php");
        $_SESSION['mensajeErr2'] = "Se ha Actualizado corretamente";
        $_SESSION['mensajeErr'] = "Felicidades";
    } catch (\Throwable $th) {
        header("Location: ../vista/pages/logistica/AceptarPedidos.php");
    }
} else {
    $_SESSION["error"] = "error";
}
