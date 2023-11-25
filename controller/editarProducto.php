<?php
session_start();
include('../../../models/MySQL.php');
$conexion = new MySQL();
$pdo = $conexion->conectar();

try {
    if (isset($_POST['loteHuevos']) && !empty($_POST['loteHuevos'])) {
    $_POST['loteHuevos'] = trim($_POST['loteHuevos']);
    $loteHuevos = $_POST['loteHuevos'];
    $id=$_POST["idLoteHuevo"];

    
    $sql = "UPDATE lotehuevo SET cantidadMaxima = :loteHuevos WHERE idLoteHuevo = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_STR);
    $stmt->bindParam(":loteHuevos", $loteHuevos, PDO::PARAM_STR);
    $stmt->execute();

    // Captura los datos de la consulta, captura una sola fila
    $fila = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['agregar'] = "EDITAR";
    header("x");
    }
} catch (\Throwable $th) {
     // Manejo de errores en caso de que ocurra una excepción.
     $_SESSION["catchError"]="ok"
}
else{
$_SESSION["datosVacios"]="ok"
}


