<?php
$cedula = $_POST['cedula'];
$nombreCompleto = $_POST['nombreCompleto'];
$fechaNac = $_POST['fechaNac'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$fechaIngreso = $_POST['fechaIngreso'];
$numeroCuenta = $_POST['numeroCuenta'];
$numeroEmergencia = $_POST['numeroEmergencia'];
$nivelEducacion = $_POST['nivelEducacion'];
$experienciaLaboral = $_POST['experienciaLaboral'];
$evaluacionDesempeño = $_POST['evaluacionDesempeño'];
$salario = $_POST['salario'];
$pass = $_POST['pass'];
$checkCargo = $_POST['checkCargo'];
if (
    isset($cedula) && !empty($cedula) && isset($nombreCompleto) && !empty($nombreCompleto) &&
    isset($fechaNac) && !empty($fechaNac) && isset($direccion) && !empty($direccion) &&
    isset($telefono) && !empty($telefono) && isset($correo) && !empty($correo) &&
    isset($fechaIngreso) && !empty($fechaIngreso) &&  isset($numeroCuenta) && !empty($numeroCuenta) &&
    isset($numeroEmergencia) && !empty($numeroEmergencia) && isset($nivelEducacion) && !empty($nivelEducacion) &&
    isset($experienciaLaboral) && !empty($experienciaLaboral) && isset($evaluacionDesempeño) && !empty($evaluacionDesempeño) &&
    isset($salario) && !empty($salario) && isset($pass) && !empty($pass) && isset($checkCargo) && !empty($checkCargo)
) {
    $cedula = trim($cedula);
    $nombreCompleto = trim($nombreCompleto);
    $fechaNac = trim($fechaNac);
    $direccion = trim($direccion);
    $telefono = trim($telefono);
    $correo = trim($correo);
    $fechaIngreso = trim($fechaIngreso);
    $numeroCuenta = trim($numeroCuenta);
    $numeroEmergencia = trim($numeroEmergencia);
    $nivelEducacion = trim($nivelEducacion);
    $experienciaLaboral = trim($experienciaLaboral);
    $evaluacionDesempeño = trim($evaluacionDesempeño);
    $salario = trim($salario);
    $pass = trim($pass);
    foreach ($checkCargo as $key) {
        $key = trim($key);
    }
    if (empty($cedula) || empty($nombreCompleto) || empty($fechaNac)) {
    }
}
