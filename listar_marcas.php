<?php
// ============================================
// ARCHIVO: listar_marcas.php
// Listar todas las marcas
// ============================================
header('Content-Type: application/json');
include 'conexion.php';

$sql = "SELECT * FROM Marcas ORDER BY NombreMarca";
$resultado = $conexion->query($sql);

$marcas = [];
while ($fila = $resultado->fetch_assoc()) {
    $marcas[] = $fila;
}

echo json_encode($marcas);
$conexion->close();
?>