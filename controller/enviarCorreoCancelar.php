<?php
session_start();
include('../models/MySQL.php');

require_once ('../vendor/autoload.php');
require_once ('../vendor/phpmailer/phpmailer/src/PHPMailer.php');


// Tomar los datos del formulario
$idPedido = $_POST['idPedido'];
$estado = $_POST['estado'];
$conductor = $_POST['conductor'];
$motivoCancelacion = $_POST['motivoCancelacion'];

// Configurar PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'kh2.0acru@gmail.com';
    $mail->Password   = 'q o kx y q q w e otm uure';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Configuración del remitente y destinatario
    $mail->setFrom('kh2.0acru@gmail.com', 'Alexis Candela');
    $mail->addAddress('fohasop353@kxgif.com', 'Jota Jefe');

    // Contenido del mensaje
    $mail->isHTML(true);
 
   /*  $mail->Subject = 'Cancelación de Pedido';
    $mail->Body    = "Se ha cancelado el pedido con la siguiente información:<br><br>
                      <strong>ID Pedido:</strong> $idPedido<br>
                      <strong>Estado:</strong> $estado<br>
                      <strong>Conductor:</strong> $conductor<br>
                      <strong>Motivo de Cancelación:</strong> $motivoCancelacion";
 */


 $mail->Subject = '=?UTF-8?B?' . base64_encode('Cancelación de Pedido') . '?=';
 $mail->CharSet = 'UTF-8';  // Añadir esta línea
 $mail->Body    = "Se ha cancelado el pedido con la siguiente información:<br><br>
 <strong>ID Pedido:</strong> $idPedido<br>
 <strong>Estado:</strong> $estado<br>
 <strong>Conductor:</strong> $conductor<br>
 <strong>Motivo de Cancelación:</strong> $motivoCancelacion";


    // Enviar el correo
    $mail->send();



 // Actualizar la base de datos
 $conexion = new MySQL();
    $pdo = $conexion->conectar();

    $idUsuario = 2;  // Cambia esto al valor correcto
    $estado1 = 1;
    
    $editarPedido = "UPDATE pedidos SET estado = :estadoPedido, Usuario_idUsuario = :idUsuario where idPedidos= :id";
    $stmt = $pdo->prepare($editarPedido);
    $stmt->bindParam(":id", $idPedido, PDO::PARAM_STR);
    $stmt->bindParam(":estadoPedido", $estado1, PDO::PARAM_STR);
    $stmt->bindParam(":idUsuario", $idUsuario, PDO::PARAM_STR);
    $stmt->execute();









    echo 'El mensaje se ha enviado correctamente.';
} catch (Exception $e) {
    echo "Error al enviar el mensaje: {$mail->ErrorInfo}";
}

?>