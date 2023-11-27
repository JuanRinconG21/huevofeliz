<?php
session_start();
// validar que no se repita el nombre

$_POST['aves_idAves'] = trim(($_POST['aves_idAves']));


if (
    isset($_POST['aves_idAves']) && !empty($_POST['aves_idAves']) &&
    isset($_POST['vacunas_idvacunas']) && !empty($_POST['vacunas_idvacunas'])
) {
    try {
        $aves_idAves = $_POST['aves_idAves'];
        $vacunas_idvacunas = $_POST['vacunas_idvacunas'];
        $largoArreglo = count($vacunas_idvacunas);

        include('../models/MySQL.php');
        $conexion = new MySQL();
        $pdo = $conexion->conectar();
        for ($i = 0; $i < $largoArreglo; $i++) {
            $arr  = $vacunas_idvacunas[$i];

            $sql1 =  "INSERT INTO `aves_has_vacunas` (`aves_idAves`, `vacunas_idvacunas`) VALUES (:aves_idAves, :vacunas_idvacunas);";
            $stmt1 = $pdo->prepare($sql1);
            $stmt1->bindParam(':aves_idAves', $aves_idAves, PDO::PARAM_STR);
            $stmt1->bindParam(':vacunas_idvacunas', $arr, PDO::PARAM_STR);

            $stmt1->execute();
            header("Location: ../vista/pages/produccion/registroAves.php");
            $_SESSION['mensajeErr2'] = "Se ha agregado corretamente";
            $_SESSION['mensajeErr'] = "Felicidades";
        }
    } catch (Exception $e) {
        echo $e;
        // header("Location: ../vista/pages/produccion/registroAves.php");
        // $_SESSION['mensajeErr4'] = "Ha ocurrido un error";
        // $_SESSION['mensajeErr3'] = "Error";
    }
} else {
    header("Location: ../vista/pages/produccion/registroAves.php");
    $_SESSION['mensajeErr4'] = "Debes llenar todos los campos";
    $_SESSION['mensajeErr3'] = "Error";
}
