<?php
session_start();
// validar que no se repita el nombre
$_POST['idProveedor'] = trim(($_POST['idProveedor']));
$_POST['telefono'] = trim(($_POST['telefono']));
$_POST['nombre'] = trim(($_POST['nombre']));
if (
    isset($_POST['idProveedor']) && !empty($_POST['idProveedor']) &&
    isset($_POST['nombre']) && !empty($_POST['nombre'])&&
    isset($_POST['telefono']) && !empty($_POST['telefono'])
) {
    try
    { 
        $nombre = $_POST['nombre'] ;  
        $telefono =  $_POST['telefono']; 
       $idProveedor =  $_POST['idProveedor'];
   
        include('../models/MySQL.php');
       
        $conexion = new MySQL();
        $pdo = $conexion->conectar();
    
        $sql1 =  "INSERT INTO `proveedor` (`idProveedor`, `nombre`, `telefono`) VALUES (:idProveedor, :nombre, :telefono);";
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->bindParam(':idProveedor', $idProveedor, PDO::PARAM_STR);
        $stmt1->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt1->bindParam(':telefono', $telefono, PDO::PARAM_STR);  
        $stmt1->execute();    
        header("Location: ../vista/pages/produccion/proovedor.php");
        $_SESSION['mensajeErr2'] = "Se ha agregado corretamente";
        $_SESSION['mensajeErr'] = "Felicidades";
    }
    catch(Exception $e){
        header("Location: ../vista/pages/produccion/proovedor.php");
        $_SESSION['mensajeErr4'] = "Ha ocurrido un error";
        $_SESSION['mensajeErr3'] = "Error";
        
    }
    
} else {
    header("Location: ../vista/pages/produccion/proovedor.php");
    $_SESSION['mensajeErr4'] = "Debes llenar todos los campos";
    $_SESSION['mensajeErr3'] = "Error";
}