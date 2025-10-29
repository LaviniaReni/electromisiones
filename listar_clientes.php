<?php
// ============================================
// ARCHIVO: listar_clientes.php
// Listar todos los clientes
// ============================================
header('Content-Type: application/json');
include 'conexion.php';

$sql = "SELECT * FROM Clientes WHERE Activo = 1 ORDER BY NombreCliente";
$resultado = $conexion->query($sql);

$clientes = [];
while ($fila = $resultado->fetch_assoc()) {
    $clientes[] = $fila;
}

echo json_encode($clientes);
$conexion->close();
?>