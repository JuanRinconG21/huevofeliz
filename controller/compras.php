<?php
session_start();
//validar que la fecha de ingreso no se mayor que la fecha de retiro//////////////////////////////
$_POST['nombreProducto'] = trim(($_POST['nombreProducto']));
$_POST['tipo'] = trim(($_POST['tipo']));
$_POST['descripcion'] = trim(($_POST['descripcion']));
$_POST['precioUnitario'] = trim(($_POST['precioUnitario']));
$_POST['cantidad'] = trim(($_POST['cantidad']));
$_POST['medida'] = trim(($_POST['medida']));
$_POST['total'] = trim(($_POST['total']));
$_POST['proveedor'] = trim(($_POST['proveedor']));
if (
    isset($_POST['nombreProducto']) && !empty($_POST['nombreProducto']) &&
    isset($_POST['tipo']) && !empty($_POST['tipo']) &&
    isset($_POST['descripcion']) && !empty($_POST['descripcion']) &&
    isset($_POST['fechaCompra']) && !empty($_POST['fechaCompra']) &&
    isset($_POST['precioUnitario']) && !empty($_POST['precioUnitario']) &&
    isset($_POST['cantidad']) && !empty($_POST['cantidad']) &&
    isset($_POST['medida']) && !empty($_POST['medida']) &&
    isset($_POST['total']) && !empty($_POST['total'])

) {
    try {
        //llamo el formulario y lo pongo en variables
        $nombreProducto = $_POST['nombreProducto'];
        $tipo = $_POST['tipo'];
        $descripcion = $_POST['descripcion'];
        $fechaCompra = $_POST['fechaCompra'];
        $precioUnitario = $_POST['precioUnitario'];
        $cantidad = $_POST['cantidad'];
        $medida = $_POST['medida'];
        $total = $_POST['total'];
        $proveedor = $_POST['proveedor'];
        /* echo $nombreProducto;
        echo $tipo; */
        /* echo $fechaCompra; */
        /* echo $descripcion; */
        echo $precioUnitario;
        echo $cantidad;
        echo $total;
        echo $proveedor;
        //llamo el modelo
        include('../models/MySQL.php');
        $conexion = new MySQL();
        $pdo = $conexion->conectar();
        //hago la consulta para insertar en la base de datos
        $sql1 =  "INSERT INTO `compras` (`idCompras`, `nombreProducto`, `tipo`, `descripcion`, `fechaCompra`, `precioUnitario`, `cantidad`, `medida`, `total`, `Proveedor_idProveedor`) VALUES (NULL, :nombreProducto, :tipo, :descripcion, :fechaCompra, :precioUnitario, :cantidad, :medida, :total, :proveedor);";
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->bindParam(':nombreProducto', $nombreProducto, PDO::PARAM_STR);
        $stmt1->bindParam(':tipo', $tipo, PDO::PARAM_STR);
        $stmt1->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt1->bindParam(':fechaCompra', $fechaCompra, PDO::PARAM_STR);
        $stmt1->bindParam(':precioUnitario', $precioUnitario, PDO::PARAM_STR);
        $stmt1->bindParam(':cantidad', $cantidad, PDO::PARAM_STR);
        $stmt1->bindParam(':medida', $medida, PDO::PARAM_STR);
        $stmt1->bindParam(':total', $total, PDO::PARAM_STR);
        $stmt1->bindParam(':proveedor', $proveedor, PDO::PARAM_STR);

        $stmt1->execute();
        header("Location: ../vista/pages/produccion/compras.php");
        $_SESSION['mensajeErr2'] = "Se ha agregado corretamente";
        $_SESSION['mensajeErr'] = "Felicidades";
    } catch (Exception $e) {
        echo $e;
        /* header("Location: ../vista/pages/produccion/compras.php"); */
        $_SESSION['mensajeErr4'] = "Ha ocurrido un error";
        $_SESSION['mensajeErr3'] = "Error";
    }
} else {
    header("Location: ../vista/pages/produccion/compras.php");
    $_SESSION['mensajeErr4'] = "Debes llenar todos los campos";
    $_SESSION['mensajeErr3'] = "Error";
}

//