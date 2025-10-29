<?php
// ============================================
// ARCHIVO: listar_categorias.php
// Listar todas las categorías
// ============================================
header('Content-Type: application/json');
include 'conexion.php';

$sql = "SELECT * FROM Categorias ORDER BY NombreCategoria";
$resultado = $conexion->query($sql);

$categorias = [];
while ($fila = $resultado->fetch_assoc()) {
    $categorias[] = $fila;
}

echo json_encode($categorias);
$conexion->close();
?>