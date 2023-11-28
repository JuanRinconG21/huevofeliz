<?php
session_start();
$totalPagar = $_POST['totalPagar'];
$_SESSION['totalPagar'] = $totalPagar;
// Capturar los datos enviados por la solicitud AJAX
$cantidades = $_POST['cantidades'];
// Almacena el array en una variable de sesión
$_SESSION['cantidades'] = $cantidades;
// foreach ($cantidades as $cantidad) {
//     // Hacer algo con cada cantidad
//     echo "Cantidad: " . $cantidad . "<br>";
// }
$seleccion = $_POST['seleccion'];
$_SESSION['idCliente'] = $seleccion;
