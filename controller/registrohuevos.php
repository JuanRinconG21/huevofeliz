<?php
session_start();
// validar que no se repita el nombre
$_POST['cantidad'] = trim(($_POST['cantidad']));
$_POST['fecharRe'] = trim(($_POST['fecharRe']));
$_POST['Idlote'] = trim(($_POST['Idlote']));
if (
    isset($_POST['cantidad']) && !empty($_POST['cantidad']) &&
    isset($_POST['fecharRe']) && !empty($_POST['fecharRe']) &&
    isset($_POST['Idlote']) && !empty($_POST['Idlote'])
) {
    try {

        $cantidad =  $_POST['cantidad'];
        $fechaRe =  $_POST['fecharRe'];
        $Idlote =  $_POST['Idlote'];

        include('../models/MySQL.php');
        $conexion = new MySQL();
        $pdo = $conexion->conectar();

        $sql1 =  "INSERT INTO `produccion` (`idProduccion`, `cantidad`, `fechaRecoleccion`, `LoteHuevo_idLoteHuevo`) VALUES (NULL, :cantidad, :fechaRe, :Idlote);";
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->bindParam(':cantidad', $cantidad, PDO::PARAM_STR);
        $stmt1->bindParam(':fechaRe', $fechaRe, PDO::PARAM_STR);
        $stmt1->bindParam(':Idlote', $Idlote, PDO::PARAM_STR);
        $stmt1->execute();
        header("Location: ../vista/pages/produccion/registrohuevos.php");
        $_SESSION['mensajeErr2'] = "Se ha agregado corretamente";
        $_SESSION['mensajeErr'] = "Felicidades";
    } catch (Exception $e) {
        // header("Location: ../vista/pages/produccion/registrohuevos.php");
        // $_SESSION['mensajeErr4'] = "Ha ocurrido un error";
        // $_SESSION['mensajeErr3'] = "Error";
        echo $e;
    }
} else {
    header("Location: ../vista/pages/produccion/registrohuevos.php");
    $_SESSION['mensajeErr4'] = "Debes llenar todos los campos";
    $_SESSION['mensajeErr3'] = "Error";
}
