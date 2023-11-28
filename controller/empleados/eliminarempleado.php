<?php
session_start();
include("../../models/MySQL.php");
$id = $_GET['id'];
$conexion = new MySQL();
$pdo = $conexion->conectar();
$sql = "UPDATE usuario SET estado = 1 WHERE idUsuario =:idUsuario";
$stmt2 = $pdo->prepare($sql);
$stmt2->bindParam(":idUsuario", $id, PDO::PARAM_INT);
$stmt2->execute();
$_SESSION['mensaje'] = "Usuario Desactivado Exitosamente";
header("Location: ../../vista/pages/empleados/agregarempleados.php");
