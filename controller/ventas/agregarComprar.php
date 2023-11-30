<?php
session_start();
//CAPTURO LA DATA DEL LA TABLA
$inputJSON = file_get_contents('php://input');
$data = json_decode($inputJSON);
if ($data) {
    // Obtén el valor de JavaScript
    $datosEncabezado = $data->datosUser;
    $idCliente = $datosEncabezado->idCliente;
    $nomCliente = $datosEncabezado->nombreCliente;
    $tipoPago = $datosEncabezado->tipoPago;
    $numeroTarjeta = $datosEncabezado->numeroTarjeta;
    $datosCompra = $data->datosCompra;
    $totalPagar = $datosEncabezado->total;
    $valorRecibido = $datosEncabezado->valorRecibido;
    $puntoVenta = $datosEncabezado->puntoVenta;
    $estadoEnca = $datosEncabezado->estadoEnca;
    $idUsuario = $datosEncabezado->idUsuario;
    $fechaCompra = date("Y-m-d H:i");
    $iva = 0;
    //llamo la conexion a la BD
    require_once '../../models/MySQL.php';
    // Intenta crear una instancia de la clase MySQL y establecer la conexión
    try {
        $conexion = new Mysql();
        $pdo = $conexion->conectar();
        //INSERTO EN LA TABLA ENCABEZADO
        $insertar = $pdo->prepare('INSERT INTO encabezado
        (fechaCompra,subtotal,iva,total,PuntosVenta_idPuntosVenta,
        tipoPago,estado,clientes_idClientes,usuario_idUsuario) VALUES
        (:fechaCompra,:subtotal,:iva,:total,:puntoVenta,:tipoPago,:estado,:idCliente,:idUser)');
        $insertar->bindParam(":fechaCompra", $fechaCompra, PDO::PARAM_STR);
        $insertar->bindParam(":subtotal", $totalPagar, PDO::PARAM_INT);
        $insertar->bindParam(":iva", $iva, PDO::PARAM_INT);
        $insertar->bindParam(":total", $totalPagar, PDO::PARAM_INT);
        $insertar->bindParam(":puntoVenta", $puntoVenta, PDO::PARAM_INT);
        $insertar->bindParam(":tipoPago", $tipoPago, PDO::PARAM_STR);
        $insertar->bindParam(":estado", $estadoEnca, PDO::PARAM_STR);
        $insertar->bindParam(":idCliente", $idCliente, PDO::PARAM_INT);
        $insertar->bindParam(":idUser", $idUsuario, PDO::PARAM_INT);
        $fila = $insertar->execute();
        //POR TIPO DE HUEVO AA
        $lote1 = $pdo->prepare('SELECT
        lotehuevo.idLoteHuevo AS "LOCAL1",
        ingresos.descuentos AS "DESCUENTO"
        FROM
        ingresos
        INNER JOIN
        lotehuevo ON ingresos.LoteHuevo_idLoteHuevo = lotehuevo.idLoteHuevo
        INNER JOIN
        precios ON lotehuevo.Precios_idPrecios = precios.idPrecios
        WHERE
        precios.Tipo = "A" AND lotehuevo.estado = 0
        ORDER BY
        lotehuevo.fechaVencimiento
        LIMIT 1;');
        $lote1->execute();
        $fila1 = $lote1->fetch(PDO::FETCH_ASSOC);
        $local1V = $fila1["LOCAL1"];
        $descLocal1 = $fila1["DESCUENTO"];
        //LOTE 2 HUEVO TIPO AA
        $lote2 = $pdo->prepare('SELECT
        lotehuevo.idLoteHuevo AS "LOCAL2",
        ingresos.descuentos AS "DESCUENTO"
        FROM
        ingresos
        INNER JOIN
        lotehuevo ON ingresos.LoteHuevo_idLoteHuevo = lotehuevo.idLoteHuevo
        INNER JOIN
        precios ON lotehuevo.Precios_idPrecios = precios.idPrecios
        WHERE
        precios.Tipo = "AA" AND lotehuevo.estado = 0
        ORDER BY
        lotehuevo.fechaVencimiento
        LIMIT 1;');
        $lote2->execute();
        $fila2 = $lote2->fetch(PDO::FETCH_ASSOC);
        $local2V = $fila2["LOCAL2"];
        $descLocal2 = $fila2["DESCUENTO"];
        //LOTE 3 HUEVO TIPO AAA
        $lote3 = $pdo->prepare('SELECT
        lotehuevo.idLoteHuevo AS "LOCAL3",
        ingresos.descuentos AS "DESCUENTO"
        FROM
        ingresos
        INNER JOIN
        lotehuevo ON ingresos.LoteHuevo_idLoteHuevo = lotehuevo.idLoteHuevo
        INNER JOIN
        precios ON lotehuevo.Precios_idPrecios = precios.idPrecios
        WHERE
        precios.Tipo = "AAA" AND lotehuevo.estado = 0
        ORDER BY
        lotehuevo.fechaVencimiento
        LIMIT 1;');
        $lote3->execute();
        $fila3 = $lote3->fetch(PDO::FETCH_ASSOC);
        $local3V = $fila3["LOCAL3"];
        $descLocal3 = $fila3["DESCUENTO"];
        //LOTE 4 HUEVO TIPO PREMIUM
        $lote4 = $pdo->prepare('SELECT
        lotehuevo.idLoteHuevo AS "LOCAL4",
        ingresos.descuentos AS "DESCUENTO"
        FROM
        ingresos
        INNER JOIN
        lotehuevo ON ingresos.LoteHuevo_idLoteHuevo = lotehuevo.idLoteHuevo
        INNER JOIN
        precios ON lotehuevo.Precios_idPrecios = precios.idPrecios
        WHERE
        precios.Tipo = "PREMIUM" AND lotehuevo.estado = 0
        ORDER BY
        lotehuevo.fechaVencimiento
        LIMIT 1;');
        $lote4->execute();
        $fila4 = $lote4->fetch(PDO::FETCH_ASSOC);
        $local4V = $fila4["LOCAL4"];
        $descLocal4 = $fila4["DESCUENTO"];
        # Incluyendo librerias necesarias #
        require "../RECEIPT-main/code128.php";
        $pdf = new PDF_Code128('P', 'mm', array(80, 258));
        $pdf->SetMargins(4, 10, 4);
        $pdf->AddPage();

        # Encabezado y datos de la factura #
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetTextColor(0, 0, 0);
        // Agregar imagen
        $pdf->Image('../../vista/dist/img/logo.jpeg', 4, 15, 17); // Ajusta la ruta y las coordenadas según sea necesario
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("EL HUEVO FELIZ")), 0, 'C', false);
        $pdf->SetFont('Arial', '', 9);
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Direccion :"), 0, 'C', false);
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Cartago Valle del Cauca"), 0, 'C', false);
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Teléfono: 2065454"), 0, 'C', false);
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Email: elhuevo@feliz.com"), 0, 'C', false);

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
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("Factura Nro: $maximoId")), 0, 'C', false);
        $pdf->SetFont('Arial', '', 9);

        $pdf->Ln(1);
        $pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", "------------------------------------------------------"), 0, 0, 'C');
        $pdf->Ln(5);

        #CONSULTA DATOS DEL CLIENTE
        $sql6 = "SELECT nombreCompleto,numeroTelefono,correoElectronico
        FROM clientes WHERE idClientes = :id";
        $stmt6 = $pdo->prepare($sql6);
        $stmt6->bindParam(":id", $idCliente, PDO::PARAM_INT);
        if ($stmt6->execute()) {
            $resultado3 = $stmt6->fetch(PDO::FETCH_ASSOC);
            $nombre = $resultado3["nombreCompleto"];
            $telefono = $resultado3["numeroTelefono"];
            $correo = $resultado3["correoElectronico"];
        }

        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Cliente: $nombre"), 0, 'C', false);
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Documento: $idCliente"), 0, 'C', false);
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Teléfono: $telefono"), 0, 'C', false);
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Correo: $correo"), 0, 'C', false);

        $pdf->Ln(1);
        $pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", "-------------------------------------------------------------------"), 0, 0, 'C');
        $pdf->Ln(3);

        $totalGeneral = 0;
        /*---------- Detalles de la tabla ----------*/
        #CONSULTA PRODUCTOS VENDIDOS
        foreach ($datosCompra as $datos) {
            $idProd = $datos->id;
            $nombre = $datos->nombre;
            $precio = $datos->total2;
            $cantidad = $datos->cantidad;
            $totalProd = $datos->total;
            //Comienzo a comparar los tipos de huevos para descontar de los lotes
            switch ($nombre) {
                case 'Huevo A':
                case 'Panal de Huevo A':
                case 'Medio Panal de Huevo A':
                    //en cada caso hago la inserscion en caso de que si sea
                    //TIPO HUEVO A, LOTE DE TIPO A
                    $insertarDetalle = $pdo->prepare('INSERT INTO detalle (cantidad,Encabezado_idEncabezado,
                    LoteHuevo_idLoteHuevo) values (:cantidad,:idEncabezado,:idLote)');
                    $insertarDetalle->bindParam(":cantidad", $cantidad, PDO::PARAM_INT);
                    $insertarDetalle->bindParam(":idEncabezado", $maximoId, PDO::PARAM_INT);
                    $insertarDetalle->bindParam(":idLote", $local1V, PDO::PARAM_INT);
                    $insertarDetalle->execute();
                    $descuentoTotal = $descLocal1;
                    break;

                case 'Huevo AA':
                case 'Panal de Huevo AA':
                case 'Medio Panal de Huevo AA':
                    //en cada caso hago la inserscion en caso de que si sea
                    //TIPO HUEVO A, LOTE DE TIPO AA
                    $insertarDetalle = $pdo->prepare('INSERT INTO detalle (cantidad,Encabezado_idEncabezado,
                    LoteHuevo_idLoteHuevo) values (:cantidad,:idEncabezado,:idLote)');
                    $insertarDetalle->bindParam(":cantidad", $cantidad, PDO::PARAM_INT);
                    $insertarDetalle->bindParam(":idEncabezado", $maximoId, PDO::PARAM_INT);
                    $insertarDetalle->bindParam(":idLote", $local2V, PDO::PARAM_INT);
                    $insertarDetalle->execute();
                    $descuentoTotal = $descLocal2;
                    break;

                case 'Huevo AAA':
                case 'Panal de Huevo AAA':
                case 'Medio Panal de Huevo AAA':
                    //en cada caso hago la inserscion en caso de que si sea
                    //TIPO HUEVO A, LOTE DE TIPO AAA
                    $insertarDetalle = $pdo->prepare('INSERT INTO detalle (cantidad,Encabezado_idEncabezado,
                    LoteHuevo_idLoteHuevo) values (:cantidad,:idEncabezado,:idLote)');
                    $insertarDetalle->bindParam(":cantidad", $cantidad, PDO::PARAM_INT);
                    $insertarDetalle->bindParam(":idEncabezado", $maximoId, PDO::PARAM_INT);
                    $insertarDetalle->bindParam(":idLote", $local3V, PDO::PARAM_INT);
                    $insertarDetalle->execute();
                    $descuentoTotal = $descLocal3;
                    break;

                default:
                    //en cada caso hago la inserscion en caso de que si sea
                    //TIPO HUEVO A, LOTE DE TIPO PREMIUM
                    $insertarDetalle = $pdo->prepare('INSERT INTO detalle (cantidad,Encabezado_idEncabezado,
                    LoteHuevo_idLoteHuevo) values (:cantidad,:idEncabezado,:idLote)');
                    $insertarDetalle->bindParam(":cantidad", $cantidad, PDO::PARAM_INT);
                    $insertarDetalle->bindParam(":idEncabezado", $maximoId, PDO::PARAM_INT);
                    $insertarDetalle->bindParam(":idLote", $local4V, PDO::PARAM_INT);
                    $insertarDetalle->execute();
                    $descuentoTotal = $descLocal4;
                    break;
            }
            $totalDesc = ($totalProd * $descuentoTotal) / 100;
            $totalUnidad = $totalProd - $totalDesc;
            $precioFor = number_format($precio, 2, ',', '.');
            $totalProdFor = number_format($totalUnidad, 2, ',', '.');
            $totalGeneral = $totalGeneral + $totalUnidad;
            $pdf->MultiCell(0, 4, iconv("UTF-8", "ISO-8859-1", "$nombre"), 0, 'C', false);
            $pdf->Cell(1, 4, iconv("UTF-8", "ISO-8859-1", "x $cantidad"), 0, 0, 'C');
            $pdf->Cell(30, 4, iconv("UTF-8", "ISO-8859-1", "Uni : $$precioFor "), 0, 0, 'C');
            $pdf->Cell(10, 4, iconv("UTF-8", "ISO-8859-1", "Desc : %$descuentoTotal -"), 0, 0, 'C');
            $pdf->Cell(35, 4, iconv("UTF-8", "ISO-8859-1", "Total : $$totalProdFor"), 0, 0, 'C');
            $pdf->Ln(7);
        }

        /*---------- Fin Detalles de la tabla ----------*/
        $pdf->Ln(1);
        $pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", "-------------------------------------------------------------------"), 0, 0, 'C');
        $pdf->Ln(3);
        $totalCambio = $valorRecibido - $totalGeneral;
        $totalGeneralF = number_format($totalGeneral, 2, ',', '.');
        $valorRecibidoF = number_format($valorRecibido, 2, ',', '.');
        $totalCambioF = number_format($totalCambio, 2, ',', '.');
        # Tabla de productos #
        if ($tipoPago == 3) {
            $pdf->Cell(100, 10, iconv("UTF-8", "ISO-8859-1", "Total : $totalGeneralF"), 0, 0, 'C');
            $pdf->Ln();  // Salto de línea
            $pdf->Cell(100, 5, iconv("UTF-8", "ISO-8859-1", "Numero Tarjeta : $numeroTarjeta"), 0, 0, 'C');
        } else {
            $pdf->Cell(110, 5, iconv("UTF-8", "ISO-8859-1", "Recibido : $valorRecibidoF"), 0, 0, 'C');
            $pdf->Ln();  // Salto de línea
            $pdf->Cell(100, 5, iconv("UTF-8", "ISO-8859-1", "IVA % : $iva"), 0, 0, 'C');
            $pdf->Ln();  // Salto de línea
            $pdf->Cell(110, 5, iconv("UTF-8", "ISO-8859-1", "Total : $totalGeneralF"), 0, 0, 'C');
            $pdf->Ln();  // Salto de línea
            $pdf->Cell(110, 5, iconv("UTF-8", "ISO-8859-1", "Cambio : $totalCambioF"), 0, 0, 'C');
        }

        $pdf->Ln(3);
        $pdf->Cell(72, 18, iconv("UTF-8", "ISO-8859-1", "-------------------------------------------------------------------"), 0, 0, 'C');
        $pdf->Ln(4);

        if ($tipoPago == 3) {
            // Calcular el monto de cada cuota
            $montoPorCuota = $totalGeneral / 3;
            $montoPorCuotaF = number_format($montoPorCuota, 2, ',', '.');
            for ($i = 1; $i <= 3; $i++) {
                # code...
                $pdf->Cell(73, 15, iconv("UTF-8", "ISO-8859-1", "Pagar x Mes $i : $montoPorCuotaF"), 0, 0, 'C');
                $pdf->Ln(4);  // Salto de línea
            }
        }

        $pdf->Ln(3);
        $pdf->Cell(72, 18, iconv("UTF-8", "ISO-8859-1", "-------------------------------------------------------------------"), 0, 0, 'C');
        $pdf->Ln(3);


        $pdf->Ln(9);

        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "*** Precios de productos incluyen impuestos.
        Para poder realizar un reclamo o devolución debe de presentar este ticket ***"), 0, 'C', false);

        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(0, 7, iconv("UTF-8", "ISO-8859-1", "Gracias por su compra"), '', 0, 'C');

        $pdf->Ln(14);

        # Codigo de barras #
        $pdf->Code128(5, $pdf->GetY(), "COD000001V0001", 70, 20);
        $pdf->SetXY(0, $pdf->GetY() + 21);
        $pdf->SetFont('Arial', '', 14);
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "COD000001V0001"), 0, 'C', false);

        $rutaActal = getcwd();
        $pdf->Output("$rutaActal/tickes/Ticket_Nro_$maximoId.pdf", "F");
        echo $maximoId;
    } catch (\Throwable $th) {
    }
}
