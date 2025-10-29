<?php
// ============================================
// ARCHIVO: listar_sucursales.php
// Listar todas las sucursales
// ============================================
header('Content-Type: application/json');
include 'conexion.php';

$sql = "SELECT * FROM Sucursales WHERE Activa = 1 ORDER BY NombreSucursal";
$resultado = $conexion->query($sql);

$sucursales = [];
while ($fila = $resultado->fetch_assoc()) {
    $sucursales[] = $fila;
}

echo json_encode($sucursales);
$conexion->close();
?>