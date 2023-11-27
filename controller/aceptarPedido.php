<?php
session_start();
include('../models/MySQL.php');
$conexion = new MySQL();
$pdo = $conexion->conectar();

if (isset($_POST['estadoPedido']) && !empty($_POST['estadoPedido'])) {


    try {

        $_POST['estadoPedido'] = trim($_POST['estadoPedido']);
        $estadoPedido = $_POST['estadoPedido'];
        $id = $_POST["idPedidos"];

        $sql = "UPDATE pedidos SET estado = :estadoPedido WHERE idPedidos = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_STR);
        $stmt->bindParam(":estadoPedido", $estadoPedido, PDO::PARAM_STR);
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
