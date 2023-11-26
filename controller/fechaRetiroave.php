<?php
session_start();
// validar que no se repita el nombre
$_POST['fechaRe'] = trim(($_POST['fechaRe']));
$_POST['retirada'] = trim(($_POST['retirada']));
$_POST['idAve'] = trim(($_POST['idAve']));
if (
    isset($_POST['fechaRe']) && !empty($_POST['fechaRe']) &&
    isset($_POST['idAve']) && !empty($_POST['idAve'])
) {
    try
    {
        $fechaRe = $_POST['fechaRe'];
        $retirada = $_POST['retirada'];
        $idAve = $_POST['idAve'];

        $fechaHoraFormateadaRe = date('Y-m-d H:i:s', strtotime($fechaRe));
        include('../models/MySQL.php');
       
        $conexion = new MySQL();
        $pdo = $conexion->conectar();
    
        $sql1 =  "UPDATE aves set fechaDeRetiro = :fechaHoraFormateadaRe,  motivoRetiro= :retirada WHERE idAves = :idAve";
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->bindParam(':idAve', $idAve, PDO::PARAM_STR);
        $stmt1->bindParam(':fechaHoraFormateadaRe', $fechaHoraFormateadaRe, PDO::PARAM_STR);
        $stmt1->bindParam(':retirada', $retirada, PDO::PARAM_STR);
        $stmt1->execute();    
        header("Location: ../vista/pages/produccion/registroAves.php");
        $_SESSION['mensajeErr2'] = "Se ha agregado corretamente";
        $_SESSION['mensajeErr'] = "Felicidades";
    }
    catch(Exception $e){
        header("Location: ../vista/pages/produccion/registroAves.php");
        $_SESSION['mensajeErr4'] = "Ha ocurrido un error";
        $_SESSION['mensajeErr3'] = "Error";
    }
    
} else {
    header("Location: ../vista/pages/produccion/registroAves.php");
    $_SESSION['mensajeErr4'] = "Debes llenar todos los campos";
    $_SESSION['mensajeErr3'] = "Error";
}