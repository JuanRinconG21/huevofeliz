<?php
session_start();
// validar que no se repita el nombre
$_POST['loteAve'] = trim(($_POST['loteAve']));
if (
    isset($_POST['loteAve']) && !empty($_POST['loteAve'])
) {
    try
    {
        $nombre = $_POST['loteAve'];
        
    
        include('../models/MySQL.php');
       
        $conexion = new MySQL();
        $pdo = $conexion->conectar();
    
        $sql1 =  "INSERT into loteaves (nombre) VALUES (:nombre)";
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt1->execute();    
        header("Location: ../vista/pages/produccion/registroLotesAves.php");
        $_SESSION['mensajeErr2'] = "Se ha agregado corretamente";
        $_SESSION['mensajeErr'] = "Felicidades";
    }
    catch(Exception $e){
        header("Location: ../vista/pages/produccion/registroLotesAves.php");
        $_SESSION['mensajeErr4'] = "Ha ocurrido un error";
        $_SESSION['mensajeErr3'] = "Error";
    }
    
} else {
    header("Location: ../vista/pages/produccion/registroLotesAves.php");
    $_SESSION['mensajeErr4'] = "Debes llenar todos los campos";
    $_SESSION['mensajeErr3'] = "Error";
}