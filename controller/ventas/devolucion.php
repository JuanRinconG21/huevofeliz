<?php
session_start();
//llamo la conexion a la BD
require_once '../../models/MySQL.php';
//VALIDO QUE SEA INDIFERENTE A VACIO
if (
    !empty($_POST['cantidad']) && !empty($_POST['idEncabezado']) && !empty($_POST['razon'])
    && !empty($_POST['total'])
) {
    try {
        $cantidad = trim($_POST['cantidad']);
        $idEncabezado = trim($_POST['idEncabezado']);
        $razon = trim($_POST['razon']);
        $total = trim($_POST['total']);
        // Intenta crear una instancia de la clase MySQL y establecer la conexión
        $conexion = new Mysql();
        $pdo = $conexion->conectar();
        //INSERTO EN LA TABLA DEVOLUCIONES
        $insertar = $pdo->prepare('INSERT INTO devoluciones 
            (cantidad,razon,total,encabezado_idEncabezado)
            values (:cantidad,:razon,:total,:idEncabezado)');
        $insertar->bindParam(":cantidad", $cantidad, PDO::PARAM_STR);
        $insertar->bindParam(":razon", $razon, PDO::PARAM_STR);
        $insertar->bindParam(":total", $total, PDO::PARAM_INT);
        $insertar->bindParam(":idEncabezado", $idEncabezado, PDO::PARAM_INT);
        $fila = $insertar->execute();
        //ACTUALIZAR ESTADO EN LA TABLA ENCABEZADO
        $insertarFact = $pdo->prepare('UPDATE encabezado SET estado = 1 
        Where idEncabezado = :idEnca');
        $insertarFact->bindParam(":idEnca", $idEncabezado, PDO::PARAM_INT);
        $fila2 = $insertarFact->execute();

        //VALIDO LA CONSULTA
        if ($fila && $insertar->rowCount() > 0) {
            // MENSAJE Exito IDENTIFICADOR 
            $_SESSION["mensajeExitoso"] = "Exito Devolucion Exitosa";
            header("Location:../../vista/pages/ventas/local1.php");
        } else {
            // MENSAJE Exito IDENTIFICADOR 
            $_SESSION["mensajeError"] = "Error en la Consulta";
            header("Location:../../vista/pages/ventas/local1.php");
        }
    } catch (PDOException $e) {
        // MENSAJE EXITOSO 
        $_SESSION["mensajeError"] = "Error Interno" . $e->getMessage();
        header("Location:../../vista/pages/ventas/local1.php");
    }
} else {
    // MENSAJE EXITOSO 
    $_SESSION["mensajeError"] = "Error Datos Vacios";
    header("Location:../../vista/pages/ventas/local1.php");
}
