<?php
// ============================================
// ARCHIVO: guardar_marca.php
// Guardar nueva marca
// ============================================
header('Content-Type: application/json');
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreMarca = $_POST['nombreMarca'];
    
    $sql = "INSERT INTO Marcas (NombreMarca) VALUES (?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $nombreMarca);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Marca guardada exitosamente']);
    } else {
        echo json_encode(['success' => false, 'message' => $conexion->error]);
    }
    
    $stmt->close();
}
$conexion->close();
?>