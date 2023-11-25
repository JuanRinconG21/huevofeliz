<?php 
session_start();
//llamo la conexion a la BD
require_once '../../models/MySQL.php';
//VALIDO QUE SEA INDIFERENTE A VACIO
if(!empty($_POST['descuento']) && !empty($_POST['idIngresos'])){
    try {
        $descuento = trim($_POST['descuento']);
        $idIngreso = trim($_POST['idIngresos']);
        // Intenta crear una instancia de la clase MySQL y establecer la conexión
        $conexion = new Mysql();
        $pdo = $conexion->conectar();
            //INSERTO EN LA TABLA INGRESOS
            $insertar = $pdo->prepare('UPDATE ingresos 
            SET descuentos = :descu WHERE idIngresos= :id');
            $insertar->bindParam(":descu",$descuento, PDO::PARAM_INT);
            $insertar->bindParam(":id",$idIngreso, PDO::PARAM_INT);
            $fila = $insertar->execute();

            //VALIDO LA CONSULTA
            if($fila && $insertar->rowCount() > 0){
                    // MENSAJE Exito IDENTIFICADOR 
                    $_SESSION["mensajeExitoso"] = "Exito Descuento Agregado";
                    header("Location:../../vista/pages/ventas/ingresosLocal1.php"); 
            }else{
                    // MENSAJE Exito IDENTIFICADOR 
                    $_SESSION["mensajeError"] = "Error en la Consulta";
                    header("Location:../../vista/pages/ventas/ingresosLocal1.php"); 
            }
       
    } catch (PDOException $e) {
        // MENSAJE EXITOSO 
       $_SESSION["mensajeError"] = "Error Interno".$e->getMessage();
        header("Location:../../vista/pages/ventas/ingresosLocal1.php");
        
    }
}else{
    // MENSAJE EXITOSO 
    $_SESSION["mensajeError"] = "Error Datos Vacios";
    header("Location:../../vista/pages/ventas/ingresosLocal1.php");
}
?>