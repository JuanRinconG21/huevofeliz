<?php
session_start();
//validar que la fecha de ingreso no se mayor que la fecha de retiro//////////////////////////////
$_POST['especie'] = trim(($_POST['especie']));
$_POST['peso'] = trim(($_POST['peso']));
$_POST['estadoSalud'] = trim(($_POST['estadoSalud']));
$_POST['fechaVa'] = trim(($_POST['fechaVa']));
$_POST['fechaIn'] = trim(($_POST['fechaIn']));
$_POST['fechaRe'] = trim(($_POST['fechaRe']));
$_POST['loteave'] = trim(($_POST['loteave']));
if (
    isset($_POST['especie']) && !empty($_POST['especie']) &&
    isset($_POST['peso']) && !empty($_POST['peso']) &&
    isset($_POST['fechaVa']) && !empty($_POST['fechaVa']) &&
    isset($_POST['fechaIn']) && !empty($_POST['fechaIn']) &&
    isset($_POST['fechaRe']) && !empty($_POST['fechaRe']) &&
    isset($_POST['loteave']) && !empty($_POST['loteave'])
) {
    try {
        //llamo el formulario y lo pongo en variables
       $especie = $_POST['especie'] = trim(($_POST['especie']));
       $peso = $_POST['peso'] = trim(($_POST['peso']));
       $estadoSalud = $_POST['estadoSalud'] = trim(($_POST['estadoSalud']));
       $fechaVa = $_POST['fechaVa'] = trim(($_POST['fechaVa']));
       $fechaIn = $_POST['fechaIn'] = trim(($_POST['fechaIn']));
       $fechaRe = $_POST['fechaRe'] = trim(($_POST['fechaRe']));
       $loteave = $_POST['loteave'] = trim(($_POST['loteave']));

        //llamo el modelo
        include('../models/MySQL.php');
        $conexion = new MySQL();
        $pdo = $conexion->conectar();
        //hago la consulta para insertar en la base de datos
        $sql1 =  "INSERT INTO `aves` (`idAves`, `especie`, `peso`, `estadoSalud`, `fechaVacunacion`, `fechaDeRetiro`, `fechaIngreso`, `LoteAves_idLoteAves`) VALUES (NULL, :especie, :peso, :estadoSalud, :fechaVa, :fechaIn, :fechaRe, :loteave);";
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->bindParam(':especie', $especie, PDO::PARAM_STR);
        $stmt1->bindParam(':peso', $peso, PDO::PARAM_STR);
        $stmt1->bindParam(':estadoSalud', $estadoSalud, PDO::PARAM_STR);
        $stmt1->bindParam(':fechaVa', $fechaVa, PDO::PARAM_STR);
        $stmt1->bindParam(':fechaIn', $fechaIn, PDO::PARAM_STR);
        $stmt1->bindParam(':fechaRe', $fechaRe, PDO::PARAM_STR);
        $stmt1->bindParam(':loteave', $loteave, PDO::PARAM_STR);
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
