<?php

session_start();

if (
  isset($_POST["nombre"]) && isset($_POST["telefono"]) && isset($_POST["email"]) && isset($_POST["direccion"]) && isset($_POST["password"]) && isset($_POST["rol"])) 
  
  {
  $nombre = $_POST["nombre"];
  $tel = $_POST["telefono"];
  $email = $_POST["email"];
  $direccion = $_POST["direccion"];
  $pass = $_POST["password"];
  $rol = $_POST["rol"];
  
  // Validar campos no vacíos
  if (empty($nombre) || empty($telefono) || empty($email) || empty($direccion) || empty($password) || empty($rol)) {
    $_SESSION["mensajeError"] = "Los campos no pueden estar vacíos.";
    header("Location:./login.php");
    exit;
  }

  require_once '../models/MySQL.php';

  $conexion = new Mysql();

  try {
    // Verificar si el usuario ya existe
    $pdo = $conexion->conectar();
    $consultaExiste = $pdo->prepare("SELECT nombreCompleto FROM clientes WHERE nombreCompleto = :nombre");
    $consultaExiste->bindParam(":nombre", $nombre, PDO::PARAM_STR);
    $consultaExiste->execute();

    if ($consultaExiste->rowCount() > 0) {
      $_SESSION["mensajeError"] = "El usuario ya existe, por favor elija otro.";
      header("Location:./login.php");
      exit;
    }

    // Hash de la contraseña
    $passHash = password_hash($pass, PASSWORD_DEFAULT);

    // Insertar nuevo usuario
    $stmt = $pdo->prepare("INSERT INTO clientes (nombreCompleto,numeroTelefono,correoElectronico,direccion,pass,Roles_idRoles)
    VALUES (:name,:tel, :email,:direccion,:pass,:rol)");

    $stmt->bindParam(":name", $nombre, PDO::PARAM_STR);
    $stmt->bindParam(":tel", $nombre, PDO::PARAM_STR);
    $stmt->bindParam(":email",$email,PDO::PARAM_STR);
    $stmt->bindParam(":direccion",$email,PDO::PARAM_STR);
    $stmt->bindParam(":pass", $passHash, PDO::PARAM_STR);
    $stmt->bindParam(":rol", $rol, PDO::PARAM_INT);


    if ($stmt->execute()) {
      $_SESSION["mensajeExitoso"] = "Usuario registrado exitosamente.";
      header("Location:./login.php");
      exit;
    } else {
      $_SESSION["mensajeError"] = "Error en el registro.";
      header("Location:./login.php");
      exit;
    }
  } catch (PDOException $e) {
    // Manejo de errores en caso de que ocurra una excepción.
    $_SESSION["mensajeError"] = "Error en la base de datos: " . $e->getMessage();
    header("Location:./login.php");
  }
} else {
  $_SESSION["mensajeError"] = "Los campos están vacíos, por favor ingrese los datos correctamente.";
  header("Location:./login.php");
  exit;
}
