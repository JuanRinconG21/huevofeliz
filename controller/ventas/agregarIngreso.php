<?php 
session_start();
//llamo la conexion a la BD
require_once '../../models/MySQL.php';
//VALIDO QUE SEA INDIFERENTE A VACIO
if(!empty($_POST['cantidad']) && !empty($_POST['identificador'])){
    try {
        $cantidad =($_POST['cantidad']);
        $desc = 0;
        $puntoVenta = 1;
        $identi =($_POST['identificador']);
        // Intenta crear una instancia de la clase MySQL y establecer la conexión
        $conexion = new Mysql();
        $pdo = $conexion->conectar();
        //VALIDO QUE EL LOTE EXISTA
        $validar= $pdo->prepare('SELECT * FROM lotehuevo WHERE identificadorLote = :identificadorLoteen');
        $validar->bindParam(":identificadorLoteen",$identi,PDO::PARAM_STR);
        $validar->execute();
        $recorrer = $validar->fetch(PDO::FETCH_ASSOC);
        if($recorrer > 0){
            //TRAIGO EL ID DEL LOTE COMPARANDO CON EL IDENTIFICADOR
            $capturar= $pdo->prepare('SELECT idLoteHuevo FROM lotehuevo WHERE identificadorLote =:identificador');
            $capturar->bindParam(":identificador",$identi,PDO::PARAM_STR);
            $capturar->execute();
            $idCap2 = $capturar->fetch(PDO::FETCH_ASSOC);
            $idCap = $idCap2['idLoteHuevo'];
            //INSERTO EN LA TABLA INGRESOS
            $insertar = $pdo->prepare('INSERT INTO ingresos 
            (cantidad,descuentos,PuntosVenta_idPuntosVenta,LoteHuevo_idLoteHuevo) 
            VALUES (:cantidad,:descu,:puntoVenta,:idLote)');
            $insertar->bindParam(":cantidad",$cantidad, PDO::PARAM_INT);
            $insertar->bindParam(":descu",$desc, PDO::PARAM_INT);
            $insertar->bindParam(":puntoVenta",$puntoVenta, PDO::PARAM_INT);
            $insertar->bindParam(":idLote",$idCap, PDO::PARAM_STR);
            $insertar->execute();
            $fila =  $insertar->fetch(PDO::FETCH_ASSOC);
             // MENSAJE Exito IDENTIFICADOR 
             $_SESSION["mensajeExitoso"] = "Exito Ingreso Agregado";
            header("Location:../../vista/pages/ventas/ingresosLocal1.php"); 
            
            
        }else{
             // MENSAJE ERROR IDENTIFICADOR 
            $_SESSION["mensajeError"] = "Error El Identificador del Lote No existe";
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