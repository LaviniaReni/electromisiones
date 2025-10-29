<?php
// ============================================
// ARCHIVO: listar_subcategorias.php
// Listar todas las subcategorías
// ============================================
header('Content-Type: application/json');
include 'conexion.php';

$sql = "SELECT * FROM Subcategorias ORDER BY NombreSubcategoria";
$resultado = $conexion->query($sql);

$subcategorias = [];
while ($fila = $resultado->fetch_assoc()) {
    $subcategorias[] = $fila;
}

echo json_encode($subcategorias);
$conexion->close();
?>