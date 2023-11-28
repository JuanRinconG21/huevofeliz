<?php
session_start();
// Obtén el valor de JavaScript
$totalPagar = $_SESSION['totalPagar'];
//CAPTURO VARIABLES
$idCliente = $_SESSION['idCliente'];
$valorRecibido = trim($_POST['recibido']);
$metodoPago = trim($_POST['metodo']);
$numeroTarjeta = trim($_POST['numeroTarjeta']);
$valorRecibido = trim($_POST['recibido']);
$fechaCompra = date("Y-m-d H:i");
$iva = 0;
$puntoVenta = 1;
//llamo la conexion a la BD
require_once '../../models/MySQL.php';
// Intenta crear una instancia de la clase MySQL y establecer la conexión
try {
    $conexion = new Mysql();
    $pdo = $conexion->conectar();
    //INSERTO EN LA TABLA ENCABEZADO
    $insertar = $pdo->prepare('INSERT INTO encabezado 
    (fechaCompra,subtotal,iva,total,PuntosVenta_idPuntosVenta,
    tipoPago) VALUES 
    (:fechaCompra,:subtotal,:iva,:total,:puntoVenta,:tipoPago)');
    $insertar->bindParam(":fechaCompra", $fechaCompra, PDO::PARAM_STR);
    $insertar->bindParam(":subtotal", $totalPagar, PDO::PARAM_INT);
    $insertar->bindParam(":iva", $iva, PDO::PARAM_INT);
    $insertar->bindParam(":total", $totalPagar, PDO::PARAM_INT);
    $insertar->bindParam(":puntoVenta", $puntoVenta, PDO::PARAM_INT);
    $insertar->bindParam(":tipoPago", $metodoPago, PDO::PARAM_STR);
    $fila = $insertar->execute();
    //VALIDO LA CONSULTA
    # Incluyendo librerias necesarias #
    require "../RECEIPT-main/code128.php";
    $pdf = new PDF_Code128('P', 'mm', array(80, 258));
    $pdf->SetMargins(4, 10, 4);
    $pdf->AddPage();

    # Encabezado y datos de la factura #
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("EL CANINO FELIZ")), 0, 'C', false);
    $pdf->SetFont('Arial', '', 9);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Direccion Cartago, Valle del Cauca"), 0, 'C', false);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Teléfono: 2065454"), 0, 'C', false);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Email: canino@feliz.com"), 0, 'C', false);

    $pdf->Ln(1);
    $pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", "------------------------------------------------------"), 0, 0, 'C');
    $pdf->Ln(5);

    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Fecha: " . date("d-m-y")), 0, 'C', false);
    //CONSULTA PARA TRAER EL ULTIMO ID
    $sql3 = "SELECT MAX(idEncabezado) AS maximo FROM encabezado";
    $stmt3 = $pdo->prepare($sql3);
    $stmt3->execute();
    $resultado = $stmt3->fetch(PDO::FETCH_ASSOC);
    $maximoId = $resultado['maximo'];
    #CONSULTA PARA NOMBRE DE CAJERO
    #CONSULTA PARA NOMBRE DE CAJERO
    $sql5 = "SELECT nombreCompleto FROM usuario";
    $stmt5 = $pdo->prepare($sql5);
    $stmt5->execute();
    $resultado2 = $stmt5->fetch(PDO::FETCH_ASSOC);
    $nombreCajero = $resultado2["nombreCompleto"];
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Cajero: $nombreCajero"), 0, 'C', false);
    $pdf->SetFont('Arial', 'B', 10);
    #CONSULTA ULTIMO RECIBO GENERADO
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("Ticket Nro: $maximoId")), 0, 'C', false);
    $pdf->SetFont('Arial', '', 9);

    $pdf->Ln(1);
    $pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", "------------------------------------------------------"), 0, 0, 'C');
    $pdf->Ln(5);

    #CONSULTA DATOS DEL CLIENTE
    $sql6 = "SELECT nombreCompleto,numeroTelefono,correoElectronico 
    FROM clientes WHERE idClientes = :id";
    $stmt6 = $pdo->prepare($sql6);
    $stmt6->bindParam(":id", $idCliente, PDO::PARAM_INT);
    $stmt6->execute();
    $resultado3 = $stmt6->fetch(PDO::FETCH_ASSOC);
    $nombre = $resultado3["nombreCompleto"];
    $telefono = $resultado3["numeroTelefono"];
    $correo = $resultado3["correoElectronico"];
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Cliente: $nombre"), 0, 'C', false);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Documento: $idCliente"), 0, 'C', false);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Teléfono: $telefono"), 0, 'C', false);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Correo: $correo"), 0, 'C', false);

    $pdf->Ln(1);
    $pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", "-------------------------------------------------------------------"), 0, 0, 'C');
    $pdf->Ln(3);

    # Tabla de productos #
    $pdf->Cell(10, 5, iconv("UTF-8", "ISO-8859-1", "Cant."), 0, 0, 'C');
    $pdf->Cell(26, 5, iconv("UTF-8", "ISO-8859-1", "Precio"), 0, 0, 'C');
    $pdf->Cell(35, 5, iconv("UTF-8", "ISO-8859-1", "Total"), 0, 0, 'C');

    $pdf->Ln(3);
    $pdf->Cell(72, 5, iconv("UTF-8", "ISO-8859-1", "-------------------------------------------------------------------"), 0, 0, 'C');
    $pdf->Ln(3);


    $pdf->Ln(5);

    /*----------  Detalles de la tabla  ----------*/
    #CONSULTA PRODUCTOS VENDIDOS
    // foreach ($datosCompra as $datos) {
    //     $idProd = $datos->idProd;
    //     $nombre = $datos->nombre;
    //     $precio = $datos->precio;
    //     $cantidad = $datos->cantidad;
    //     $totalProd = $datos->totalProd;
    //     $precioFor = number_format($precio, 2, ',', '.');
    //     $totalProdFor = number_format($totalProd, 2, ',', '.');
    //     $pdf->MultiCell(0, 4, iconv("UTF-8", "ISO-8859-1", "$nombre"), 0, 'C', false);
    //     $pdf->Cell(10, 4, iconv("UTF-8", "ISO-8859-1", "$cantidad"), 0, 0, 'C');
    //     $pdf->Cell(26, 4, iconv("UTF-8", "ISO-8859-1", "$$precioFor"), 0, 0, 'C');
    //     $pdf->Cell(35, 4, iconv("UTF-8", "ISO-8859-1", "$$totalProdFor"), 0, 0, 'C');
    //     $pdf->Ln(7);
    // }

    /*----------  Fin Detalles de la tabla  ----------*/




    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "*** Precios de productos incluyen impuestos. Para poder realizar un reclamo o devolución debe de presentar este ticket ***"), 0, 'C', false);

    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(0, 7, iconv("UTF-8", "ISO-8859-1", "Gracias por su compra"), '', 0, 'C');

    $pdf->Ln(9);

    # Codigo de barras #
    $pdf->Code128(5, $pdf->GetY(), "COD000001V0001", 70, 20);
    $pdf->SetXY(0, $pdf->GetY() + 21);
    $pdf->SetFont('Arial', '', 14);
    $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "COD000001V0001"), 0, 'C', false);
    $pdf->Output('I', "FACTURA");
} catch (\Throwable $th) {
    //throw $th;
}

// $rutaActal = getcwd();
// # Nombre del archivo PDF #
// $pdf->Output("$rutaActal/tickes/Ticket_Nro_$maximoId.pdf", "F");
// echo $maximoId;
// if ($fila && $insertar->rowCount() > 0) {
//     // MENSAJE Exito IDENTIFICADOR 
//     $_SESSION["mensajeExitoso"] = "Exito Factura insertada Agregado";
//     header("Location:../../vista/pages/ventas/local1.php");
// } else {
//     // MENSAJE Exito IDENTIFICADOR 
//     $_SESSION["mensajeError"] = "Error en la Consulta";
//     header("Location:../../vista/pages/ventas/local1.php");
// }
