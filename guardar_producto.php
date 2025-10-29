<?php
// ============================================
// ARCHIVO: guardar_producto.php
// Guardar nuevo producto
// ============================================
header('Content-Type: application/json');
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreProducto = $_POST['nombreProducto'];
    $precioProducto = $_POST['precioProducto'];
    $marcaProducto = $_POST['marcaProducto'];
    $subcategoriaProducto = $_POST['subcategoriaProducto'];
    $stockProducto = $_POST['stockProducto'];
    $permiteCuotas = isset($_POST['permiteCuotas']) ? 1 : 0;
    
    $sql = "INSERT INTO Productos (NombreProducto, PrecioPagoUnico, PermiteCuotas, MarcaID, SubcategoriaID, Stock) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sdiii", $nombreProducto, $precioProducto, $permiteCuotas, $marcaProducto, $subcategoriaProducto, $stockProducto);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Producto guardado exitosamente']);
    } else {
        echo json_encode(['success' => false, 'message' => $conexion->error]);
    }
    
    $stmt->close();
}
$conexion->close();
?>