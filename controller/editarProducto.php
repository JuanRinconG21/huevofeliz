<?php

session_start();
include('../models/MySQL.php');
$conexion = new MySQL();
$pdo = $conexion->conectar();
if (isset($_POST['loteHuevos']) && !empty($_POST['loteHuevos'])) {

    try {
        $_POST['loteHuevos'] = trim($_POST['loteHuevos']);
        $loteHuevos = $_POST['loteHuevos'];
        $id = $_POST["idLoteHuevo"];


        $sql = "UPDATE lotehuevo SET cantidadMaxima = :loteHuevos WHERE idLoteHuevo = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_STR);
        $stmt->bindParam(":loteHuevos", $loteHuevos, PDO::PARAM_STR);
        $stmt->execute();

        // Captura los datos de la consulta, captura una sola fila
        $fila = $stmt->fetchAll(PDO::FETCH_ASSOC);
        header("Location: ../vista/pages/inventario/huevos.php");
        $_SESSION['mensajeErr2'] = "Se ha agregado corretamente";
        $_SESSION['mensajeErr'] = "Felicidades";
    } catch (\Throwable $th) {
        $_SESSION['mensajeErr3'] = "Error";
        $_SESSION['mensajeErr4'] = "Fuera de rango";
        header("Location: ../vista/pages/inventario/huevos.php");
    }
} else {
    $_SESSION["error"] = "error";
}
