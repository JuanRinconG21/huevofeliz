<?php
session_start();

$_POST['estadoPedido'] ;
if (isset($_POST['estadoPedido']) && !empty($_POST['estadoPedido'])) {
    try {
        $_POST['estadoPedido'] = trim($_POST['estadoPedido']);
        $estadoPedido = $_POST['estadoPedido'];
        $id = $_POST["idPedidos"];
        include('../models/MySQL.php');

        $conexion = new MySQL();
        $pdo = $conexion->conectar();
        // Update the nombreCompleto in usuario table
        $sqlUsuario = "UPDATE usuario
            SET nombreCompleto = :nuevoNombreConductor
            WHERE idUsuario IN (
                SELECT pedidos.Usuario_idUsuario
                FROM pedidos 
                INNER JOIN detallepedidos ON pedidos.idPedidos = detallepedidos.Pedidos_idPedidos
                INNER JOIN lotehuevo ON detallepedidos.LoteHuevo_idLoteHuevo = lotehuevo.idLoteHuevo
                WHERE pedidos.estado = '1'
            )";


        $nombreEmpleado = $_POST['conductor'];

        $stmtUsuario = $pdo->prepare($sqlUsuario);
        $stmtUsuario->bindParam(":nuevoNombreConductor", $nombreEmpleado, PDO::PARAM_STR);
        $stmtUsuario->execute();

        // Update the estado in pedidos table
        $sqlPedidos = "UPDATE pedidos
            SET estado = :estadoPedido
            WHERE estado = '1'";

        $stmtPedidos = $pdo->prepare($sqlPedidos);
        $stmtPedidos->bindParam(":estadoPedido", $estadoPedido, PDO::PARAM_STR);
        $stmtPedidos->execute();

        header("Location: ../vista/pages/logistica/asignarConductores.php");
        $_SESSION['mensajeErr2'] = "Se ha actualizado correctamente";
        $_SESSION['mensajeErr'] = "Felicidades";
    } catch (Exception $e) {
       
    }
} else {
    $_SESSION["error"] = "error";
    echo "se daña";
    echo $_POST['estadoPedido'] ;
}
?>
