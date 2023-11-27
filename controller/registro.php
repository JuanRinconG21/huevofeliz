

<?php

session_start();


$id = trim($_POST['id']);
$nombre = trim($_POST["nombre"]);
$tel = trim($_POST["telefono"]);
$email = trim($_POST["email"]);
$direccion = trim($_POST["direccion"]);
$pass =  trim($_POST["password"]);
$rol = trim($_POST["rol"]);



if (
  isset($id) && !empty($id) &&
  isset($_POST["nombre"]) && !empty($nombre) && isset($_POST["telefono"]) && !empty($tel) && isset($_POST["email"]) && !empty($email) && isset($_POST["direccion"]) && !empty($direccion) && isset($_POST["password"]) && !empty($pass) && isset($_POST["rol"] ) && !empty($rol)
) {

  require_once '../models/MySQL.php';
  $conexion = new Mysql();

  try {
    // Verificar si el usuario ya existe
    $pdo = $conexion->conectar();
    $consultaExiste = $pdo->prepare("SELECT idClientes FROM clientes WHERE idClientes = :id");
    $consultaExiste->bindParam(":id", $id, PDO::PARAM_INT);
    $consultaExiste->execute();

    if ($consultaExiste->rowCount() > 0) {
      $_SESSION["mensajeError"] = "El usuario ya existe, por favor elija otro.";
      echo "El usuario ya existe, por favor elija otro.";
    }

    // Hash de la contraseña
    $passHash = base64_encode($pass);

    // Insertar nuevo usuario
    $stmt = $pdo->prepare("INSERT INTO clientes (idClientes,nombreCompleto,numeroTelefono,correoElectronico,direccion,pass,Roles_idRoles)
    VALUES (:id,:name,:tel, :email,:direccion,:pass,:rol)");

    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->bindParam(":name", $nombre, PDO::PARAM_STR);
    $stmt->bindParam(":tel", $tel, PDO::PARAM_STR);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->bindParam(":direccion", $direccion, PDO::PARAM_STR);
    $stmt->bindParam(":pass", $passHash, PDO::PARAM_STR);
    $stmt->bindParam(":rol", $rol, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
      $_SESSION["mensajeExitoso"] = "Usuario registrado exitosamente.";
      header("Location:../login.php");
      
    } else {
      $_SESSION["mensajeError"] = "Error en el registro";
      
    }
  } catch (PDOException $e) {
    // Manejo de errores en caso de que ocurra una excepción.
    $_SESSION["mensajeError"] = "Error en la base de datos: ";
    
  }
} else {
  $_SESSION["mensajeError"] = "Los campos están vacíos, por favor ingrese los datos correctamente.";
  echo "Los campos están vacíos, por favor ingrese los datos correctamente.";
}
