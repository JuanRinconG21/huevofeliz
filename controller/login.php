<?php
session_start();
if (
    isset($_POST["email"]) && !empty($_POST["email"]) &&
    isset($_POST["password"]) && !empty($_POST["password"])
) {
    require_once '../models/MySQL.php';
    $email = $_POST["email"];
    $pass = $_POST["password"];

    try {
        require_once '../models/MySQL.php';
        $conexion = new Mysql();
        $pdo = $conexion->conectar();
        // Consulta SQL para seleccionar al usuario
        $stmt = $pdo->prepare("SELECT idClientes,correoElectronico,nombreCompleto,pass,Roles_idRoles FROM clientes
        WHERE correoElectronico = :email");
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila && password_verify($pass, $fila["pass"])) {
            // Inicio de sesión exitoso
            $_SESSION["idClientes"] = $fila["idClientes"];
            $_SESSION["correoElectronico"] = $fila["correoElectronico"];
            $_SESSION["nombreCompleto"] = $fila["nombreCompleto"];
            $_SESSION["roles"]=$fila["Roles_idRoles"];
            $_SESSION["acceso"] = true;
            $_SESSION["mensajeExitoso"] = "Inicio de sesión exitoso.";
            header("Location:./inicio.php");
        } else {
            $_SESSION["mensajeError"] = "Credenciales de inicio de sesión incorrectas.";
            header("Location:./login.php");
        }
    } catch (PDOException $e) {

        $_SESSION["mensajeError"] = "Error en la base de datos: " . $e->getMessage();
        header("Location:./login.php");
        exit;
    }
} else {
    $_SESSION["mensajeError"] = "Ingrese correctamente el usuario y la contraseña.";
    header("Location:./login.php");
    exit;
}
