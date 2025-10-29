<?php
header('Content-Type: application/json');
include 'conexion.php';

$sql = "SELECT s.*, c.NombreCategoria 
        FROM Subcategorias s
        INNER JOIN Categorias c ON s.CategoriaID = c.CategoriaID
        ORDER BY s.NombreSubcategoria";
$resultado = $conexion->query($sql);

$subcategorias = [];
while ($fila = $resultado->fetch_assoc()) {
    $subcategorias[] = $fila;
}

echo json_encode($subcategorias);
$conexion->close();
?>