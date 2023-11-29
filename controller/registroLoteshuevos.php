<?php
session_start();
//validar que la fecha de ingreso no se mayor que la fecha de retiro

$_POST['identificadorLote'] = trim(($_POST['identificadorLote']));
$_POST['cantidadMax'] = trim(($_POST['cantidadMax']));
$_POST['estado'] = trim(($_POST['estado']));
$_POST['fechaVence'] = trim(($_POST['fechaVence']));

$_POST['precio'] = trim(($_POST['precio']));
$_POST['estado'] = trim(($_POST['estado']));

if (
    isset($_POST['identificadorLote']) && !empty($_POST['identificadorLote']) &&
    isset($_POST['cantidadMax']) && !empty($_POST['cantidadMax']) &&
    isset($_POST['estado']) && !empty($_POST['estado']) &&
    isset($_POST['fechaVence']) && !empty($_POST['fechaVence']) &&

    isset($_POST['precio']) && !empty($_POST['precio']) &&
    isset($_POST['estado']) && !empty($_POST['estado'])
) {
    try {
        //llamo el formulario y lo pongo en variables
        $identificadorLote = $_POST['identificadorLote'];
        $cantidadMax = $_POST['cantidadMax'];
        $estado = $_POST['estado'];
        $fechaVence = $_POST['fechaVence'];
        $fechaPuesta = date("Y-m-d");
        $precio = $_POST['precio'];
        $estado = $_POST['estado'];

        $fechahuevo = date('Y-m-d H:i:s', strtotime($fechaPuesta));
        $fechavencehuevo = date('Y-m-d H:i:s', strtotime($fechaVence));

        $replace = str_replace("T", " ", $fechaPuesta);
        $replace1 = str_replace("T", " ", $fechaVence);

        if ($replace1 < $replace) {
            header("Location: ../vista/pages/produccion/registroLoteshuevos.php");
            $_SESSION['mensajeErr4'] = "La Fecha de vencimiento es mayor a la fecha de puesta";
            $_SESSION['mensajeErr3'] = "Error";
        } else {
            //llamo el modelo
            include('../models/MySQL.php');
            $conexion = new MySQL();
            $pdo = $conexion->conectar();
            //hago la consulta para insertar en la base de datos
            $sql1 =  "INSERT INTO `lotehuevo` (`idLoteHuevo`, `identificadorLote`, `fechaVencimiento`, `fechaPuesta`, `cantidadMaxima`, `Precios_idPrecios`, `estado`) VALUES (NULL, :identificadorLote, :fechaVence, :fechaPuesta, :cantidadMax, :precio, :estado);";

            $stmt1 = $pdo->prepare($sql1);
            $stmt1->bindParam(':identificadorLote', $identificadorLote, PDO::PARAM_STR);
            $stmt1->bindParam(':fechaVence', $fechaVence, PDO::PARAM_STR);
            $stmt1->bindParam(':fechaPuesta', $fechaPuesta, PDO::PARAM_STR);
            $stmt1->bindParam(':cantidadMax', $cantidadMax, PDO::PARAM_STR);
            $stmt1->bindParam(':precio', $precio, PDO::PARAM_STR);
            $stmt1->bindParam(':estado', $estado, PDO::PARAM_STR);
            $stmt1->execute();
            header("Location: ../vista/pages/produccion/registroLoteshuevos.php");
            $_SESSION['mensajeErr2'] = "Se ha agregado corretamente";
            $_SESSION['mensajeErr'] = "Felicidades";
        }
    } catch (Exception $e) {
        // header("Location: ../vista/pages/produccion/registroLoteshuevos.php");
        // $_SESSION['mensajeErr4'] = "Ha ocurrido un error";
        // $_SESSION['mensajeErr3'] = "Error";
        echo $e;
        echo $_POST['identificadorLote'];
        echo $_POST['cantidadMax'];
        echo $_POST['estado'];
        echo $_POST['fechaVence'];
        echo $_POST['fechaPuesta'];
        echo $_POST['precio'];
    }
} else {

    // header("Location: ../vista/pages/produccion/registroLoteshuevos.php");
    // $_SESSION['mensajeErr4'] = "Debes llenar todos los campos";
    // $_SESSION['mensajeErr3'] = "Error";
    echo $e;
    echo $_POST['identificadorLote'];
    echo $_POST['cantidadMax'];
    echo $_POST['estado'];
    echo $_POST['fechaVence'];
    echo $_POST['fechaPuesta'];
    echo $_POST['precio'];
}
