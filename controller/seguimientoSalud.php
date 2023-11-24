<?php
session_start();
// validar que no se repita el nombre
$_POST['idVacuna'] = trim(($_POST['idVacuna']));
$_POST['nombreva'] = trim(($_POST['nombreva']));
$_POST['idAve'] = trim(($_POST['idAve']));
$_POST['entorno'] = trim(($_POST['entorno']));
$_POST['sintoma'] = trim(($_POST['sintoma']));
$_POST['comentarioAd'] = trim(($_POST['comentarioAd']));
if (
    isset($_POST['idVacuna']) && !empty($_POST['idVacuna']) &&
    isset($_POST['nombreva']) && !empty($_POST['nombreva']) &&
    isset($_POST['idAve']) && !empty($_POST['idAve']) &&
    isset($_POST['entorno']) && !empty($_POST['entorno']) &&
    isset($_POST['sintoma']) && !empty($_POST['sintoma'])
    // isset($_POST['comentarioAd']) && !empty($_POST['comentarioAd'])
) {
    try {
        $idVacuna = $_POST['idVacuna'];
        $nombreva = $_POST['nombreva'];
        $entorno = $_POST['entorno'];
        $sintoma = $_POST['sintoma'];
        $idAve = $_POST['idAve'];

        include('../models/MySQL.php');

        $conexion = new MySQL();
        $pdo = $conexion->conectar();

        $sql1 =  "INSERT INTO `vacunas` (`idVacunas`, `vacunas`, `entorno`, `sintomas`, `Aves_idAves`) VALUES (:idVacuna, :nombreva, :entorno, :sintoma, :idAve);";
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->bindParam(':idVacuna', $idVacuna, PDO::PARAM_STR);
        $stmt1->bindParam(':nombreva', $nombreva, PDO::PARAM_STR);
        $stmt1->bindParam(':entorno', $entorno, PDO::PARAM_STR);
        $stmt1->bindParam(':sintoma', $sintoma, PDO::PARAM_STR);
        $stmt1->bindParam(':idAve', $idAve, PDO::PARAM_STR);
        $stmt1->execute();
        header("Location: ../vista/pages/produccion/registroAves.php");
        $_SESSION['mensajeErr2'] = "Se ha agregado corretamente";
        $_SESSION['mensajeErr'] = "Felicidades";
    } catch (Exception $e) {
        header("Location: ../vista/pages/produccion/registroAves.php");
        $_SESSION['mensajeErr4'] = "Ha ocurrido un error";
        $_SESSION['mensajeErr3'] = "Error";
    }
} else {
    header("Location: ../vista/pages/produccion/registroAves.php");
    $_SESSION['mensajeErr4'] = "Debes llenar todos los campos";
    $_SESSION['mensajeErr3'] = "Error";
}
