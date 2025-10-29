<?php
// ============================================
// ARCHIVO: guardar_subcategoria.php
// Guardar nueva subcategoría
// ============================================
header('Content-Type: application/json');
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreSubcategoria = $_POST['nombreSubcategoria'];
    $categoriaSubcategoria = $_POST['categoriaSubcategoria'];
    
    $sql = "INSERT INTO Subcategorias (NombreSubcategoria, CategoriaID) VALUES (?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("si", $nombreSubcategoria, $categoriaSubcategoria);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Subcategoría guardada exitosamente']);
    } else {
        echo json_encode(['success' => false, 'message' => $conexion->error]);
    }
    
    $stmt->close();
}
$conexion->close();
?>