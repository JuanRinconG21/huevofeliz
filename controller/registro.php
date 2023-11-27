<?php
$id = trim($_POST['id']);
$nombre = trim($_POST["nombre"]);
$tel = trim($_POST["telefono"]);
$email = trim($_POST["email"]);
$direccion = trim($_POST["direccion"]);
$pass =  trim($_POST["password"]);
$rol = trim($_POST["rol"]);
session_start();
if (
  isset($id) && !empty($id) &&
  isset($_POST["nombre"]) && isset($_POST["telefono"]) && isset($_POST["email"]) && isset($_POST["direccion"]) && isset($_POST["password"]) && isset($_POST["rol"])
) {

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
      echo "El usuario ya existe, por favor elija otro.";
    }

    // Hash de la contraseña
    $passHash = password_hash($pass, PASSWORD_DEFAULT);

    // Insertar nuevo usuario
    $stmt = $pdo->prepare("INSERT INTO clientes (nombreCompleto,numeroTelefono,correoElectronico,direccion,pass,Roles_idRoles)
    VALUES (:name,:tel, :email,:direccion,:pass,:rol)");

    $stmt->bindParam(":name", $nombre, PDO::PARAM_STR);
    $stmt->bindParam(":tel", $nombre, PDO::PARAM_STR);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->bindParam(":direccion", $email, PDO::PARAM_STR);
    $stmt->bindParam(":pass", $passHash, PDO::PARAM_STR);
    $stmt->bindParam(":rol", $rol, PDO::PARAM_INT);
    if ($stmt->execute()) {
      $_SESSION["mensajeExitoso"] = "Usuario registrado exitosamente.";
      echo "Usuario registrado exitosamente.";
    } else {
      $_SESSION["mensajeError"] = "Error en el registro";
      echo "Error en el registro";
    }
  } catch (PDOException $e) {
    // Manejo de errores en caso de que ocurra una excepción.
    $_SESSION["mensajeError"] = "Error en la base de datos: ";
    echo "Error en la base de datos: ";
  }
} else {
  $_SESSION["mensajeError"] = "Los campos están vacíos, por favor ingrese los datos correctamente.";
  echo "Los campos están vacíos, por favor ingrese los datos correctamente.";
}
