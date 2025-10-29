<?php
// ============================================
// ARCHIVO: guardar_categoria.php
// Guardar nueva categoría
// ============================================
header('Content-Type: application/json');
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreCategoria = $_POST['nombreCategoria'];
    
    $sql = "INSERT INTO Categorias (NombreCategoria) VALUES (?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $nombreCategoria);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Categoría guardada exitosamente']);
    } else {
        echo json_encode(['success' => false, 'message' => $conexion->error]);
    }
    
    $stmt->close();
}
$conexion->close();
?>