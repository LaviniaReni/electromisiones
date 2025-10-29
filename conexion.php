<?php
// ============================================
// ARCHIVO: conexion.php
// Conexión a la base de datos
// ============================================
$host = 'localhost';
$usuario = 'root';
$password = '';
$base_datos = 'electromisiones';

$conexion = new mysqli($host, $usuario, $password, $base_datos);

if ($conexion->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Error de conexión: ' . $conexion->connect_error]));
}

$conexion->set_charset('utf8mb4');
?>