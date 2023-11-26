<?php

// Se capturan las variables que vienen desde el formulario
$cedula = trim($_POST['cedula']);

// Se instancia la clase PDO para la conexión a la base de datos
include("../../models/MySQL.php");
$conexion = new MySQL();
$pdo = $conexion->conectar();

// Consulta preparada para evitar inyección de SQL
$sql = "SELECT nombreCompleto,numeroTelefono,
correoElectronico
FROM clientes WHERE idClientes=:cedula";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':cedula', $cedula, PDO::PARAM_INT);
$stmt->execute();
$datos = array();
$fila = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($fila as $dato) {
    $datos[] = $dato;
}
header('Content-Type: application/json');
echo json_encode($datos);
?>