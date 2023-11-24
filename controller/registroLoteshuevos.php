<?php
session_start();
//validar que la fecha de ingreso no se mayor que la fecha de retiro

$_POST['identificadorLote'] = trim(($_POST['identificadorLote']));
$_POST['cantidadMax'] = trim(($_POST['cantidadMax']));
$_POST['tipoLote'] = trim(($_POST['tipoLote']));
$_POST['fechaVence'] = trim(($_POST['fechaVence']));
$_POST['fechaPuesta'] = trim(($_POST['fechaPuesta']));
$_POST['precio'] = trim(($_POST['precio']));

if (
    isset($_POST['identificadorLote']) && !empty($_POST['identificadorLote']) &&
    isset($_POST['cantidadMax']) && !empty($_POST['cantidadMax']) &&
    isset($_POST['tipoLote']) && !empty($_POST['tipoLote']) &&
    isset($_POST['fechaVence']) && !empty($_POST['fechaVence']) &&
    isset($_POST['fechaPuesta']) && !empty($_POST['fechaPuesta']) &&
    isset($_POST['precio']) && !empty($_POST['precio'])
) {
    try {
        //llamo el formulario y lo pongo en variables
       $identificadorLote = $_POST['identificadorLote'] = trim(($_POST['identificadorLote']));
       $cantidadMax = $_POST['cantidadMax'] = trim(($_POST['cantidadMax']));
       $tipoLote = $_POST['tipoLote'] = trim(($_POST['tipoLote']));
       $fechaVence = $_POST['fechaVence'] = trim(($_POST['fechaVence']));
       $fechaPuesta = $_POST['fechaPuesta'] = trim(($_POST['fechaPuesta']));
       $precio = $_POST['precio'] = trim(($_POST['precio']));
       

        //llamo el modelo
        include('../models/MySQL.php');
        $conexion = new MySQL();
        $pdo = $conexion->conectar();
        //hago la consulta para insertar en la base de datos
        $sql1 =  "INSERT INTO `lotehuevo` (`idLoteHuevo`, `identificadorLote`, `tipoLote`, `fechaVencimiento`, `fechaPuesta`, `Precios_idPrecios`) VALUES (:identificadorLote, :cantidadMax, :tipoLote, :fechaVence, :fechaPuesta, :precio);";

        $stmt1 = $pdo->prepare($sql1);
        $stmt1->bindParam(':identificadorLote', $identificadorLote, PDO::PARAM_STR);
        $stmt1->bindParam(':cantidadMax', $cantidadMax, PDO::PARAM_STR);
        $stmt1->bindParam(':tipoLote', $tipoLote, PDO::PARAM_STR);
        $stmt1->bindParam(':fechaVence', $fechaVence, PDO::PARAM_STR);
        $stmt1->bindParam(':fechaPuesta', $fechaPuesta, PDO::PARAM_STR);
        $stmt1->bindParam(':precio', $precio, PDO::PARAM_STR);
        
        $stmt1->execute();
        header("Location: ../vista/pages/produccion/registroLoteshuevos.php");
        $_SESSION['mensajeErr2'] = "Se ha agregado corretamente";
        $_SESSION['mensajeErr'] = "Felicidades";
    } catch (Exception $e) {
        header("Location: ../vista/pages/produccion/registroLoteshuevos.php");
        $_SESSION['mensajeErr4'] = "Ha ocurrido un error";
        $_SESSION['mensajeErr3'] = "Error";
       
    }
} else {
    header("Location: ../vista/pages/produccion/registroLoteshuevos.php");
    $_SESSION['mensajeErr4'] = "Debes llenar todos los campos";
    $_SESSION['mensajeErr3'] = "Error";
}