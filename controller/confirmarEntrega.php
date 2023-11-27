<?php
session_start();
include('../models/MySQL.php');
$conexion = new MySQL();
$pdo = $conexion->conectar();



if (isset($_POST['idPedidos']) && !empty($_POST['idPedidos'])) {

    try {


        $id = $_POST["idPedidos"];
        $sql2 = "SELECT estado from pedidos where idPedidos=:id";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->bindParam(":id", $id, PDO::PARAM_STR);

        $stmt2->execute();
        $fila2 = $stmt2->fetch(PDO::FETCH_ASSOC);
        $estadoPedido2 = $fila2['estado'];




        $sql = "UPDATE pedidos SET estado = 3 WHERE idPedidos = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_STR);
        /*  $stmt->bindParam(":estadoPedido", $estadoPedido, PDO::PARAM_STR); */
        $stmt->execute();

        // Captura los datos de la consulta, captura una sola fila
        $fila = $stmt->fetchAll(PDO::FETCH_ASSOC);
        header("Location: ../vista/pages/logistica/ConfirmarEntrega.php");
        $_SESSION['mensajeErr2'] = "Se ha Confirmado corretamente";
        $_SESSION['mensajeErr'] = "Felicidades";
    } catch (\Throwable $th) {
        echo $th->getMessage();
        // header("Location: ../vista/pages/logistica/AceptarPedidos.php");
    }
} else {
    $_SESSION["error"] = "error al confirmar";
    $_SESSION["error2"] = "error";
}
